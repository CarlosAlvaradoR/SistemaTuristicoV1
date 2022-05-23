<?php

namespace App\Http\Controllers;

use App\Models\Vehiculos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $vehiculos = DB::select('SELECT id, descripcion, tipovehiculo_id, empresatransporte_id FROM vehiculos 
        WHERE empresatransporte_id = '.$id.'');
        
        $empresaIds=$id;
        //return $empresaId;
        return view('viaje/vehiculos/index', compact('vehiculos', 'empresaIds'));
    }

    
    public function create($id)
    {
        //
        $empresaIds=$id;
        $tipoVehiculos=DB::select('SELECT id, nombre FROM tipovehiculos');
        return view('viaje/vehiculos/nuevo', compact('empresaIds', 'tipoVehiculos'));
    }

    /**
     * Store a newly created resource in storage.
     *Nueva Empresa de Transportes
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //
        $vehiculos = Vehiculos::create([
            'descripcion' => $request->post('descripcion'), 
            'tipovehiculo_id'=> $request->post('tipo_vehiculo'), 
            'empresatransporte_id'=> $id
        ]);
        return "Insertado correctamente";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehiculos  $vehiculos
     * @return \Illuminate\Http\Response
     */
    public function show(Vehiculos $vehiculos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehiculos  $vehiculos
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehiculos $vehiculos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehiculos  $vehiculos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehiculos $vehiculos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehiculos  $vehiculos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehiculos $vehiculos)
    {
        //
    }
}
