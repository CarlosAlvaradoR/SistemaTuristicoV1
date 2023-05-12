<?php

namespace App\Http\Livewire\PaquetesAdmin\TipoAlimentacionPaquete;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\TipoAlimentaciones;
use App\Models\TipoalimentacionPaquetes;

class MostrarTipoAlimentacionPaquete extends Component
{
    public $idPaquete;
    public $descripcion, $tipo;
    public $title = 'ASIGNAR TIPOS DE ALIMENTACIÓN AL PAQUETE', $idTipoAlimentacion, $edicion = false;

    protected $listeners = ['quitarAlimentacionCampo' => 'quitarAlimentacionCampo'];

    function resetUI()
    {
        $this->reset(['descripcion', 'tipo', 'title', 'idTipoAlimentacion', 'edicion']);
        $this->resetValidation();
    }

    protected $rules = [
        'descripcion' => 'required',
        'tipo' => 'required|min:1'
    ];


    public function mount($idPaquete)
    {
        $this->idPaquete = $idPaquete;
    }


    public function render()
    {
        $tipos = TipoAlimentaciones::all();
        $alimentaciones = DB::select('SELECT tap.id, tap.descripcion, t.nombre FROM tipo_alimentaciones t
        INNER JOIN tipoalimentacion_paquetes tap on t.id = tap.tipoalimentacion_id
        WHERE tap.paquete_id = ' . $this->idPaquete . '');

        return view('livewire.paquetes-admin.tipo-alimentacion-paquete.mostrar-tipo-alimentacion-paquete',
            compact('tipos', 'alimentaciones')
        );
    }

    public function guardarAlimentacionCampo()
    {
        $this->validate();

        $alimentacionCampo = TipoalimentacionPaquetes::create([
            'descripcion' => $this->descripcion,
            'tipoalimentacion_id' => $this->tipo,
            'paquete_id' => $this->idPaquete
        ]);

        $this->resetUI();
        $this->emit('alert', 'MUY BIEN', 'success', 'Tipo de Alimentación Asignado Correctamente.');
        
    }

    public function Edit(TipoalimentacionPaquetes $tipo)
    {
        $this->title = 'EDITAR TIPO DE ALMUERZO';
        $this->idTipoAlimentacion = $tipo->id;
        $this->descripcion = $tipo->descripcion;
        $this->tipo = $tipo->tipoalimentacion_id;
        $this->edicion = true;
        $this->emit('show-modal-tipo-alimentacion', 'Edicion de Atractivos');
    }

    public function Update()
    {
        $this->validate([
            'descripcion' => 'required',
            'tipo' => 'required|min:1'
        ]);
        $tipo = TipoalimentacionPaquetes::findOrFail($this->idTipoAlimentacion);
        $tipo->descripcion = $this->descripcion;
        $tipo->tipoalimentacion_id = $this->tipo;
        $tipo->save();

        $this->emit('alert', 'MUY BIEN', 'success', 'Tipo de Alimentación Actualizado Correctamente.');

        $this->emit('close-modal-tipo-alimentacion', 'Edicion de Atractivos');
        $this->resetUI();
    }

    public function cerrarModal()
    {
        $this->emit('close-modal-tipo-alimentacion', 'Edicion de Atractivos');
        $this->resetUI();
    }

    public function deleteConfirm($id)
    {

        $this->dispatchBrowserEvent('swal-confirmTipoAlimentacionPaquete', [
            'title' => 'Estás seguro que deseas eliminar el Tipo de Alimentación ?',
            'icon' => 'warning',
            'id' => $id
        ]);
    }

    public function quitarAlimentacionCampo($idAlimentacionCampo)
    {
        $alimentacion_campo = TipoalimentacionPaquetes::findOrFail($idAlimentacionCampo);
        $alimentacion_campo->delete();
        $this->emit('alert', 'MUY BIEN', 'success', 'Tipo de Alimentación Eliminado Correctamente.');
    }
}
