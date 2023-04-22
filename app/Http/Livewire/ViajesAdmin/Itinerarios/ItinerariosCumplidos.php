<?php

namespace App\Http\Livewire\ViajesAdmin\Itinerarios;

use App\Models\ItinerarioPaquetes;
use App\Models\PaquetesTuristicos;
use App\Models\Viajes\ItinerariosCumplidos as ViajesItinerariosCumplidos;
use App\Models\Viajes\ViajePaquetes;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ItinerariosCumplidos extends Component
{
    public $paquete, $viaje, $idViaje;
    public $itinerario;
    public $idItinerarioCumplido, $fecha_cumplimiento, $fecha_final;
    public $total = 0;

    public function resetUI()
    {
        $this->reset(['itinerario', 'idItinerarioCumplido', 'fecha_cumplimiento', 'fecha_final']);
    }

    public function mount(PaquetesTuristicos $paquete, ViajePaquetes $viaje)
    {
        $this->paquete = $paquete;
        $this->viaje = $viaje;
        //dd($paquete);
        $this->idViaje = $viaje->id;
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
        

        $itinerarios = ViajePaquetes::mostrarItinerariosCumplidos($this->paquete->id, $this->idViaje);
        //dd($itinerarios);
        return view('livewire.viajes-admin.itinerarios.itinerarios-cumplidos', compact('itinerarios'));
    }

    public function AñadirFechaCumplimiento($idItinerario)
    {
        $this->itinerario = ItinerarioPaquetes::findOrFail($idItinerario);

        //NOTIFICAMOS AL FRONT END
        $this->emit('show-modal', 'show modal');
    }

    public function guardarFechaCumplimiento()
    {
        $this->validate(
            [
                'fecha_cumplimiento' => 'required|date'
            ]
        );
        $title = 'MUY BIEN !';
        $icon = 'success';
        $text = 'Cumplimiento de Itinerario Registrado Correctamente.';
        if ($this->idItinerarioCumplido) {
            $itinerario = ViajesItinerariosCumplidos::findOrFail($this->idItinerarioCumplido);
            $itinerario->fecha_cumplimiento = $this->fecha_cumplimiento;
            $itinerario->save();
            $text = 'Cumplimiento de Itinerario Actualizado Correctamente.';

            
        } else {
            $itinerario = ViajesItinerariosCumplidos::create([
                'estado' => 1,
                'fecha_cumplimiento' => $this->fecha_cumplimiento,
                'itinerario_paquetes_id' => $this->itinerario->id,
                'viaje_paquetes_id' => $this->idViaje
            ]);

        }
        $this->emit('close-modal');
        $this->emit('alert', $title, $icon, $text);
        $this->resetUI();
    }

    //No cump->Elimina y Edición edita
    public function Edit($idItinerario)
    {
        $itinerario_cumplido = ViajesItinerariosCumplidos::where('itinerario_paquetes_id', $idItinerario)
            ->limit(1)
            ->get();
        $this->idItinerarioCumplido = $itinerario_cumplido[0]->id;
        $this->fecha_cumplimiento = $itinerario_cumplido[0]->fecha_cumplimiento;
        $this->emit('show-modal');
    }

    public function delete()
    {
        $title = 'MUY BIEN !';
        $icon = 'success';
        $text = 'Cumplimiento de Itinerario Eliminado Correctamente.';

        $itinerario_cumplido = ViajesItinerariosCumplidos::findOrFail($this->idItinerarioCumplido);
        $itinerario_cumplido->delete();
        $this->resetUI();
        $this->emit('alert', $title, $icon, $text);
        $this->emit('close-modal');
    }
}
