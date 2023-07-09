<?php

namespace App\Http\Livewire\UsuariosAdmin\Usuarios\Config;

use App\Models\ConfiguracionesGenerales;
use App\Models\ConfiguracionImagenes;
use Livewire\WithFileUploads;
use Livewire\Component;

class Config extends Component
{
    use WithFileUploads;

    public $imagenMaximizada;
    public $imagenMinimizada;

    /** ATRIBUTOS DE LAS CONFIGURACIONES GENERALES */
    public $nombre_de_la_empresa, $direccion_de_la_empresa, $telefono_de_contacto_de_la_empresa,
        $correo_de_contacto_de_la_empresa, $direccion_del_mapa_en_google_maps;

    public function render()
    {
        $imagenes = ConfiguracionImagenes::all();
        // dd($imagenes);
        $configuraciones = ConfiguracionesGenerales::find(1);
        $this->nombre_de_la_empresa = $configuraciones->nombre_de_la_empresa;
        $this->direccion_de_la_empresa = $configuraciones->direccion_de_la_empresa;
        $this->telefono_de_contacto_de_la_empresa = $configuraciones->telefono_de_contacto_de_la_empresa;
        $this->correo_de_contacto_de_la_empresa = $configuraciones->correo_de_contacto_de_la_empresa;
        $this->direccion_del_mapa_en_google_maps = $configuraciones->direccion_del_mapa_en_google_maps;

        return view('livewire.usuarios-admin.usuarios.config.config', compact('imagenes'));
    }

    public function saveConfiguracionesGenerales()
    {
        $this->validate(
            [
                'nombre_de_la_empresa' => 'required|string|min:3',
                'direccion_de_la_empresa' => 'required|string|min:3',
                'telefono_de_contacto_de_la_empresa' => 'required|string|min:5',
                'correo_de_contacto_de_la_empresa' => 'required|string|email',
                'direccion_del_mapa_en_google_maps' => 'required|string|min:15',
            ]
        );
        $nombre = '';
        $direccion = '';
        $telefono = '';
        $correo = '';
        $direccion_mapa = '';
        if ($this->nombre_de_la_empresa) {
            $nombre = $this->nombre_de_la_empresa;
        }
        if ($this->direccion_de_la_empresa) {
            $direccion = $this->direccion_de_la_empresa;
        }
        if ($this->telefono_de_contacto_de_la_empresa) {
            $telefono = $this->telefono_de_contacto_de_la_empresa;
        }
        if ($this->correo_de_contacto_de_la_empresa) {
            $correo = $this->correo_de_contacto_de_la_empresa;
        }
        if ($this->direccion_del_mapa_en_google_maps) {
            $direccion_mapa = $this->direccion_del_mapa_en_google_maps;
        }
        $configuraciones = ConfiguracionesGenerales::findOrFail(1);
        $configuraciones->nombre_de_la_empresa = $nombre;
        $configuraciones->direccion_de_la_empresa = $direccion;
        $configuraciones->telefono_de_contacto_de_la_empresa = $telefono;
        $configuraciones->correo_de_contacto_de_la_empresa = $correo;
        $configuraciones->direccion_del_mapa_en_google_maps = $direccion_mapa;
        $configuraciones->save();

        return redirect()->route('configuración.del.sistema');
    }

    public function saveImageMaximized()
    {
        $this->validate(
            [
                'imagenMaximizada' => 'required|image',
            ]
        );
        $imagen = ConfiguracionImagenes::findOrFail(1);
        if ($imagen->ruta_de_imagen) {
            $eliminar = unlink($imagen->ruta_de_imagen);
        }

        $imagen->ruta_de_imagen = 'storage/' . $this->imagenMaximizada->store('Configuracion', 'public');
        $imagen->save();

        $this->reset(['imagenMaximizada']);

        return redirect()->route('configuración.del.sistema');

    }


    public function saveImagenMinimizada()
    {
        $this->validate(
            [
                'imagenMinimizada' => 'required|image',
            ]
        );

        $imagen = ConfiguracionImagenes::findOrFail(2);
        if ($imagen->ruta_de_imagen) {
            $eliminar = unlink($imagen->ruta_de_imagen);
        }

        $imagen->ruta_de_imagen = 'storage/' . $this->imagenMinimizada->store('Configuracion', 'public');
        $imagen->save();

        $this->reset(['imagenMinimizada']);

        return redirect()->route('configuración.del.sistema');
        
    }
}
