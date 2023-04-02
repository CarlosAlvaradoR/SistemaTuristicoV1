<?php

namespace App\Http\Livewire\ViajesAdmin\Viajes\Opciones;

use App\Models\Viajes\TipoVehiculos;
use Livewire\Component;

class TipoDeVehiculo extends Component
{
    public $idTipoVehiculo, $nombre_tipo;

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
        if ($this->idTipoVehiculo) {
            $tipo = TipoVehiculos::findOrFail($this->idTipoVehiculo);
            $tipo->nombre_tipo = $this->nombre_tipo;
            $tipo->save();
        } else {
            $tipo = TipoVehiculos::create(
                [
                    'nombre_tipo' => $this->nombre_tipo
                ]
            );
        }
    }

    public function Edit(TipoVehiculos $tipo)
    {
        //dd($tipo);
        $this->idTipoVehiculo = $tipo->id;
        $this->nombre_tipo = $tipo->nombre_tipo;

        $this->emit('show-modal', 'abrir editar');
    }
}
