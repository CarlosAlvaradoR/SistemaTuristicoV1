<?php

namespace App\Http\Livewire\ViajesAdmin\AlmuerzosCelebracion;

use App\Models\PaquetesTuristicos;
use App\Models\Viajes\AlmuerzoCelebraciones;
use App\Models\Viajes\Asociaciones;
use App\Models\Viajes\ViajePaquetes;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Almuerzos extends Component
{
    public $paquete, $viaje, $idViaje;
    public $idAlmuerzoCelebracion, $descripcion, $cantidad, $monto, $asociacion, $viaje_paquetes_id;
    public $total = 0;

    public function resetUI()
    {
        $this->reset(['idAlmuerzoCelebracion', 'descripcion', 'cantidad', 'monto', 'asociacion']);
    }

    public function mount(PaquetesTuristicos $paquete, ViajePaquetes $viaje)
    {
        $this->paquete = $paquete;
        $this->viaje = $viaje;
        $this->idViaje = $viaje->id;
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
            ->select(DB::raw('SUM(ac.monto) as Monto'))
            ->where('ac.viaje_paquetes_id', $this->idViaje)
            ->get();

        return view('livewire.viajes-admin.almuerzos-celebracion.almuerzos',
            compact(
                'asociaciones',
                'almuerzos'
            )
        );
    }

    public function guardarAlmuerzoCelebración()
    {
        $this->validate(
            [
                'descripcion' => 'required|string|min:5',
                'cantidad' => 'required|numeric|min:1',
                'monto' => 'required|regex:/^\d+(\.\d{1,2})?$/',
                'asociacion' => 'required|numeric|min:1',
            ]
        );

        if ($this->idAlmuerzoCelebracion) {
            $almuerzoCelebracion = AlmuerzoCelebraciones::findOrFail($this->idAlmuerzoCelebracion);
            $almuerzoCelebracion->descripcion = $this->descripcion;
            $almuerzoCelebracion->cantidad = $this->cantidad;
            $almuerzoCelebracion->monto = $this->monto;
            $almuerzoCelebracion->asociaciones_id = $this->asociacion;
            $almuerzoCelebracion->save();
            $this->emit('close-modal', '');
        } else {
            $almuerzoCelebracion = AlmuerzoCelebraciones::create([
                'descripcion' => $this->descripcion,
                'cantidad' => $this->cantidad,
                'monto' => $this->monto,
                'asociaciones_id' => $this->asociacion,
                'viaje_paquetes_id' => $this->idViaje
            ]);
        }
        $this->resetUI();
    }

    public function Edit(AlmuerzoCelebraciones $almuerzo)
    {
        //dd($almuerzo);
        $this->idAlmuerzoCelebracion = $almuerzo->id;
        $this->descripcion = $almuerzo->descripcion;
        $this->cantidad = $almuerzo->cantidad;
        $this->monto = $almuerzo->monto;
        $this->asociacion = $almuerzo->asociaciones_id;
        $this->emit('show-modal', 'abrir editar');
    }

    public function Eliminar(){
        
    }
}
