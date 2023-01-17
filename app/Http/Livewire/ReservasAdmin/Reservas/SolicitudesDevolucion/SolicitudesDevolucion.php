<?php

namespace App\Http\Livewire\ReservasAdmin\Reservas\SolicitudesDevolucion;

use App\Models\Reservas\DevolucionDineros;
use App\Models\Reservas\Reservas;
use Livewire\Component;
use App\Models\Reservas\SolicitudDevolucionDineros;
class SolicitudesDevolucion extends Component
{
    public $fecha_presentacion = '', $estado_solicitud = '', $observacion_de_la_solicitud = ''; //Para presentar Solicitud
    public $reserva;
    public $monto_devolucion, $observacion_devolucion, $fecha_hora;

    public function mount(Reservas $reserva)
    {
        $this->reserva = $reserva;
    }


    public function render()
    {
        return view('livewire.reservas-admin.reservas.solicitudes-devolucion.solicitudes-devolucion');
    }

    public function guardarSolicitud(){
        //dd('Guardando Solicitud');
        $solicitud = SolicitudDevolucionDineros::create([
            'fecha_presentacion' => $this->fecha_presentacion, 
            'estado' => $this->estado_solicitud, 
            'observacion' => $this->observacion_de_la_solicitud, 
            'reserva_id' => $this->reserva->id
        ]);
        //dd('Guardados');
    }

    public function guardarDevolucionDinero(){
        $devolucion_dinero = DevolucionDineros::create([
            'monto' => $this->monto_devolucion, 
            'observacion' => $this->observacion_devolucion, 
            'fecha_hora' => $this->fecha_hora,
            'solicitud_devolucion_dinero_id' => 1
        ]);
        
    }
}
