<?php

namespace App\Http\Controllers;

use App\Models\PaquetesTipospersonales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PaquetesTipospersonalesController extends Controller
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
        $tiposPersonales=DB::select('SELECT idtipopersonal, nombreTipo FROM tipospersonales');
        return view('paquetes/tipoPersonal/nuevo', compact('idpaquetes', 'tiposPersonales'));
    }

    
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
        $PaquetesTiposPersonal=  new PaquetesTipospersonales();
        $PaquetesTiposPersonal->cantidad=$request->post('cantidad');
        $PaquetesTiposPersonal->idtipopersonal=$request->post('idtipopersonal');
        $PaquetesTiposPersonal->idpaqueteturistico=$request->post('idpaqueteturistico');
        $PaquetesTiposPersonal->save();
        return redirect()->route("index.nuevo.tipopersonal.paquete",[$request->post('idpaqueteturistico')])->with("succes","Agregado con éxito");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaquetesTipospersonales  $paquetesTipospersonales
     * @return \Illuminate\Http\Response
     */
    public function show(PaquetesTipospersonales $paquetesTipospersonales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaquetesTipospersonales  $paquetesTipospersonales
     * @return \Illuminate\Http\Response
     */
    public function edit(PaquetesTipospersonales $paquetesTipospersonales)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaquetesTipospersonales  $paquetesTipospersonales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaquetesTipospersonales $paquetesTipospersonales)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaquetesTipospersonales  $paquetesTipospersonales
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaquetesTipospersonales $paquetesTipospersonales)
    {
        //
    }
}
