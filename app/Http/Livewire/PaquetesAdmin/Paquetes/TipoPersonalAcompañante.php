<?php

namespace App\Http\Livewire\PaquetesAdmin\Paquetes;

use App\Models\TipoPersonales;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TipoPersonalAcompañante extends Component
{
    public $title = 'CREACIÓN DE TIPOS DE PERSONAL ACOMPAÑANTE';
    public $nombre_de_tipo;
    public $edicion = false, $idTipoPersonal;

    protected $listeners = ['deleteTipoPersonal' => 'deleteTipoPersonal'];

    function resetUI(){
        $this->reset(['title','nombre_de_tipo','edicion','idTipoPersonal']);   
    }
    public function render()
    {
        $tipos = TipoPersonales::all(['id','nombre_tipo']);
        return view('livewire.paquetes-admin.paquetes.tipo-personal-acompañante', compact('tipos'));
    }

    public function guardarNombreTipoPersonal(){
        $this->validate([
            'nombre_de_tipo' => 'required|min:3'
        ]);
        $tipo = TipoPersonales::create([
            'nombre_tipo' => $this->nombre_de_tipo
        ]);
  
        session()->flash('success', 'Registrado Correctamente');
        //$this->resetUI();
    }

    public function Edit(TipoPersonales $tipo){
        $this->title = 'EDITAR TIPO DE PERSONAL ACOMPAÑANTE';
        $this->idTipoPersonal = $tipo->id;
        $this->nombre_de_tipo = $tipo->nombre_tipo;
        $this->edicion = true;
        $this->emit('show-modal-tipo-personal', 'Edicion de Atractivos');
    }

    public function Update(){
        $this->validate([
            'nombre_de_tipo' => 'required|min:3'
        ]);
        $tipo = TipoPersonales::findOrFail($this->idTipoPersonal);
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

    public function deleteTipoPersonal(TipoPersonales $tipo){
        $tipos =  DB::table('personal_tipos')
            ->where('tipo_id', $tipo->id)
            ->get();
        $var = count($tipos);
        //dd($var);
        if ($var > 0) {

            session()->flash('error', 'No se Puede Eliminar porque está registrado la Lista de Algún Paquete');
        } else {
            $tipo->delete();
            session()->flash('success', 'Eliminado Correctamente');
        }
    }

    public function cerrarModal(){
        $this->emit('close-modal-tipo-personal', 'Edicion de Atractivos');
        $this->resetUI();
    }

    
}
