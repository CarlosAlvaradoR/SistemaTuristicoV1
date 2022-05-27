<?php

namespace App\Http\Controllers;

use App\Models\Cocineros;
use App\Models\Personas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CocinerosController extends Controller
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
        $cocineros=DB::select('SELECT p.nombres, p.apellidos, co.id FROM personas p
        INNER JOIN cocineros co on p.idpersona=co.idpersona');
        return view('viaje/cocineros/index', compact('nacionalidades','cocineros'));
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
        
        $cocineros=Cocineros::create([
            'idpersona' =>$idpersona[0]->idpersona
        ]);

        return redirect()->route('nuevos.cocineros')->with("succes","Agregado con éxito");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cocineros  $cocineros
     * @return \Illuminate\Http\Response
     */
    public function show(Cocineros $cocineros)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cocineros  $cocineros
     * @return \Illuminate\Http\Response
     */
    public function edit(Cocineros $cocineros)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cocineros  $cocineros
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cocineros $cocineros)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cocineros  $cocineros
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cocineros $cocineros)
    {
        //
    }
}
