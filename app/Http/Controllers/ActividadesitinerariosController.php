<?php

namespace App\Http\Controllers;

use App\Models\Actividadesitinerarios;
use App\Models\ItinerariosPaquetes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActividadesitinerariosController extends Controller
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
        return view('paquetes/itinerario/nuevo', compact('idpaquetes'));
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
        $actividadesItinerarios=  new Actividadesitinerarios();
        $actividadesItinerarios->nombreactividad=$request->post('nombreactividad');
        $actividadesItinerarios->save();
        
        $idUltimaActividad=(DB::select('SELECT idactividaditinerario FROM actividadesitinerarios ORDER BY idactividaditinerario DESC LIMIT 1'));

        $itinerarioPaquetes= new ItinerariosPaquetes();
        $itinerarioPaquetes->descripcion=$request->post('descripcion');
        $itinerarioPaquetes->idpaqueteturistico=$request->post('idpaqueteturistico');
        $itinerarioPaquetes->idactividaditinerario=($idUltimaActividad[0]->idactividaditinerario);
        $itinerarioPaquetes->save();

        return redirect()->route("index.formulario.nuevo.itinerario",[$request->post('idpaqueteturistico')])->with("succes","Agregado con éxito");
    }

    public function show(Actividadesitinerarios $actividadesitinerarios)
    {
        //
    }

    
    public function edit(Actividadesitinerarios $actividadesitinerarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Actividadesitinerarios  $actividadesitinerarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Actividadesitinerarios $actividadesitinerarios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Actividadesitinerarios  $actividadesitinerarios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Actividadesitinerarios $actividadesitinerarios)
    {
        //
    }
}
