<?php

namespace App\Http\Controllers;

use App\Models\Fotogalerias;
use App\Models\FotoPaquetes;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;

class FotogaleriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $consulta=DB::select('SELECT fg.descripcionfoto, fg.imagen, f.idfotogaleria, idpaqueteturistico FROM foto_paquetes f
        INNER JOIN fotogalerias fg on f.idfoto_paquete=fg.idfotogaleria');
        return $consulta;
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fotogalerias  $fotogalerias
     * @return \Illuminate\Http\Response
     */
    public function show(Fotogalerias $fotogalerias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fotogalerias  $fotogalerias
     * @return \Illuminate\Http\Response
     */
    public function edit(Fotogalerias $fotogalerias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fotogalerias  $fotogalerias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fotogalerias $fotogalerias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fotogalerias  $fotogalerias
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fotogalerias $fotogalerias)
    {
        //
    }
}
