<?php

namespace App\Http\Livewire\ReservasAdmin\Reservas\EventosPostergacion;

use App\Models\Reservas\EventoPostergaciones;
use App\Models\Reservas\PostergacionReservas;
use App\Models\Reservas\Reservas;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class EventosPostergacion extends Component
{
    use WithPagination;


    public $search = '';
    public $reserva;
    public $id_reserva;
    public $idEvento, $nombre_del_evento;
    public $title = 'CREAR EVENTO DE POSTERGACIÓN';

    //
    protected $listeners = ['quitarEventoReserva'];

    public function render()
    {
        $eventos = EventoPostergaciones::where('nombre_evento', 'like', '%' . $this->search . '%')->get();

        return view(
            'livewire.reservas-admin.reservas.eventos-postergacion.eventos-postergacion',
            compact('eventos')
        );
    }



    public function crearEvento()
    {
        $validatedData = $this->validate([
            'nombre_del_evento' => 'required|min:3'
        ]);
        if ($this->idEvento) {
            $evento = EventoPostergaciones::findOrFail($this->idEvento);
            $evento->nombre_evento = strtoupper($this->nombre_del_evento);
            $evento->save();
            $msg = 'Evento de Postergación Actualizada Correctamente';
            $this->emit('close-modal', 'Edicion de Mapas');
        } else {
            $evento = EventoPostergaciones::create([
                'nombre_evento' => strtoupper($this->nombre_del_evento)
            ]);
            $msg = 'Evento de Postergación Creado Correctamente';
        }



        $this->dispatchBrowserEvent('swal', [
            'title' => 'MUY BIEN !',
            'icon' => 'success',
            'text' => $msg
        ]);

        $this->reset(['nombre_del_evento']);
    }

    public function Edit(EventoPostergaciones $evento)
    {
        //dd($evento);
        $this->idEvento = $evento->id;
        $this->nombre_del_evento = $evento->nombre_evento;
        $this->title = 'EDITAR EVENTO DE POSTERGACIÓN';

        $this->emit('show-modal', 'Edicion de Mapas');
    }

    public function deleteConfirm($id)
    {

        $this->dispatchBrowserEvent('swal-confirmEvento', [
            'title' => 'Estás seguro que deseas eliminar el Evento?', //SA0000050343
            'icon' => 'warning',
            'id' => $id
        ]);
    }

    public function quitarEventoReserva(EventoPostergaciones $evento)
    {
        $postergacion = PostergacionReservas::where('evento_postergaciones_id', $evento->id)->get();
        if (count($postergacion) > 0) {

            $msg = 'No se puede Eliminar el Evento porque ya fue registrada en una solicitud';
        } else {
            $evento->delete();
            $msg = 'Eliminado Correctamente';
        }

        $this->dispatchBrowserEvent('swal', [
            'title' => 'MUY BIEN !',
            'icon' => 'success',
            'text' => $msg
        ]);
    }

    public function EliminarEvento()
    {
    }
}
