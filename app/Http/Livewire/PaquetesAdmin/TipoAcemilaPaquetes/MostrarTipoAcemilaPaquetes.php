<?php

namespace App\Http\Livewire\PaquetesAdmin\TipoAcemilaPaquetes;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\TipoAcemilas;
use App\Models\TipoacemilaPaquetes;


class MostrarTipoAcemilaPaquetes extends Component
{
    public $idPaquete;
    public $tipo,$cantidad;
    public $title = 'ASINAR TIPOS DE ACÉMILAS AL PAQUETE', $idTipoAcemila, $edicion = false;

    protected $listeners = ['quitarTipoAcemilaPaquete' => 'quitarTipoAcemilaPaquete'];

    protected $rules = [
        'tipo' => 'required',
        'cantidad' => 'required|numeric|min:1'
    ];

    public function resetUI(){
        $this->reset(['tipo','cantidad','title','idTipoAcemila','edicion']);
    }

    public function mount($idPaquete){
        $this->idPaquete = $idPaquete;
    }


    public function render()
    {
        $tipos = TipoAcemilas::all();
        $tipos_acemilas = DB::select('SELECT tap.id, ta.nombre, tap.cantidad  FROM tipo_acemilas ta
        INNER JOIN tipoacemila_paquetes tap on ta.id = tap.tipo_acemila_id
        WHERE tap.paquete_id = '.$this->idPaquete.'');
        return view('livewire.paquetes-admin.tipo-acemila-paquetes.mostrar-tipo-acemila-paquetes',
                    compact('tipos', 'tipos_acemilas'));
    }

    public function guardarTipoAcemilaPaquete(){
        $this->validate();

        $guardar = TipoacemilaPaquetes::create([
            'cantidad' => $this->cantidad, 
            'tipo_acemila_id' => $this->tipo, 
            'paquete_id' => $this->idPaquete
        ]);

        $this->resetUI();
        session()->flash('success', 'Tipo de Acémila añadido correctamente al paquete');
    }

    public function Edit(TipoacemilaPaquetes $tipo)
    {
        $this->title = 'EDITAR TIPO DE ACÉMILA DEL PAQUETE';
        $this->idTipoAcemila = $tipo->id;
        $this->cantidad = $tipo->cantidad;
        $this->tipo = $tipo->tipo_acemila_id;
        $this->edicion = true;
        $this->emit('show-modal-acemila-paquete', 'Edicion de Atractivos');
    }

    public function Update()
    {
        $this->validate([
            'tipo' => 'required',
            'cantidad' => 'required|numeric|min:1'
        ]);
        $tipo = TipoacemilaPaquetes::findOrFail($this->idTipoAcemila);
        $tipo->cantidad = $this->cantidad;
        $tipo->tipo_acemila_id = $this->tipo;
        $tipo->save();

        session()->flash('success', 'Actualizado Correctamente');

        $this->emit('close-modal-acemila-paquete', 'Edicion de Atractivos');
        $this->resetUI();
    }

    public function deleteConfirm($id)
    {

        $this->dispatchBrowserEvent('swal-confirmTipoAcemilaPaquete', [
            'title' => 'Estás seguro que deseas eliminar el Tipo de Acémila del Paquete ?',
            'icon' => 'warning',
            'id' => $id
        ]);
    }

    public function quitarTipoAcemilaPaquete($idTipoAcemilaPaquete){
        $tipo_acemila_paquete = TipoacemilaPaquetes::findOrFail($idTipoAcemilaPaquete);
        $tipo_acemila_paquete->delete();
        session()->flash('success', 'Tipo de Acémila Eliminado Correctamente');
    }

    public function cerrarModal()
    {
        $this->emit('close-modal-acemila-paquete', 'Edicion de Atractivos');
        $this->resetUI();
    }
}
