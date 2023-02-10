<?php

namespace App\Http\Livewire\ViajesAdmin\Cocineros;

use App\Models\PaquetesTuristicos;
use App\Models\Personas;
use App\Models\TipoAcemilas;
use App\Models\Viajes\AcemilasAlquiladas;
use App\Models\Viajes\Asociaciones;
use App\Models\Viajes\Cocineros as ViajesCocineros;
use App\Models\Viajes\ViajePaquetesCocineros;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Cocineros extends Component
{

    public $paquete, $idViaje;
    public $idCocinero = 0;
    public $monto, $cantidad, $tipo_de_acemila;
    public $total = 0;
    /** Para buscar Arrieros */
    public $dni, $buscar;
    public $nombres_apellidos, $dni_encontrado, $telefono_arriero, $idPersona;
    public $asociacion;
    public $encontradoComoPersona = false, $encontradoComoCocinero = false, $no_existe = false;
    public $dni_persona, $nombre, $apellidos, $genero, $telefono, $dirección;

    public function mount(PaquetesTuristicos $paquete, $idViaje)
    {
        $this->paquete = $paquete;
        $this->idViaje = $idViaje;
    }


    public function render()
    {
        $cocineros = DB::table('v_viaje_personas_cocineros')
            ->whereNOTIn('idCocinero', function ($query) {
                $query->select('vpc.cocinero_id')->from('viaje_paquetes_cocineros as vpc')
                    ->where('vpc.viaje_paquetes_id', $this->idViaje);
            })
            ->get();
        $cocineros_participantes = DB::table('v_viaje_personas_cocineros_participantes_viaje')
            ->where('viaje_paquetes_id', $this->idViaje)
            ->get();


        $asociaciones = Asociaciones::all(['id', 'nombre']);
        $tipo_acemilas = TipoAcemilas::all(['id', 'nombre']);
        return view('livewire.viajes-admin.cocineros.cocineros',
            compact(
                'cocineros',
                'tipo_acemilas',
                'cocineros_participantes',
                'asociaciones'
            )
        );
    }

    public function AñadirCocinero($idCocinero)
    {
        $this->idCocinero = $idCocinero;
        $this->emit('show-modal', 'show modal');
    }

    public function AñadirAlCocinero()
    {
        $viaje_paquete_cocineros = ViajePaquetesCocineros::create([
            'monto_pagar' => $this->monto, 
            'viaje_paquetes_id' => $this->idViaje, 
            'cocinero_id' => $this->idCocinero
        ]);

        $this->resetUI();
        $this->emit('fecha-itinerario-guarded', 'close');
    }

    public function buscarArriero()
    {
        $this->validate(
            ['dni' => 'required|min:3']
        );
        $this->resetUI();
        $sql = "SELECT p.id, p.dni, concat(p.nombre,' ',p.apellidos) as datos, p.telefono, a.id as idCocinero FROM personas p
        LEFT JOIN cocineros a on a.persona_id = p.id
        WHERE p.dni = '".$this->dni."' LIMIT 1";

        //dd($this->dni);
        $this->buscar = DB::select($sql);

        if ($this->buscar) {
            $this->idPersona = $this->buscar[0]->id;
            $this->nombres_apellidos = $this->buscar[0]->datos;
            $this->telefono_arriero = $this->buscar[0]->telefono;
            $this->encontradoComoPersona = true;

            //$this->encontrado = true;
            if ($this->buscar[0]->idCocinero) {
                $this->idCocinero = $this->buscar[0]->idCocinero;
                $this->encontradoComoCocinero = true;
            }
            $this->reset(['dni']);
        } else {
            session()->flash('message-error', 'No se encontró informacion correspondiente al DNI: ' . $this->dni);
            $this->no_existe = true;
            $this->dni_persona= $this->dni;
            $this->resetValidation();
            $this->reset(['dni']);
        }
    }

    public function updated($name, $value)
    {
        $this->resetValidation($name);
        $this->resetErrorBag($name);
    }

    public function guardarCocineroViaje()
    { //Cuado lo encuentre como Arriero
        // id del Arriero
        $viaje_paquete_cocineros = ViajePaquetesCocineros::create([
            'monto_pagar' => $this->monto, 
            'viaje_paquetes_id' => $this->idViaje, 
            'cocinero_id' => $this->idCocinero
        ]);

        $this->resetUI();
    }

    public function guardarCocineroYAñadirAlViaje()
    { //Cuando lo encontré como Persona, pero no como cocinero

        $cocinero = ViajesCocineros::create([
            'persona_id' => $this->idPersona
        ]);

        $viaje_paquete_cocineros = ViajePaquetesCocineros::create([
            'monto_pagar' => $this->monto, 
            'viaje_paquetes_id' => $this->idViaje, 
            'cocinero_id' => $cocinero->id
        ]);

        $this->resetUI();
    }

    public function nuevoCocinero()
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

        $cocinero = ViajesCocineros::create([
            'persona_id' => $personas->id
        ]);

        $viaje_paquete_cocineros = ViajePaquetesCocineros::create([
            'monto_pagar' => $this->monto, 
            'viaje_paquetes_id' => $this->idViaje, 
            'cocinero_id' => $cocinero->id
        ]);

        $this->resetUI();
    }


    function resetUI(){
        $this->reset([
            'dni_persona', 'nombre', 'apellidos', 'genero', 'telefono', 'telefono', 'dirección',
            'asociacion', 'monto', 'cantidad', 'tipo_de_acemila','idPersona','idCocinero'
        ]);
        $this->reset(['buscar','encontradoComoPersona', 'encontradoComoCocinero', 'no_existe']);
    }
}
