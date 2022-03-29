<?php

namespace App\Http\Controllers;

use App\Models\PaquetesAcemilas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PaquetesAcemilasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idpaquete)
    {
        $idpaquetes=(DB::select('SELECT idpaqueteturistico FROM paquetes_turisticos WHERE idpaqueteturistico = '.$idpaquete.' LIMIT 1'));
        $tiposAcemilas=DB::select('SELECT idtipoacemila, nombre FROM tiposacemilas');
        return view('paquetes/acemilasPaquetes/nuevo', compact('idpaquetes', 'tiposAcemilas'));
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
        $paqueteAcemila=  new PaquetesAcemilas();
        $paqueteAcemila->cantidad=$request->post('cantidad');
        $paqueteAcemila->idtipoacemila=$request->post('idtipoacemila');
        $paqueteAcemila->idpaqueteturistico=$request->post('idpaqueteturistico');
        $paqueteAcemila->save();
        return redirect()->route("index.nuevo.tipo.acemila.paquete",[$request->post('idpaqueteturistico')])->with("succes","Agregado con éxito");
    }

    public function show(PaquetesAcemilas $paquetesAcemilas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaquetesAcemilas  $paquetesAcemilas
     * @return \Illuminate\Http\Response
     */
    public function edit($idpaquetAcemila)
    {
        //
        $paquetesAcemilas = DB::select('SELECT t.nombre, p.idpaquete_acemila, p.cantidad, p.idtipoacemila, p.idpaqueteturistico FROM tiposacemilas t
        INNER JOIN paquetes_acemilas p on t.idtipoacemila=p.idtipoacemila WHERE p.idpaquete_acemila= '.$idpaquetAcemila.' LIMIT 1');
        
        $tiposAcemilas=DB::select('SELECT idtipoacemila, nombre FROM tiposacemilas');

        return view('paquetes/acemilasPaquetes/editar', compact('paquetesAcemilas', 'tiposAcemilas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaquetesAcemilas  $paquetesAcemilas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idpaquetAcemila)
    {
        PaquetesAcemilas::where('idpaquete_acemila',$idpaquetAcemila)
        ->update(['cantidad'=>$request->post('cantidad'),
                    'idtipoacemila'=>$request->post('idtipoacemila')
        ]);
        
        return redirect()->route("paquetes.detalles",[$request->post('idpaqueteturistico')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaquetesAcemilas  $paquetesAcemilas
     * @return \Illuminate\Http\Response
     */
    public function destroy($idpaqueteAcemila)
    {
        $idPaquete=DB::select('SELECT idpaqueteturistico FROM paquetes_acemilas WHERE idpaquete_acemila = '.$idpaqueteAcemila.'');
        
        PaquetesAcemilas::where('idpaquete_acemila',$idpaqueteAcemila)
        ->delete();

        return redirect()->route("paquetes.detalles",[$idPaquete[0]->idpaqueteturistico]);
    }
}
