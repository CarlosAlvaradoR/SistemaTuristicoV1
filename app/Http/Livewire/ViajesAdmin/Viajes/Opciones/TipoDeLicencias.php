<?php

namespace App\Http\Livewire\ViajesAdmin\Viajes\Opciones;

use App\Models\Viajes\Choferes;
use App\Models\Viajes\TipoLicencias;
use Livewire\Component;

class TipoDeLicencias extends Component
{
    public $idTipoLicencias, $nombre_tipo;

    protected $listeners = ['deleteTipoLicencia'];

    public function resetUI(){
        $this->reset(['idTipoLicencias', 'nombre_tipo']);
    }

    public function render()
    {
        $tipoLicencias = TipoLicencias::all();
        return view('livewire.viajes-admin.viajes.opciones.tipo-de-licencias', compact('tipoLicencias'));
    }

    public function saveTipoDeLicencias(){
        $this->validate([
            'nombre_tipo' => 'required|string|min:3'
        ]);
        $title = 'MUY BIEN!';
        $icon = 'success';
        $text = 'Tipo de Licencia Insertada Correctamente';
        if ($this->idTipoLicencias) {
            $tipo = TipoLicencias::findOrFail($this->idTipoLicencias);
            $tipo->nombre_tipo = $this->nombre_tipo;
            $tipo->save();
            $text = 'Tipo de Licencia Actualizada Correctamente';
            $this->emit('close-modal');
        } else {
            $tipo = TipoLicencias::create(
                [
                    'nombre_tipo' => $this->nombre_tipo
                ]
            );
        }
        $this->resetUI();
        $this->emit('alert', $title, $icon, $text);
    }

    
    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('swal-confirm-licencias', [
            'title' => 'Está seguro que desea eliminar el tipo de Licencia ?',
            'icon' => 'warning',
            'id' => $id
        ]);
    }

    public function deleteTipoLicencia(TipoLicencias $tipo)
    {
        //dd('HOLLA');
        $title = 'MUY BIEN!';
        $icon = 'success';
        $text = 'Tipo de Licencia Eliminado Correctamente.';
        $choferes = Choferes::where('tipo_licencias_id', $tipo->id)->get();
        if (count($choferes) > 0) {
            $title = 'ERROR !';
            $icon = 'error';
            $text = 'No se puede Eliminar el Tipo de Licencia, ya se registró la misma con uno o varios conductores';
            $this->emit('alert', $title, $icon, $text);
            return;
        } else {
            $tipo->delete();
            $this->emit('alert', $title, $icon, $text);
        }
        
    }

    public function Edit(TipoLicencias $tipo){
        $this->idTipoLicencias = $tipo->id;
        $this->nombre_tipo = $tipo->nombre_tipo;

        $this->emit('show-modal', 'abrir editar');
    }
}
