<?php

namespace App\Http\Livewire\ReservasAdmin\Reservas\SolicitudesDevolucion;

use Livewire\WithFileUploads;
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
    use WithFileUploads;


    public $reserva;
    public $cliente, $persona;
    /** ATRUBUTOS GENERALES */
    public $datos, $dni, $nombre_paquete, $fecha_reserva;
    /** ATRIBUTOS DE POSTERGACIÓN RESERVAS */
    public $idPostergacionReserva;
    public $fecha_postergacion, $descripcion_motivo, $documento_sustentatorio, $evento, $pago, $monto_solicitado, $ver_documento;
    /** ATRIBUTO DE SOLICITUD DEVOLUCIÓN DINEROS */
    public $idSolicitudDevolucionDineros, $pedido, $fecha_presentacion, $estado_solicitud, $descripcion_de_solicitud = ''; //Para presentar Solicitud
    /** ATRIBUTOS DE SOLICITUD PAGOS */
    public $observacion_de_pago, $idSolicitudPagos, $estado_de_solicitud = '';
    /** ATRIBUTOS DE DEVOLUCIÓN DE DINEROS */
    public $monto_devolucion, $observacion_devolucion, $fecha_hora, $idDevolucionDineros;
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
            $this->ver_documento = $postergacion_reserva[0]->documento_sustentatorio;
        }
        if ($this->idPostergacionReserva) {
            # code...
            $solicitudDevolucionDineros = SolicitudDevolucionDineros::where('postergacion_reservas_id', $this->idPostergacionReserva)
                ->limit(1)
                ->get();
            //dd($solicitudDevolucionDineros);
            if (count($solicitudDevolucionDineros) > 0) {
                $this->idSolicitudDevolucionDineros = $solicitudDevolucionDineros[0]->id;
                $this->pedido = $solicitudDevolucionDineros[0]->pedido;
                $this->fecha_presentacion = $solicitudDevolucionDineros[0]->fecha_presentacion;
                $this->estado_solicitud = $solicitudDevolucionDineros[0]->estado;
                $this->descripcion_de_solicitud = $solicitudDevolucionDineros[0]->descripcion_solicitud;
            }
        }

        $eventos = EventoPostergaciones::all(['id', 'nombre_evento']);
        $pagos = DB::table('pagos as p')
            ->join('cuenta_pagos as cp', 'cp.id', '=', 'p.cuenta_pagos_id')
            ->join('tipo_pagos as tp', 'tp.id', '=', 'cp.tipo_pagos_id')
            ->where('p.reserva_id', $this->reserva->id)
            ->select(
                'p.id',
                'monto',
                'fecha_pago',
                'estado_pago',
                'ruta_archivo_pago',
                'tp.nombre_tipo_pago',
                'cp.numero_cuenta'
            )
            ->get();

        $solicitud_pagos = DB::table('solicitud_pagos as sp')
            ->join('pagos as p', 'sp.pagos_id', '=', 'p.id')
            ->where('p.reserva_id', $this->reserva->id)
            ->select('sp.id', 'sp.estdo_solicitud', 'sp.observacion', 'p.monto')
            ->get();

        $solicitud_pagos_devoluciones = DB::table('solicitud_pagos as sp')
            ->join('pagos as p', 'sp.pagos_id', '=', 'p.id')
            ->leftJoin('devolucion_dineros as dd', 'dd.solicitud_pagos_id', '=', 'sp.id')
            ->where('p.reserva_id', $this->reserva->id)
            ->select(
                'sp.id',
                'sp.estdo_solicitud',
                'sp.observacion',
                'p.monto',
                'dd.monto as montoDevolucion',
                'dd.observacion as observacionDevolucion',
                'dd.fecha_hora'
            )
            ->get();

        return view('livewire.reservas-admin.reservas.solicitudes-devolucion.solicitudes-devolucion',
            compact(
                'eventos',
                'pagos',
                'solicitud_pagos',
                'solicitud_pagos_devoluciones'
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
                'documento_sustentatorio' => 'nullable|mimes:pdf,jpeg,jpg,png',
            ]
        );
        $evento = null;
        if ($this->evento) {
            $evento = $this->evento;
        }
        if ($this->idPostergacionReserva) {
            # Actualizo
            $documento = $this->ver_documento;
            if ($this->documento_sustentatorio) {
                if ($this->ver_documento) {
                    $eliminar = unlink($this->ver_documento);
                }
                $documento = 'storage/' . $this->documento_sustentatorio->store('documentos_sustentatorios_postergacion', 'public');
            }
            $postergacion = PostergacionReservas::findOrFail($this->idPostergacionReserva);
            $postergacion->fecha_postergacion = $this->fecha_postergacion;
            $postergacion->descripcion_motivo = $this->descripcion_motivo;
            $postergacion->documento_sustentatorio = $documento;
            $postergacion->evento_postergaciones_id = $this->evento;
            $postergacion->save();
            $msg = 'Se Actualizó correctamente el Evento de Postergación Correspondiente a la Reserva';
        } else {
            # Creando
            $documento = '';
            if ($this->documento_sustentatorio) {
                $documento = 'storage/' . $this->documento_sustentatorio->store('documentos_sustentatorios_postergacion', 'public');
            }
            $postergacion = PostergacionReservas::create(
                [
                    'fecha_postergacion' => $this->fecha_postergacion,
                    'descripcion_motivo' => $this->descripcion_motivo,
                    'documento_sustentatorio' => $documento,
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
                'pedido' => 'required|string|min:1|max:45',
                'fecha_presentacion' => 'required|date',
                //'estado_solicitud' => 'required|numeric|min:1',
                'descripcion_de_solicitud' => 'nullable|string|min:5',
            ]
        );
        //dd('Guardando Solicitud');
        if ($this->idSolicitudDevolucionDineros) {
            # Actualizar
            $solicitud = SolicitudDevolucionDineros::findOrFail($this->idSolicitudDevolucionDineros);
            $solicitud->pedido = $this->pedido;
            $solicitud->estado = $this->estado_solicitud;
            $solicitud->fecha_presentacion = $this->fecha_presentacion;
            $solicitud->descripcion_solicitud = $this->descripcion_de_solicitud;
            $solicitud->save();
            $msg = 'Se Actualizó Correctamente la Información de la Solicitud';
        } else {
            # CRear
            $solicitud = SolicitudDevolucionDineros::create([
                'pedido' => $this->pedido,
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

    public function selectSolicitudPagos(SolicitudPagos $solicitud, int $opcion)
    {
        //dd($solicitud);
        switch ($opcion) {
            case 1:
                # Seleccionar Solicitud Pagos
                $this->idSolicitudPagos = $solicitud->id;
                $this->observacion_de_pago = $solicitud->observacion;
                $pago = Pagos::findOrFail($solicitud->pagos_id, ['monto']);
                $this->monto_solicitado = $pago->monto;
                break;
            case 2:
                # Seleccionar Solicitud Pagos Devolución
                $devolucion_dineros = DevolucionDineros::where('solicitud_pagos_id', $solicitud->id)
                    ->limit(1)
                    ->get();
                //dd($devolucion_dineros);
                if (count($devolucion_dineros) > 0) {
                    # code...
                    $this->idDevolucionDineros = $devolucion_dineros[0]->id;
                    $this->observacion_devolucion = $devolucion_dineros[0]->observacion;
                    $this->monto_devolucion = $devolucion_dineros[0]->monto;
                    $this->fecha_hora = $devolucion_dineros[0]->fecha_hora;
                }
                $this->idSolicitudPagos = $solicitud->id;
                $this->observacion_de_pago = $solicitud->observacion;
                $pago = Pagos::findOrFail($solicitud->pagos_id, ['monto']);
                $this->monto_solicitado = $pago->monto;
                $this->estado_de_solicitud = $solicitud->estdo_solicitud;
                break;

            default:
                # Seleccionnar Solicitud Pagos Devolución...
                break;
        }
    }

    public function saveDevolucionDinero()
    {
        $this->validate(
            [
                'monto_devolucion' => 'nullable|min:1',
                'fecha_hora' => 'nullable|date',
                'observacion_devolucion' => 'nullable|string|min:5',
            ]
        );
        if ($this->idDevolucionDineros) {
            # Actuaizo
            $solicitud_pagos = SolicitudPagos::findOrFail($this->idSolicitudPagos);
            $solicitud_pagos->estdo_solicitud = $this->estado_de_solicitud;
            $solicitud_pagos->save();

            $devolucion_dinero = DevolucionDineros::findOrFail($this->idDevolucionDineros);
            $devolucion_dinero->monto = $this->monto_devolucion;
            $devolucion_dinero->observacion = $this->observacion_devolucion;
            $devolucion_dinero->fecha_hora = $this->fecha_hora;
            $devolucion_dinero->save();

            $msg = 'Información de Devolución Actualizada Correctamente';
        } else {
            # Creamos
            $solicitud_pagos = SolicitudPagos::findOrFail($this->idSolicitudPagos);
            $solicitud_pagos->estdo_solicitud = $this->estado_de_solicitud;
            $solicitud_pagos->save();

            $devolucion_dinero = DevolucionDineros::create([
                'monto' => $this->monto_devolucion,
                'observacion' => $this->observacion_devolucion,
                'fecha_hora' => $this->fecha_hora,
                'solicitud_pagos_id' => $this->idSolicitudPagos
            ]);
            $msg = 'Información de Devolución Registrada Correctamente';
        }


        $this->dispatchBrowserEvent('swal', [
            'title' => 'MUY BIEN !',
            'icon' => 'success',
            'text' => $msg
        ]);
    }
}
