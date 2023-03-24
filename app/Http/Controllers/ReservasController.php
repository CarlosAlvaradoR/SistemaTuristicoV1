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
use Illuminate\Support\Facades\Input;
use PhpParser\Node\Stmt\Return_;
use Symfony\Component\Console\Input\Input as InputInput;

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
        /*$reservas = Personas::select(
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
            ->get();*/
        $reservas = DB::select('SELECT * FROM v_reserva_reservas_general');
        //return $reservas;
        //return $consulta;
        return view('reservar_admin.all_reservas', compact('reservas'));
    }

    public function comprobante(Reservas $reserva)
    {
        //SACAR INFORMACIÓN DE PERSONAS, Y EL PAQUETE
        $informacion = DB::select("SELECT CONCAT(p.nombre, ' ',p.apellidos) as datos, 
        p.telefono,
        pt.nombre, r.fecha_reserva, r.id FROM personas p
        INNER JOIN clientes c on p.id = c.persona_id
        INNER JOIN reservas r on r.cliente_id = c.id
        INNER JOIN paquetes_turisticos pt on pt.id = r.paquete_id
        WHERE r.id = ".$reserva->id."");
        return view('reservar_admin.reportes.comprobante', compact('informacion'));
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
                'r.slug',
                'sdd.fecha_presentacion',
                DB::raw('SUM(pa.monto) as montoSolicitado'),
                DB::raw('(SELECT SUM(monto) FROM devolucion_dineros WHERE solicitud_pagos_id = sp.id) as montoDevuelto')
            )
            ->get();
        return view('reservar_admin.devoluciones.all_devoluciones', compact('devoluciones'));
    }

    public function mostrarCriteriosMedicos(){
        
        return view('reservar_admin.criterios_medicos.index');
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

    public function reportesGenerales()
    {
        $reservas = [];
        return view('reservar_admin.reportes_generales', compact('reservas')); //
    }

    public function reportReserva(Request $request)
    {
        /*
        https://laracasts.com/discuss/channels/laravel/how-do-i-handle-multiple-submit-buttons-in-a-single-form-with-laravel
        */
        //dd($request->input('action'));
        //dd($request);
        DB::statement("SET sql_mode = '' ");
        switch ($request->input('action')) {
            case 'btn-procesar-reserva':
                list($consulta, $fecha_inicial, $fecha_final) = $this->mostrarReporteReservas($request);
                $pdf = Pdf::loadView('reservar_admin.reportes.reservas', compact('consulta', 'fecha_inicial', 'fecha_final'));
                return $pdf->stream('Reporte de Reservas por Rango de Fechas.pdf');
                break;

            case 'btn-procesar-pago':
                list($consulta, $fecha_inicial_pago, $fecha_final_pago) = $this->mostrarReportPagos($request);
                $pdf = Pdf::loadView('reservar_admin.reportes.pagos_reservas', compact('consulta', 'fecha_inicial_pago', 'fecha_final_pago'));
                return $pdf->stream('Reporte de Pagos realizados por Reservas.pdf');
                break;

            case 'btn-procesar-devoluciones':
                list($consulta, $fecha_inicial_devoluciones, $fecha_final_devoluciones) = $this->mostrarReportDevoluciones($request);
                $pdf = Pdf::loadView('reservar_admin.reportes.devoluciones', compact('consulta', 'fecha_inicial_devoluciones', 'fecha_final_devoluciones'));
                return $pdf->stream('Reporte de Devoluciones realizadas por Reservas.pdf');
                break;
            default:
                return 'NO LLEG';
                break;
        }
    }

    private function mostrarReportDevoluciones($request)
    {
        $fecha_inicial_devoluciones = '';
        $fecha_final_devoluciones = '';
        if ($request->fecha_inicial_devoluciones) {
            $fecha_inicial_devoluciones = $request->fecha_inicial_devoluciones;
        }
        if ($request->fecha_final_devoluciones) {
            $fecha_final_devoluciones = $request->fecha_final_devoluciones;
        }

        if ($fecha_inicial_devoluciones && $fecha_final_devoluciones) {
            $query = 'SELECT CONCAT(p.nombre," ", p.apellidos)as datos, p.dni, pt.nombre, r.fecha_reserva, 
            ep.nombre_evento, pa.monto as solicitado, dd.fecha_hora, dd.monto as devuelto
            FROM personas p
            INNER JOIN clientes c on p.id = c.persona_id
            INNER JOIN reservas r on r.cliente_id = c.id
            INNER JOIN paquetes_turisticos pt on pt.id = r.paquete_id
            INNER JOIN postergacion_reservas pr on pr.reserva_id = r.id
            LEFT JOIN evento_postergaciones ep on ep.id = pr.evento_postergaciones_id
            INNER JOIN solicitud_devolucion_dineros sdd on sdd.postergacion_reservas_id = pr.id
            INNER JOIN solicitud_pagos sp on sp.solicitud_devolucion_dinero_id = sdd.id
            INNER JOIN pagos pa on sp.pagos_id = pa.id
            INNER JOIN devolucion_dineros dd on dd.solicitud_pagos_id = sp.id
            WHERE dd.fecha_hora between "'.$fecha_inicial_devoluciones.'" and "'.$fecha_final_devoluciones.'"';
            $consulta = DB::select($query);
        } else {
            $query = 'SELECT CONCAT(p.nombre," ", p.apellidos)as datos, p.dni, pt.nombre, r.fecha_reserva, 
            ep.nombre_evento, pa.monto as solicitado, dd.fecha_hora, dd.monto as devuelto
            FROM personas p
            INNER JOIN clientes c on p.id = c.persona_id
            INNER JOIN reservas r on r.cliente_id = c.id
            INNER JOIN paquetes_turisticos pt on pt.id = r.paquete_id
            INNER JOIN postergacion_reservas pr on pr.reserva_id = r.id
            LEFT JOIN evento_postergaciones ep on ep.id = pr.evento_postergaciones_id
            INNER JOIN solicitud_devolucion_dineros sdd on sdd.postergacion_reservas_id = pr.id
            INNER JOIN solicitud_pagos sp on sp.solicitud_devolucion_dinero_id = sdd.id
            INNER JOIN pagos pa on sp.pagos_id = pa.id
            INNER JOIN devolucion_dineros dd on dd.solicitud_pagos_id = sp.id';
            $consulta = DB::select($query);
        }
        return [$consulta, $fecha_inicial_devoluciones, $fecha_final_devoluciones];
    }
    private function mostrarReportPagos($request)
    {
        $fecha_inicial_pago = null;
        $fecha_final_pago = null;
        if ($request->fecha_inicial_pago) {
            $fecha_inicial_pago = $request->fecha_inicial_pago;
        }
        if ($request->fecha_final_pago) {
            $fecha_final_pago = $request->fecha_final_pago;
        }
        //HAY FECHAS SELECCIONADAS (Filtrara con Fechas -> Tienen que haber las dos fechas)
        if ($fecha_inicial_pago && $fecha_final_pago) {
            $query = 'SELECT CONCAT(p.nombre, " ",p.apellidos) as datos, p.dni, pa.fecha_pago,pa.estado_pago,pa.monto FROM personas p
                    INNER JOIN clientes c on p.id = c.persona_id
                    INNER JOIN reservas r on r.cliente_id = c.id
                    INNER JOIN pagos pa on pa.reserva_id = r.id
                    WHERE pa.fecha_pago BETWEEN "2023-03-10" AND "2023-04-31"
                    ORDER BY pa.fecha_pago';
            $consulta = DB::select($query);
        } else { //NO HAY FECHAS SELECCIONADAS (Filtro General)
            $query = 'SELECT CONCAT(p.nombre, " ",p.apellidos)as datos, p.dni, pa.fecha_pago,pa.estado_pago,pa.monto FROM personas p
                    INNER JOIN clientes c on p.id = c.persona_id
                    INNER JOIN reservas r on r.cliente_id = c.id
                    INNER JOIN pagos pa on pa.reserva_id = r.id
                    ORDER BY pa.fecha_pago';
            $consulta = DB::select($query);
        }
        return [$consulta, $fecha_inicial_pago, $fecha_final_pago];
    }

    private function mostrarReporteReservas($request)
    {
        $fecha_inicial = null;
        $fecha_final = null;
        $tipo = '';
        $consulta = [];
        if ($request->fecha_inicial) {
            $fecha_inicial = $request->fecha_inicial;
        }
        if ($request->fecha_final) {
            $fecha_final = $request->fecha_final;
        }
        if ($request->estado_reserva) {
            $tipo = $request->estado_reserva;
        }
        //$query = 'SELECT * FROM v_reserva_reservas_general';
        //$consulta = DB::select($query);
        //return $consulta;
        //NO HAY FECHAS NI TIPO
        if (!$fecha_inicial && !$fecha_final && !$tipo) {
            $query = 'SELECT * FROM v_reserva_reservas_general vrg
                WHERE (vrg.idReserva NOT IN (SELECT par.reserva_id FROM participantes par) OR
                vrg.idReserva NOT IN (SELECT pr.reserva_id FROM postergacion_reservas pr))';
            $consulta = DB::select($query);
            //return $consulta;
        }
        //HAY FECHAS Y TIPO
        if ($fecha_inicial && $fecha_final && $tipo) {
            $query = 'SELECT * FROM v_reserva_reservas_general vrg
                WHERE vrg.fecha_reserva between "' . $fecha_inicial . '" and "' . $fecha_final . '" AND estado_reserva = "' . $tipo . '" AND (vrg.idReserva NOT IN (SELECT par.reserva_id FROM participantes par) OR
                vrg.idReserva NOT IN (SELECT pr.reserva_id FROM postergacion_reservas pr))';
            $consulta = DB::select($query);
            //return '2';
        }
        //HAY FECHAS Y NO TIPO
        if ($fecha_inicial && $fecha_final && !$tipo) {
            $query = 'SELECT * FROM v_reserva_reservas_general vrg
                     WHERE vrg.fecha_reserva between "' . $fecha_inicial . '" and "' . $fecha_final . '"';
            $consulta = DB::select($query);
            //return $query;
        }
        //HAY TIPO Y NO FECHAS
        if (!$fecha_inicial && !$fecha_final && $tipo) {
            $query = 'SELECT * FROM v_reserva_lista_reservas_general vrg
                    WHERE estado_oficial = "EN PROCESO"';
            $consulta = DB::select($query);
            //return '4';
        }
        return [$consulta, $fecha_inicial, $fecha_final];
    }
}
