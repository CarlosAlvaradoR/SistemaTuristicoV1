<?php

namespace App\Http\Livewire\ViajesAdmin\TrasladosViaje;

use App\Models\PaquetesTuristicos;
use App\Models\Viajes\TrasladoViajes;
use App\Models\Viajes\Vehiculos;
use App\Models\Viajes\ViajePaquetes;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TrasladosViaje extends Component
{
    public $paquete, $viaje, $idViaje;
    public $descripcion, $fecha, $monto, $vehiculo, $idTrasladoViaje; // PARA EL INSERT DE LOS TRASLADOS DEL VIAJE
    public $total = 0;
    //public $descripcion, $fecha, $monto, $viaje_paquetes_id, $vehiculos_id;
    protected $listeners = ['deleteTraslado'];

    public function resetUI()
    {
        $this->reset(['descripcion', 'fecha', 'monto', 'vehiculo', 'idTrasladoViaje']);
    }

    public function mount(PaquetesTuristicos $paquete, ViajePaquetes $viaje)
    {
        $this->paquete = $paquete;
        $this->viaje = $viaje;
        $this->idViaje = $viaje->id;
    }

    public function render()
    {
        $this->total = DB::table('traslado_viajes as pbv')
            ->select(DB::raw('SUM(pbv.monto) as Monto'))
            ->where('pbv.viaje_paquetes_id', $this->idViaje)
            ->get();
        $vehiculos = Vehiculos::all('id', 'numero_placa');
        $traslados = DB::table('empresa_transportes as et')
            ->join('vehiculos as v', 'et.id', '=', 'v.empresa_transportes_id')
            ->join('traslado_viajes as tv', 'tv.vehiculos_id', '=', 'v.id')
            ->where('tv.viaje_paquetes_id', $this->idViaje)
            ->select(
                'et.nombre_empresa',
                'v.numero_placa',
                'tv.descripcion',
                'tv.fecha',
                'tv.monto',
                'tv.id as idTraslado'
            )
            ->get();
        return view('livewire.viajes-admin.traslados-viaje.traslados-viaje', compact('traslados', 'vehiculos'));
    }

    public function guardatTrasladoDeLosViajes()
    {
        $this->validate(
            [
                'descripcion' => 'required|min:5',
                'fecha' => 'required|date',
                'monto' => 'required|regex:/^\d+(\.\d{1,2})?$/',
                'vehiculo' => 'required|numeric|min:1',
            ]
        );
        if ($this->idTrasladoViaje) {
            $traslados = TrasladoViajes::findOrFail($this->idTrasladoViaje);
            $traslados->descripcion = $this->descripcion;
            $traslados->fecha = $this->fecha;
            $traslados->monto = $this->monto;
            $traslados->viaje_paquetes_id = $this->idViaje;
            $traslados->vehiculos_id = $this->vehiculo;

            $traslados->save();
            $this->alert('MUY BIEN!', 'success', 'Registro Actualizado Correctamente');
            $this->emit('close-modal', '');
        } else {
            $traslados = TrasladoViajes::create([
                'descripcion' => $this->descripcion,
                'fecha' => $this->fecha,
                'monto' => $this->monto,
                'viaje_paquetes_id' => $this->idViaje,
                'vehiculos_id' => $this->vehiculo
            ]);
            $msg = '';
        }

        $this->resetUI();
    }

    public function Edit(TrasladoViajes $traslados)
    {
        $this->idTrasladoViaje = $traslados->id;
        $this->descripcion = $traslados->descripcion;
        $this->fecha = $traslados->fecha;
        $this->monto = $traslados->monto;
        $this->vehiculo = $traslados->vehiculos_id;

        $this->emit('show-modal-edit', 'abrir editar');
    }

    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('swal-confirm-Traslados', [
            'title' => 'Estás seguro que desea eliminar el Traslado del Viaje ?',
            'icon' => 'warning',
            'id' => $id
        ]);
    }
   
    public function deleteTraslado(TrasladoViajes $traslados)
    {
        $traslados->delete();
        $this->alert('MUY BIEN!', 'success','Traslado Eliminado Correctamente');
    }

    public function alert($title, $icon, $text)
    {
        $this->dispatchBrowserEvent('swal', [
            'title' => $title,
            'icon' => $icon,
            'text' => $text
        ]);
    }
}
