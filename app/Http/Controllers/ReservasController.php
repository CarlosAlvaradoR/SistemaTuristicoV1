<?php

namespace App\Http\Controllers;

use App\Models\Paquetes\CondicionPuntualidades;
use App\Models\Paquetes\Riesgos;
use App\Models\PaquetesTuristicos;
use App\Models\Personas;
use App\Models\Reservas\Reservas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

        return view('reservar_admin.all_reservas', compact('reservas'));
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
            ->join('paquetes_turisticos as pt', 'pt.id', '=', 'r.paquete_id')
            ->join('solicitud_devolucion_dineros as sdv', 'sdv.reserva_id', '=', 'r.id')
            ->leftJoin('devolucion_dineros as dd', 'dd.solicitud_devolucion_dinero_id', '=', 'sdv.id')
            ->select(
                DB::raw('CONCAT(p.nombre," ", p.apellidos) AS datos'),
                'sdv.estado',
                'sdv.fecha_presentacion',
                'pt.nombre',
                'dd.observacion',
                'dd.monto',
                'r.id'
            )
            ->paginate(100);
        return view('reservar_admin.solicitudes.all_solicitudes', compact('solicitudes'));
    }

    public function mostrarEventosPostergacion(){
        $reserva = [];
        return view('reservar_admin.eventos_postergacion.index', compact('reserva'));
    }

    public function mostrarTipoPagosCuentas(){
        return view('reservar_admin.tipoPagosCuentas.index');
    }
}
