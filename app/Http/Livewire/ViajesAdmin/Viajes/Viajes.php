<?php

namespace App\Http\Livewire\ViajesAdmin\Viajes;

use App\Models\PaquetesTuristicos;
use App\Models\Viajes\ViajePaquetes;
use Livewire\Component;

class Viajes extends Component
{
    public $paquete;
    public $descripcion, $fecha, $hora, $cantidad_participantes, $estado, $paquete_id;
    public function mount(PaquetesTuristicos $paquete)
    {
        $this->paquete = $paquete;
    }

    public function render()
    {
        $viajes = ViajePaquetes::where('paquete_id', '=', $this->paquete->id)
            ->get();
        return view('livewire.viajes-admin.viajes.viajes', compact('viajes'));
    }

    public function saveViaje()
    {
        $this->validate([
            'descripcion' => 'required', 
            'fecha' => 'required', 
            'hora' => 'required', 
            'cantidad_participantes' => 'required', 
        ]);
        
        $viaje = ViajePaquetes::create([
            'descripcion' => $this->descripcion, 
            'fecha' => $this->fecha, 
            'hora' => $this->hora, 
            'cantidad_participantes' => $this->cantidad_participantes, 
            'estado' => 1, 
            'paquete_id' => $this->paquete->id
        ]);
    }
}
