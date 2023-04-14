<?php

namespace App\Http\Livewire\ViajesAdmin\PagoBoletasViaje;

use App\Models\PaquetesTuristicos;
use App\Models\Viajes\PagoBoletosViajes;
use App\Models\Viajes\ViajePaquetes;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PagoBoletasViaje extends Component
{
    public $paquete, $viaje, $idViaje;
    public $idPagoBoletosViajes, $descripcion, $fecha, $monto;
    public $total = 0;


    public function resetUI(){
        $this->reset(['idPagoBoletosViajes', 'descripcion', 'fecha', 'monto']);
    }


    public function mount(PaquetesTuristicos $paquete, ViajePaquetes $viaje)
    {
        $this->paquete = $paquete;
        $this->viaje = $viaje;
        $this->idViaje = $viaje->id;
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
        $this->validate(
            [
                'descripcion' => 'required|string|min:5',
                'fecha' => 'required|date',
                'monto' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            ]
        );
        if ($this->idPagoBoletosViajes) {
            $pago = PagoBoletosViajes::findOrFail($this->idPagoBoletosViajes);
            $pago->descripcion = $this->descripcion;
            $pago->fecha = $this->fecha;
            $pago->monto = $this->monto;
            $pago->save();
            $this->emit('close-modal');
        } else {
            $pago = PagoBoletosViajes::create([
                'descripcion' => $this->descripcion,
                'fecha' => $this->fecha,
                'monto' => $this->monto,
                'viaje_paquetes_id' => $this->idViaje
            ]);
        }

        $this->resetUI();
    }

    public function Edit(PagoBoletosViajes $pago)
    {
        $this->idPagoBoletosViajes = $pago->id;
        $this->descripcion = $pago->descripcion;
        $this->fecha = $pago->fecha;
        $this->monto = $pago->monto;

        $this->emit('show-modal', 'abrir editar');
    }
}
