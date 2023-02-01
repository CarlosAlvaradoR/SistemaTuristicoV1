<?php

namespace App\Http\Livewire\ViajesAdmin\Hospedajes;

use App\Models\PaquetesTuristicos;
use App\Models\Viajes\Hospedajes;
use App\Models\Viajes\Hoteles;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class HospedajeViajes extends Component
{
    public $paquete, $idViaje;
    public $fecha_inicial, $fecha_final, $monto, $hotel;
    public $total = 0;

    public function mount(PaquetesTuristicos $paquete, $idViaje)
    {
        $this->paquete = $paquete;
        $this->idViaje = $idViaje;
    }


    public function render()
    {
        $hospedajes_ocupados = DB::table('hospedajes as hos')
            ->join('hoteles as h', 'h.id', '=', 'hos.hoteles_id')
            ->select(
                'hos.id',
                'hos.fecha_inicial',
                'hos.fecha_final',
                'hos.monto',
                'h.nombre'
            )
            ->where('hos.viaje_paquetes_id', $this->idViaje)
            ->get();

        $hoteles = Hoteles::all(['id', 'nombre']);

        $this->total = DB::table('hospedajes as hos')
            ->select(DB::raw('SUM(hos.monto) as Monto'))
            ->where('hos.viaje_paquetes_id', $this->idViaje)
            ->get();

        return view('livewire.viajes-admin.hospedajes.hospedaje-viajes',
            compact(
                'hoteles',
                'hospedajes_ocupados'
            )
        );
    }

    public function asignarHospedajes()
    {
        $hospedaje = Hospedajes::create([
            'fecha_inicial' => $this->fecha_inicial,
            'fecha_final' => $this->fecha_final,
            'monto' => $this->monto,
            'viaje_paquetes_id' => $this->idViaje,
            'hoteles_id' => $this->hotel
        ]);
    }
}
