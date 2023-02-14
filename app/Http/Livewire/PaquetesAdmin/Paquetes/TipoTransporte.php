<?php

namespace App\Http\Livewire\PaquetesAdmin\Paquetes;

use App\Models\TipoPersonales;
use App\Models\TipoTransportes;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TipoTransporte extends Component
{
    public $title = 'CREACIÓN DE TIPOS DE TRANSPORTE';
    public $nombre_de_tipo;
    public $edicion = false, $idTipoTransporte;

    protected $listeners = ['deleteTipoTransporte' => 'deleteTipoTransporte'];

    function resetUI()
    {
        $this->reset(['title', 'nombre_de_tipo', 'edicion', 'idTipoTransporte']);
    }

    public function render()
    {
        $tipos = TipoTransportes::all(['id', 'nombre_tipo']);
        return view('livewire.paquetes-admin.paquetes.tipo-transporte', compact('tipos'));
    }

    public function guardarTipoTransporte()
    {
        $this->validate([
            'nombre_de_tipo' => 'required|min:3'
        ]);
        $tipo = TipoTransportes::create([
            'nombre_tipo' => $this->nombre_de_tipo
        ]);
        $this->resetUI();
        
        $this->dispatchBrowserEvent('swal', [
            'title' => 'MUY BIEN !',
            'icon' => 'success',
            'text' => 'Registrado Correctamente'
        ]);
        //session()->flash('success', 'Registrado Correctamente');
    }

    public function Edit(TipoTransportes $tipo)
    {
        $this->title = 'EDITAR TIPO DE TRANSPORTE';
        $this->idTipoTransporte = $tipo->id;
        $this->nombre_de_tipo = $tipo->nombre_tipo;
        $this->edicion = true;
        $this->emit('show-modal-tipo-personal', 'Edicion de Atractivos');
    }

    public function Update()
    {
        $this->validate([
            'nombre_de_tipo' => 'required|min:3'
        ]);
        $tipo = TipoTransportes::findOrFail($this->idTipoTransporte);
        $tipo->nombre_tipo = $this->nombre_de_tipo;
        $tipo->save();

        session()->flash('success', 'Actualizado Correctamente');

        $this->emit('close-modal-tipo-personal', 'Edicion de Atractivos');
        $this->resetUI();
    }

    public function deleteConfirm($id)
    {

        $this->dispatchBrowserEvent('swal-confirmTipoPersonal', [
            'title' => 'Estás seguro que deseas eliminar el Tipo de Personal?',
            'icon' => 'warning',
            'id' => $id
        ]);
    }

    public function deleteTipoTransporte(TipoTransportes $tipo)
    {
        $tipos =  DB::table('tipotransporte_paquetes')
            ->where('tipotransporte_id', $tipo->id)
            ->get();
        $var = count($tipos);
        //dd($var);
        if ($var > 0) {
            session()->flash('error', 'No se Puede Eliminar porque en un Paquete');
        } else {
            $tipo->delete();
            session()->flash('success', 'Eliminado Correctamente');
        }
    }

    public function cerrarModal()
    {
        $this->emit('close-modal-tipo-personal', 'Edicion de Atractivos');
        $this->resetUI();
    }

    public function updated($name, $value)
    {
        $this->resetValidation($name);
        $this->resetErrorBag($name);
    }
}
