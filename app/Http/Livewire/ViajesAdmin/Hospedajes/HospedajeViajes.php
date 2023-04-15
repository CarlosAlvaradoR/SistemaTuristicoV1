<?php

namespace App\Http\Livewire\ViajesAdmin\Hospedajes;

use App\Http\Livewire\ViajesAdmin\Viajes\Viajes;
use App\Models\PaquetesTuristicos;
use App\Models\Viajes\Hospedajes;
use App\Models\Viajes\Hoteles;
use App\Models\Viajes\ViajePaquetes;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class HospedajeViajes extends Component
{
    public $paquete, $idViaje;
    public $idHospedaje, $fecha_inicial, $fecha_final, $monto, $hotel;
    public $total = 0;

    public function mount(PaquetesTuristicos $paquete, ViajePaquetes $viaje)
    {
        $this->paquete = $paquete;
        $this->idViaje = $viaje->id;
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

        return view(
            'livewire.viajes-admin.hospedajes.hospedaje-viajes',
            compact(
                'hoteles',
                'hospedajes_ocupados'
            )
        );
    }

    public function asignarHospedajes()
    {
        $this->validate(
            [
                'fecha_inicial' => 'required|date',
                'fecha_final' => 'required|date',
                'monto' => 'required|regex:/^\d+(\.\d{1,2})?$/',
                'hotel' => 'required|numeric|min:1',
            ]
        );
        if ($this->idHospedaje) {
            $hospedaje = Hospedajes::findOrFail($this->idHospedaje);
            $hospedaje->fecha_inicial = $this->fecha_inicial;
            $hospedaje->fecha_final = $this->fecha_final;
            $hospedaje->monto = $this->monto;
            $hospedaje->hoteles_id = $this->hotel;
            $hospedaje->save();
        } else {
            $hospedaje = Hospedajes::create([
                'fecha_inicial' => $this->fecha_inicial,
                'fecha_final' => $this->fecha_final,
                'monto' => $this->monto,
                'viaje_paquetes_id' => $this->idViaje,
                'hoteles_id' => $this->hotel
            ]);
        }
    }

    public function Edit(Hospedajes $hospedaje)
    {
        $this->idHospedaje = $hospedaje->id;
        $this->fecha_inicial = $hospedaje->fecha_inicial;
        $this->fecha_final = $hospedaje->fecha_final;
        $this->monto = $hospedaje->monto;
        $this->hotel = $hospedaje->hoteles_id;

        $this->emit('show-modal');
    }
}
