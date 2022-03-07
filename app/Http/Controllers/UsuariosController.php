<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use App\Models\Personas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class UsuariosController extends Controller
{
    
    public function index()
    {
        return view('nuevosUsuarios');
    }

    public function mostrarFormularioRegistro(){
        return view('nuevosUsuarios');
    }
    public function mostrarUsuariosPermisos(){
        $usuarios=DB::select('SELECT u.idusuarios, p.dni, p.nombres, p.apellidos FROM personas p
                            INNER JOIN usuarios u on p.idpersona=u.idpersona');
        return view('permisosUsers', compact('usuarios'));
    }

    
    public function mostrarTabsOrgaAceEquipo(){
        return view('organizacionesacemilasguia');
    }


    public function formularionuevospaquetes(){
        return view('formulariopaquetesnuevos');
    }//
    
    public function mostrarFormularioReservaNivelAdmin(){
        return view('reservas/formularioreservar');
    }
    public function mostrarinicio(){
        return view('vistalanding/iniciolanding');
    }
    public function mostrarabout(){
        return view('vistalanding/nosotroslanding');
    }
    public function mostrarDestinos(){
        return view('vistalanding/destinoslanding');
    }
    public function mostrarContacto(){
        return view('vistalanding/contactolanding');
    }
    public function mostrarFormularioLogin(){
        return view('vistalanding/contactolanding');
    }
    public function homedash(){
        return view('iniciodashboard');
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

    public function store(Request $request)
    {
        //Aquí es donde se graban los usuarios
        //$personas=new Personas();
        //$personas->dni=$request->post();
        return $request;
    }

    
    public function show(Usuarios $usuarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuarios $usuarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuarios $usuarios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuarios $usuarios)
    {
        //
    }
}
