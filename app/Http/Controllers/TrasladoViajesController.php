<?php

namespace App\Http\Controllers;

use App\Models\TrasladoViajes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrasladoViajesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $empresasVehiculos=DB::select('SELECT et.nombre_empresa, v.placa, v.id FROM empresastransportes et
        INNER JOIN vehiculos v on et.id=v.empresatransporte_id');

        $vehiculosProgramados=DB::select('SELECT et.nombre_empresa, v.placa,tv.monto, v.id FROM empresastransportes et
        INNER JOIN vehiculos v on et.id=v.empresatransporte_id
        INNER JOIN traslado_viajes tv on tv.vehiculo_id=v.id
        INNER JOIN viajes_paquetes vp on vp.id=tv.viaje_paquete_id
        WHERE tv.vehiculo_id = '.$id.'');

        $idViaje=$id;

        return view('viaje/index/asignarVehiculos', compact('empresasVehiculos','vehiculosProgramados' ,'idViaje'));
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
    public function store(Request $request, $idVehiculo, $idViaje)
    {
        //
        //return $request;
        //return "Vehiculo:".$idVehiculo." idViaje:".$idViaje;
        $trasladosViaje=TrasladoViajes::create([
            'descripcion' => $request->post('descripcion'), 
            'fecha'=> date('Y-m-d'), 
            'monto' => $request->post('monto_vehiculo'), 
            'viaje_paquete_id' => $idViaje, 
            'vehiculo_id' => $idVehiculo
        ]);
        return redirect()->route('asignar.vehiculo.viaje',[$idViaje])->with("succes","Agregado con éxito");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TrasladoViajes  $trasladoViajes
     * @return \Illuminate\Http\Response
     */
    public function show(TrasladoViajes $trasladoViajes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TrasladoViajes  $trasladoViajes
     * @return \Illuminate\Http\Response
     */
    public function edit(TrasladoViajes $trasladoViajes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TrasladoViajes  $trasladoViajes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrasladoViajes $trasladoViajes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TrasladoViajes  $trasladoViajes
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrasladoViajes $trasladoViajes)
    {
        //
    }
}
