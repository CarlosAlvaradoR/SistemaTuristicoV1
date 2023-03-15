<?php

namespace App\Http\Controllers;

use App\Models\Paquetes\CondicionPuntualidades;
use App\Models\Paquetes\Riesgos;
use App\Models\PaquetesTuristicos;
use App\Models\Personas;
use App\Models\Reservas\Reservas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpParser\Node\Stmt\Return_;

class ReservasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservas\Reservas  $reservas
     * @return \Illuminate\Http\Response
     */
    public function show(Reservas $reservas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservas\Reservas  $reservas
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservas $reservas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservas\Reservas  $reservas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservas $reservas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservas\Reservas  $reservas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservas $reservas)
    {
        //
    }

    public function reservar(PaquetesTuristicos $slug)
    {

        return view('reservar_admin.index', compact('slug'));
    }

    public function reservarCrearCliente()
    {

        return view('reservar_admin.create');
    }

    public function reservaCondicionesPuntualidad(Reservas $reserva)
    {
        //$sql = "SELECT * FROM condicion_puntualidades WHERE paquete_id = ".$reserva->paquete_id."";
        $condiciones_puntualidad = CondicionPuntualidades::where('paquete_id', '=', $reserva->paquete_id)->get();
        $riesgos = Riesgos::where('paquete_id', '=', $reserva->paquete_id)->get();
        return view('reservar_admin.condiciones_riesgos.index', compact('reserva'));
    }

    public function mostrarReservas()
    {
        DB::statement("SET sql_mode = '' ");
        $reservas = Personas::select(
            'personas.dni',
            DB::raw('CONCAT(personas.nombre," " ,personas.apellidos) AS datos'),
            'pt.nombre',
            'r.fecha_reserva',
            //'b.monto',
            //'SUM(pa.monto) as pago',
            DB::raw('SUM(pa.monto) as pago'),
            DB::raw('(SELECT SUM(ps.monto) FROM pagos ps WHERE ps.estado_pago = "ACEPTADO" AND ps.reserva_id = r.id) as aceptado'),
            DB::raw('(SELECT SUM(ps.monto) FROM pagos ps WHERE ps.estado_pago = "NO ACEPTADO" AND ps.reserva_id = r.id) as no_aceptado'),
            DB::raw('(SELECT SUM(ps.monto) FROM pagos ps WHERE ps.estado_pago = "EN PROCESO" AND ps.reserva_id = r.id) as en_proceso'),
            'er.nombre_estado',
            DB::raw('(CASE
            WHEN (SELECT SUM(ps.monto) FROM pagos ps WHERE ps.estado_pago = "ACEPTADO" AND ps.reserva_id = r.id) = pt.precio THEN "PAGO COMPLETADO"
            WHEN (SELECT SUM(ps.monto) FROM pagos ps WHERE ps.estado_pago = "EN PROCESO" AND ps.reserva_id = r.id) <= pt.precio THEN "EN PROCESO"
            ELSE "PENDIENTE DE PAGO"
        END) as estado_oficial'),
            'r.id',
            'r.slug',
            DB::raw('IF((fecha_reserva-curdate()) <=10 ,"PRÓXIMA A CUMPLIRSE","EN DETERMINACIÓN") as estado_reserva')
        )
            ->join('clientes as c', 'personas.id', '=', 'c.persona_id')
            ->join('reservas  as r', 'r.cliente_id', '=', 'c.id')
            ->join('paquetes_turisticos as pt', 'pt.id', '=', 'r.paquete_id')
            ->join('estado_reservas as er', 'er.id', '=', 'r.estado_reservas_id')
            ->join('pagos as pa', 'pa.reserva_id', '=', 'r.id')
            //->join('boletas as b', 'pa.reserva_id', '=', 'r.id')
            ->groupBy('pa.reserva_id')
            ->orderBy('r.updated_at', 'DESC')
            ->get();
        //return $reservas;
        $consulta = DB::select('SELECT p.dni, concat(p.nombre, " ",p.apellidos) as datos, 
        pt.nombre, r.fecha_reserva, 
        SUM(pa.monto) as pago, 
        (SELECT SUM(ps.monto) FROM pagos ps WHERE ps.estado_pago = "ACEPTADO" AND ps.reserva_id = r.id) as aceptado,
        (SELECT SUM(ps.monto) FROM pagos ps WHERE ps.estado_pago = "NO ACEPTADO" AND ps.reserva_id = r.id) as no_aceptado,
        (SELECT SUM(ps.monto) FROM pagos ps WHERE ps.estado_pago = "EN PROCESO" AND ps.reserva_id = r.id) as en_proceso,
        er.nombre_estado, 
        
        (CASE
            WHEN (SELECT SUM(ps.monto) FROM pagos ps WHERE ps.estado_pago = "ACEPTADO" AND ps.reserva_id = r.id) = pt.precio THEN "PAGO COMPLETADO"
            WHEN (SELECT SUM(ps.monto) FROM pagos ps WHERE ps.estado_pago = "EN PROCESO" AND ps.reserva_id = r.id) <= pt.precio THEN "EN PROCESO"
            ELSE "PENDIENTE DE PAGO"
        END) as estado_oficial,
        b.numero_boleta,r.id,
        IF((fecha_reserva-curdate()) <=10 ,"PRÓXIMA A CUMPLIRSE","EN DETERMINACIÓN") as estado_reserva
        FROM personas p
        INNER JOIN clientes c on p.id=c.persona_id
        INNER JOIN reservas r on r.cliente_id=c.id
        -- INNER JOIN paquetes_turisticos paq on paq.id = r.paquete_id
        INNER JOIN paquetes_turisticos pt on pt.id=r.paquete_id
        INNER JOIN estado_reservas er on er.id = r.estado_reservas_id
        INNER JOIN pagos pa on pa.reserva_id = r.id
        INNER JOIN boletas b on b.id = pa.boleta_id
        GROUP BY pa.reserva_id , pa.estado_pago
        
        ORDER BY r.updated_at');
        //return $consulta;
        return view('reservar_admin.all_reservas', compact('reservas'));
    }

    public function comprobante(){
        return view('reservar_admin.reportes.comprobante');
    }


    public function mostrarSolicitudes(Reservas $reserva)
    {
        return view('reservar_admin.solicitudes.index', compact('reserva'));
    }

    public function pagosRestantes(Reservas $reserva)
    {
        return view('reservar_admin.pagos.pagos_restantes', compact('reserva'));
    }

    public function mostarTodasLasSolicitudes()
    {
        $solicitudes = DB::table('personas as p')
            ->join('clientes as c', 'c.persona_id', '=', 'p.id')
            ->join('reservas as r', 'r.cliente_id', '=', 'c.id')
            //->join('paquetes_turisticos as pt', 'pt.id', '=', 'r.paquete_id')
            ->join('postergacion_reservas as pr', 'pr.reserva_id', '=', 'r.id')
            ->join('evento_postergaciones as ep', 'ep.id', '=', 'pr.evento_postergaciones_id')
            ->join('solicitud_devolucion_dineros as sdd', 'sdd.postergacion_reservas_id', '=', 'pr.id')
            ->leftJoin('solicitud_pagos as sp', 'sp.solicitud_devolucion_dinero_id', '=', 'sdd.id')
            ->leftJoin('pagos as pa', 'pa.id', '=', 'sp.pagos_id')
            ->groupBy('sdd.id')
            ->select(
                DB::raw('CONCAT(p.nombre," ", p.apellidos) AS datos'),
                'p.dni',
                'r.slug',
                'ep.nombre_evento',
                'sdd.fecha_presentacion',
                'sdd.estado',
                DB::raw('SUM(pa.monto) as montoTotal')
                /*'sdv.estado',
                'sdv.fecha_presentacion',
                'pt.nombre',
                'dd.observacion',
                'dd.monto',
                'r.id'*/
            )
            ->paginate(50);
        //$solicitudes =  [];
        //return $solicitudes;
        return view('reservar_admin.solicitudes.all_solicitudes', compact('solicitudes'));
    }

    public function reportSolicitudes()
    {
        $solicitudes = [];
        $pdf = Pdf::loadView('reservar_admin.solicitudes.report');
        //return $pdf->download('invoice.pdf');
        return $pdf->stream('invoice.pdf');
        //return view('reservar_admin.solicitudes.report', compact('solicitudes'));
    }

    public function reportComprobante()
    {
        $solicitudes = [];
        $pdf = Pdf::loadView('reservar_admin.solicitudes.comprobante2');
        //return $pdf->download('invoice.pdf');
        return $pdf->stream('comprobante.pdf');
        //return view('reservar_admin.solicitudes.comprobante2', compact('solicitudes'));
    }

    public function mostrarDevoluciones()
    {
        DB::statement("SET sql_mode = '' ");
        $devoluciones = DB::table('personas as p')
            ->join('clientes as c', 'c.persona_id', '=', 'p.id')
            ->join('reservas as r', 'r.cliente_id', '=', 'c.id')
            //->join('paquetes_turisticos as pt', 'pt.id', '=', 'r.paquete_id')
            ->join('postergacion_reservas as pr', 'pr.reserva_id', '=', 'r.id')
            //->join('evento_postergaciones as ep', 'ep.id', '=', 'pr.evento_postergaciones_id')
            ->join('solicitud_devolucion_dineros as sdd', 'sdd.postergacion_reservas_id', '=', 'pr.id')
            ->join('solicitud_pagos as sp', 'sp.solicitud_devolucion_dinero_id', '=', 'sdd.id')
            ->join('pagos as pa', 'pa.id', '=', 'sp.pagos_id')
            ->leftJoin('devolucion_dineros as dd', 'dd.solicitud_pagos_id', '=', 'sp.id')
            ->groupBy('sp.solicitud_devolucion_dinero_id')
            ->select(
                DB::raw('CONCAT(p.nombre," ", p.apellidos) AS datos'),
                'p.dni',
                'sdd.fecha_presentacion',
                DB::raw('SUM(pa.monto) as montoSolicitado'),
                DB::raw('(SELECT SUM(monto) FROM devolucion_dineros WHERE solicitud_pagos_id = sp.id) as montoDevuelto')
            )
            ->get();
        return view('reservar_admin.devoluciones.all_devoluciones', compact('devoluciones'));
    }

    public function mostrarEventosPostergacion()
    {

        $reserva = [];
        return view('reservar_admin.eventos_postergacion.index', compact('reserva'));
    }

    public function mostrarTipoPagosCuentas()
    {
        return view('reservar_admin.tipoPagosCuentas.index');
    }

    public function consultaReservas()
    {
        $solicitudes = [];

        return view('reservar_admin.consulta_reservas.consulta_reservas', compact('solicitudes'));
    }
}
