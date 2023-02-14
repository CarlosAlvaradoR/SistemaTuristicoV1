<?php

namespace App\Http\Livewire\PaquetesAdmin\Paquetes;

use App\Models\TipoAlmuerzos as ModelsTipoAlmuerzos;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TipoAlmuerzos extends Component
{
    public $title = 'CREACIÓN DE TIPOS DE ALMUERZO';
    public $nombre_de_tipo;
    public $edicion = false, $idTipoAlmuerzo;

    protected $listeners = ['deleteTipoAlmuerzo' => 'deleteTipoAlmuerzo'];

    function resetUI()
    {
        $this->reset(['title', 'nombre_de_tipo', 'edicion', 'idTipoAlmuerzo']);
    }


    public function render()
    {
        $tipos = ModelsTipoAlmuerzos::all(['id', 'nombre']);
        return view('livewire.paquetes-admin.paquetes.tipo-almuerzos', compact('tipos'));
    }

    public function guardarTipoAlmuerzos()
    {
        $this->validate([
            'nombre_de_tipo' => 'required|min:3'
        ]);
        $tipo = ModelsTipoAlmuerzos::create([
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

    public function Edit(ModelsTipoAlmuerzos $tipo)
    {
        $this->title = 'EDITAR TIPO DE ALMUERZO';
        $this->idTipoAlmuerzo = $tipo->id;
        $this->nombre_de_tipo = $tipo->nombre;
        $this->edicion = true;
        $this->emit('show-modal-tipo-personal', 'Edicion de Atractivos');
    }

    public function Update()
    {
        $this->validate([
            'nombre_de_tipo' => 'required|min:3'
        ]);
        $tipo = ModelsTipoAlmuerzos::findOrFail($this->idTipoAlmuerzo);
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

    public function deleteTipoAlmuerzo(ModelsTipoAlmuerzos $tipo)
    {
        $tipos =  DB::table('tipoalmuerzo_paquetes')
            ->where('tipo_almuerzo_id', $tipo->id)
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
