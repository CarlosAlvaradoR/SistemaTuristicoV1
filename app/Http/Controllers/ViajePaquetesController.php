<?php

namespace App\Http\Controllers;

use App\Models\PaquetesTuristicos;
use App\Models\Viajes\ViajePaquetes;
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

    public function viajeParticipantes(PaquetesTuristicos $paquete, $idViaje){
        return view('viajes_admin.viajes_participantes', compact('paquete', 'idViaje'));
    }

    public function viajeAlmuerzos(PaquetesTuristicos $paquete, $idViaje){
        return view('viajes_admin.viajes_almuerzos', compact('paquete', 'idViaje'));
    }

    public function viajeBoletasPago(PaquetesTuristicos $paquete, $idViaje){
        return view('viajes_admin.viajes_boletas_de_pago', compact('paquete', 'idViaje'));
    }

    public function viajeActividadesAclimatacion(PaquetesTuristicos $paquete, $idViaje){
        return view('viajes_admin.viajes_actividades_aclimatacion', compact('paquete', 'idViaje'));
    }

    public function viajeActividadesAclimatacionParticipantes(PaquetesTuristicos $paquete, $idViaje ,$idActividadAclimatacion){
        return view('viajes_admin.viajes_actividades_aclimatacion_participantes', compact('paquete','idViaje', 'idActividadAclimatacion'));
    }

    public function viajeHospedajes(PaquetesTuristicos $paquete, $idViaje){
        return view('viajes_admin.viajes_hospedajes', compact('paquete', 'idViaje'));
    }

    public function viajeItinerarios(PaquetesTuristicos $paquete, $idViaje){
        return view('viajes_admin.viajes_itinerarios_cumplidos', compact('paquete', 'idViaje'));
    }

    public function viajeArrieros(PaquetesTuristicos $paquete, $idViaje){
        return view('viajes_admin.viajes_arrieros-guia_cocinero', compact('paquete', 'idViaje'));
    }
}
