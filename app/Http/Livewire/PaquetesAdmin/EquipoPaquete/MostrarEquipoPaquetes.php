<?php

namespace App\Http\Livewire\PaquetesAdmin\EquipoPaquete;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Equipos;
use App\Models\EquipoPaquetes;

class MostrarEquipoPaquetes extends Component
{

    public $idPaquete;
    public $equipo, $cantidad, $observacion;
    public $title = 'AGREGAR EQUIPOS AL PAQUETE', $idEquipoPaquete, $edicion = false;

    protected $listeners = ['quitarEquipoPaquetes' => 'quitarEquipoPaquetes'];

    protected $rules = [
        'equipo' => 'required',
        'cantidad' => 'required|numeric|min:1',
        'observacion' => 'required'
    ];

    function resetUI()
    {
        $this->reset(['equipo', 'cantidad', 'observacion', 'title', 'idEquipoPaquete', 'edicion']);
    }

    public function mount($idPaquete)
    {
        $this->idPaquete = $idPaquete;
    }


    public function render()
    {
        $equipos = Equipos::all();
        $equipo_paquetes = DB::select('SELECT ep.id, e.nombre, ep.cantidad, ep.observacion  FROM equipos e
        INNER JOIN equipo_paquetes ep on e.id = ep.equipo_id
        WHERE ep.paquete_id = ' . $this->idPaquete . '');

        return view(
            'livewire.paquetes-admin.equipo-paquete.mostrar-equipo-paquetes',
            compact('equipos', 'equipo_paquetes')
        );
    }

    public function guardarEquipoPaquetes()
    {

        $this->validate();

        $equipo = EquipoPaquetes::create([
            'cantidad' => $this->cantidad,
            'observacion' => $this->observacion,
            'equipo_id' => $this->equipo,
            'paquete_id' => $this->idPaquete
        ]);

        $this->reset(['cantidad', 'observacion', 'equipo']);
        $this->dispatchBrowserEvent('swal', [
            'title' => 'MUY BIEN !',
            'icon' => 'success',
            'text' => 'Registrado Correctamente'
        ]);
    }

    public function Edit(EquipoPaquetes $tipo)
    {
        $this->title = 'EDITAR TIPO DE INFORMACIÓN DE LOS EQUIPOS DEL PAQUETE';
        $this->idEquipoPaquete = $tipo->id;
        $this->cantidad = $tipo->cantidad;
        $this->observacion = $tipo->observacion;
        $this->equipo = $tipo->equipo_id;
        $this->edicion = true;
        $this->emit('show-modal-equipo-paquete', 'Edicion de Atractivos');
    }

    public function Update()
    {
        $this->validate([
            'equipo' => 'required',
            'cantidad' => 'required|numeric|min:1',
            'observacion' => 'required'
        ]);
        $tipo = EquipoPaquetes::findOrFail($this->idEquipoPaquete);
        $tipo->cantidad = $this->cantidad;
        $tipo->observacion = $this->observacion;
        $tipo->equipo_id = $this->equipo;
        $tipo->save();

        session()->flash('success', 'Actualizado Correctamente');

        $this->emit('close-modal-equipo-paquete', 'Edicion de Atractivos');
        $this->resetUI();
    }

    public function deleteConfirm($id)
    {

        $this->dispatchBrowserEvent('swal-confirmEquipoPaquete', [
            'title' => 'Estás seguro que deseas sacar el Equipo del Paquete ?',
            'icon' => 'warning',
            'id' => $id
        ]);
    }

    public function quitarEquipoPaquetes($idEquipoPaquetes)
    {
        $equipo_paquetes = EquipoPaquetes::findOrFail($idEquipoPaquetes);
        $equipo_paquetes->delete();
        session()->flash('success', 'Equipo Quitado de la Asignación de Paquetes');
    }

    public function cerrarModal()
    {
        $this->emit('close-modal-equipo-paquete', 'Edicion de Atractivos');
        $this->resetUI();
    }
}
