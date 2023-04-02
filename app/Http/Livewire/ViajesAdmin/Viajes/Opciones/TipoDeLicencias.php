<?php

namespace App\Http\Livewire\ViajesAdmin\Viajes\Opciones;

use App\Models\Viajes\TipoLicencias;
use Livewire\Component;

class TipoDeLicencias extends Component
{
    public $idTipoLicencias, $nombre_tipo;

    public function render()
    {
        $tipoLicencias = TipoLicencias::all();
        return view('livewire.viajes-admin.viajes.opciones.tipo-de-licencias', compact('tipoLicencias'));
    }

    public function saveTipoDeLicencias(){
        $this->validate([
            'nombre_tipo' => 'required|string|min:3'
        ]);
        if ($this->idTipoLicencias) {
            $tipo = TipoLicencias::findOrFail($this->idTipoLicencias);
            $tipo->nombre_tipo = $this->nombre_tipo;
            $tipo->save();
        } else {
            $tipo = TipoLicencias::create(
                [
                    'nombre_tipo' => $this->nombre_tipo
                ]
            );
        }


    }

    public function Edit(TipoLicencias $tipo){
        $this->idTipoLicencias = $tipo->id;
        $this->nombre_tipo = $tipo->nombre_tipo;

        $this->emit('show-modal', 'abrir editar');
    }
}
