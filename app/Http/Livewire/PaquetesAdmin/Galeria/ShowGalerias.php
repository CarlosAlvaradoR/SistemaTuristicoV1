<?php

namespace App\Http\Livewire\PaquetesAdmin\Galeria;

use Livewire\Component;
use App\Models\FotoGalerias;
use Livewire\WithFileUploads;

class ShowGalerias extends Component
{
    use WithFileUploads;

    public $title = "CREAR GALERÍA DE IMÁGENES DEL PAQUETE";
    public $descripcion;
    public $idPaquete, $foto;
    public $edicion = false, $foto_anterior, $idFotoGaleria;

    protected $listeners = ['deleteGaleria' => 'deleteGaleria'];

    protected $rules = [
        'descripcion' => 'required|min:6',
        'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
    ];

    public function mount($idPaquete)
    {
        $this->idPaquete = $idPaquete;
    }

    function resetUI()
    {
        $this->reset(['descripcion', 'foto', 'edicion','foto_anterior','idFotoGaleria']);
    }

    public function render()
    {
        $fotos = FotoGalerias::where('paquete_id', '=', $this->idPaquete)->get();
        return view('livewire.paquetes-admin.galeria.show-galerias', compact('fotos'));
    }

    public function saveGaleria()
    {
        $this->validate();
        $fotos = FotoGalerias::create([
            'descripcion' => $this->descripcion,
            'directorio' => 'storage/' . $this->foto->store('fotos', 'public'),
            'paquete_id' => $this->idPaquete
        ]);
        $this->resetUI();
        session()->flash('SatisfaccionGaleria', 'Fotografía añadida correctamente al paquete.');
    }

    public function EditarGaleria($idFotoGaleria)
    {
        $this->resetUI();
        $this->title = 'EDITAR GALERÍA';
        $foto_galeria = FotoGalerias::findOrFail($idFotoGaleria);
        $this->edicion = true;
        $this->idFotoGaleria = $idFotoGaleria;
        $this->descripcion = $foto_galeria->descripcion;
        $this->foto_anterior = $foto_galeria->directorio;
        
        $this->emit('show-modal', 'Edición de Galerías');
    }

    public function Update()
    {
        $this->validate(
            [
                'descripcion' => 'required|min:6'
            ]
        );
        if ($this->foto) {
            if (file_exists(public_path('fotos/$this->foto_anterior'))) {
                $eliminar = unlink($this->foto_anterior);
                $foto_nueva = 'storage/' . $this->foto->store('fotos', 'public');
            } else {
                $foto_nueva = 'storage/' . $this->foto->store('fotos', 'public');
            }
        } else {
            $foto_nueva = $this->foto_anterior;
        }

        $foto_galeria = FotoGalerias::findOrFail($this->idFotoGaleria);
        $foto_galeria->descripcion = $this->descripcion;
        $foto_galeria->directorio = $foto_nueva;

        $foto_galeria->save();
        $this->resetUI();

        $this->emit('close-modal', 'Edición de Galerías');
        session()->flash('success', 'Fotografía Actualizada Correctamente');
        
    }

    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('swal-confirmImage', [
            'title' => 'Estás seguro que deseas eliminar la fotografía?',
            'icon' => 'warning',
            'id' => $id
        ]);
    }

    public function deleteGaleria($idFotografia)
    {
        //dd("Llegó");

        $foto_galeria = FotoGalerias::findOrFail($idFotografia);
        //dd($foto_galeria->directorio);


        $foto_galeria->delete();
        $eliminar = unlink($foto_galeria->directorio . '');
        //dd($eliminar);


        //session()->flash('message2', 'Pago por servicio eliminado correctamente');

        $this->resetUI();
    }

    function close(){
        $this->emit('close-modal', 'Edición de Galerías');
        $this->resetUI();
    }

    
}
