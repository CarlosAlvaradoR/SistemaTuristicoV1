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
        
        $paquetesTiposalimentaciones=DB::select('SELECT p.idpaquete_tipoalimentacion, p.descripcion, p.idpaqueteturistico , p.idtipoalimentacion, t.nombretipo FROM paquetes_tipoalimentaciones p
        INNER JOIN tipoalimentaciones t on p.idtipoalimentacion=t.idtipoalimentacion
        WHERE idpaquete_tipoalimentacion = '.$idPaqueteTipoAlimentacion.' ORDER BY idpaquete_tipoalimentacion LIMIT 1');
        
        $tipoAlimentaciones=DB::select('SELECT idtipoalimentacion, nombretipo FROM tipoalimentaciones');
        
        return view('paquetes/alimentacionCampo/editar', compact('idpaquetes','paquetesTiposalimentaciones','tipoAlimentaciones'));
    }

    
    public function update(Request $request, $idPaqueteTipoAlimentacion)
    {
        //
        /**
         * tipo=DB o request
         */
        
        PaquetesTipoalimentaciones::where('idpaquete_tipoalimentacion',$idPaqueteTipoAlimentacion)
        ->update(['descripcion'=>$request->post('descripcion'),
                    'idtipoalimentacion'=>$request->post('idtipoalimentacion')
        ]);
        
        return redirect()->route("paquetes.detalles",[$request->post('idpaqueteturistico')]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaquetesTipoalimentaciones  $paquetesTipoalimentaciones
     * @return \Illuminate\Http\Response
     */
    public function destroy($idPaqueteAlimentacionCampo)
    {
        //
        $idPaquete=DB::select('SELECT idpaqueteturistico FROM paquetes_tipoalimentaciones WHERE idpaquete_tipoalimentacion = '.$idPaqueteAlimentacionCampo.' LIMIT 1');
        
        PaquetesTipoalimentaciones::where('idpaquete_tipoalimentacion',$idPaqueteAlimentacionCampo)
        ->delete();

        return redirect()->route("paquetes.detalles",[$idPaquete[0]->idpaqueteturistico]);
    }
}
