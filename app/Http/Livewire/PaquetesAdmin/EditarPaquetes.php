<?php

namespace App\Http\Livewire\PaquetesAdmin;

use Livewire\Component;
use App\Models\TipoPaquetes;
use Livewire\WithFileUploads;
use App\Models\PaquetesTuristicos;


class EditarPaquetes extends Component
{
    use WithFileUploads;

    public $idPaquete, $nombre, $precio, $precio_en_dolares, $estado, $imagen_principal, $tipo_de_paquete;
    public $imagen_principal_nuevo, $slug;

    public function mount(PaquetesTuristicos $paquete){
        $this->idPaquete = $paquete->id;
        $this->nombre = $paquete->nombre;
        $this->precio = $paquete->precio;
        $this->precio_en_dolares = $paquete->precio_dolares;
        $this->estado = $paquete->estado;
        $this->slug = $paquete->slug;
        $this->imagen_principal = $paquete->imagen_principal;
        $this->tipo_de_paquete = $paquete->tipo_paquete_id;
    }

    public function render()
    {
        $tipos = TipoPaquetes::all();
        return view('livewire.paquetes-admin.editar-paquetes', compact('tipos'));
    }

    public function editarPaquete(){
        //dd(PaquetesTuristicos::find($this->idPaquete));
       if(is_null($this->imagen_principal_nuevo))
        {
            $imagen_nueva_paquete = $this->imagen_principal;
            //dd("Está vacío no se modifica");
        }else{
            $eliminar = unlink($this->imagen_principal);
            $imagen_nueva_paquete = 'storage/'.$this->imagen_principal_nuevo->store('foto_principal','public');
            //dd("No está vacío y se va a eliminar");
        }
        $paquete = PaquetesTuristicos::findOrFail($this->idPaquete);
        $paquete->nombre = $this->nombre;
        $paquete->precio = $this->precio;
        $paquete->precio_dolares = $this->precio_en_dolares;
        $paquete->estado = $this->estado;
        $paquete->imagen_principal = $imagen_nueva_paquete;
        $paquete->tipo_paquete_id = $this->tipo_de_paquete;

        $paquete->save();

        redirect()->route('paquetes.index');
    }
}
