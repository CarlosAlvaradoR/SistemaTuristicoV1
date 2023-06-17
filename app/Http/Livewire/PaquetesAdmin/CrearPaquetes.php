<?php

namespace App\Http\Livewire\PaquetesAdmin;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\TipoPaquetes;
use App\Models\PaquetesTuristicos;
use Illuminate\Support\Facades\Gate;

class CrearPaquetes extends Component
{
    use WithFileUploads;

    public $nombre, $precio, $precio_en_dolares, $estado, $visibilidad, $imagen_principal, $tipo_de_paquete;

    protected $rules = [
        'nombre' => 'required',
        'precio' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        'precio_en_dolares' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        'estado' => 'required|numeric|min:1',
        'visibilidad' => 'required|in:PUBLICO,PRIVADO',
        'imagen_principal' => 'required',
        'tipo_de_paquete' => 'required|numeric|min:1',
    ];

    public function render()
    {
        $tipos = TipoPaquetes::all();
        return view('livewire.paquetes-admin.crear-paquetes', compact('tipos'));
    }

    public function crearPaquete()
    {
        if (Gate::allows('editar-paquetes')) {
            $crear = $this->validate();
            // dd($crear);
            $crear = PaquetesTuristicos::create([
                'nombre' => $this->nombre,
                'precio' => $this->precio,
                'precio_dolares' => $this->precio_en_dolares,
                'estado' => $this->estado,
                'visibilidad' => $this->visibilidad,
                'imagen_principal' => 'storage/' . $this->imagen_principal->store('foto_principal', 'public'),
                'tipo_paquete_id' => $this->tipo_de_paquete
            ]);

            $this->reset([
                'nombre', 'precio', 'precio_en_dolares', 'estado',
                'visibilidad', 'imagen_principal', 'tipo_de_paquete'
            ]);
            $this->imagen_principal = null;
            session()->flash('PaqueteSucces', 'Paquete añadido correctamente');
        }else{
            return abort(403);
        }
    }
}
