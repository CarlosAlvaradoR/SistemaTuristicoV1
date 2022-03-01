<?php

namespace App\Http\Controllers;

use App\Models\Personas;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class PersonasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos= Personas::all();
        return $datos;
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
        //Aquí es donde se graban los usuarios
        $personas=new Personas();
        $personas->dni=$request->post('dni');
        $personas->nombres=$request->post('nombres');
        $personas->apellidos=$request->post('apellidos');
        $personas->genero=$request->post('genero');
        $personas->direccion=$request->post('direccion');
        $personas->telefono=$request->post('telefono');
        $personas->correo=$request->post('correo');
        $personas->save();

        ///$ultimoid=$personas->idpersona;
        $idpersonas=(DB::select('SELECT idpersona as idpersona FROM personas ORDER BY idpersona desc limit 1'));
        
        //$data = Personas::latest('idpersona')->first();
        

        //$cantidad = Personas::where('idpersona', '1')->get()->last();
        
        $usuarios=new Usuarios;
        $usuarios->nombreusuario=$request->post('dni');
        $usuarios->passwordusuario=$request->post('dni');
        $usuarios->idtipousuario=$request->post('idtipousuario');
        $usuarios->idpersona=($idpersonas[0]->idpersona);
        $usuarios->save();
        return redirect()->route("usuarios.nuevos")->with("succes","Agregado con éxito");
        //return redirect() ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function show(Personas $personas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function edit(Personas $personas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personas $personas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personas $personas)
    {
        //
    }
}
