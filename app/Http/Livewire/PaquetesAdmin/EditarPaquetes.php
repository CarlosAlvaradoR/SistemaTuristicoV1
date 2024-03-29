<?php

namespace App\Http\Livewire\PaquetesAdmin;

use Livewire\Component;
use App\Models\TipoPaquetes;
use Livewire\WithFileUploads;
use App\Models\PaquetesTuristicos;


class EditarPaquetes extends Component
{
    use WithFileUploads;

    public $idPaquete, $nombre, $precio, $precio_en_dolares, $estado, $visibilidad, $imagen_principal, $tipo_de_paquete;
    public $imagen_principal_nuevo, $slug;

    protected $rules = [
        'nombre' => 'required',
        'precio' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        'precio_en_dolares' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        'estado' => 'required|numeric|min:1',
        'visibilidad' => 'required|in:PUBLICO,PRIVADO',
        //'imagen_principal' => 'required',
        'tipo_de_paquete' => 'required|numeric|min:1',
    ];


    public function mount(PaquetesTuristicos $paquete)
    {
        $this->idPaquete = $paquete->id;
        $this->nombre = $paquete->nombre;
        $this->precio = $paquete->precio;
        $this->precio_en_dolares = $paquete->precio_dolares;
        $this->estado = $paquete->estado;
        $this->visibilidad = $paquete->visibilidad;
        $this->slug = $paquete->slug;
        $this->imagen_principal = $paquete->imagen_principal;
        $this->tipo_de_paquete = $paquete->tipo_paquete_id;
    }

    public function render()
    {
        $tipos = TipoPaquetes::all();
        return view('livewire.paquetes-admin.editar-paquetes', compact('tipos'));
    }

    public function editarPaquete()
    {
        //dd(PaquetesTuristicos::find($this->idPaquete));
        $this->validate();

        //Primero validar que exista una imagen seleccionada -> verificar si existe un archivo anterior -> eliminamos
        // Si no existe la variable queda igual y se trannscribe a la base de datos
        if ($this->imagen_principal_nuevo) {
            if (file_exists(public_path('foto_principal/$this->imagen_principal'))) {
                $eliminar = unlink($this->imagen_principal);
                $imagen_nueva_paquete = 'storage/' . $this->imagen_principal_nuevo->store('foto_principal', 'public');
            } else {
                $imagen_nueva_paquete = 'storage/' . $this->imagen_principal_nuevo->store('foto_principal', 'public');
            }
        } else {
            $imagen_nueva_paquete = $this->imagen_principal;
        }

        /*if (file_exists(public_path('foto_principal/$this->imagen_principal'))) { //EXISTE
            $eliminar = unlink($this->imagen_principal);
            $imagen_nueva_paquete = 'storage/' . $this->imagen_principal_nuevo->store('foto_principal', 'public');
        } else { //NO EXISTE
            if ($this->imagen_principal_nuevo) {
                $imagen_nueva_paquete = 'storage/' . $this->imagen_principal_nuevo->store('foto_principal', 'public');
            }
        }*/


        /*if (is_null($this->imagen_principal_nuevo)) {
            $imagen_nueva_paquete = $this->imagen_principal;
            //dd("Está vacío no se modifica");
        } else {
            $eliminar = unlink($this->imagen_principal);
            $imagen_nueva_paquete = 'storage/' . $this->imagen_principal_nuevo->store('foto_principal', 'public');
            //dd("No está vacío y se va a eliminar");
        }*/
        $paquete = PaquetesTuristicos::findOrFail($this->idPaquete);
        $paquete->nombre = $this->nombre;
        $paquete->precio = $this->precio;
        $paquete->precio_dolares = $this->precio_en_dolares;
        $paquete->estado = $this->estado;
        $paquete->visibilidad = $this->visibilidad; 
        $paquete->imagen_principal = $imagen_nueva_paquete;
        $paquete->tipo_paquete_id = $this->tipo_de_paquete;

        $paquete->save();

        redirect()->route('paquetes.index');
    }
}
