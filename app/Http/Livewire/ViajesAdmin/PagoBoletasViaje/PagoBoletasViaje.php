<?php

namespace App\Http\Livewire\ViajesAdmin\PagoBoletasViaje;

use App\Models\PaquetesTuristicos;
use App\Models\Viajes\PagoBoletosViajes;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PagoBoletasViaje extends Component
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
        $pagos = DB::table('pago_boletos_viajes as pbv')
            ->select('id', 'descripcion', 'fecha', 'monto', 'viaje_paquetes_id')
            ->where('pbv.viaje_paquetes_id', $this->idViaje)
            ->get();
        $this->total = DB::table('pago_boletos_viajes as pbv')
            ->select(DB::raw('SUM(pbv.monto) as Monto'))
            ->where('pbv.viaje_paquetes_id', $this->idViaje)
            ->get();
        return view(
            'livewire.viajes-admin.pago-boletas-viaje.pago-boletas-viaje',
            compact('pagos')
        );
    }

    public function guardarPagoBoletasViaje()
    {
        $pago = PagoBoletosViajes::create([
            'descripcion' => $this->descripcion,
            'fecha' => $this->fecha,
            'monto' => $this->monto,
            'viaje_paquetes_id' => $this->idViaje
        ]);
    }
}
