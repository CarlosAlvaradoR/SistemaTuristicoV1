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
    public $title = 'CREAR MARCAS DE EQUIPOS', $idMarca, $edicion = false;

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

        $this->dispatchBrowserEvent('swal', [
            'title' => 'MUY BIEN !',
            'icon' => 'success',
            'text' => 'Marca Registrada Correctamente'
        ]);
    }

    public function Edit(ModelsMarcas $marca){
        $this->title = 'EDITAR MARCAS';
        $this->idMarca = $marca->id;
        $this->nombre_de_marca = $marca->nombre;
        $this->edicion = true;
        $this->emit('show-modal-marca', 'Edicion de Atractivos');
    }

    public function Update(){
        $this->validate(
            [
                'nombre_de_marca' => 'required'
            ]
        );
        
        $marca = ModelsMarcas::findOrFail($this->idMarca);
        $marca->nombre = $this->nombre_de_marca;
        $marca->save();

        $this->dispatchBrowserEvent('swal', [
            'title' => 'MUY BIEN !',
            'icon' => 'success',
            'text' => 'Marca Actuaizada Correctamente'
        ]);
        $this->emit('close-modal-marca', 'Edicion de Atractivos');
    }

    /*public function updatingSearch() //Search es el valor que va a capturar para resetear (OJO SEARCH o lo que sea debe estar en mayúscula)
    {
        $this->resetPage();
    }*/
}
