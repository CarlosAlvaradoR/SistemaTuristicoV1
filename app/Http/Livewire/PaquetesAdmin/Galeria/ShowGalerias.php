<?php

namespace App\Http\Livewire\PaquetesAdmin\Galeria;

use Livewire\Component;
use App\Models\FotoGalerias;
use Livewire\WithFileUploads;

class ShowGalerias extends Component
{
    use WithFileUploads;

    public $hola="Hola te estoy saludando";
    public $descripcion;
    public $idPaquete, $foto;

    protected $listeners = ['deleteGaleria' => 'deleteGaleria'];

    protected $rules = [
        'descripcion' => 'required|min:6',
        'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
    ];

    public function mount($idPaquete){
        $this->idPaquete = $idPaquete;
    }



    public function render()
    {
        $fotos = FotoGalerias::where('paquete_id','=',$this->idPaquete)->get();
        return view('livewire.paquetes-admin.galeria.show-galerias', compact('fotos'));
    }

    public function saveGaleria(){
        $this->validate();
        $fotos = FotoGalerias::create([
            'descripcion' => $this->descripcion,
            'directorio' => 'storage/'.$this->foto->store('fotos','public'),
            'paquete_id' => $this->idPaquete
        ]);
        $this->reset(['descripcion','foto']);
        session()->flash('SatisfaccionGaleria', 'Fotografía añadida correctamente al paquete.');
        
    }

    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('swal-confirmImage', [
            'title' => 'Estás seguro que deseas eliminar la fotografía?',
            'icon' => 'warning',
            'id' => $id
        ]);
    }

    public function deleteGaleria($idFotografia){
        //dd("Llegó");
        
        $foto_galeria = FotoGalerias::findOrFail($idFotografia);
        //dd($foto_galeria->directorio);
            
            
        $foto_galeria->delete();
        $eliminar = unlink($foto_galeria->directorio.'');
            //dd($eliminar);

        
        //session()->flash('message2', 'Pago por servicio eliminado correctamente');
    }
}
