<?php

namespace App\Http\Livewire\ViajesAdmin\Itinerarios;

use App\Models\ItinerarioPaquetes;
use App\Models\PaquetesTuristicos;
use App\Models\Viajes\ItinerariosCumplidos as ViajesItinerariosCumplidos;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ItinerariosCumplidos extends Component
{
    public $paquete, $idViaje;
    public $itinerario;
    public $fecha_cumplimiento, $fecha_final, $monto, $hotel;
    public $total = 0;

    public function mount(PaquetesTuristicos $paquete, $idViaje)
    {
        $this->paquete = $paquete;
        $this->idViaje = $idViaje;
    }


    public function render()
    {
        $itinerarios = DB::table('actividades_itinerarios as ai')
            ->join('itinerario_paquetes as ip', 'ai.id', '=', 'ip.actividad_id')
            ->leftJoin('itinerarios_cumplidos as ic', 'ic.itinerario_paquetes_id', '=', 'ip.id')
            ->select(
                'ai.nombre_actividad',
                'ip.id',
                'ip.descripcion', 
                'ip.actividad_id', 
                'ic.fecha_cumplimiento'
            )
            ->where('ai.paquete_id', $this->paquete->id)
            ->get();
        return view('livewire.viajes-admin.itinerarios.itinerarios-cumplidos', compact('itinerarios'));
    }

    public function AñadirFechaCumplimiento($idItinerario){
        $this->itinerario = ItinerarioPaquetes::findOrFail($idItinerario);
        
        //NOTIFICAMOS AL FRONT END
        $this->emit('show-modal', 'show modal');

    }

    public function guardarFechaCumplimiento(){
        $itinerario = ViajesItinerariosCumplidos::create([
            'estado' => 1, 
            'fecha_cumplimiento' => $this->fecha_cumplimiento, 
            'itinerario_paquetes_id' => $this->itinerario->id, 
            'viaje_paquetes_id' => $this->idViaje
        ]);

        $this->emit('fecha-itinerario-guarded', 'Fecha Guardada');
    }
}
