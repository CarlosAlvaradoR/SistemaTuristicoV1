<?php

namespace App\Http\Livewire\ReservasAdmin\Reservas\SolicitudesDevolucion;

use App\Models\Personas;
use App\Models\Reservas\Clientes;
use App\Models\Reservas\DevolucionDineros;
use App\Models\Reservas\EventoPostergaciones;
use App\Models\Reservas\Pagos;
use App\Models\Reservas\PostergacionReservas;
use App\Models\Reservas\Reservas;
use Livewire\Component;
use App\Models\Reservas\SolicitudDevolucionDineros;
use App\Models\Reservas\SolicitudPagos;
use Illuminate\Support\Facades\DB;

class SolicitudesDevolucion extends Component
{
    public $reserva;
    public $cliente, $persona;
    /** ATRUBUTOS GENERALES */
    public $datos, $dni, $nombre_paquete, $fecha_reserva;
    /** ATRIBUTOS DE POSTERGACIÓN RESERVAS */
    public $idPostergacionReserva;
    public $fecha_postergacion, $descripcion_motivo, $evento, $pago, $monto_solicitado;
    /** ATRIBUTO DE SOLICITUD DEVOLUCIÓN DINEROS */
    public $idSolicitudDevolucionDineros, $fecha_presentacion, $estado_solicitud, $descripcion_de_solicitud = ''; //Para presentar Solicitud
    /** ATRIBUTOS DE SOLICITUD PAGOS */
    public $observacion_de_pago, $idSolicitudPagos;

    public $monto_devolucion, $observacion_devolucion, $fecha_hora;
    public $solicitud, $devolucion_dinero, $query, $id_reserva;
    public $solicitud_existe = false, $solicitud_dinero_existe = false;

    public function mount(Reservas $reserva)
    {
        //Verificar si ya llenó una solicitud --> Si ya llenó verificar si ya llenó una devolución

        $this->reserva = $reserva;
        $this->cliente = Clientes::findOrFail($reserva->cliente_id, ['persona_id']);
        $this->persona = DB::table('personas as p')
            ->join('clientes as c', 'c.persona_id', '=', 'p.id')
            ->join('reservas as r', 'r.cliente_id', '=', 'c.id')
            ->join('paquetes_turisticos as pt', 'pt.id', '=', 'r.paquete_id')
            ->where('r.id', $reserva->id)
            ->select(
                DB::raw('CONCAT(p.nombre," ", p.apellidos) as datos'),
                'p.dni',
                'pt.nombre',
                'r.fecha_reserva'
            )
            ->get();
        $this->datos = $this->persona[0]->datos;
        $this->dni = $this->persona[0]->dni;
        $this->nombre_paquete = $this->persona[0]->nombre;
        $this->fecha_reserva = $this->persona[0]->fecha_reserva;

        $this->id_reserva = $this->reserva->id;
    }


    public function render()
    {
        $postergacion_reserva = PostergacionReservas::where('reserva_id', $this->reserva->id)
            ->limit(1)
            ->get();
        if (count($postergacion_reserva) > 0) {
            $this->idPostergacionReserva = $postergacion_reserva[0]->id;
            $this->fecha_postergacion = $postergacion_reserva[0]->fecha_postergacion;
            $this->descripcion_motivo = $postergacion_reserva[0]->descripcion_motivo;
            $this->evento = $postergacion_reserva[0]->evento_postergaciones_id;
        }
        if ($this->idPostergacionReserva) {
            # code...
            $solicitudDevolucionDineros = SolicitudDevolucionDineros::where('postergacion_reservas_id', $this->idPostergacionReserva)
                ->limit(1)
                ->get();
            if (count($solicitudDevolucionDineros) > 0) {
                $this->idSolicitudDevolucionDineros = $solicitudDevolucionDineros[0]->id;
                $this->fecha_presentacion = $solicitudDevolucionDineros[0]->fecha_presentacion;
                $this->descripcion_de_solicitud = $solicitudDevolucionDineros[0]->descripcion_solicitud;
            }
        }

        $eventos = EventoPostergaciones::all(['id', 'nombre_evento']);
        $pagos = DB::table('pagos as p')
            ->join('tipo_pagos as tp', 'tp.id', '=', 'p.tipo_pagos_id')
            ->where('p.reserva_id', $this->reserva->id)
            ->select('p.id', 'monto', 'fecha_pago', 'estado_pago', 'ruta_archivo_pago', 'tp.nombre_tipo_pago')
            ->get();

        $solicitud_pagos = DB::table('solicitud_pagos as sp')
            ->join('pagos as p', 'sp.pagos_id', '=', 'p.id')
            ->where('p.reserva_id', $this->reserva->id)
            ->select('sp.id', 'sp.estdo_solicitud', 'sp.observacion', 'p.monto')
            ->get();
        /*$this->solicitud = DB::select($this->query);
        if ($this->solicitud) {
            $this->idSolicitudDevolucionDineros = $this->solicitud[0]->id;
            $this->fecha_presentacion = $this->solicitud[0]->fecha_presentacion;
            $this->estado_solicitud = $this->solicitud[0]->estado;
            $this->descripcion_de_solicitud = $this->solicitud[0]->observacion;
            $this->solicitud_existe = true;

            $query_devolucion = DB::select("SELECT id, monto, observacion, fecha_hora, solicitud_devolucion_dinero_id FROM 
            devolucion_dineros
            WHERE solicitud_devolucion_dinero_id = $this->idSolicitudDevolucionDineros 
            LIMIT 1");

            if ($query_devolucion) {
                $this->monto_devolucion = $query_devolucion[0]->monto; 
                $this->observacion_devolucion = $query_devolucion[0]->observacion; 
                $this->fecha_hora = $query_devolucion[0]->fecha_hora;
                $this->solicitud_dinero_existe = true;
            }
        }*/
        return view(
            'livewire.reservas-admin.reservas.solicitudes-devolucion.solicitudes-devolucion',
            compact(
                'eventos',
                'pagos',
                'solicitud_pagos'
            )
        );
    }
    public function saveEventoPostergacion()
    {
        $this->validate(
            [
                'fecha_postergacion' => 'required|date',
                'descripcion_motivo' => 'required|string|min:5',
                'evento' => 'nullable|numeric|min:1',
            ]
        );
        $evento = null;
        if ($this->evento) {
            $evento = $this->evento;
        }
        if ($this->idPostergacionReserva) {
            # Actualizo
            $postergacion = PostergacionReservas::findOrFail($this->idPostergacionReserva);
            $postergacion->fecha_postergacion = $this->fecha_postergacion;
            $postergacion->descripcion_motivo = $this->descripcion_motivo;
            $postergacion->evento_postergaciones_id = $this->evento;
            $postergacion->save();
            $msg = 'Se Actualizó correctamente el Evento de Postergación Correspondiente a la Reserva';
        } else {
            # Creando
            $postergacion = PostergacionReservas::create(
                [
                    'fecha_postergacion' => $this->fecha_postergacion,
                    'descripcion_motivo' => $this->descripcion_motivo,
                    'reserva_id' => $this->reserva->id,
                    'evento_postergaciones_id' => $evento
                ]
            );
            $msg = 'Se añadió correctamente el Evento de Postergación Correspondiente a la Reserva';
        }



        $this->dispatchBrowserEvent('swal', [
            'title' => 'MUY BIEN !',
            'icon' => 'success',
            'text' => $msg
        ]);
    }

    public function AñadirPagoSolicitadoAlProceso(Pagos $pago)
    {
        $this->pago = $pago;
        $this->monto_solicitado = $pago->monto;
    }


    public function guardarSolicitud()
    {
        $this->validate(
            [
                'fecha_presentacion' => 'required|date',
                //'estado_solicitud' => 'required|numeric|min:1',
                'descripcion_de_solicitud' => 'nullable|string|min:5',
            ]
        );
        //dd('Guardando Solicitud');
        if ($this->idSolicitudDevolucionDineros) {
            # Actualizar
            $solicitud = SolicitudDevolucionDineros::findOrFail($this->idSolicitudDevolucionDineros);
            $solicitud->fecha_presentacion = $this->fecha_presentacion;
            $solicitud->descripcion_solicitud = $this->descripcion_de_solicitud;
            $solicitud->save();
            $msg = 'Se Actualizó Correctamente la Información de la Solicitud';
        } else {
            # CRear
            $solicitud = SolicitudDevolucionDineros::create([
                'fecha_presentacion' => $this->fecha_presentacion,
                'estado' => 'POR PROCESAR',
                'descripcion_solicitud' => $this->descripcion_de_solicitud,
                'postergacion_reservas_id' => $this->idPostergacionReserva
            ]);
            $msg = 'Solicitud Creada Correctamente';
        }



        $this->dispatchBrowserEvent('swal', [
            'title' => 'MUY BIEN !',
            'icon' => 'success',
            'text' => $msg
        ]);
    }


    public function saveSolicitudPagos()
    {
        if ($this->idSolicitudPagos) {
            # Actualizar
            $solicitud_pagos = SolicitudPagos::findOrFail($this->idSolicitudPagos);
            $solicitud_pagos->observacion = $this->observacion_de_pago;
            $solicitud_pagos->save();
            $this->reset(['idSolicitudPagos', 'monto_solicitado']);
            $msg = 'Se Actualizó Satisfactoriamente la Solicitud del Pago';
        } else {
            # Crear
            $solicitud_pagos = SolicitudPagos::create(
                [
                    'estdo_solicitud' => 'NO DEVUELTO',
                    'observacion' => $this->observacion_de_pago,
                    'solicitud_devolucion_dinero_id' => $this->idSolicitudDevolucionDineros,
                    'pagos_id' => $this->pago->id
                ]
            );
            $msg = 'Solicitud de Devolución de Pago registrada Corrrectamente';
        }



        $this->dispatchBrowserEvent('swal', [
            'title' => 'MUY BIEN !',
            'icon' => 'success',
            'text' => $msg
        ]);
    }

    public function selectSolicitudPagos(SolicitudPagos $solicitud)
    {
        $this->idSolicitudPagos = $solicitud->id;
        $this->observacion_de_pago = $solicitud->observacion;
        $pago = Pagos::findOrFail($solicitud->pagos_id, ['monto']);
        $this->monto_solicitado = $pago->monto;
    }

    public function guardarDevolucionDinero()
    {
        $devolucion_dinero = DevolucionDineros::create([
            'monto' => $this->monto_devolucion,
            'observacion' => $this->observacion_devolucion,
            'fecha_hora' => $this->fecha_hora,
            'solicitud_devolucion_dinero_id' => $this->idSolicitudDevolucionDineros
        ]);

        session()->flash('mensaje-confirmacion-devolucion', 'Se registró correctamente la Devolución de Dinero');
    }

    public function UpdateSolicitud()
    {
    }

    public function UpdateDevolucion()
    {
    }
    public function EliminarSolicitud()
    {
    }

    public function EliminarDevolucion()
    {
    }
}
