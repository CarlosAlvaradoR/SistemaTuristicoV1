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


    public $search;
    public $reserva;
    public $id_reserva;
    public $nombre_del_evento;

    public function mount(Reservas $reserva)
    {
        $this->reserva = $reserva;
        $this->id_reserva = $this->reserva->id;
    }

    public function render()
    {
        $eventos = DB::table("evento_postergaciones")->select('*')
            ->whereNOTIn('id', function ($query) {
                $query->select('evento_postergaciones_id')->from('postergacion_reservas')
                    ->where('reserva_id', '=', $this->reserva->id);
            })
            ->where('evento_postergaciones.nombre_evento','like','%'.$this->search.'%')
            ->paginate(10);

        $eventos_aceptados = EventoPostergaciones::select(
            //'evento_postergaciones.id',
            'evento_postergaciones.nombre_evento',
            'pr.id as idPostergacion'
        )
            ->join('postergacion_reservas as pr', 'evento_postergaciones.id', '=', 'pr.evento_postergaciones_id')
            ->where('pr.reserva_id', '=', $this->reserva->id)
            ->get();
        
        return view(
            'livewire.reservas-admin.reservas.eventos-postergacion.eventos-postergacion',
            compact('eventos', 'eventos_aceptados')
        );
    }

    public function agregarEventoReserva(EventoPostergaciones $evento)
    {
        $postergacion = PostergacionReservas::create([
            'fecha_postergacion' => now(),
            'reserva_id' => $this->id_reserva,
            'evento_postergaciones_id' => $evento->id
        ]);
    }

    public function crearEvento()
    {
        $validatedData = $this->validate([
            'nombre_del_evento' => 'required|min:3'
        ]);

        $evento = EventoPostergaciones::create([
            'nombre_evento' => $this->nombre_del_evento
        ]);

        $this->reset(['nombre_del_evento']);
    }

    public function quitarEventoReserva(PostergacionReservas $postergacion)
    {
        $postergacion->delete();
    }

    public function EliminarEvento()
    {
    }

    public function EditarEvento()
    {
    }
}
