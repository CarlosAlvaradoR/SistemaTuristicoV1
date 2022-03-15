<?php

namespace App\Http\Controllers;

use App\Models\Tipopaquetes;
use Illuminate\Http\Request;

class TipopaquetesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('paquetes/tipopaquetes/formulariotipos');
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
     * @param  \App\Models\Tipopaquetes  $tipopaquetes
     * @return \Illuminate\Http\Response
     */
    public function show(Tipopaquetes $tipopaquetes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tipopaquetes  $tipopaquetes
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipopaquetes $tipopaquetes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tipopaquetes  $tipopaquetes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipopaquetes $tipopaquetes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tipopaquetes  $tipopaquetes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipopaquetes $tipopaquetes)
    {
        //
    }
}
