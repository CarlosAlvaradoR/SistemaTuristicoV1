<?php

namespace App\Http\Livewire\ViajesAdmin\Arrieros;

use App\Models\PaquetesTuristicos;
use App\Models\TipoAcemilas;
use App\Models\Viajes\AcemilasAlquiladas;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Arrieros extends Component
{
    public $paquete, $idViaje;
    public $idArriero = 0;
    public $monto, $cantidad, $tipo_de_acemila;
    public $total = 0;
    /** Para buscar Arrieros */
    public $dni,$buscar;
    public $nombres_apellidos, $dni_encontrado, $telefono_arriero;
    public $encontradoComoPersona = false, $encontradoComoArriero = false;

    public function mount(PaquetesTuristicos $paquete, $idViaje)
    {
        $this->paquete = $paquete;
        $this->idViaje = $idViaje;
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
        $tipo_acemilas = TipoAcemilas::all(['id', 'nombre']);
        return view('livewire.viajes-admin.arrieros.arrieros',
            compact(
                'arrieros',
                'tipo_acemilas',
                'arrieros_participantes'
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
        $acemilasAlquiladas = AcemilasAlquiladas::create([
            'monto' => $this->monto,
            'cantidad' => $this->cantidad,
            'viaje_paquetes_id' => $this->idViaje,
            'arrieros_id' => $this->idArriero,
            'tipo_acemilas_id' => $this->tipo_de_acemila
        ]);
    }

    public function buscarArriero(){
        $this->validate(
            ['dni' => 'required|min:3']
        );
        $sql = "SELECT p.dni, concat(p.nombre,' ',p.apellidos) as datos, p.telefono, a.id as idArriero FROM personas p
        LEFT JOIN arrieros a on a.persona_id = p.id
        WHERE p.dni = '".$this->dni."' LIMIT 1";

        //dd($this->dni);
        $this->buscar = DB::select($sql);

        if ($this->buscar) {
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
            session()->flash('message-error', 'No se encontró informacion correspondiente al DNI: '.$this->dni);
            $this->resetValidation();
            $this->reset(['dni']);
            //dd('No encontrado');
        }
    }

    public function updated($name, $value)
    {
        $this->resetValidation($name);
        $this->resetErrorBag($name);
    }

    public function guardarArrieroYAñadirAcemilasAlquiladas(){

    }
}
