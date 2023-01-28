<?php

namespace App\Http\Livewire\ViajesAdmin\Participantes;

use App\Models\PaquetesTuristicos;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Participantes extends Component
{
    public $paquete, $idViaje;

    
    public function mount(PaquetesTuristicos $paquete, $idViaje){
        $this->paquete = $paquete;
        $this->idViaje = $idViaje;
    }
    public function render()
    {
        $clientes_reservados = DB::select("SELECT p.dni, concat(p.nombre, ' ',p.apellidos) as datos,
        r.id as idReserva, r.fecha_reserva 
        FROM personas p
        INNER JOIN clientes c on p.id=c.persona_id
        INNER JOIN reservas r on r.cliente_id=c.id
        WHERE r.paquete_id = ".$this->paquete->id."");
        return view('livewire.viajes-admin.participantes.participantes', compact('clientes_reservados'));
    }
}
