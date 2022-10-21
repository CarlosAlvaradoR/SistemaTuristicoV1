<?php

namespace App\Http\Livewire\PaquetesAdmin;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\TipoPaquetes;
use App\Models\PaquetesTuristicos;

class CrearPaquetes extends Component
{
    use WithFileUploads;

    public $nombre, $precio, $precio_en_dolares, $estado, $imagen_principal, $tipo_de_paquete;

    protected $rules = [
        'nombre' => 'required',
        'precio' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        'precio_en_dolares' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        'estado' => 'required',
        'imagen_principal' => 'required',
        'tipo_de_paquete' => 'required',
    ];

    public function render()
    {
        $tipos = TipoPaquetes::all();
        return view('livewire.paquetes-admin.crear-paquetes', compact('tipos'));
    }

    public function crearPaquete(){
        $this->validate();

        $crear = PaquetesTuristicos::create([
            'nombre' => $this->nombre, 
            'precio' => $this->precio,
            'precio_dolares' => $this->precio_en_dolares, 
            'estado' => $this->estado, 
            'imagen_principal' => 'storage/'.$this->imagen_principal->store('foto_principal','public'),
            'tipo_paquete_id' => $this->tipo_de_paquete
        ]);

        $this->reset(['nombre','precio','estado','imagen_principal','tipo_de_paquete']);
        $this->imagen_principal = null;
        session()->flash('PaqueteSucces', 'Paquete añadido correctamente');
    }
}
