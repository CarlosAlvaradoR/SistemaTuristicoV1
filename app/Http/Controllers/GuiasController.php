<?php

namespace App\Http\Controllers;

use App\Models\Guias;
use App\Models\Personas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuiasController extends Controller
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
        $guias=DB::select('SELECT p.nombres, p.apellidos, g.id FROM personas p
        INNER JOIN guias g on p.idpersona=g.idpersona');
        return view('viaje/guias/index', compact('nacionalidades','guias'));
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
        
        $guias=Guias::create([
            'idpersona' =>$idpersona[0]->idpersona
        ]);

        return redirect()->route('nuevos.guias')->with("succes","Agregado con éxito");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guias  $guias
     * @return \Illuminate\Http\Response
     */
    public function show(Guias $guias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guias  $guias
     * @return \Illuminate\Http\Response
     */
    public function edit(Guias $guias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guias  $guias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guias $guias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guias  $guias
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guias $guias)
    {
        //
    }
}
