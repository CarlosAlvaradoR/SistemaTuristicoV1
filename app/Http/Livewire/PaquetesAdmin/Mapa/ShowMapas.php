<?php

namespace App\Http\Livewire\PaquetesAdmin\Mapa;

use Livewire\Component;
use App\Models\MapaPaquetes;
use Livewire\WithFileUploads;


class ShowMapas extends Component
{
    use WithFileUploads;


    public $idPaquete;
    public $ruta, $descripcion;


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
        return view('livewire.paquetes-admin.mapa.show-mapas', compact('mapas'));
    }

    public function saveMapa(){
        $this->validate();

        $mapa = MapaPaquetes::create([
            'ruta' => 'storage/'.$this->ruta->store('mapas','public'),
            'descripcion' => $this->descripcion,
            'paquete_id' => $this->idPaquete
        ]);
    }
}
