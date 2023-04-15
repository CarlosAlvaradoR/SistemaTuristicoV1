<?php

namespace App\Http\Livewire\ViajesAdmin\ActividadesAclimatacion;

use App\Models\PaquetesTuristicos;
use App\Models\Viajes\ActividadesAclimataciones;
use App\Models\Viajes\ViajePaquetes;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ActividadesAclimatacion extends Component
{
    public $paquete, $idViaje;
    public $idActividadAcimatacion, $descripcion, $fecha, $monto;
    public $total = 0;

    public function mount(PaquetesTuristicos $paquete, ViajePaquetes $viaje)
    {
        $this->paquete = $paquete;
        $this->idViaje = $viaje->id;
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

        return view('livewire.viajes-admin.actividades-aclimatacion.actividades-aclimatacion',
            compact('actividades')
        );
    }

    public function guardarActividadesAclimatacion()
    {
        $this->validate([
            'descripcion' => 'required|string|min:5',
            'fecha' => 'required|date',
            'monto' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        ]);
        if ($this->idActividadAcimatacion) {
            $actividades = ActividadesAclimataciones::findOrFail($this->idActividadAcimatacion);
            $actividades->descripcion = $this->descripcion;
            $actividades->fecha = $this->fecha;
            $actividades->monto = $this->monto;
            $actividades->save();
            $this->emit('close-modal','');
        } else {
            $actividades = ActividadesAclimataciones::create([
                'descripcion' => $this->descripcion,
                'fecha' => $this->fecha,
                'monto' => $this->monto,
                'viaje_paquetes_id' => $this->idViaje
            ]);
        }
    }

    public function Edit(ActividadesAclimataciones $actividades)
    {
        $this->idActividadAcimatacion = $actividades->id;
        $this->descripcion = $actividades->descripcion;
        $this->fecha = $actividades->fecha;
        $this->monto = $actividades->monto;
        $this->emit('show-modal', 'abrir editar');
    }
}
