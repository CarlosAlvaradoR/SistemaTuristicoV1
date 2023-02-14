<?php

namespace App\Http\Livewire\PaquetesAdmin\Paquetes;

use App\Models\TipoAlimentaciones;
use App\Models\TipoTransportes;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TipoAlimentacion extends Component
{
    public $title = 'CREACIÓN DE TIPOS DE ALIMENTACIÓN';
    public $nombre_de_tipo;
    public $edicion = false, $idTipoAlimentacion;

    protected $listeners = ['deleteTipoAlimentacion' => 'deleteTipoAlimentacion'];

    function resetUI()
    {
        $this->reset(['title', 'nombre_de_tipo', 'edicion', 'idTipoAlimentacion']);
    }


    public function render()
    {
        $tipos = TipoAlimentaciones::all(['id', 'nombre']);
        return view('livewire.paquetes-admin.paquetes.tipo-alimentacion', compact('tipos'));
    }

    public function guardarTipoAlimentacion()
    {
        $this->validate([
            'nombre_de_tipo' => 'required|min:3'
        ]);
        $tipo = TipoAlimentaciones::create([
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

    public function Edit(TipoAlimentaciones $tipo)
    {
        $this->title = 'EDITAR TIPO DE ALIMENTACIÓN';
        $this->idTipoAlimentacion = $tipo->id;
        $this->nombre_de_tipo = $tipo->nombre;
        $this->edicion = true;
        $this->emit('show-modal-tipo-personal', 'Edicion de Atractivos');
    }

    public function Update()
    {
        $this->validate([
            'nombre_de_tipo' => 'required|min:3'
        ]);
        $tipo = TipoAlimentaciones::findOrFail($this->idTipoAlimentacion);
        $tipo->nombre = $this->nombre_de_tipo;
        $tipo->save();

        session()->flash('success', 'Actualizado Correctamente');

        $this->emit('close-modal-tipo-personal', 'Edicion de Atractivos');
        $this->resetUI();
    }

    public function deleteConfirm($id)
    {

        $this->dispatchBrowserEvent('swal-confirmTipoPersonal', [
            'title' => 'Estás seguro que deseas eliminar el Tipo de Alimentación?',
            'icon' => 'warning',
            'id' => $id
        ]);
    }

    public function deleteTipoAlimentacion(TipoAlimentaciones $tipo)
    {
        $tipos =  DB::table('tipoalimentacion_paquetes')
            ->where('tipoalimentacion_id', $tipo->id)
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
