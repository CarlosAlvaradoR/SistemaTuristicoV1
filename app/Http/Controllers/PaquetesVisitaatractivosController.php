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
        $paquetes=DB::select('SELECT p.idpaqueteturistico, p.nombre FROM paquetes_turisticos p WHERE p.idpaqueteturistico = '.$idpaquete.' LIMIT 1');
        
        $lugaresAtractivos=DB::select('SELECT a.idatractivoturistico, l.nombre, a.descripcion FROM lugares l
        INNER JOIN atractivosturisticos a on l.idlugar=a.idlugar
        WHERE a.idatractivoturistico NOT IN 
            (SELECT p.idatractivoturistico FROM paquetes_visitaatractivos p WHERE p.idpaqueteturistico = '.$idpaquete.' )
            ORDER BY a.idatractivoturistico DESC');
        
        $lugaresPaquete =DB::select('SELECT l.nombre, a.descripcion, p.idpaquete_visitaatractivos 
        FROM lugares l
        INNER JOIN atractivosturisticos a on l.idlugar=a.idlugar
        INNER JOIN paquetes_visitaatractivos p on p.idatractivoturistico=a.idatractivoturistico
        WHERE p.idpaqueteturistico='.$idpaquete.'');
        
        return view('paquetes/lugaresVisita/nuevo', compact('paquetes','lugaresAtractivos','lugaresPaquete'));
        
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
        $paqueteVisitaAtractivos=  new PaquetesVisitaatractivos();
        $paqueteVisitaAtractivos->idatractivoturistico=$request->post('idatractivoturistico');
        $paqueteVisitaAtractivos->idpaqueteturistico=$request->post('idpaqueteturistico');
        $paqueteVisitaAtractivos->save();
        return redirect()->route("index.formulario.nuevo.atractivo",[$request->post('idpaqueteturistico')])->with("succes","Agregado con éxito");
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
    public function destroy(Request $request,$idPaqueteVisita)
    {
        //return $idPaqueteVisita;
        $idPaquete=DB::select('SELECT idpaqueteturistico FROM paquetes_visitaatractivos WHERE idpaquete_visitaatractivos = '.$idPaqueteVisita.'');
        
        PaquetesVisitaatractivos::where('idpaquete_visitaatractivos',$idPaqueteVisita)
        ->delete();
        
        $option=$request->post('option');
        $route="";
        if ($option=="1") {
            $route = "paquetes.detalles";
        }else{
            $route="index.formulario.nuevo.atractivo";
        }
        

        return redirect()->route($route,[$idPaquete[0]->idpaqueteturistico]);
    }
}
