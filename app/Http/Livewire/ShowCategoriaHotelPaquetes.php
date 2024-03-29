<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CategoriaHoteles;
use App\Models\PaquetesTuristicos;

class ShowCategoriaHotelPaquetes extends Component
{

    public $descripcion;
    public $idPaquete;
    public $title = 'CREAR CATEGORÍAS DE HOTEL', $idCategoriaHotel, $edicion = false;

    protected $listeners = ['deleteCategoriaHotel' => 'deleteCategoriaHotel'];

    protected $rules = [
        'descripcion' => 'required|min:5',
        'idPaquete' => 'required',
    ];

    public function resetUI()
    {
        $this->reset(['descripcion', 'title', 'idCategoriaHotel', 'edicion']);
        $this->resetValidation();
    }

    public function mount($idPaquete)
    {
        $this->idPaquete = $idPaquete;
    }

    public function render()
    {
        $categorias =  CategoriaHoteles::where('paquete_id', '=', $this->idPaquete)->get();
        return view('livewire.show-categoria-hotel-paquetes', compact('categorias'));
    }

    public function save()
    {
        $this->validate();

        $categ = CategoriaHoteles::create([
            'descripcion' => $this->descripcion,
            'paquete_id' => $this->idPaquete
        ]);
        $this->resetUI();
        $this->emit('alert', 'MUY BIEN', 'success', 'Categoría de Hotel Registrado correctamente.');
    }

    public function Edit(CategoriaHoteles $categoria)
    {
        $this->title = 'EDITAR CATEGORÍAS DE HOTEL';
        $this->idCategoriaHotel = $categoria->id;
        $this->descripcion = $categoria->descripcion;
        $this->edicion = true;
        $this->emit('show-modal-categoria-hotel', 'Edicion de Pagos de Servicio');
    }

    public function Update()
    {
        $this->validate([
            'descripcion' => 'required|min:5'
        ]);
        $categoria_hotel = CategoriaHoteles::findOrFail($this->idCategoriaHotel);
        $categoria_hotel->descripcion = $this->descripcion;
        $categoria_hotel->save();

        $this->emit('alert', 'MUY BIEN', 'success', 'Categoría de Hotel Actualizado Correctamente.');


        $this->emit('close-modal-categoria-hotel', 'Edicion de Categorias');
        $this->resetUI();
    }

    public function cerrarModal()
    {
        $this->emit('close-modal-categoria-hotel', 'Edicion de Atractivos');
        $this->resetUI();
    }

    public function deleteConfirm($id)
    {

        $this->dispatchBrowserEvent('swal-confirmCategoriaHotel', [
            'title' => 'Estás seguro que deseas eliminar la Categoría de Hotel ?',
            'icon' => 'warning',
            'id' => $id
        ]);
    }

    public function deleteCategoriaHotel($idCategoriaHotel)
    {
        $categoria = CategoriaHoteles::findOrFail($idCategoriaHotel);
        $categoria->delete();
        $this->emit('alert', 'MUY BIEN', 'success', 'Categoría de Hotel Eliminado Correctamente.');
        $this->resetUI();
    }
}
