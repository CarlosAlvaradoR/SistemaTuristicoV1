<?php

namespace App\Http\Controllers;

use App\Models\Mapasreferenciales;
use App\Models\MapasPaquetes;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MapasreferencialesController extends Controller
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
       
        $mapasReferenciales=  new Mapasreferenciales();
        $mapasReferenciales->nombreruta=$request->post('nombreruta');
        $mapasReferenciales->descripcionruta=$request->post('descripcionruta');
        $mapasReferenciales->save();

        //idpaqueteturistico
        $idmapareferencial=(DB::select('SELECT idmapareferencial FROM mapasreferenciales m ORDER BY idmapareferencial desc limit 1'));

        $mapaPaquetes=new MapasPaquetes();
        $mapaPaquetes->idmapareferencial=($idmapareferencial[0]->idmapareferencial);
        $mapaPaquetes->idpaqueteturistico=$request->post('idpaqueteturistico');
        $mapaPaquetes->save();
        
        return "Insertado correctamente";
        //return redirect()->route("usuarios.nuevos")->with("succes","Agregado con éxito");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mapasreferenciales  $mapasreferenciales
     * @return \Illuminate\Http\Response
     */
    public function show(Mapasreferenciales $mapasreferenciales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mapasreferenciales  $mapasreferenciales
     * @return \Illuminate\Http\Response
     */
    public function edit(Mapasreferenciales $mapasreferenciales)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mapasreferenciales  $mapasreferenciales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mapasreferenciales $mapasreferenciales)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mapasreferenciales  $mapasreferenciales
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mapasreferenciales $mapasreferenciales)
    {
        //
    }
}
