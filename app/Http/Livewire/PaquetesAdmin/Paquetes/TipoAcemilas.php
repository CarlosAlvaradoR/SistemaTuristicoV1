<?php

namespace App\Http\Livewire\PaquetesAdmin\Paquetes;

use App\Models\TipoAcemilas as ModelsTipoAcemilas;
use App\Models\TipoAlimentaciones;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TipoAcemilas extends Component
{
    public $title = 'CREACIÓN DE TIPOS DE ACÉMILAS';
    public $nombre_de_tipo;
    public $edicion = false, $idTipoAcemila;

    protected $listeners = ['deleteTipoAcemila' => 'deleteTipoAcemila'];

    function resetUI()
    {
        $this->reset(['title', 'nombre_de_tipo', 'edicion', 'idTipoAcemila']);
    }

    
    public function render()
    {
        $tipos = ModelsTipoAcemilas::all(['id', 'nombre']);
        return view('livewire.paquetes-admin.paquetes.tipo-acemilas', compact('tipos'));
    }

    public function guardarTipoAcemilas()
    {
        $this->validate([
            'nombre_de_tipo' => 'required|min:3'
        ]);
        $tipo = ModelsTipoAcemilas::create([
            'nombre' => $this->nombre_de_tipo
        ]);
        $this->resetUI();
        
        $this->dispatchBrowserEvent('swal', [
            'title' => 'MUY BIEN !',
            'icon' => 'success',
            'text' => 'Registrado Correctamente'
        ]);
        //session()->flash('success', 'Registrado Correctamente');
    }

    public function Edit(ModelsTipoAcemilas $tipo)
    {
        $this->title = 'EDITAR TIPO DE ACÉMILAS';
        $this->idTipoAcemila = $tipo->id;
        $this->nombre_de_tipo = $tipo->nombre;
        $this->edicion = true;
        $this->emit('show-modal-tipo-personal', 'Edicion de Atractivos');
    }

    public function Update()
    {
        $this->validate([
            'nombre_de_tipo' => 'required|min:3'
        ]);
        $tipo = ModelsTipoAcemilas::findOrFail($this->idTipoAcemila);
        $tipo->nombre = $this->nombre_de_tipo;
        $tipo->save();

        session()->flash('success', 'Actualizado Correctamente');

        $this->emit('close-modal-tipo-personal', 'Edicion de Atractivos');
        $this->resetUI();
    }

    public function deleteConfirm($id)
    {

        $this->dispatchBrowserEvent('swal-confirmTipoPersonal', [
            'title' => 'Estás seguro que deseas eliminar el Tipo de Acémila ?',
            'icon' => 'warning',
            'id' => $id
        ]);
    }

    public function deleteTipoAcemila(ModelsTipoAcemilas $tipo)
    {
        $tipos =  DB::table('tipoacemila_paquetes')
            ->where('tipo_acemila_id', $tipo->id)
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
