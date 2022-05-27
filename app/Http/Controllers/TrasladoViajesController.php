<?php

namespace App\Http\Controllers;

use App\Models\TrasladoViajes;
use Illuminate\Http\Request;

class TrasladoViajesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('viaje/index/asignarVehiculos');
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
     * @param  \App\Models\TrasladoViajes  $trasladoViajes
     * @return \Illuminate\Http\Response
     */
    public function show(TrasladoViajes $trasladoViajes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TrasladoViajes  $trasladoViajes
     * @return \Illuminate\Http\Response
     */
    public function edit(TrasladoViajes $trasladoViajes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TrasladoViajes  $trasladoViajes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrasladoViajes $trasladoViajes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TrasladoViajes  $trasladoViajes
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrasladoViajes $trasladoViajes)
    {
        //
    }
}
