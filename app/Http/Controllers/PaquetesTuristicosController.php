<?php

namespace App\Http\Controllers;

use App\Models\PaquetesTuristicos;
use App\Models\TipoPaquetes;
use Illuminate\Http\Request;

class PaquetesTuristicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$paquetes = PaquetesTuristicos::paginate(12);
        return view('paquetes_admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = TipoPaquetes::all();
        return view('paquetes_admin.create', compact('tipos'));
        
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaquetesTuristicos  $paquetesTuristicos
     * @return \Illuminate\Http\Response
     */
    public function show(PaquetesTuristicos $slug)
    {
        //
        //return $slug;
        //$paquete = PaquetesTuristicos::findorFail($paquetesTuristicos);
        //return $paquete;
        $paquete = $slug;
        return view('paquetes_admin.detalle_paquete', compact('paquete'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaquetesTuristicos  $paquetesTuristicos
     * @return \Illuminate\Http\Response
     */
    public function edit(PaquetesTuristicos $slug)
    {
        //
        $tipos = TipoPaquetes::all();
        $paquete = $slug;
        //return $paquete;
        return view('paquetes_admin.editar', compact('tipos', 'paquete'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaquetesTuristicos  $paquetesTuristicos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaquetesTuristicos $paquetesTuristicos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaquetesTuristicos  $paquetesTuristicos
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaquetesTuristicos $paquetesTuristicos)
    {
        //
    }

    public function detalle($paquetesTuristicos){
        
    }

    public function lugares_atractivos(){
        return view('paquetes_admin.lugares_atractivos');
    }

    public function tipos_personal(){
        return view('paquetes_admin.tipos_personal');
    }

    public function tipos_transporte(){
        return view('paquetes_admin.tipo_transporte');
    }

    public function tipos_alimentacion(){
        return view('paquetes_admin.tipo_alimentacion');
    }

    public function tipos_acemilas(){
        return view('paquetes_admin.tipo_acemilas');
    }

    public function tipos_almuerzos(){
        return view('paquetes_admin.tipo_almuerzos');
    }

}
