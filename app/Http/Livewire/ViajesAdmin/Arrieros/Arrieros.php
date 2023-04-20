<?php

namespace App\Http\Livewire\ViajesAdmin\Arrieros;

use App\Models\PaquetesTuristicos;
use App\Models\Personas;
use App\Models\TipoAcemilas;
use App\Models\Viajes\AcemilasAlquiladas;
use App\Models\Viajes\Arrieros as ViajesArrieros;
use App\Models\Viajes\Asociaciones;
use App\Models\Viajes\ViajePaquetes;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Arrieros extends Component
{
    public $paquete, $idViaje;
    public $idArriero = 0;
    public $idAcemilasAlquiladas, $monto, $cantidad, $tipo_de_acemila;
    public $total = 0;
    /** Para buscar Arrieros */
    public $dni, $buscar;
    public $nombres_apellidos, $dni_encontrado, $telefono_arriero, $idPersona;
    public $asociacion;
    public $encontradoComoPersona = false, $encontradoComoArriero = false, $no_existe = false;
    public $dni_persona, $nombre, $apellidos, $genero, $telefono, $dirección;

    public function resetUI(){
        $this->reset(['monto', 'cantidad', 'tipo_de_acemila','idAcemilasAlquiladas']);
    }

    public function mount(PaquetesTuristicos $paquete, ViajePaquetes $viaje)
    {
        $this->paquete = $paquete;
        $this->idViaje = $viaje->id;
    }


    public function render()
    {
        $arrieros = DB::table('v_viaje_personas_arrieros')
            ->whereNOTIn('idArriero', function ($query) {
                $query->select('aq.arrieros_id')->from('acemilas_alquiladas as aq')
                    ->where('aq.viaje_paquetes_id', $this->idViaje);
            })
            ->get();
        $arrieros_participantes = DB::table('v_viaje_personas_arrieros_participantes_viaje')
            ->where('viaje_paquetes_id', $this->idViaje)
            ->get();

        //dd($arrieros_participantes);
        $asociaciones = Asociaciones::all(['id', 'nombre']);
        $tipo_acemilas = TipoAcemilas::all(['id', 'nombre']);
        return view(
            'livewire.viajes-admin.arrieros.arrieros',
            compact(
                'arrieros',
                'tipo_acemilas',
                'arrieros_participantes',
                'asociaciones'
            )
        );
    }

    public function AñadirAcemilasAlquiladas($idArriero)
    {
        $this->idArriero = $idArriero;
        $this->emit('show-modal', 'show modal');
    }

    public function guardarAcemilasAlquiladas()
    {
        $title = 'MUY BIEN !';
        $icon = 'success';
        $text = 'Acémilas Alquiladas Añadidas correctamente.';
        $this->validate(
            [
                'monto' => 'required|regex:/^\d+(\.\d{1,2})?$/',
                'cantidad' => 'required|numeric|min:1',
                // 'viaje_paquetes_id' => $this->idViaje,
                // 'arrieros_id' => $this->idArriero,
                'tipo_de_acemila' => 'required|numeric|min:1'
            ]
        );
        if ($this->idAcemilasAlquiladas) {
            $acemilasAlquiladas = AcemilasAlquiladas::findOrFail($this->idAcemilasAlquiladas);
            $acemilasAlquiladas->monto = $this->monto;
            $acemilasAlquiladas->cantidad = $this->cantidad;
            $acemilasAlquiladas->tipo_acemilas_id = $this->tipo_de_acemila;
            $acemilasAlquiladas->save();
            $text = 'Acémilas Alquiladas Actualizadas correctamente.';
        } else {
            $acemilasAlquiladas = AcemilasAlquiladas::create([
                'monto' => $this->monto,
                'cantidad' => $this->cantidad,
                'viaje_paquetes_id' => $this->idViaje,
                'arrieros_id' => $this->idArriero,
                'tipo_acemilas_id' => $this->tipo_de_acemila
            ]);
        }



        $this->resetUI();
        $this->emit('alert', $title, $icon, $text);
        $this->emit('fecha-itinerario-guarded', 'close');
    }

    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('swal-confirm-arrieros', [
            'title' => 'Está seguro que desea eliminar el Alquiler de Acémila ?',
            'icon' => 'warning',
            'id' => $id
        ]);
    }
    protected $listeners = ['deleteAlquiler'];
    public function deleteAlquiler(AcemilasAlquiladas $acemilasAlquiladas)
    {
        $title = 'MUY BIEN !';
        $icon = 'success';
        $text= 'Alquiler de Acémila Eliminado Correctamente';
        $acemilasAlquiladas->delete();
        $this->emit('alert', $title, $icon, $text);

    }

    public function Edit(AcemilasAlquiladas $acemilasAlquiladas)
    {
        $this->idAcemilasAlquiladas = $acemilasAlquiladas->id;
        $this->monto = $acemilasAlquiladas->monto;
        $this->cantidad = $acemilasAlquiladas->cantidad;
        $this->tipo_de_acemila = $acemilasAlquiladas->tipo_acemilas_id;
        $this->emit('show-modal');
    }
/*
    public function buscarArriero()
    {
        $this->validate(
            ['dni' => 'required|min:3']
        );
        $this->resetUI();
        $sql = "SELECT p.id, p.dni, concat(p.nombre,' ',p.apellidos) as datos, p.telefono, a.id as idArriero FROM personas p
        LEFT JOIN arrieros a on a.persona_id = p.id
        WHERE p.dni = '" . $this->dni . "' LIMIT 1";

        //dd($this->dni);
        $this->buscar = DB::select($sql);

        if ($this->buscar) {
            $this->idPersona = $this->buscar[0]->id;
            $this->nombres_apellidos = $this->buscar[0]->datos;
            $this->telefono_arriero = $this->buscar[0]->telefono;
            $this->encontradoComoPersona = true;

            //$this->encontrado = true;
            if ($this->buscar[0]->idArriero) {
                $this->idArriero = $this->buscar[0]->idArriero;
                $this->encontradoComoArriero = true;
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

    public function guardarArrieroAlquilerAcemila()
    { //Cuado lo encuentre como Arriero
        // id del Arriero
        $acemilasAlquiladas = AcemilasAlquiladas::create([
            'monto' => $this->monto,
            'cantidad' => $this->cantidad,
            'viaje_paquetes_id' => $this->idViaje,
            'arrieros_id' => $this->idArriero,
            'tipo_acemilas_id' => $this->tipo_de_acemila
        ]);

        $this->resetUI();
    }
    public function guardarArrieroYAñadirAcemilasAlquiladas()
    { //Cuando lo encontré como Persona, pero no como arriero

        $arriero = ViajesArrieros::create([
            'persona_id' => $this->idPersona,
            'asociaciones_id' => $this->asociacion
        ]);

        $acemilasAlquiladas = AcemilasAlquiladas::create([
            'monto' => $this->monto,
            'cantidad' => $this->cantidad,
            'viaje_paquetes_id' => $this->idViaje,
            'arrieros_id' => $arriero->id,
            'tipo_acemilas_id' => $this->tipo_de_acemila
        ]);

        $this->resetUI();
    }

    public function nuevoArriero()
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
        $arriero = ViajesArrieros::create([
            'persona_id' => $personas->id,
            'asociaciones_id' => $this->asociacion
        ]);

        $acemilasAlquiladas = AcemilasAlquiladas::create([
            'monto' => $this->monto,
            'cantidad' => $this->cantidad,
            'viaje_paquetes_id' => $this->idViaje,
            'arrieros_id' => $arriero->id,
            'tipo_acemilas_id' => $this->tipo_de_acemila
        ]);

        $this->resetUI();
    }

*/
    // function resetUI()
    // {
    //     $this->reset([
    //         'dni_persona', 'nombre', 'apellidos', 'genero', 'telefono', 'telefono', 'dirección',
    //         'asociacion', 'monto', 'cantidad', 'tipo_de_acemila', 'idPersona', 'idArriero'
    //     ]);
    //     $this->reset(['buscar', 'encontradoComoPersona', 'encontradoComoArriero', 'no_existe']);
    // }
}
