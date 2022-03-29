<?php

namespace App\Http\Controllers;

use App\Models\PaquetesEquipos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaquetesEquiposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idpaquete)
    {
        $idpaquetes=(DB::select('SELECT idpaqueteturistico FROM paquetes_turisticos WHERE idpaqueteturistico='.$idpaquete.' LIMIT 1'));
        $equipos=DB::select('SELECT idequipo, nombre FROM equipos');
        return view('paquetes/equipo/nuevo', compact('idpaquetes', 'equipos'));
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
        $paquetesEquipo=  new PaquetesEquipos();
        $paquetesEquipo->cantidad=$request->post('cantidad');
        $paquetesEquipo->observacion=$request->post('observacion');
        $paquetesEquipo->idequipo=$request->post('idequipo');
        $paquetesEquipo->idpaqueteturistico=$request->post('idpaqueteturistico');
        $paquetesEquipo->save();
        return redirect()->route("index.nuevo.equipo.paquete",[$request->post('idpaqueteturistico')])->with("succes","Agregado con éxito");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaquetesEquipos  $paquetesEquipos
     * @return \Illuminate\Http\Response
     */
    public function show(PaquetesEquipos $paquetesEquipos)
    {
        //
    }

    
    public function edit($idPaqueteEquipo)
    {
        $equipos=DB::select('SELECT p.idpaquete_equipo, p.cantidad, p.observacion,p.idpaqueteturistico, p.idequipo, e.nombre FROM paquetes_equipos p
        INNER JOIN equipos e on e.idequipo=p.idequipo WHERE p.idpaquete_equipo = '.$idPaqueteEquipo.' LIMIT 1');
        
        $listasEquipos=DB::select('SELECT idequipo, nombre FROM equipos');

        return view('paquetes/equipo/editar', compact('equipos','listasEquipos'));;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaquetesEquipos  $paquetesEquipos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idPaqueteEquipo)
    {
        PaquetesEquipos::where('idpaquete_equipo',$idPaqueteEquipo)
        ->update(['cantidad'=>$request->post('cantidad'),
                    'observacion'=>$request->post('observacion'),
                    'idequipo'=>$request->post('idequipo')
        ]);
        
        return redirect()->route("paquetes.detalles",[$request->post('idpaqueteturistico')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaquetesEquipos  $paquetesEquipos
     * @return \Illuminate\Http\Response
     */
    public function destroy($idPaqueteEquipo)
    {
        //
        $idPaquete=DB::select('SELECT idpaqueteturistico FROM paquetes_equipos WHERE idpaquete_equipo = '.$idPaqueteEquipo.' LIMIT 1');
        
        PaquetesEquipos::where('idpaquete_equipo',$idPaqueteEquipo)
        ->delete();

        return redirect()->route("paquetes.detalles",[$idPaquete[0]->idpaqueteturistico]);
    }
}
