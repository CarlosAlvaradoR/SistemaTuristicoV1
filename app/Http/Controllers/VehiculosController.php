<?php

namespace App\Http\Controllers;

use App\Models\Vehiculos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class VehiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        //
        $datosEmpresa=DB::select('SELECT id, nombre_empresa FROM empresastransportes WHERE slug="'.$slug.'"');
        $vehiculos = DB::select('SELECT id, descripcion, tipovehiculo_id, empresatransporte_id FROM vehiculos 
        WHERE empresatransporte_id = '.$datosEmpresa[0]->id.'');
        
        $empresaIds=$datosEmpresa[0]->id;
        $nombre=$datosEmpresa[0]->nombre_empresa;
        
        //return $empresaId;
        return view('viaje/vehiculos/index', compact('vehiculos', 'empresaIds', 'nombre'));
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
        $slug=Str::slug($request->post('nombre_empresa'), '-');
        $vehiculos = Vehiculos::create([
            'placa'=> $request->post('placa'),
            'descripcion' => $request->post('descripcion'),
            'slug'=> $request->post('placa'), 
            'tipovehiculo_id'=> $request->post('tipo_vehiculo'), 
            'empresatransporte_id'=> $id
        ]);
        return redirect()->route('nueva.vehiculo.empresa.formulario',[$id])->with("succes","Agregado con éxito");
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
