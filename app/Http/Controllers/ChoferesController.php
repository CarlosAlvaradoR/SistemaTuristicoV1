<?php

namespace App\Http\Controllers;

use App\Models\Choferes;
use App\Models\Personas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChoferesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $idVehiculo=$id;
        $choferes=DB::select('SELECT p.nombres, p.apellidos, ch.licencia_conducir, ch.id FROM personas p
        INNER JOIN choferes ch on p.idpersona=ch.idpersona
        INNER JOIN vehiculos v on v.id=ch.vehiculo_id
        WHERE v.id='.$id.'');
        $nacionalidades=DB::select('SELECT idnacionalidad, nombre FROM nacionalidades');
        return view('viaje/conductores/index', compact('nacionalidades', 'idVehiculo', 'choferes'));
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
    public function store(Request $request, $idVehiculo)
    {
        //
        $persona = Personas::create([
            'dni'=>$request->post('dni'), 
            'nombres'=>$request->post('nombres'), 
            'apellidos'=>$request->post('apellidos'), 
            'genero'=>$request->post('genero'), 
            'direccion'=>$request->post('direccion'), 
            'telefono'=>$request->post('telefono'), 
            'correo'=>$request->post('correo')
        ]);
        $idpersona=(DB::select('SELECT idpersona as idpersona FROM personas ORDER BY idpersona desc limit 1'));
        
        $choferes=Choferes::create([
            'licencia_conducir'=>$request->post('licencia'), 
            'tipo'=>$request->post('tipo-chofer-vehiculo'), 
            'idpersona' =>$idpersona[0]->idpersona, 
            'vehiculo_id' => $idVehiculo
        ]);

        return redirect()->route('nuevos.choferes.vehiculo', [$idVehiculo])->with("succes","Agregado con éxito");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Choferes  $choferes
     * @return \Illuminate\Http\Response
     */
    public function show(Choferes $choferes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Choferes  $choferes
     * @return \Illuminate\Http\Response
     */
    public function edit(Choferes $choferes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Choferes  $choferes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Choferes $choferes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Choferes  $choferes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Choferes $choferes)
    {
        //
    }
}