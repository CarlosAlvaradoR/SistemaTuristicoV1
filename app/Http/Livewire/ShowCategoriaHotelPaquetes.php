<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CategoriaHoteles;
use App\Models\PaquetesTuristicos;

class ShowCategoriaHotelPaquetes extends Component
{

    public $descripcion;
    public $idPaquete;

    protected $rules = [
        'descripcion' => 'required|min:5',
        'idPaquete' => 'required',
    ];

    public function mount($idPaquete)
    {
        $this->idPaquete = $idPaquete;
    }

    public function render()
    {
        $categorias =  CategoriaHoteles::where('paquete_id','=',$this->idPaquete)->get();
        return view('livewire.show-categoria-hotel-paquetes', compact('categorias'));
    }

    public function save (){
        $this->validate();

        $categ =CategoriaHoteles::create([
            'descripcion' => $this->descripcion,
            'paquete_id'=> $this->idPaquete
        ]);
        $this->descripcion = "";
        session()->flash('message', 'Categoríade Hotel guardado correctamente');
    }
}
