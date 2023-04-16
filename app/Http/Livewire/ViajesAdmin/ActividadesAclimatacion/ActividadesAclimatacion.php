<?php

namespace App\Http\Livewire\ViajesAdmin\ActividadesAclimatacion;

use App\Models\PaquetesTuristicos;
use App\Models\Viajes\ActividadesAclimataciones;
use App\Models\Viajes\Asistentes;
use App\Models\Viajes\ViajePaquetes;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ActividadesAclimatacion extends Component
{
    public $paquete, $idViaje;
    public $idActividadAcimatacion, $descripcion, $fecha, $monto;
    public $total = 0;

    protected $listeners = ['deleteActividadAclimatacion'];

    public function mount(PaquetesTuristicos $paquete, ViajePaquetes $viaje)
    {
        $this->paquete = $paquete;
        $this->idViaje = $viaje->id;
    }

    public function resetUI()
    {
        $this->reset(['idActividadAcimatacion', 'descripcion', 'fecha', 'monto']);
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
        $this->validate([
            'descripcion' => 'required|string|min:5',
            'fecha' => 'required|date',
            'monto' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        ]);
        $title = 'MUY BIEN !';
        $icon = 'success';
        if ($this->idActividadAcimatacion) {
            $actividades = ActividadesAclimataciones::findOrFail($this->idActividadAcimatacion);
            $actividades->descripcion = $this->descripcion;
            $actividades->fecha = $this->fecha;
            $actividades->monto = $this->monto;
            $actividades->save();
            $this->emit('close-modal', '');
            $text = 'Información de la Actividad Actualizada Satisfactoriamente';
        } else {
            $actividades = ActividadesAclimataciones::create([
                'descripcion' => $this->descripcion,
                'fecha' => $this->fecha,
                'monto' => $this->monto,
                'viaje_paquetes_id' => $this->idViaje
            ]);
            $text = 'Actividad Registrada Satisfactoriamente';
        }
        $this->resetUI();
        $this->emit('alert', $title, $icon, $text);
    }

    public function Edit(ActividadesAclimataciones $actividades)
    {
        $this->idActividadAcimatacion = $actividades->id;
        $this->descripcion = $actividades->descripcion;
        $this->fecha = $actividades->fecha;
        $this->monto = $actividades->monto;
        $this->emit('show-modal', 'abrir editar');
    }

    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('swal-confirm-actividades-aclimatacion', [
            'title' => 'Está seguro que desea eliminar la Actividad de Aclimatación ?',
            'icon' => 'warning',
            'id' => $id
        ]);
    }

    public function deleteActividadAclimatacion(ActividadesAclimataciones $actividades)
    {
        $title = 'MUY BIEN!';
        $icon = 'success';

        $asistentes = Asistentes::where('actividades_aclimataciones_id', $actividades->id)->get();
        if (count($asistentes) > 0) {
            $title = 'ERROR !';
            $icon = 'error';
            $text = 'No se puede eliminar la Actividad de Aclimatación, puesto que ya contiene participantes.';
            $this->emit('alert', $title, $icon, $text);
            return;
        } else {
            $actividades->delete();
            $this->emit('alert', $title, $icon, 'Actividad de Aclimatación Eliminada Correctamente');
        }
    }
}
