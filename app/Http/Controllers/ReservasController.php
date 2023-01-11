<?php

namespace App\Http\Controllers;

use App\Models\Paquetes\CondicionPuntualidades;
use App\Models\Paquetes\Riesgos;
use App\Models\PaquetesTuristicos;
use App\Models\Reservas\Reservas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function reservar(PaquetesTuristicos $slug){
        
        return view('reservar_admin.index', compact('slug'));
    }

    public function reservarCrearCliente(){
        
        return view('reservar_admin.create');
    }

    public function reservaCondicionesPuntualidad(Reservas $reserva){
        //$sql = "SELECT * FROM condicion_puntualidades WHERE paquete_id = ".$reserva->paquete_id."";
        $condiciones_puntualidad = CondicionPuntualidades::where('paquete_id','=',$reserva->paquete_id)->get();
        $riesgos = Riesgos::where('paquete_id','=',$reserva->paquete_id)->get();
        return view('reservar_admin.condiciones_riesgos.index', compact('reserva'));
    }

    public function mostrarReservas(){
        return view('reservar_admin.all_reservas');
    }
}
