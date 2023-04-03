<?php

namespace App\Http\Livewire\ViajesAdmin\Viajes\Opciones;

use App\Models\Viajes\Hoteles as ViajesHoteles;
use Livewire\Component;

class Hoteles extends Component
{
    public $idHoteles, $nombre, $direccion, $telefono, $email;

    function resetUI(){
        $this->reset(['idHoteles','nombre','direccion','telefono','email']);
    }

    public function render()
    {
        $hoteles = ViajesHoteles::all(['id','nombre', 'direccion', 'telefono', 'email']);
        return view('livewire.viajes-admin.viajes.opciones.hoteles', compact('hoteles'));
    }


    public function saveHotel()
    {
        $this->validate([
            'nombre' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'email' => 'required',
        ]);

        if ($this->idHoteles) {
            $hoteles = ViajesHoteles::findOrFail($this->idHoteles);
            $hoteles->nombre = $this->nombre;
            $hoteles->direccion = $this->direccion;
            $hoteles->telefono = $this->telefono;
            $hoteles->email = $this->email;
            $hoteles->save();
            $title = 'MUY BIEN !';
            $icon = 'success';
            $text = 'El Hotel se ha Actualizado satisfactoriamente';
            
        } else {
            $hoteles = ViajesHoteles::create(
                [
                    'nombre' => $this->nombre,
                    'direccion' => $this->direccion,
                    'telefono' => $this->telefono,
                    'email' => $this->email
                ]
            );
            $title = 'MUY BIEN !';
            $icon = 'success';
            $text = 'El Hotel se ha registrado satisfactoriamente';
        }
        $this->resetUI();
        $this->alert($title, $icon, $text);
    }

    public function Edit(ViajesHoteles $hoteles)
    {
        //dd($asociaciones);
        $this->idHoteles = $hoteles->id;
        $this->nombre = $hoteles->nombre;
        $this->direccion = $hoteles->direccion;
        $this->telefono = $hoteles->telefono;
        $this->email = $hoteles->email;

        $this->emit('show-modal', 'abrir editar');
    }


    function alert($title, $icon, $text)
    {
        $this->dispatchBrowserEvent('swal', [
            'title' => $title,
            'icon' => $icon,
            'text' => $text
        ]);
    }
}
