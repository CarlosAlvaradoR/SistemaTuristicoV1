<?php

namespace App\Http\Livewire\ViajesAdmin\AlmuerzosCelebracion;

use App\Models\PaquetesTuristicos;
use App\Models\Viajes\AlmuerzoCelebraciones;
use App\Models\Viajes\Asociaciones;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Almuerzos extends Component
{
    public $paquete, $idViaje;
    public $descripcion, $cantidad, $monto, $asociacion, $viaje_paquetes_id;
    public $total = 0;

    public function mount(PaquetesTuristicos $paquete, $idViaje)
    {
        $this->paquete = $paquete;
        $this->idViaje = $idViaje;
    }

    public function render()
    {
        $asociaciones = Asociaciones::all(['id', 'nombre', 'estado']);
        
        $almuerzos = DB::table('almuerzo_celebraciones as ac')
            ->join('asociaciones as aso', 'ac.asociaciones_id', '=', 'aso.id')
            ->select('ac.id', 'ac.descripcion', 'ac.cantidad', 'ac.monto', 'aso.nombre')
            ->where('ac.viaje_paquetes_id', $this->idViaje)
            ->get();
        $this->total = DB::table('almuerzo_celebraciones as ac')
        ->select( DB::raw('SUM(ac.monto) as Monto'))
        ->where('ac.viaje_paquetes_id', $this->idViaje)
        ->get();

        return view(
            'livewire.viajes-admin.almuerzos-celebracion.almuerzos',
            compact(
                'asociaciones',
                'almuerzos'
            )
        );
    }

    public function guardarAlmuerzoCelebración()
    {
        $almuerzoCelebracion = AlmuerzoCelebraciones::create([
            'descripcion' => $this->descripcion,
            'cantidad' => $this->cantidad,
            'monto' => $this->monto,
            'asociaciones_id' => $this->asociacion,
            'viaje_paquetes_id' => $this->idViaje
        ]);

        //dd('Insertado correctamente');
    }
}
