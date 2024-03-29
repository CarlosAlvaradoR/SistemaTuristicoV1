<?php

namespace App\Http\Controllers;

use App\Models\ActividadesItinerarios;
use App\Models\Equipos;
use App\Models\Inventario\BajaEquipos;
use App\Models\Inventario\Mantenimientos;
use App\Models\PaquetesTuristicos;
use App\Models\Pedidos\Pedidos;
use App\Models\Pedidos\Proveedores;
use App\Models\TipoPaquetes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use Barryvdh\DomPDF\Facade\Pdf;


class PaquetesTuristicosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = auth()->user();
        // if ($user->hasAnyPermission(['ver-paquetes'])) {
        // Do some stuff here
        return view('paquetes_admin.index');
        //  }else{
        //     return abort(404);
        // }

        //$paquetes = PaquetesTuristicos::paginate(12);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = TipoPaquetes::all();
        return view('paquetes_admin.create', compact('tipos'));
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
     * @param  \App\Models\PaquetesTuristicos  $paquetesTuristicos
     * @return \Illuminate\Http\Response
     */
    public function show(PaquetesTuristicos $slug)
    {
        //
        //return $slug;
        //$paquete = PaquetesTuristicos::findorFail($paquetesTuristicos);
        //return $paquete;
        $paquete = $slug;
        return view('paquetes_admin.detalle_paquete', compact('paquete'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaquetesTuristicos  $paquetesTuristicos
     * @return \Illuminate\Http\Response
     */
    public function edit(PaquetesTuristicos $slug)
    {
        //
        $tipos = TipoPaquetes::all();
        $paquete = $slug;
        //return $paquete;
        return view('paquetes_admin.editar', compact('tipos', 'paquete'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaquetesTuristicos  $paquetesTuristicos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaquetesTuristicos $paquetesTuristicos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaquetesTuristicos  $paquetesTuristicos
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaquetesTuristicos $paquetesTuristicos)
    {
        //
    }

    public function detalle($paquetesTuristicos)
    {
    }

    public function lugares_atractivos()
    {
        return view('paquetes_admin.lugares_atractivos');
    }

    public function tipos_personal()
    {
        return view('paquetes_admin.tipos_personal');
    }

    public function tipos_transporte()
    {
        return view('paquetes_admin.tipo_transporte');
    }

    public function tipos_alimentacion()
    {
        return view('paquetes_admin.tipo_alimentacion');
    }

    public function tipos_acemilas()
    {
        return view('paquetes_admin.tipo_acemilas');
    }

    public function tipos_almuerzos()
    {
        return view('paquetes_admin.tipo_almuerzos');
    }

    public function tipoPaquetesTuristicos(){
        return view('paquetes_admin.tipo_paquetes_turisticos');
    }


    public function mostrarReporteDeItinerarios(PaquetesTuristicos $paquete)
    {

        $actividades = ActividadesItinerarios::where('paquete_id', $paquete->id)->get();
        $title = 'Itinerarios del Paquete ' . $paquete->nombre;



        $pdf = Pdf::loadView('paquetes_admin.reportes.mostrarItinerarios', compact('actividades', 'title'));
        return $pdf->stream($title . '.pdf');

        // return view('paquetes_admin.reportes.mostrarItinerarios', compact('actividades', 'title'));
    }

    /** VER PEDIDOS TEMPORALMENTE */
    public function VerProveedores()
    {
        return view('pedidos_proveedores_admin.index_proveedores');
    }

    public function VerCuentasBancarias(Proveedores $proveedor)
    {
        return view('pedidos_proveedores_admin.cuentas_bancarias', compact('proveedor'));
    }

    public function VerPedidosGenerales()
    {

        // $pedidos = DB::table('proveedores as p')
        //     ->join('pedidos as pe', 'p.id', '=', 'pe.proveedores_id')
        //     ->join('estado_pedidos as ep', 'ep.id', '=', 'pe.estado_pedidos_id')
        //     ->leftJoin('comprobante_pagos as cp', 'cp.pedidos_id', '=', 'pe.id')
        //     ->leftJoin('tipo_comprobantes as tc', 'tc.id', '=', 'cp.tipo_comprobante_id')
        //     ->leftJoin('archivo_comprobantes as ac', 'ac.comprobante_id', '=', 'cp.id')
        //     ->select(
        //         'p.nombre_proveedor',
        //         'p.ruc',
        //         'pe.fecha',
        //         //'pe.monto',
        //         'cp.numero_comprobante',
        //         'ac.ruta_archivo',
        //         'ep.estado',
        //         'p.slug',
        //         'pe.id as idPedido'
        //     )
        //     ->get();
        return view('pedidos_proveedores_admin.pedidos_proveedor');
    }

    public function VerPedidosGeneralesDetalle(Proveedores $proveedor, Pedidos $pedido)
    {
        return view('pedidos_proveedores_admin.pedido_proveedor_detalle', compact('proveedor', 'pedido'));
    }

    public function VerPedidosGeneralesDetalleComponentes(Pedidos $pedido)
    {
        return view('pedidos_proveedores_admin.pedidos_proveedor_pagos_deudas_entradas',
            compact('pedido')
        );
    }

    public function RealizarPedido(Proveedores $proveedor)
    {
        return view('pedidos_proveedores_admin.detalles_pedido', compact('proveedor'));
    }

    public function detallePedido()
    {
        //return view('pedidos_proveedores_admin.pedidos_proveedor');
    }

    public function mostrarBancos()
    {
        return view('pedidos_proveedores_admin.bancos');
    }

    public function mostrarTiposDeComprobante()
    {
        return view('pedidos_proveedores_admin.tiposDeComprobante');
    }




    /** VER EQUIPOS TEMPORALMENTE */
    public function VerEquipos()
    {
        return view('equipos_admin.index_equipos');
    }

    public function VerMarcas()
    {
        return view('equipos_admin.marcas_index');
    }

    public function VerMantenimientoBajas(Equipos $equipo)
    {
        return view('equipos_admin.detalle_equipos', compact('equipo'));
    }

    /** REPORTES */

    public function VerReporteDeEquiposEnStock()
    {

        $title = 'Lista de Equipos con los que se cuenta Actualmente';
        $equipos = DB::select('SELECT e.id, e.nombre, e.descripcion, e.stock,e.precio_referencial, e.tipo, m.nombre as marca FROM equipos e
       INNER JOIN marcas m on m.id = e.marca_id');


        $pdf = Pdf::loadView('equipos_admin.reportes.reporteDeEquiposGeneral', compact('equipos', 'title'));
        return $pdf->stream($title . '.pdf');

        // return view('equipos_admin.reportes.reporteDeEquiposGeneral', compact('equipos'));
    }

    public function VerReporteDeMantenimientoDeEquipos($idEquipo, $fechaSalida = false, $fechaEntrada = false)
    {
        $mantenimientos = Mantenimientos::mostrarMantenimientos($idEquipo, 2, $fechaSalida, $fechaEntrada);
        $title = 'Información General de Mantenimiento de Equipos';

        if ($fechaSalida & $fechaEntrada) {
            $title = 'Mantenimiento de Equipos Fecha de Salida - Entrada: ' .
                date('d/m/Y', strtotime($fechaSalida)) . ' - ' . date('d/m/Y', strtotime($fechaEntrada));
        } //{{ date('d-m-Y', strtotime($i->fecha_cumplimiento)) }}


        $pdf = Pdf::loadView('equipos_admin.reportes.reporteDeMantenimientos', compact('mantenimientos', 'title'));
        return $pdf->stream($title . '.pdf');

        // return view('equipos_admin.reportes.reporteDeMantenimientos', compact('equipos'));
    }

    public function VerReporteDeBajaDeEquipos($idEquipo, $fechaInicial = false, $fechaFinal = false)
    {
        $bajas = BajaEquipos::mostrarBajaDeEquipos($idEquipo, 2, $fechaInicial, $fechaFinal);
        $title = 'Información General de la Baja de Equipos';

        if ($fechaInicial & $fechaFinal) {
            $title = 'Baja de Equipos En el Rango de Fechas: ' .
                date('d/m/Y', strtotime($fechaInicial)) . ' - ' . date('d/m/Y', strtotime($fechaFinal));
        } //{{ date('d-m-Y', strtotime($i->fecha_cumplimiento)) }}


        $pdf = Pdf::loadView('equipos_admin.reportes.reporteDeBajas', compact('bajas', 'title'));
        return $pdf->stream($title . '.pdf');

        // return view('equipos_admin.reportes.reporteDeBajas', compact('equipos'));
    }
}
