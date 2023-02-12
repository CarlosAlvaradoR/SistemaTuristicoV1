<?php

namespace App\Http\Livewire\PaquetesAdmin\Mapa;

use Livewire\Component;
use App\Models\MapaPaquetes;
use Livewire\WithFileUploads;


class ShowMapas extends Component
{
    use WithFileUploads;


    public $idPaquete;
    public $title = 'CREACIÓN DE MAPAS DEL PAQUETE';
    public $ruta, $descripcion;
    public $conta = 0, $idMapa, $mapa_anterior, $edicion=false;

    protected $listeners = ['deleteMapa' => 'deleteMapa'];

    protected $rules = [
        'ruta' => 'required|image',
        'descripcion' => 'required',
    ];


    public function mount($idPaquete){
        $this->idPaquete = $idPaquete;
    }
    
    public function render()
    {
        $mapas = MapaPaquetes::where('paquete_id','=',$this->idPaquete)->get();
        if ($mapas) {
            $this->conta = count($mapas);
        }
        return view('livewire.paquetes-admin.mapa.show-mapas', compact('mapas'));
    }

    public function saveMapa(){
        $this->validate();
        if ($this->conta > 0) {
            session()->flash('warning', 'Este Paquete ya tiene asignado su mapa');
            return;
        }

        $mapa = MapaPaquetes::create([
            'ruta' => 'storage/'.$this->ruta->store('mapas','public'),
            'descripcion' => $this->descripcion,
            'paquete_id' => $this->idPaquete
        ]);

        $this->resetUI();
        $this->sessionMessage('success', 'Mapa Guardado Correctamente');
    }

    public function Edit($idMapaPaquete){
        $this->resetUI();
        $mapaPaquete = MapaPaquetes::findOrFail($idMapaPaquete);
        $this->title = 'EDICIÓN DE MAPA DEL PAQUETE';
        $this->idMapa = $mapaPaquete->id;
        $this->mapa_anterior = $mapaPaquete->ruta;
        $this->descripcion = $mapaPaquete->descripcion;
        $this->edicion = true;

        //$this->emit('show-modal', 'Edición de Mapas');
        
        $this->emit('show-modal', 'Edicion de Mapas');
    }

    public function Update(){
        if ($this->ruta) {
            if (file_exists(public_path('fotos/$this->mapa_anterior'))) {
                $eliminar = unlink($this->mapa_anterior);
                $mapa_nuevo = 'storage/' . $this->ruta->store('mapas', 'public');
            } else {
                $mapa_nuevo = 'storage/' . $this->ruta->store('mapas', 'public');
            }
        } else {
            $mapa_nuevo = $this->mapa_anterior;
        }
        $mapa = MapaPaquetes::findOrFail($this->idMapa);
        $mapa->ruta = $mapa_nuevo;
        $mapa->descripcion = $this->descripcion;
        $mapa->save();
        $this->resetUI();
        $this->sessionMessage('success','Mapa Actualizado Correctamente');

        $this->emit('close-modal', 'Edicion de Mapas');
    }

    public function closeModal(){
        $this->emit('close-modal', 'Edicion de Mapas');
    }

    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('swal-confirmMapa', [
            'title' => 'Estás seguro que deseas eliminar el Mapa?',
            'icon' => 'warning',
            'id' => $id
        ]);
    }

    public function deleteMapa($idMapa)
    {
        

        $mapa_paquete = MapaPaquetes::findOrFail($idMapa);

        $mapa_paquete->delete();
        $eliminar = unlink($mapa_paquete->ruta . '');

        $this->resetUI();
    }

    function resetUI(){
        $this->reset(['title','ruta','descripcion','conta','idMapa','mapa_anterior','edicion']);
    }

    function sessionMessage($nombre_session, $mensaje){
        session()->flash($nombre_session, $mensaje);
    }
}
