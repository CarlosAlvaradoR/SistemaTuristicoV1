<?php

namespace App\Http\Livewire\UsuariosAdmin\Usuarios\Config;

use App\Models\ConfiguracionImagenes;
use Livewire\WithFileUploads;
use Livewire\Component;

class Config extends Component
{
    use WithFileUploads;

    public $imagenMaximizada;
    public $imagenMinimizada;

    public function render()
    {
        $imagenes = ConfiguracionImagenes::all();
        // dd($imagenes);
        return view('livewire.usuarios-admin.usuarios.config.config', compact('imagenes'));
    }

    public function saveImageMaximized(){
        $this->validate(
            [
                'imagenMaximizada' => 'required|image',
            ]
        );
        $imagen = ConfiguracionImagenes::findOrFail(1);
        $imagen->ruta_de_imagen = 'storage/' . $this->imagenMaximizada->store('Configuracion', 'public');
        $imagen->save();

        $this->reset(['imagenMaximizada']);
    }


}
