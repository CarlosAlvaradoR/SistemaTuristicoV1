<?php

namespace App\Http\Controllers;

use App\Models\PaquetesTipoalimentaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaquetesTipoalimentacionesController extends Controller
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
        $tiposAlimentacion=DB::select('SELECT idtipoalimentacion, nombretipo FROM tipoalimentaciones');
        return view('paquetes/alimentacionCampo/nuevo', compact('idpaquetes', 'tiposAlimentacion'));
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
        $paquetesTipoAlimentacion=new PaquetesTipoalimentaciones;
        $paquetesTipoAlimentacion->descripcion=$request->post('descripcion');
        $paquetesTipoAlimentacion->idtipoalimentacion=$request->post('idtipoalimentacion');
        $paquetesTipoAlimentacion->idpaqueteturistico=$request->post('idpaqueteturistico');
        $paquetesTipoAlimentacion->save();
        return redirect()->route("index.nuevo.alimentacion.campo.paquete",[$request->post('idpaqueteturistico')])->with("succes","Agregado con éxito");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaquetesTipoalimentaciones  $paquetesTipoalimentaciones
     * @return \Illuminate\Http\Response
     */
    public function show(PaquetesTipoalimentaciones $paquetesTipoalimentaciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaquetesTipoalimentaciones  $paquetesTipoalimentaciones
     * @return \Illuminate\Http\Response
     */
    public function edit($idPaqueteTipoAlimentacion)
    {
        //
        $idpaquetes=(DB::select('SELECT idpaqueteturistico FROM paquetes_tipoalimentaciones WHERE idpaqueteturistico = '.$idPaqueteTipoAlimentacion.' LIMIT 1'));
        $paquetesTiposTransportes=DB::select('SELECT pt.idpaquete_tipotransporte, pt.descripcion, pt.cantidad, pt.idpaqueteturistico, t.idtipotrasnporte, t.nombretipo FROM paquetes_tipotransportes pt
        INNER JOIN tipotransportes t on t.idtipotrasnporte = pt.idtipotrasnporte
        WHERE pt.idpaquete_tipotransporte = '.$idPaqueteTipoAlimentacion.' LIMIT 1');
        $tiposTransportes=DB::select('SELECT idtipotrasnporte, nombretipo FROM tipotransportes');
        return view('paquetes/transportes/editar', compact('idpaquetes','paquetesTiposTransportes','tiposTransportes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaquetesTipoalimentaciones  $paquetesTipoalimentaciones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaquetesTipoalimentaciones $paquetesTipoalimentaciones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaquetesTipoalimentaciones  $paquetesTipoalimentaciones
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaquetesTipoalimentaciones $paquetesTipoalimentaciones)
    {
        //
    }
}
