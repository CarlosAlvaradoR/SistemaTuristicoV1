<?php

namespace App\Http\Livewire\EquiposAdmin\Marcas;

use App\Models\Marcas as ModelsMarcas;
use Livewire\WithPagination;
use Livewire\Component;

class Marcas extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search='';
    public $nombre_de_marca;

    public function render()
    {
        $marcas = ModelsMarcas::where('nombre', 'like', '%'.$this->search.'%')->paginate(5);
        return view('livewire.equipos-admin.marcas.marcas', compact('marcas'));
    }

    public function saveMarca(){
        $this->validate(
            [
                'nombre_de_marca' => 'required'
            ]
        );
        $marca=ModelsMarcas::create([
            'nombre' => $this->nombre_de_marca
        ]);
    }

    public function Edit(){

    }

    /*public function updatingSearch() //Search es el valor que va a capturar para resetear (OJO SEARCH o lo que sea debe estar en mayúscula)
    {
        $this->resetPage();
    }*/
}
