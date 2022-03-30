<?php

namespace App\Http\Controllers;

use App\Models\PaquetesVisitaatractivos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaquetesVisitaatractivosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idpaquete)
    {
        $idpaquetes=(DB::select('SELECT idpaqueteturistico FROM paquetes_turisticos WHERE idpaqueteturistico = '.$idpaquete.' LIMIT 1'));
        $tiposAcemilas=DB::select('SELECT idtipoacemila, nombre FROM tiposacemilas');
        return view('paquetes/lugaresVisita/nuevo', compact('idpaquetes', 'tiposAcemilas'));
        
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
     * @param  \App\Models\PaquetesVisitaatractivos  $paquetesVisitaatractivos
     * @return \Illuminate\Http\Response
     */
    public function show(PaquetesVisitaatractivos $paquetesVisitaatractivos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaquetesVisitaatractivos  $paquetesVisitaatractivos
     * @return \Illuminate\Http\Response
     */
    public function edit(PaquetesVisitaatractivos $paquetesVisitaatractivos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaquetesVisitaatractivos  $paquetesVisitaatractivos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaquetesVisitaatractivos $paquetesVisitaatractivos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaquetesVisitaatractivos  $paquetesVisitaatractivos
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaquetesVisitaatractivos $paquetesVisitaatractivos)
    {
        //
    }
}
