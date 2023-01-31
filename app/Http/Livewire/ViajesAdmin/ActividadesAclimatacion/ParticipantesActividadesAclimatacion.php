<?php

namespace App\Http\Livewire\ViajesAdmin\ActividadesAclimatacion;

use App\Models\PaquetesTuristicos;
use App\Models\Viajes\Asistentes;
use App\Models\Viajes\ViajePaquetes;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ParticipantesActividadesAclimatacion extends Component
{
    public $paquete, $idActividadAclimatacion, $idViaje;
    public $descripcion, $fecha, $monto;
    public $total = 0;

    public function mount(PaquetesTuristicos $paquete, $idViaje,$idActividadAclimatacion)
    {
        $this->paquete = $paquete;
        $this->idActividadAclimatacion = $idActividadAclimatacion;
        $this->idViaje = $idViaje;
    }

    
    public function render()
    {
        $participantes = DB::table('v_viaje_clientes_participantes_reservas')
        ->where('viaje_paquetes_id', $this->idViaje)
        ->get();
        
        $participantes_actividad = DB::table('v_viaje_clientes_participantes_actividades_aclimatacion')
        ->where('actividades_aclimataciones_id', $this->idActividadAclimatacion)
        ->get();

        return view('livewire.viajes-admin.actividades-aclimatacion.participantes-actividades-aclimatacion', 
        compact('participantes', 'participantes_actividad'));
    }

    public function Añadir($idParticipante){
        $asistente = Asistentes::create([
            'participantes_id' => $idParticipante, 
            'actividades_aclimataciones_id' => $this->idActividadAclimatacion
        ]);
    }
}
