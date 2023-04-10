<?php

namespace App\Http\Livewire\ViajesAdmin\Participantes;

use App\Http\Livewire\ReservasAdmin\Reservas\Reservas;
use App\Models\Paquetes\AutorizacionesMedicas;
use App\Models\Paquetes\CondicionPuntualidades;
use App\Models\Paquetes\Riesgos;
use App\Models\PaquetesTuristicos;
use App\Models\Reservas\AutorizacionesPresentadas;
use App\Models\Reservas\CondicionesAceptadas;
use App\Models\Reservas\Reservas as ReservasReservas;
use App\Models\Reservas\RiesgosAceptados;
use App\Models\Viajes\Participantes as ViajesParticipantes;
use App\Models\Viajes\ViajePaquetes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class Participantes extends Component
{
    public $paquete, $idViaje;
    public $autorizaciones_medicas, $riesgos, $condiciones_puntualidad;

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

        /** VERIFICAMOS LAS CONDICIONES, RIESGOS Y ARCHIVOS MÉDICOS QUE SE DEBEN DE PRESENTAR */
        $this->autorizaciones_medicas = AutorizacionesMedicas::where('paquete_id', $this->paquete->id)->get();
        $this->riesgos = Riesgos::where('paquete_id', $this->paquete->id)->get();
        $this->condiciones_puntualidad = CondicionPuntualidades::where('paquete_id', $this->paquete->id)->get();
        /**  */

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

    public function AsignarParticipanteViaje(ReservasReservas $reservas)
    {
        //dd($reservas);
        //VERIFICAMOS QUE EL QUE ESTÁ REALIZANDO LA RESERVA NO SE ENCUENTRE YA REGISTRADO
        $verifica = ViajesParticipantes::where('reserva_id', $reservas->id)->get();
        if (count($verifica) > 0) {
            $this->alert('ALERTA', 'warning', 'El cliente ya participa de este Viaje.');
            return;
        }
        //VERIFICAR EL TEMA DE ARCHIVOS, CONDICIONES Y RUESGOS
        if (count($this->riesgos) > 0) {
            //VERIFICAMOS SI ACEPTÓ AL MENOS UN RIESGO
            $consulta_riesgo_aceptado = RiesgosAceptados::where('reserva_id', $reservas->id)->get();
            if (count($consulta_riesgo_aceptado) == 0) {
                $this->alert('ALERTA', 'error', 'El cliente Aún No Acepta los Riesgos. Por favor vaya a: ' . Request::root() . '/paquetes/reserva/condiciones-riesgos-justificacionMedica/' . $reservas->slug);
                return;
            }
        }
        if (count($this->condiciones_puntualidad) > 0) {
            //VERIFICAMOS SI ACEPTÓ AL MENOS UNA CONDICIÓN
            $consulta_condiciones_aceptadas = CondicionesAceptadas::where('reserva_id', $reservas->id)->get();
            if (count($consulta_condiciones_aceptadas) == 0) {
                $this->alert('ALERTA', 'error', 'El cliente Aún No Acepta las Condiciones de Puntualidad. Por favor vaya a: '. Request::root() . '/paquetes/reserva/condiciones-riesgos-justificacionMedica/' . $reservas->slug);
                return;
            }
        }
        if (count($this->autorizaciones_medicas) > 0) {
            //VERIFICAMOS SI ACEPTÓ AL MENOS UNA CONDICIÓN
            $consulta_autorizaciones_aceptadas = AutorizacionesPresentadas::where('reserva_id', $reservas->id)->get();
            if (count($consulta_autorizaciones_aceptadas) == 0) {
                $this->alert('ALERTA', 'error', 'El cliente Aún No Sube un archivo de Autorización Requerido para este Viaje. Por favor vaya a: '. Request::root() . '/paquetes/reserva/condiciones-riesgos-justificacionMedica/' . $reservas->slug);
                return;
            }
        }



        $viaje = ViajePaquetes::findOrFail($this->idViaje);
        $registrados = ViajesParticipantes::where('viaje_paquetes_id', $this->idViaje)->get();
        if ($viaje->cantidad_participantes == count($registrados)) {
            $this->alert('ALERTA', 'warning', 'El Viaje ya se encuentra en su máxima Capacidad');
            return;
        }

        $participantes = ViajesParticipantes::create( //Table Participantes
            [
                'viaje_paquetes_id' => $this->idViaje,
                'reserva_id' => $reservas->id
            ]
        );

        $this->alert('MUY BIEN', 'success', 'Participante añadido corretamente al Viaje');
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
