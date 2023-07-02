<?php

namespace App\Http\Controllers;

use App\Models\ConfiguracionImagenes;
use Illuminate\Http\Request;

class ConfiguracionImagenesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('users.config.config');
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
     * @param  \App\Models\ConfiguracionImagenes  $configuracionImagenes
     * @return \Illuminate\Http\Response
     */
    public function show(ConfiguracionImagenes $configuracionImagenes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ConfiguracionImagenes  $configuracionImagenes
     * @return \Illuminate\Http\Response
     */
    public function edit(ConfiguracionImagenes $configuracionImagenes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ConfiguracionImagenes  $configuracionImagenes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ConfiguracionImagenes $configuracionImagenes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ConfiguracionImagenes  $configuracionImagenes
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConfiguracionImagenes $configuracionImagenes)
    {
        //
    }
}
