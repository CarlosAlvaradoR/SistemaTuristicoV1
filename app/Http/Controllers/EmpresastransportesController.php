<?php

namespace App\Http\Controllers;

use App\Models\Empresastransportes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EmpresastransportesController extends Controller
{
    
    public function index()
    {
        //
        $empresas=DB::select('SELECT id, nombre_empresa, slug FROM empresastransportes');

        return view('viaje/transporte/index', compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('viaje/transporte/nuevo');
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
        $slug=Str::slug($request->post('nombre_empresa'), '-');
        
        $empresa=Empresastransportes::create([
            'nombre_empresa'=>$request->post('nombre_empresa'),
            'slug'=> $slug
        ]);
        return redirect()->route('nueva.empresa')->with("succes","Agregado con éxito");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empresastransportes  $empresastransportes
     * @return \Illuminate\Http\Response
     */
    public function show(Empresastransportes $empresastransportes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empresastransportes  $empresastransportes
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresastransportes $empresastransportes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empresastransportes  $empresastransportes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresastransportes $empresastransportes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empresastransportes  $empresastransportes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresastransportes $empresastransportes)
    {
        //
    }
}
