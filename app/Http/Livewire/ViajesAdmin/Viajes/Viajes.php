<?php

namespace App\Http\Livewire\ViajesAdmin\Viajes;

use App\Models\PaquetesTuristicos;
use App\Models\Viajes\ViajePaquetes;
use Livewire\Component;

class Viajes extends Component
{
    public $paquete;
    public $descripcion, $fecha, $hora, $cantidad_participantes, $estado, $paquete_id;

    public $title='CREAR VIAJES DEL PAQUETE', $idViajePaquete, $edicion=false;

    protected $listeners = ['deleteViaje'];

    public function mount(PaquetesTuristicos $paquete)
    {
        $this->paquete = $paquete;
    }

    public function render()
    {
        $viajes = ViajePaquetes::where('paquete_id', '=', $this->paquete->id)
            ->get();
        return view('livewire.viajes-admin.viajes.viajes', compact('viajes'));
    }

    public function saveViaje()
    {
        $this->validate([
            'descripcion' => 'required', 
            'fecha' => 'required', 
            'hora' => 'required', 
            'cantidad_participantes' => 'required', 
        ]);
        
        $viaje = ViajePaquetes::create([
            'descripcion' => $this->descripcion, 
            'fecha' => $this->fecha, 
            'hora' => $this->hora, 
            'cantidad_participantes' => $this->cantidad_participantes, 
            'estado' => 1, 
            'paquete_id' => $this->paquete->id
        ]);

        $this->dispatchBrowserEvent('swal', [
            'title' => 'MUY BIEN !',
            'icon' => 'success',
            'text' => 'Viaje Registrado Correctamente'
        ]);
    }

    public function Edit(ViajePaquetes $viaje){
        $this->title = 'EDITAR VIAJE DEL PAQUETE';
        $this->idViajePaquete = $viaje->id;
        $this->descripcion = $viaje->descripcion;
        $this->fecha = $viaje->fecha;
        $this->hora = $viaje->hora;
        $this->cantidad_participantes = $viaje->cantidad_participantes;
        $this->edicion = true;
        $this->emit('show-modal-viaje-paquete', 'Edicion de Viaje Paquete');
    }

    public function Update(){
        $this->validate([
            'descripcion' => 'required', 
            'fecha' => 'required', 
            'hora' => 'required', 
            'cantidad_participantes' => 'required', 
        ]);
        $viaje = ViajePaquetes::findOrFail($this->idViajePaquete);
        $viaje->descripcion = $this->descripcion;
        $viaje->fecha = $this->fecha;
        $viaje->hora = $this->hora;
        $viaje->cantidad_participantes = $this->cantidad_participantes;
        $viaje->save();

        $this->dispatchBrowserEvent('swal', [
            'title' => 'MUY BIEN !',
            'icon' => 'success',
            'text' => 'Viaje Actualizado Correctamente'
        ]);

        $this->emit('close-modal-pago-servicio', 'Edicion de Atractivos');
        //$this->resetUI();
    }

    public function deleteConfirm($id)
    {

        $this->dispatchBrowserEvent('swal-confirm-Viaje', [
            'title' => 'Estás seguro que deseas eliminar el Viaje ?',
            'icon' => 'warning',
            'id' => $id
        ]);
    }

    public function deleteViaje(ViajePaquetes $viaje)
    {
        $viaje->delete();
        $this->dispatchBrowserEvent('swal', [
            'title' => 'MUY BIEN !',
            'icon' => 'success',
            'text' => 'Viaje Eliminado de forma Correcta'
        ]);
    }
}
