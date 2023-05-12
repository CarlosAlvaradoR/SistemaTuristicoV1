<?php

namespace App\Http\Livewire\PaquetesAdmin\TipoAlmuerzoPaquetes;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\TipoAlmuerzos;
use App\Models\TipoalmuerzoPaquetes;

class MostrarTipoAlmuerzoPaquetes extends Component
{
    public $idPaquete;
    public $tipo_de_almuerzo, $observacion_del_almuerzo;
    public $title = 'ASIGNAR ALMUERZOS DE CELEBRACIÓN AL PAQUETE', $idTipoAlmuerzo, $edicion = false;

    protected $listeners = ['quitarTipoAlmuerzoPaquete' => 'quitarTipoAlmuerzoPaquete'];

    protected $rules = [
        'tipo_de_almuerzo' => 'required|numeric|min:1',
        'observacion_del_almuerzo' => 'required'
    ];

    function resetUI()
    {
        $this->reset([
            'tipo_de_almuerzo', 'observacion_del_almuerzo', 'title', 'idTipoAlmuerzo',
            'edicion'
        ]);
        $this->resetValidation();
    }

    public function mount($idPaquete)
    {
        $this->idPaquete = $idPaquete;
    }

    public function render()
    {
        $tipos = TipoAlmuerzos::all();

        $tipos_almuerzos = DB::select('SELECT tap.id,  tap.observacion, ta.nombre FROM tipo_almuerzos ta
        INNER JOIN tipoalmuerzo_paquetes tap on ta.id = tap.tipo_almuerzo_id
        WHERE tap.paquete_id = ' . $this->idPaquete . '');
        return view('livewire.paquetes-admin.tipo-almuerzo-paquetes.mostrar-tipo-almuerzo-paquetes',
            compact('tipos', 'tipos_almuerzos')
        );
    }

    public function guardarTipoAlmuerzoPaquete()
    {
        $this->validate();
        $tipo_almuerzo = TipoalmuerzoPaquetes::create([
            'observacion' => $this->observacion_del_almuerzo,
            'tipo_almuerzo_id' => $this->tipo_de_almuerzo,
            'paquete_id' => $this->idPaquete
        ]);

        $this->resetUI();
        $this->emit('alert', 'MUY BIEN', 'success', 'Tipo de Almuerzo añadido correctamente al paquete.');
    }

    public function Edit(TipoalmuerzoPaquetes $tipo)
    {
        $this->title = 'EDITAR TIPO DE ALMUERZO ASIGNADO AL PAQUETE';
        $this->idTipoAlmuerzo = $tipo->id;
        $this->observacion_del_almuerzo = $tipo->observacion;
        $this->tipo_de_almuerzo = $tipo->tipo_almuerzo_id;
        $this->edicion = true;
        $this->emit('show-modal-tipo-almuerzo', 'Edicion de Atractivos');
    }

    public function Update()
    {
        $this->validate([
            'tipo_de_almuerzo' => 'required',
            'observacion_del_almuerzo' => 'required'
        ]);
        $tipo = TipoalmuerzoPaquetes::findOrFail($this->idTipoAlmuerzo);
        $tipo->observacion = $this->observacion_del_almuerzo;
        $tipo->tipo_almuerzo_id = $this->tipo_de_almuerzo;
        $tipo->save();
        $this->emit('alert', 'MUY BIEN', 'success', 'Tipo de Almuerzo Actualizado correctamente.');


        $this->emit('close-modal-tipo-almuerzo', 'Edicion de Atractivos');
        $this->resetUI();
    }

    public function deleteConfirm($id)
    {

        $this->dispatchBrowserEvent('swal-confirmTipoAlmuerzoPaquete', [
            'title' => 'Estás seguro que deseas eliminar el Tipo de Almuerzo ?',
            'icon' => 'warning',
            'id' => $id
        ]);
    }


    public function quitarTipoAlmuerzoPaquete($idTipoAlmuerzoPaquete)
    {
        $tipo_almuerzo_paquete = TipoalmuerzoPaquetes::findOrFail($idTipoAlmuerzoPaquete);
        $tipo_almuerzo_paquete->delete();
        $this->emit('alert', 'MUY BIEN', 'success', 'Tipo de Almuerzo Eliminado correctamente.');
    }

    public function cerrarModal()
    {
        $this->emit('close-modal-tipo-almuerzo', 'Edicion de Atractivos');
        $this->resetUI();
    }
}
