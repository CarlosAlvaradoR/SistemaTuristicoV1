<?php

namespace App\Http\Livewire\PaquetesAdmin\Mapa;

use Livewire\Component;
use App\Models\MapaPaquetes;
class ShowMapas extends Component
{
    
    public $idPaquete;
    public $ruta, $descripcion;

    public function mount($idPaquete){
        $this->idPaquete = $idPaquete;
    }

    public function render()
    {
        $mapas = MapaPaquetes::where('paquete_id','=',$this->idPaquete)->get();
        return view('livewire.paquetes-admin.mapa.show-mapas', compact('mapas'));
    }

    public function saveMapa(){
        $mapa = MapaPaquetes::create([
            'ruta' => $this->ruta,
            'descripcion' => $this->descripcion,
            'paquete_id' => $this->idPaquete
        ]);
    }
}
