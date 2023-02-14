<?php

namespace App\Http\Livewire\PaquetesAdmin\TipoPersonal;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\TipoPersonales;
use App\Models\PersonalTipos;

class MostrarTipoPersonalPaquete extends Component
{

    public $idPaquete;
    public $cantidad, $tipo_id;
    public $title = 'ASIGNAR TIPO DE PERSONAL ACOMPAÑANTE', $idPersonalTipo, $edicion = false;

    protected $listeners = ['delete'];

    protected $rules = [
        'cantidad' => 'required|numeric|min:1',
        'tipo_id' => 'required'
    ];

    function resetUI(){
        $this->reset(['cantidad','tipo_id','title','idPersonalTipo','edicion']);
    }

    public function mount($idPaquete)
    {
        $this->idPaquete = $idPaquete;
    }


    public function render()
    {
        $tipos = TipoPersonales::all();
        $personales = DB::select('SELECT pt.id, tp.nombre_tipo, pt.cantidad FROM tipo_personales tp
        INNER JOIN personal_tipos pt on tp.id = pt.tipo_id
        WHERE paquete_id = ' . $this->idPaquete . '');
        return view('livewire.paquetes-admin.tipo-personal.mostrar-tipo-personal-paquete', compact('tipos', 'personales'));
    }


    public function guardarPersonalTipoPaquete()
    {
        //dd("Llegó");
        $this->validate();

        $personal_types = PersonalTipos::create([
            'cantidad' => $this->cantidad,
            'tipo_id' => $this->tipo_id,
            'paquete_id' => $this->idPaquete
        ]);
        $this->resetUI();
    }

    public function Edit(PersonalTipos $tipo)
    {
        $this->title = 'EDITAR TIPO DE PERSONAL';
        $this->idPersonalTipo = $tipo->id;
        $this->cantidad = $tipo->cantidad;
        $this->tipo_id = $tipo->tipo_id;
        $this->edicion = true;
        $this->emit('show-modal-tipo-personal', 'Edicion de Atractivos');
    }

    public function Update()
    {
        $this->validate([
            'cantidad' => 'required|numeric|min:1',
            'tipo_id' => 'required'
        ]);
        $tipo = PersonalTipos::findOrFail($this->idPersonalTipo);
        $tipo->cantidad = $this->cantidad;
        $tipo->tipo_id = $this->tipo_id;
        $tipo->save();

        session()->flash('success', 'Actualizado Correctamente');

        $this->emit('close-modal-tipo-personal', 'Edicion de Atractivos');
        $this->resetUI();
    }

    public function cerrarModal()
    {
        $this->emit('close-modal-tipo-personal', 'Edicion de Atractivos');
        $this->resetUI();
    }

    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('swal-confirm', [
            'title' => 'Estás seguro que deseas eliminar el dato?',
            'icon' => 'warning',
            'id' => $id
        ]);
    }

    public function delete($idPersonalTipo)
    {
        $personal_tipo = PersonalTipos::findOrFail($idPersonalTipo);
        $personal_tipo->delete();
        session()->flash('message2', 'Pago por servicio eliminado correctamente');
    }
}
