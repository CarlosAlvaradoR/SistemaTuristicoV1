<?php

namespace App\Http\Livewire\ReservasAdmin\Reservas\SolicitudesDevolucion;

use App\Models\Reservas\DevolucionDineros;
use App\Models\Reservas\Reservas;
use Livewire\Component;
use App\Models\Reservas\SolicitudDevolucionDineros;
use Illuminate\Support\Facades\DB;

class SolicitudesDevolucion extends Component
{
    public $id_solicitud,$fecha_presentacion = '', $estado_solicitud = '', $observacion_de_la_solicitud = ''; //Para presentar Solicitud
    public $reserva;
    public $monto_devolucion, $observacion_devolucion, $fecha_hora;
    public $solicitud, $devolucion_dinero, $query, $id_reserva;
    public $solicitud_existe = false, $solicitud_dinero_existe = false;

    public function mount(Reservas $reserva)
    {
        //Verificar si ya llenó una solicitud --> Si ya llenó verificar si ya llenó una devolución
        $this->reserva = $reserva;
        $this->id_reserva = $this->reserva->id;
    }


    public function render()
    {
        $this->query = "SELECT id, fecha_presentacion, estado, observacion, reserva_id FROM 
        solicitud_devolucion_dineros WHERE reserva_id = $this->id_reserva LIMIT 1";

        $this->solicitud = DB::select($this->query);
        if ($this->solicitud) {
            $this->id_solicitud = $this->solicitud[0]->id;
            $this->fecha_presentacion = $this->solicitud[0]->fecha_presentacion;
            $this->estado_solicitud = $this->solicitud[0]->estado;
            $this->observacion_de_la_solicitud = $this->solicitud[0]->observacion;
            $this->solicitud_existe = true;

            $query_devolucion = DB::select("SELECT id, monto, observacion, fecha_hora, solicitud_devolucion_dinero_id FROM 
            devolucion_dineros
            WHERE solicitud_devolucion_dinero_id = $this->id_solicitud 
            LIMIT 1");

            if ($query_devolucion) {
                $this->monto_devolucion = $query_devolucion[0]->monto; 
                $this->observacion_devolucion = $query_devolucion[0]->observacion; 
                $this->fecha_hora = $query_devolucion[0]->fecha_hora;
                $this->solicitud_dinero_existe = true;
            }
        }
        return view('livewire.reservas-admin.reservas.solicitudes-devolucion.solicitudes-devolucion');
    }

    public function guardarSolicitud()
    {
        //dd('Guardando Solicitud');
        $solicitud = SolicitudDevolucionDineros::create([
            'fecha_presentacion' => $this->fecha_presentacion,
            'estado' => $this->estado_solicitud,
            'observacion' => $this->observacion_de_la_solicitud,
            'reserva_id' => $this->reserva->id
        ]);
        session()->flash('mensaje-confirmacion-solicitud', 'Se registró correctamente la Solicitud para la Devolución de Dinero');
    }

    public function guardarDevolucionDinero()
    {
        $devolucion_dinero = DevolucionDineros::create([
            'monto' => $this->monto_devolucion,
            'observacion' => $this->observacion_devolucion,
            'fecha_hora' => $this->fecha_hora,
            'solicitud_devolucion_dinero_id' => $this->id_solicitud
        ]);

        session()->flash('mensaje-confirmacion-devolucion', 'Se registró correctamente la Devolución de Dinero');
    }

    public function UpdateSolicitud(){

    }

    public function UpdateDevolucion(){

    }
    public function EliminarSolicitud(){

    }

    public function EliminarDevolucion(){

    }

}
