<?php

namespace App\Http\Livewire\ViajesAdmin\ActividadesAclimatacion;

use App\Models\PaquetesTuristicos;
use App\Models\Viajes\ActividadesAclimataciones;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ActividadesAclimatacion extends Component
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
        $actividades = DB::table('actividades_aclimataciones as ac')
            ->select('id', 'descripcion', 'fecha', 'monto', 'viaje_paquetes_id')
            ->where('ac.viaje_paquetes_id', $this->idViaje)
            ->get();

        $this->total = DB::table('actividades_aclimataciones as ac')
            ->select(DB::raw('SUM(ac.monto) as Monto'))
            ->where('ac.viaje_paquetes_id', $this->idViaje)
            ->get();
            
        return view(
            'livewire.viajes-admin.actividades-aclimatacion.actividades-aclimatacion',
            compact('actividades')
        );
    }

    public function guardarActividadesAclimatacion()
    {
        $actividades = ActividadesAclimataciones::create([
            'descripcion' => $this->descripcion,
            'fecha' => $this->fecha,
            'monto' => $this->monto,
            'viaje_paquetes_id' => $this->idViaje
        ]);
    }
}
