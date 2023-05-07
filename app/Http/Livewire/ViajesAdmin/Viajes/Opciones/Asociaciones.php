<?php

namespace App\Http\Livewire\ViajesAdmin\Viajes\Opciones;

use App\Models\Viajes\AlmuerzoCelebraciones;
use App\Models\Viajes\Arrieros;
use App\Models\Viajes\Asociaciones as ViajesAsociaciones;
use Livewire\Component;

class Asociaciones extends Component
{
    public $idAsociaciones, $nombre, $estado;

    protected $listeners = ['deleteAsociaciones'];

    public function resetUI()
    {
        $this->reset(['idAsociaciones', 'nombre', 'estado']);
    }
    public function render()
    {
        $asociaciones = ViajesAsociaciones::all();
        return view('livewire.viajes-admin.viajes.opciones.asociaciones', compact('asociaciones'));
    }

    public function saveAsociacion()
    {
        $this->validate(
            [
                'nombre' => 'required|string|min:3',
                'estado' => 'required|numeric|min:1|max:2',
            ]
        );

        if ($this->idAsociaciones) {
            $asociaciones = ViajesAsociaciones::findOrFail($this->idAsociaciones);
            $asociaciones->nombre = $this->nombre;
            $asociaciones->estado = $this->estado;
            $asociaciones->save();
            $this->emit('close-modal');
            $title = 'MUY BIEN !';
            $icon = 'success';
            $text = 'Información de la Asociación Actualizada Satisfactoriamente';
        } else {
            $asociaciones = ViajesAsociaciones::create(
                [
                    'nombre' => $this->nombre,
                    'estado' => $this->estado
                ]
            );
            $title = 'MUY BIEN !';
            $icon = 'success';
            $text = 'Asociación Registrada Satisfactoriamente';
        }
        $this->resetUI();
        $this->alert($title, $icon, $text);
    }

    public function Edit(ViajesAsociaciones $asociaciones)
    {
        //dd($asociaciones);
        $this->idAsociaciones = $asociaciones->id;
        $this->nombre = $asociaciones->nombre;
        $this->estado = $asociaciones->estado;

        $this->emit('show-modal', 'abrir editar');
    }

    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('swal-confirm-asociaciones', [
            'title' => 'Está seguro que desea eliminar la Asociación ?',
            'icon' => 'warning',
            'id' => $id
        ]);
    }

    public function deleteAsociaciones(ViajesAsociaciones $asociaciones)
    {
        $almuerzos = AlmuerzoCelebraciones::where('asociaciones_id', $asociaciones->id)->get();
        $arrieros = Arrieros::where('asociaciones_id', $asociaciones->id)->get();

        if (count($almuerzos) > 0 || count($arrieros) > 0) {
            $this->alert('ERROR !', 'error', 'No se puede Eliminar a la Asociación porque la Información de la misma se encuentra contenida en otros módulos.');
            return;
        } else {
            $asociaciones->delete();
            $this->alert('MUY BIEN!', 'success', 'Asociación Eliminada Satisfactoriamente');
        }
        
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
