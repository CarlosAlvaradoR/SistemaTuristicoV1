<?php

namespace App\Http\Controllers;

use App\Models\PaquetesTipospersonales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PaquetesTipospersonalesController extends Controller
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
        $tiposPersonales=DB::select('SELECT idtipopersonal, nombreTipo FROM tipospersonales');
        return view('paquetes/tipoPersonal/nuevo', compact('idpaquetes', 'tiposPersonales'));
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
        $PaquetesTiposPersonal=  new PaquetesTipospersonales();
        $PaquetesTiposPersonal->cantidad=$request->post('cantidad');
        $PaquetesTiposPersonal->idtipopersonal=$request->post('idtipopersonal');
        $PaquetesTiposPersonal->idpaqueteturistico=$request->post('idpaqueteturistico');
        $PaquetesTiposPersonal->save();
        return redirect()->route("index.nuevo.tipopersonal.paquete",[$request->post('idpaqueteturistico')])->with("succes","Agregado con éxito");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaquetesTipospersonales  $paquetesTipospersonales
     * @return \Illuminate\Http\Response
     */
    public function show(PaquetesTipospersonales $paquetesTipospersonales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaquetesTipospersonales  $paquetesTipospersonales
     * @return \Illuminate\Http\Response
     */
    public function edit($idpaquetesTiposPersonales)
    {
        $paqueteTipoPersonal=DB::select('SELECT p.id, p.cantidad, p.idpaqueteturistico FROM paquetes_tipospersonales p
        INNER JOIN tipospersonales t on t.idtipopersonal=p.idtipopersonal WHERE p.id = '.$idpaquetesTiposPersonales.'');
        
        $tiposPersonales=DB::select('SELECT idtipopersonal, nombreTipo FROM tipospersonales');

        return view('paquetes/tipoPersonal/editar', compact('paqueteTipoPersonal','tiposPersonales'));;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaquetesTipospersonales  $paquetesTipospersonales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idpaquetesTiposPersonales)
    {
        
        PaquetesTipospersonales::where('id',$idpaquetesTiposPersonales)
        ->update(['cantidad'=>$request->post('cantidad'),
                    'idtipopersonal'=>$request->post('idtipopersonal')
        ]);
        
        return redirect()->route("paquetes.detalles",[$request->post('idpaqueteturistico')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaquetesTipospersonales  $paquetesTipospersonales
     * @return \Illuminate\Http\Response
     */
    public function destroy($idpaquetesTiposPersonales)
    {
        //
        $idPaquete=DB::select('SELECT idpaqueteturistico FROM paquetes_tipospersonales WHERE id='.$idpaquetesTiposPersonales.'');
        
        PaquetesTipospersonales::where('id',$idpaquetesTiposPersonales)
        ->delete();
        
        return redirect()->route("paquetes.detalles",[$idPaquete[0]->idpaqueteturistico]);
    }
}
