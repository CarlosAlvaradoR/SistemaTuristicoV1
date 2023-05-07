<?php

namespace App\Http\Livewire\ViajesAdmin\Guias;

use App\Models\PaquetesTuristicos;
use App\Models\Personas;
use App\Models\TipoAcemilas;
use App\Models\Viajes\Asociaciones;
use App\Models\Viajes\Guias as ViajesGuias;
use App\Models\Viajes\ViajePaquetes;
use App\Models\Viajes\ViajePaquetesGuias;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Guias extends Component
{
    public $paquete, $idViaje;
    public $idGuia = 0;
    public $idviajePaqueteGuias, $monto, $cantidad, $tipo_de_acemila;
    public $total = 0;
    /** Para buscar Arrieros */
    public $dni, $buscar;
    public $nombres_apellidos, $dni_encontrado, $telefono_arriero, $idPersona;
    public $asociacion;
    public $encontradoComoPersona = false, $encontradoComoCocinero = false, $no_existe = false;
    public $dni_persona, $nombre, $apellidos, $genero, $telefono, $dirección;

    public function resetUI(){
        $this->reset(['idviajePaqueteGuias', 'monto', 'idGuia']);
    }

    public function mount(PaquetesTuristicos $paquete, ViajePaquetes $viaje)
    {
        $this->paquete = $paquete;
        $this->idViaje = $viaje->id;
    }


    public function render()
    {
        $guias = DB::table('v_viaje_personas_guias')
            ->whereNOTIn('idGuia', function ($query) {
                $query->select('vpg.guias_id')->from('viaje_paquetes_guias as vpg')
                    ->where('vpg.viaje_paquetes_id', $this->idViaje);
            })
            ->get();
        $guias_participantes = DB::table('v_viaje_personas_guias_participantes_viaje')
            ->where('viaje_paquetes_id', $this->idViaje)
            ->get();

        //dd($guias_participantes);
        $asociaciones = Asociaciones::all(['id', 'nombre']);
        $tipo_acemilas = TipoAcemilas::all(['id', 'nombre']);


        return view(
            'livewire.viajes-admin.guias.guias',
            compact(
                'guias',
                'tipo_acemilas',
                'guias_participantes',
                'asociaciones'
            )
        );
    }

    public function AñadirGuia($idGuia)
    {
        $this->idGuia = $idGuia;
        $this->emit('show-modal', 'show modal');
    }

    public function AñadirAlGuia()
    {
        $title = 'MUY BIEN !';
        $icon = 'success';
        $text = 'Guía Añadido Correctamente al Viaje.';
        $this->validate(
            [
                'monto' => 'required|regex:/^\d+(\.\d{1,2})?$/'
            ]
        );
        if ($this->idviajePaqueteGuias) {
            $viaje_paquete_guias = ViajePaquetesGuias::findOrFail($this->idviajePaqueteGuias);
            $viaje_paquete_guias->monto_pagar = $this->monto;
            $viaje_paquete_guias->save();
            $text = 'Información Actualizada Corretamente';
        } else {
            $viaje_paquete_guias = ViajePaquetesGuias::create([
                'monto_pagar' => $this->monto,
                'viaje_paquetes_id' => $this->idViaje,
                'guias_id' => $this->idGuia
            ]);
        }

        $this->resetUI();
        $this->emit('alert', $title, $icon, $text);
        $this->emit('fecha-itinerario-guarded', 'close');
    }

    public function Edit(ViajePaquetesGuias $viaje_paquete_guias)
    {
        //dd($viaje_paquete_guias);
        $this->idviajePaqueteGuias = $viaje_paquete_guias->id;
        $this->monto = $viaje_paquete_guias->monto_pagar;
        $this->emit('show-modal');
    }

    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('swal-confirm-guias', [
            'title' => 'Está seguro que desea eliminar al Guía del Viaje ?',
            'icon' => 'warning',
            'id' => $id
        ]);
    }
    protected $listeners = ['deleteGuiaViaje'];
    public function deleteGuiaViaje(ViajePaquetesGuias $viaje_paquete_guias)
    {
        //dd($viaje_paquete_guias);
        $title = 'MUY BIEN !';
        $icon = 'success';
        $text= 'Información Eliminada Correctamente';
        $viaje_paquete_guias->delete();
        $this->emit('alert', $title, $icon, $text);

    }

    public function buscarArriero()
    {
        $this->validate(
            ['dni' => 'required|min:3']
        );
        $this->resetUI();
        $sql = "SELECT p.id, p.dni, concat(p.nombre,' ',p.apellidos) as datos, p.telefono, g.id as idGuia FROM personas p
        LEFT JOIN guias g on g.persona_id = p.id
        WHERE p.dni = '" . $this->dni . "' LIMIT 1";

        //dd($this->dni);
        $this->buscar = DB::select($sql);

        if ($this->buscar) {
            $this->idPersona = $this->buscar[0]->id;
            $this->nombres_apellidos = $this->buscar[0]->datos;
            $this->telefono_arriero = $this->buscar[0]->telefono;
            $this->encontradoComoPersona = true;

            //$this->encontrado = true;
            if ($this->buscar[0]->idGuia) {
                $this->idGuia = $this->buscar[0]->idGuia;
                $this->encontradoComoCocinero = true;
            }
            $this->reset(['dni']);
        } else {
            session()->flash('message-error', 'No se encontró informacion correspondiente al DNI: ' . $this->dni);
            $this->no_existe = true;
            $this->dni_persona = $this->dni;
            $this->resetValidation();
            $this->reset(['dni']);
        }
    }

    public function updated($name, $value)
    {
        $this->resetValidation($name);
        $this->resetErrorBag($name);
    }

    // public function guardarGuiaViaje()
    // { //Cuado lo encuentre como Arriero
    //     $this->validate(
    //         [
    //             'monto' => 'required'
    //         ]
    //     );
    //     $viaje_paquete_guias = ViajePaquetesGuias::create([
    //         'monto_pagar' => $this->monto, 
    //         'viaje_paquetes_id' => $this->idViaje, 
    //         'guias_id' => $this->idGuia
    //     ]);

    //     $this->resetUI();
    // }

    public function guardarGuiaYAñadirAlViaje()
    { //Cuando lo encontré como Persona, pero no como cocinero

        $guia = ViajesGuias::create([
            'persona_id' => $this->idPersona
        ]);

        $viaje_paquete_guias = ViajePaquetesGuias::create([
            'monto_pagar' => $this->monto,
            'viaje_paquetes_id' => $this->idViaje,
            'guias_id' => $guia->id
        ]);

        $this->resetUI();
    }

    public function nuevoGuia()
    {
        $personas = Personas::create(
            [
                'dni' => $this->dni_persona,
                'nombre' => $this->nombre,
                'apellidos' => $this->apellidos,
                'genero' => $this->genero,
                'telefono' => $this->telefono,
                'dirección' => $this->dirección
            ]
        );

        $guia = ViajesGuias::create([
            'persona_id' => $personas->id
        ]);

        $viaje_paquete_guias = ViajePaquetesGuias::create([
            'monto_pagar' => $this->monto,
            'viaje_paquetes_id' => $this->idViaje,
            'guias_id' => $guia->id
        ]);

        $this->resetUI();
    }


   
}
