<?php

namespace App\Http\Controllers;

use App\Models\Arrieros;
use App\Models\Personas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArrierosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $nacionalidades=DB::select('SELECT idnacionalidad, nombre FROM nacionalidades');
        $arrieros=DB::select('SELECT p.nombres, p.apellidos, a.id FROM personas p
        INNER JOIN arrieros a on p.idpersona=a.idpersona');
        return view('viaje/arrieros/index', compact('nacionalidades','arrieros'));
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
        
        $arrieros=Arrieros::create([
            'idpersona' =>$idpersona[0]->idpersona
        ]);

        return redirect()->route('nuevos.arrieros')->with("succes","Agregado con éxito");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Arrieros  $arrieros
     * @return \Illuminate\Http\Response
     */
    public function show(Arrieros $arrieros)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Arrieros  $arrieros
     * @return \Illuminate\Http\Response
     */
    public function edit(Arrieros $arrieros)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Arrieros  $arrieros
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Arrieros $arrieros)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Arrieros  $arrieros
     * @return \Illuminate\Http\Response
     */
    public function destroy(Arrieros $arrieros)
    {
        //
    }
}
