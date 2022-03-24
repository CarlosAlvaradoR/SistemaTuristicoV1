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
        
        $paquetesTiposTransporte=new PaquetesTipotransportes;
        $paquetesTiposTransporte->descripcion=$request->post('descripcion');
        $paquetesTiposTransporte->cantidad=$request->post('cantidad');
        $paquetesTiposTransporte->idpaqueteturistico=$request->post('idpaqueteturistico');
        $paquetesTiposTransporte->idtipotrasnporte=$request->post('idtipotrasnporte');
        $paquetesTiposTransporte->save();
        return redirect()->route("index.nuevo.tipo.transporte.paquete",[$request->post('idpaqueteturistico')])->with("succes","Agregado con éxito");
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
    public function edit($idPaqueteTipoTransporte)
    {
        //
        $idpaquetes=(DB::select('SELECT idpaqueteturistico FROM paquetes_turisticos WHERE idpaqueteturistico='.$idpaquete.' LIMIT 1'));
        $paquetesTiposTransportes=DB::select('SELECT pt.idpaquete_tipotransporte, pt.descripcion, pt.cantidad, pt.idpaqueteturistico, t.idtipotrasnporte, t.nombretipo FROM paquetes_tipotransportes pt
        INNER JOIN tipotransportes t on t.idtipotrasnporte = pt.idtipotrasnporte
        WHERE pt.idpaquete_tipotransporte = '.$idPaqueteTipoTransporte.' LIMIT 1');
        return view('paquetes/transportes/editar', compact('idpaquetes','paquetesTiposTransportes'));
    }

    
    public function update(Request $request, PaquetesTipotransportes $paquetesTipotransportes)
    {
        //
    }

   
    public function destroy(PaquetesTipotransportes $paquetesTipotransportes)
    {
        //
    }
}
