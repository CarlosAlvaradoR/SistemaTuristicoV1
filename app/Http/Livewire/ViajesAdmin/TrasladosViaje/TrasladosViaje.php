<?php

namespace App\Http\Livewire\ViajesAdmin\TrasladosViaje;

use App\Models\PaquetesTuristicos;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TrasladosViaje extends Component
{
    public $paquete, $idViaje;
    public $descripcion, $fecha, $monto;
    public $total = 0;

    public function mount(PaquetesTuristicos $paquete, $idViaje)
    {
        $this->paquete = $paquete;
        $this->idViaje = $idViaje;
    }
    
    public function render()
    {
        $this->total = DB::table('traslado_viajes as pbv')
            ->select(DB::raw('SUM(pbv.monto) as Monto'))
            ->where('pbv.viaje_paquetes_id', $this->idViaje)
            ->get();
        return view('livewire.viajes-admin.traslados-viaje.traslados-viaje');
    }
}
