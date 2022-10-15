<?php

namespace App\Http\Controllers;

use App\Models\PaquetesTuristicos;
use App\Models\TipoPaquetes;
use Illuminate\Http\Request;

class PaquetesTuristicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$paquetes = PaquetesTuristicos::paginate(12);
        return view('paquetes_admin.index');
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
    public function show(PaquetesTuristicos $paquetesTuristicos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaquetesTuristicos  $paquetesTuristicos
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
        $tipos = TipoPaquetes::all();
        return view('paquetes_admin.editar', compact('tipos'));
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

    public function detalle($paquetesTuristicos){
        $paquete = PaquetesTuristicos::findorFail($paquetesTuristicos);
        //return $paquete;
        return view('paquetes_admin.detalle_paquete', compact('paquete'));
    }

    public function reservar(){
        return view('reservar_admin.index');
    }
}
