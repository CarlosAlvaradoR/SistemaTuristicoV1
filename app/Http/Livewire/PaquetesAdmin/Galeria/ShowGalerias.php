<?php

namespace App\Http\Livewire\PaquetesAdmin\Galeria;

use Livewire\Component;
use App\Models\FotoGalerias;
use Livewire\WithFileUploads;

class ShowGalerias extends Component
{
    use WithFileUploads;

    public $hola="Hola te estoy saludando";
    public $descripcion;
    public $idPaquete, $foto;

    public function mount($idPaquete){
        $this->idPaquete = $idPaquete;
    }



    public function render()
    {
        $fotos = FotoGalerias::where('paquete_id','=',$this->idPaquete)->get();
        return view('livewire.paquetes-admin.galeria.show-galerias', compact('fotos'));
    }

    public function saveGaleria(){
        $fotos = FotoGalerias::create([
            'descripcion' => $this->descripcion,
            'directorio' => 'storage/'.$this->foto->store('fotos','public'),
            'paquete_id' => $this->idPaquete
        ]);
    }
}
