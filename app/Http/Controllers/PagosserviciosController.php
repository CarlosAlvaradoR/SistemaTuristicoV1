<?php

namespace App\Http\Controllers;

use App\Models\Pagosservicios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PagosserviciosController extends Controller
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
        
        return view('paquetes/servicios/nuevo', compact('idpaquetes'));
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
        $pagosServicios=  new Pagosservicios();
        $pagosServicios->descripcion=$request->post('descripcion');
        $pagosServicios->monto=$request->post('monto');
        $pagosServicios->idpaqueteturistico=$request->post('idpaqueteturistico');
        $pagosServicios->save();
        return redirect()->route("index.formulario.nuevo.servicio",[$request->post('idpaqueteturistico')])->with("succes","Agregado con éxito");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pagosservicios  $pagosservicios
     * @return \Illuminate\Http\Response
     */
    public function show(Pagosservicios $pagosservicios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pagosservicios  $pagosservicios
     * @return \Illuminate\Http\Response
     */
    public function edit($idPagoServicios)
    {
        //
        $servicios=DB::select('SELECT idpagoservicio, descripcion, monto, idpaqueteturistico FROM pagosservicios p WHERE idpagoservicio = '.$idPagoServicios.' LIMIT 1');
        return view('paquetes/servicios/editar', compact('servicios'));
    }


    public function update(Request $request, $idPagoServicio)
    {
        
        Pagosservicios::where('idpagoservicio',$idPagoServicio)
        ->update(['descripcion'=>$request->post('descripcion'),
                    'monto'=>$request->post('monto')
        ]);
        
        return redirect()->route("paquetes.detalles",[$request->post('idpaqueteturistico')]);
    }

    
    public function destroy($idPagoServicio)
    {
        //
        
        $idPaquete=DB::select('SELECT i.idpaqueteturistico FROM pagosservicios i WHERE i.idpagoservicio = '.$idPagoServicio.' LIMIT 1');
        
        Pagosservicios::where('idpagoservicio',$idPagoServicio)
        ->delete();

        return redirect()->route("paquetes.detalles",[$idPaquete[0]->idpaqueteturistico]);
    }
}
