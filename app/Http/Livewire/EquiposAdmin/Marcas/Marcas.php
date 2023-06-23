<?php

namespace App\Http\Livewire\EquiposAdmin\Marcas;

use App\Models\Marcas as ModelsMarcas;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Livewire\Component;

class Marcas extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $nombre_de_marca;
    public $title = 'CREAR MARCAS PARA EQUIPOS/IMPLEMENTOS', $idMarca, $edicion = false;

    protected $listeners = ['deleteMarca'];

    public function resetUI()
    {
        $this->reset(['search', 'nombre_de_marca', 'title', 'idMarca', 'edicion']);
    }
    public function render()
    {
        $marcas = ModelsMarcas::where('nombre', 'like', '%' . $this->search . '%')->paginate(5);
        return view('livewire.equipos-admin.marcas.marcas', compact('marcas'));
    }

    public function saveMarca()
    {
        $this->validate(
            [
                'nombre_de_marca' => 'required|min:2'
            ]
        );
        $marca = ModelsMarcas::create([
            'nombre' => $this->nombre_de_marca
        ]);
        $this->reset(['nombre_de_marca']);
        $this->dispatchBrowserEvent('swal', [
            'title' => 'MUY BIEN !',
            'icon' => 'success',
            'text' => 'Marca Registrada Correctamente'
        ]);

        $this->resetUI();
    }

    public function Edit(ModelsMarcas $marca)
    {
        $this->title = 'EDITAR MARCA';
        $this->idMarca = $marca->id;
        $this->nombre_de_marca = $marca->nombre;
        $this->edicion = true;
        $this->emit('show-modal-marca', 'Edicion de Atractivos');
    }

    public function Update()
    {
        $this->validate(
            [
                'nombre_de_marca' => 'required|min:2'
            ]
        );

        $marca = ModelsMarcas::findOrFail($this->idMarca);
        $marca->nombre = $this->nombre_de_marca;
        $marca->save();

        $this->dispatchBrowserEvent('swal', [
            'title' => 'MUY BIEN !',
            'icon' => 'success',
            'text' => 'Marca Actualizada Correctamente'
        ]);
        $this->reset(['nombre_de_marca']);
        $this->emit('close-modal-marca', 'Edicion de Atractivos');

        $this->resetUI();
    }

    public function deleteConfirm($id)
    {

        $this->dispatchBrowserEvent('swal-confirmMarca', [
            'title' => 'Estás seguro que deseas Eliminar la Marca',
            'icon' => 'warning',
            'id' => $id
        ]);
    }

    public function deleteMarca(ModelsMarcas $tipo)
    {
        $tipos =  DB::table('equipos')
            ->where('marca_id', $tipo->id)
            ->get();
        $var = count($tipos);
        //dd($var);
        if ($var > 0) {
            $this->dispatchBrowserEvent('swal', [
                'title' => 'ERROR',
                'icon' => 'error',
                'text' => 'No se puede Eliminar la Marca porque ya se asignó a Equipos'
            ]);
        } else {
            $tipo->delete();
            $this->dispatchBrowserEvent('swal', [
                'title' => 'MUY BIEN !',
                'icon' => 'success',
                'text' => 'Marca Eliminada Correctamente'
            ]);
        }
    }

    /*public function updatingSearch() //Search es el valor que va a capturar para resetear (OJO SEARCH o lo que sea debe estar en mayúscula)
    {
        $this->resetPage();
    }*/
}
