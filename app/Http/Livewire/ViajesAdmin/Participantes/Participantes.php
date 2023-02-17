<?php

namespace App\Http\Livewire\ViajesAdmin\Participantes;

use App\Models\PaquetesTuristicos;
use App\Models\Viajes\Participantes as ViajesParticipantes;
use App\Models\Viajes\ViajePaquetes;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Participantes extends Component
{
    public $paquete, $idViaje;


    public function mount(PaquetesTuristicos $paquete, $idViaje)
    {
        $this->paquete = $paquete;
        $this->idViaje = $idViaje;
    }
    public function render()
    {

        $clientes_reservados = DB::table('personas as p')
            ->join('clientes as  c', 'p.id', '=', 'c.persona_id')
            ->join('reservas as r', 'c.id', '=', 'r.cliente_id')
            ->join('estado_reservas as er', 'r.estado_reservas_id', '=', 'er.id')
            ->select(
                DB::raw('CONCAT(p.nombre, " ", p.apellidos) AS datos'),
                'r.id as idReserva',
                'r.fecha_reserva'
            )
            ->where('er.nombre_estado', 'COMPLETADO')
            ->where('r.paquete_id', $this->paquete->id)
            ->whereNOTIn('r.id', function ($query) {
                $query->select('par.reserva_id')->from('participantes as par');
            })
            ->get();

        $participantes = DB::table('personas as p')
            ->join('clientes as  c', 'p.id', '=', 'c.persona_id')
            ->join('reservas as r', 'c.id', '=', 'r.cliente_id')
            ->join('estado_reservas as er', 'r.estado_reservas_id', '=', 'er.id')
            ->join('participantes as parti', 'parti.reserva_id', '=', 'r.id')
            ->select(
                DB::raw('CONCAT(p.nombre, " ", p.apellidos) AS datos'),
                'parti.id'
            )
            ->get();

        return view('livewire.viajes-admin.participantes.participantes', compact(
            'clientes_reservados',
            'participantes'
        ));
    }

    public function AsignarParticipanteViaje($idReserva)
    {
        $viaje = ViajePaquetes::findOrFail($this->idViaje);
        $registrados = ViajesParticipantes::where('viaje_paquetes_id', $this->idViaje)->get();
        if ($viaje->cantidad_participantes == count($registrados)) {
            $this->dispatchBrowserEvent('swal', [
                'title' => 'ALERTA',
                'icon' => 'warning',
                'text' => 'El Viaje ya se encuentra en su máxima Capacidad'
            ]);

            return;
        }

        $par = ViajesParticipantes::create( //Table Participantes
            [
                'viaje_paquetes_id' => $this->idViaje,
                'reserva_id' => $idReserva
            ]
        );

        $this->dispatchBrowserEvent('swal', [
            'title' => 'MUY BIEN',
            'icon' => 'success',
            'text' => 'Participante añadido corretamente al Viaje'
        ]);
    }

    public function quitarParticipante(ViajesParticipantes $participantes){
        $participantes->delete();
    }
}
