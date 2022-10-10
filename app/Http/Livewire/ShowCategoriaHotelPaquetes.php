<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CategoriaHoteles;

class ShowCategoriaHotelPaquetes extends Component
{

    public $descripcion;


    public function render()
    {
        
        return view('livewire.show-categoria-hotel-paquetes');
    }

    public function save (){
        CategoriaHoteles::create([
            'descripcion' => $this->descripcion
        ]);
    }
}
