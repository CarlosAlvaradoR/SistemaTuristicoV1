<?php

namespace App\Http\Controllers;

use App\Models\PaquetesTipospersonales;
use Illuminate\Http\Request;

class PaquetesTipospersonalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('paquetes/tipoPersonal/nuevo');
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
    public function edit(PaquetesTipospersonales $paquetesTipospersonales)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaquetesTipospersonales  $paquetesTipospersonales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaquetesTipospersonales $paquetesTipospersonales)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaquetesTipospersonales  $paquetesTipospersonales
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaquetesTipospersonales $paquetesTipospersonales)
    {
        //
    }
}
