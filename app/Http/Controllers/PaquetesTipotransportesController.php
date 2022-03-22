<?php

namespace App\Http\Controllers;

use App\Models\PaquetesTipotransportes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PaquetesTipotransportesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idpaquete)
    {
        //
        $idpaquetes=(DB::select('SELECT idpaqueteturistico FROM paquetes_turisticos WHERE idpaqueteturistico='.$idpaquete.' LIMIT 1'));
        $tiposTransportes=DB::select('SELECT idtipotrasnporte, nombretipo FROM tipotransportes');
        return view('paquetes/transportes/nuevo', compact('idpaquetes','tiposTransportes'));
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
     * @param  \App\Models\PaquetesTipotransportes  $paquetesTipotransportes
     * @return \Illuminate\Http\Response
     */
    public function show(PaquetesTipotransportes $paquetesTipotransportes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaquetesTipotransportes  $paquetesTipotransportes
     * @return \Illuminate\Http\Response
     */
    public function edit(PaquetesTipotransportes $paquetesTipotransportes)
    {
        //
        $idpaquetes=(DB::select('SELECT idpaqueteturistico FROM paquetes_turisticos WHERE idpaqueteturistico='.$idpaquete.' LIMIT 1'));
        $tiposTransportes=DB::select('SELECT idtipotrasnporte, nombretipo FROM tipotransportes');
        return view('paquetes/transportes/editar', compact('idpaquetes','tiposTransportes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaquetesTipotransportes  $paquetesTipotransportes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaquetesTipotransportes $paquetesTipotransportes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaquetesTipotransportes  $paquetesTipotransportes
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaquetesTipotransportes $paquetesTipotransportes)
    {
        //
    }
}
