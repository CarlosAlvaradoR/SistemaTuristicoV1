<?php

namespace App\Http\Controllers;

use App\Models\Asociaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsociacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $asociaciones=DB::select('SELECT id, nombre, estado FROM asociaciones');
        return view('viaje/asociaciones/index', compact('asociaciones'));
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
        $asociaciones=Asociaciones::create([
            'nombre' => $request->post('nombre'),
            'estado'=> $request->post('estado')
        ]);

        return redirect()->route('nuevas.asociaciones')->with("succes","Agregado con éxito");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asociaciones  $asociaciones
     * @return \Illuminate\Http\Response
     */
    public function show(Asociaciones $asociaciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asociaciones  $asociaciones
     * @return \Illuminate\Http\Response
     */
    public function edit(Asociaciones $asociaciones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asociaciones  $asociaciones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asociaciones $asociaciones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asociaciones  $asociaciones
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asociaciones $asociaciones)
    {
        //
    }
}
