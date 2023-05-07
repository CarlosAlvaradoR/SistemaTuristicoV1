<?php

namespace App\Http\Livewire\ViajesAdmin\Viajes\Opciones;

use App\Models\Viajes\TipoVehiculos;
use App\Models\Viajes\Vehiculos;
use Livewire\Component;

class TipoDeVehiculo extends Component
{
    public $idTipoVehiculo, $nombre_tipo, $title = 'CREAR TIPO DE VEHÍCULOS';

    protected $listeners = ['deleteTipoVehiculo'];

    public function resetUI(){
        $this->reset(['idTipoVehiculo', 'nombre_tipo', 'title']);
    }
    public function render()
    {

        $tipoVehiculos = TipoVehiculos::all();
        return view('livewire.viajes-admin.viajes.opciones.tipo-de-vehiculo', compact('tipoVehiculos'));
    }

    public function saveTipoDeVehiculo()
    {
        $this->validate([
            'nombre_tipo' => 'required|string|min:3'
        ]);
        $title = 'MUY BIEN';
        $icon = 'success';
        $text = 'Tipo de Vehículo Registrado Correctamente';
        if ($this->idTipoVehiculo) {
            $tipo = TipoVehiculos::findOrFail($this->idTipoVehiculo);
            $tipo->nombre_tipo = $this->nombre_tipo;
            $tipo->save();
            $text = 'Tipo de Vehículo Actualizado Correctamente';
            $this->emit('close-modal');
        } else {
            $tipo = TipoVehiculos::create(
                [
                    'nombre_tipo' => $this->nombre_tipo
                ]
            );
        }
        $this->resetUI();
        $this->emit('alert', $title, $icon, $text);
    }

    public function Edit(TipoVehiculos $tipo)
    {
        //dd($tipo);
        $this->title = 'EDITAR TIPO DE VEHÍCULO';
        $this->idTipoVehiculo = $tipo->id;
        $this->nombre_tipo = $tipo->nombre_tipo;

        $this->emit('show-modal', 'abrir editar');
    }

    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('swal-confirm-tipoVehiculo', [
            'title' => 'Está seguro que desea eliminar el tipo de Vehículo ?',
            'icon' => 'warning',
            'id' => $id
        ]);
    }
   
    public function deleteTipoVehiculo(TipoVehiculos $tipo)
    {
        //dd('HOLLA');
        $title = 'MUY BIEN!';
        $icon = 'success';
        $text = 'Tipo de Licencia Vehículo Correctamente.';
        $vehiculos = Vehiculos::where('tipo_vehiculos_id', $tipo->id)->get();
        if (count($vehiculos) > 0) {
            $title = 'ERROR !';
            $icon = 'error';
            $text = 'No se puede Eliminar el Tipo de Vehículo, ya se registró la misma en uno o varios módulos';
            $this->emit('alert', $title, $icon, $text);
            return;
        } else {
            $tipo->delete();
            $this->emit('alert', $title, $icon, $text);
        }
        
    }

}
