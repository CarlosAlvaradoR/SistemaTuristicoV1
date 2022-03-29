<?php

namespace App\Http\Controllers;

use App\Models\PaquetesTipoalmuerzos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PaquetesTipoalmuerzosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idpaquete)
    {
        $idpaquetes=(DB::select('SELECT idpaqueteturistico FROM paquetes_turisticos WHERE idpaqueteturistico = '.$idpaquete.' LIMIT 1'));
        $tiposAlmuerzos=DB::select('SELECT idtipoalmuerzo, nombre FROM tiposalmuerzos');
        return view('paquetes/almuerzo/nuevo', compact('idpaquetes', 'tiposAlmuerzos'));
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
        $paquetesAlmuerzos=  new PaquetesTipoalmuerzos();
        $paquetesAlmuerzos->observacion=$request->post('observacion');
        $paquetesAlmuerzos->idtipoalmuerzo=$request->post('idtipoalmuerzo');
        $paquetesAlmuerzos->idpaqueteturistico=$request->post('idpaqueteturistico');
        $paquetesAlmuerzos->save();
        return redirect()->route("index.nuevo.tipo.almuerzo.paquete",[$request->post('idpaqueteturistico')])->with("succes","Agregado con éxito");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaquetesTipoalmuerzos  $paquetesTipoalmuerzos
     * @return \Illuminate\Http\Response
     */
    public function show(PaquetesTipoalmuerzos $paquetesTipoalmuerzos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaquetesTipoalmuerzos  $paquetesTipoalmuerzos
     * @return \Illuminate\Http\Response
     */
    public function edit($idpaqueteAlmuerzo)
    {
        $paquetesAlmuerzos = DB::select('SELECT p.idpaquete_tipoalmuerzo, p.observacion, p.idtipoalmuerzo, p.idpaqueteturistico, t.nombre FROM paquetes_tipoalmuerzos p
        INNER JOIN tiposalmuerzos t on p.idtipoalmuerzo=t.idtipoalmuerzo WHERE p.idpaquete_tipoalmuerzo = '.$idpaqueteAlmuerzo.' LIMIT 1');
        
        $tiposAlmuerzos=DB::select('SELECT idtipoalmuerzo, nombre FROM tiposalmuerzos');

        return view('paquetes/almuerzo/editar', compact('paquetesAlmuerzos', 'tiposAlmuerzos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaquetesTipoalmuerzos  $paquetesTipoalmuerzos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idPaqueteAlmuerzo)
    {
        PaquetesTipoalmuerzos::where('idpaquete_tipoalmuerzo', $idPaqueteAlmuerzo)
        ->update(['observacion'=>$request->post('observacion'),
                    'idtipoalmuerzo'=>$request->post('idtipoalmuerzo')
        ]);
        
        return redirect()->route("paquetes.detalles",[$request->post('idpaqueteturistico')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaquetesTipoalmuerzos  $paquetesTipoalmuerzos
     * @return \Illuminate\Http\Response
     */
    public function destroy($idPaqueteAlmuerzo)
    {
        $idPaquete=DB::select('SELECT p.idpaqueteturistico FROM paquetes_tipoalmuerzos p WHERE p.idpaquete_tipoalmuerzo = '.$idPaqueteAlmuerzo.' LIMIT 1');
        
        
        PaquetesTipoalmuerzos::where('idpaquete_tipoalmuerzo',$idPaqueteAlmuerzo)
        ->delete();
        
        return redirect()->route("paquetes.detalles",[$idPaquete[0]->idpaqueteturistico]);
    }
}
