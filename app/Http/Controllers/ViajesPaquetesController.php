<?php

namespace App\Http\Controllers;

use App\Models\ViajesPaquetes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ViajesPaquetesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        //
        $detalles=DB::select('SELECT idpaqueteturistico, nombre FROM paquetes_turisticos p WHERE slug="'.$slug.'" LIMIT 1');
        
        $viajes=DB::select('SELECT id, descripcion, fecha, hora, cantidad_participantes, estado, idpaqueteturistico FROM viajes_paquetes v
        WHERE idpaqueteturistico = '.$detalles[0]->idpaqueteturistico.'');

        return view('viaje/index/index', compact('detalles', 'viajes'));
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
        $viajes=ViajesPaquetes::create([
            'descripcion'=>$request->post('descripcion'),
            'fecha'=>$request->post('fecha'),
            'hora'=>$request->post('hora'),
            'cantidad_participantes'=>$request->post('cantidad_participantes'),
            'estado'=>$request->post('estado'),
            'idpaqueteturistico'=>$request->post('idpaqueteturistico')
        ]);
        $slug=DB::select('SELECT slug FROM paquetes_turisticos WHERE idpaqueteturistico = '.$request->post('idpaqueteturistico').' LIMIT 1');
        return redirect()->route('index.viajes.admin',[$slug[0]->slug])->with("succes","Agregado con éxito");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ViajesPaquetes  $viajesPaquetes
     * @return \Illuminate\Http\Response
     */
    public function show(ViajesPaquetes $viajesPaquetes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ViajesPaquetes  $viajesPaquetes
     * @return \Illuminate\Http\Response
     */
    public function edit(ViajesPaquetes $viajesPaquetes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ViajesPaquetes  $viajesPaquetes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ViajesPaquetes $viajesPaquetes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ViajesPaquetes  $viajesPaquetes
     * @return \Illuminate\Http\Response
     */
    public function destroy(ViajesPaquetes $viajesPaquetes)
    {
        //
    }
}
