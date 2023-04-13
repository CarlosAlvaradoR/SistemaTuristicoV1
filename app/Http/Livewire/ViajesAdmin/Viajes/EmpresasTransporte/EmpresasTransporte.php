<?php

namespace App\Http\Livewire\ViajesAdmin\Viajes\EmpresasTransporte;

use App\Models\Viajes\EmpresaTransportes;
use Livewire\Component;

class EmpresasTransporte extends Component
{
    public $nombre_empresa, $idSeleccionado;

    public function resetUI()
    {
        $this->reset(['nombre_empresa','idSeleccionado']);
    }

    public function render()
    {
        $empresas = EmpresaTransportes::all(['id', 'nombre_empresa', 'slug']);
        return view('livewire.viajes-admin.viajes.empresas-transporte.empresas-transporte', compact('empresas'));
    }

    public function crearEmpresasTransporte()
    {
        $this->validate(
            [
                'nombre_empresa' => 'required|string|min:3'
            ]
        );
        if ($this->idSeleccionado) {
            $empresa = EmpresaTransportes::findOrFail($this->idSeleccionado);
            $empresa->update([
                'nombre_empresa' => $this->nombre_empresa
            ]);

            $this->emit('empresa-updated', 'abrir editar');
            
        } else {
            $empresa = EmpresaTransportes::create([
                'nombre_empresa' => $this->nombre_empresa
            ]);
        }

        $this->resetUI();
    }

    public function Edit($idEmpresa)
    {
        $empresa = EmpresaTransportes::findOrFail($idEmpresa, ['id', 'nombre_empresa']);
        $this->nombre_empresa = $empresa->nombre_empresa;
        $this->idSeleccionado = $empresa->id;

        $this->emit('show-modal-edit', 'abrir editar');
    }

    
}
