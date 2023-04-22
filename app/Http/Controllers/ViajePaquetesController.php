<?php

namespace App\Http\Controllers;

use App\Models\PaquetesTuristicos;
use App\Models\Viajes\EmpresaTransportes;
use App\Models\Viajes\Participantes;
use App\Models\Viajes\ViajePaquetes;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ViajePaquetesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PaquetesTuristicos $paquete)
    {
        //
        return view('viajes_admin.viajes_paquete', compact('paquete'));
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
     * @param  \App\Models\Viajes\ViajePaquetes  $viajePaquetes
     * @return \Illuminate\Http\Response
     */
    public function show(ViajePaquetes $viajePaquetes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Viajes\ViajePaquetes  $viajePaquetes
     * @return \Illuminate\Http\Response
     */
    public function edit(ViajePaquetes $viajePaquetes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Viajes\ViajePaquetes  $viajePaquetes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ViajePaquetes $viajePaquetes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Viajes\ViajePaquetes  $viajePaquetes
     * @return \Illuminate\Http\Response
     */
    public function destroy(ViajePaquetes $viajePaquetes)
    {
        //
    }

    public function viajeParticipantes(PaquetesTuristicos $paquete, ViajePaquetes $viaje)
    {
        return view('viajes_admin.viajes_participantes', compact('paquete', 'viaje'));
    }

    public function EntregaDeEquipos(PaquetesTuristicos $paquete, ViajePaquetes $viaje, Participantes $participante)
    {
        //$participante = Participantes::findOrFail($participante);
        //return $participante;
        return view('viajes_admin.viajes_participantes_entrega_equipos', compact('paquete', 'viaje', 'participante'));
    }

    public function trasladoViajes(PaquetesTuristicos $paquete, $idViaje)
    {
        return view('viajes_admin.traslados_viaje', compact('paquete', 'idViaje'));
    }

    public function viajeAlmuerzos(PaquetesTuristicos $paquete, $idViaje)
    {
        return view('viajes_admin.viajes_almuerzos', compact('paquete', 'idViaje'));
    }

    public function viajeBoletasPago(PaquetesTuristicos $paquete, $idViaje)
    {
        return view('viajes_admin.viajes_boletas_de_pago', compact('paquete', 'idViaje'));
    }

    public function viajeActividadesAclimatacion(PaquetesTuristicos $paquete, $idViaje)
    {
        return view('viajes_admin.viajes_actividades_aclimatacion', compact('paquete', 'idViaje'));
    }

    public function viajeActividadesAclimatacionParticipantes(PaquetesTuristicos $paquete, $idViaje, $idActividadAclimatacion)
    {
        return view('viajes_admin.viajes_actividades_aclimatacion_participantes', compact('paquete', 'idViaje', 'idActividadAclimatacion'));
    }

    public function viajeHospedajes(PaquetesTuristicos $paquete, $idViaje)
    {
        return view('viajes_admin.viajes_hospedajes', compact('paquete', 'idViaje'));
    }

    public function viajeItinerarios(PaquetesTuristicos $paquete, $idViaje)
    {
        return view('viajes_admin.viajes_itinerarios_cumplidos', compact('paquete', 'idViaje'));
    }

    public function viajeArrieros(PaquetesTuristicos $paquete, $idViaje)
    {
        return view('viajes_admin.viajes_arrieros-guia_cocinero', compact('paquete', 'idViaje'));
    }

    public function viajeCocineros(PaquetesTuristicos $paquete, $idViaje)
    {
        return view('viajes_admin.viajes_cocineros', compact('paquete', 'idViaje'));
    }

    public function viajeGuias(PaquetesTuristicos $paquete, $idViaje)
    {
        return view('viajes_admin.viajes_guias', compact('paquete', 'idViaje'));
    }

    public function mostrarTodosLosViajes()
    {
        return view('viajes_admin.ver_todo.ver_todo');
    }

    public function mostrarEmpresasTransporte()
    {
        return view('viajes_admin.empresas_transporte.empresas');
    }

    public function mostrarVehiculosEmpresasTransporte(EmpresaTransportes $empresa)
    {
        return view('viajes_admin.empresas_transporte.vehiculos.vehiculos', compact('empresa'));
    }

    public function mostrarListaChoferes()
    {
        return view('viajes_admin.chofer.chofer');
    }

    public function mostrarListaCocineros()
    {
        return view('viajes_admin.cocinero.cocinero');
    }

    public function mostrarListaGuias()
    {
        return view('viajes_admin.guia.guia');
    }

    public function mostrarArrieros()
    {
        return view('viajes_admin.arriero.arriero');
    }

    public function mostrarTiposDeVehiculos()
    {
        return view('viajes_admin.opciones.tipo_de_vehiculos');
    }

    public function mostrarTiposDeLicencias()
    {
        return view('viajes_admin.opciones.tipo_de_licencias');
    }

    public function mostrarAsociaciones()
    {
        return view('viajes_admin.opciones.asociaciones');
    }

    public function mostrarHoteles()
    {
        return view('viajes_admin.opciones.hoteles');
    }

    /** REPORTES */

    public function mostrarViajesActuales()
    {

        $viajes = ViajePaquetes::where('estado', 2)->get();
        $pdf = Pdf::loadView('viajes_admin.reportes.viajesActuales', compact('viajes'));
        //return $pdf->download('invoice.pdf');
        return $pdf->stream('Reporte de Viajes Actuales.pdf');
        // return view('viajes_admin.reportes.viajesActuales', compact('viajes'));
    }

    public function mostrarParticipantesDelViaje (PaquetesTuristicos $paquete, ViajePaquetes $viaje){
        $participantes = ViajePaquetes::mostrarParticipantesDelViaje($viaje->id);
        // $viajes = ViajePaquetes::where('estado', 2)->get();
        $pdf = Pdf::loadView('viajes_admin.reportes.participantesDelViaje', compact('participantes'));
        
        return $pdf->stream('Lista de Participantes del Viaje.pdf');
        // return view('viajes_admin.reportes.participantesDelViaje', compact('participantes'));
    }

    public function mostrarItinerariosCumplidos(PaquetesTuristicos $paquete, ViajePaquetes $viaje)
    {
        $itinerarios = ViajePaquetes::mostrarItinerariosCumplidos($paquete->id, $viaje->id);
        $pdf = Pdf::loadView('viajes_admin.reportes.itinerariosDelViaje', compact('itinerarios', 'paquete', 'viaje'));
        return $pdf->stream('Cumplimiento de Itinerario del Viaje.pdf');
        // return view('viajes_admin.reportes.itinerariosDelViaje', compact('itinerarios'));
    }
}
