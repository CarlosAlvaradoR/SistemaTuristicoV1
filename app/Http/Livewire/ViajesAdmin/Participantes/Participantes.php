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


    public function mount(PaquetesTuristicos $paquete, $viaje)
    {
        $this->paquete = $paquete;
        $this->idViaje = $viaje->id;
    }
    public function render()
    {
        DB::statement("SET sql_mode = '' ");
        $clientes_reservados = DB::table('v_reserva_reservas_general as vrg')
            ->where('vrg.estado_oficial', 'PAGO COMPLETADO')
            ->where('vrg.idPaquete', $this->paquete->id)
            ->whereNotIn('vrg.idReserva', function ($query) {
                $query->select('par.reserva_id')->from('participantes as par');
            })
            ->whereNotIn('vrg.idReserva', function ($query) {
                $query->select('pr.reserva_id')->from('postergacion_reservas as pr');
            })
            ->get();
        

        $participantes = DB::table('personas as p')
            ->join('clientes as  c', 'p.id', '=', 'c.persona_id')
            ->join('reservas as r', 'c.id', '=', 'r.cliente_id')
            ->join('estado_reservas as er', 'r.estado_reservas_id', '=', 'er.id')
            ->join('participantes as parti', 'parti.reserva_id', '=', 'r.id')
            ->where('parti.viaje_paquetes_id', $this->idViaje)
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
        //VERIFICAMOS QUE EL QUE ESTÁ REALIZANDO LA RESERVA NO SE ENCUENTRE YA REGISTRADO
        $verifica = ViajesParticipantes::where('reserva_id', $idReserva)->get();
        if (count($verifica) > 0) {
            $this->alert('ALERTA', 'warning', 'El cliente ya participa de este Viaje.qw');
            return;
        }
        $viaje = ViajePaquetes::findOrFail($this->idViaje);
        $registrados = ViajesParticipantes::where('viaje_paquetes_id', $this->idViaje)->get();
        if ($viaje->cantidad_participantes == count($registrados)) {
            $this->alert('ALERTA','warning','El Viaje ya se encuentra en su máxima Capacidad');
            return;
        }

        $participantes = ViajesParticipantes::create( //Table Participantes
            [
                'viaje_paquetes_id' => $this->idViaje,
                'reserva_id' => $idReserva
            ]
        );
        
        $this->alert('MUY BIEN','success','Participante añadido corretamente al Viaje');
    }

    public function quitarParticipante(ViajesParticipantes $participantes)
    {
        $participantes->delete();
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
