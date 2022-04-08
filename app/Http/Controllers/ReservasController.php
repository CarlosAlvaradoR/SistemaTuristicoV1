<?php

namespace App\Http\Controllers;

use App\Models\Reservas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ReservasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $dni=$request->get('dni');
        
        if($dni==null){
            $dni='89';
        }
        $cliente=DB::select('SELECT  c.idcliente, p.dni, p.nombres, p.apellidos, if(p.genero=1,"MASCULINO","FEMENINO") as genero, p.direccion, n.nombre as nacionalidad  FROM personas p
        INNER JOIN clientes c on p.idpersona=c.idpersona
        INNER JOIN nacionalidades n on n.idnacionalidad=c.idnacionalidad
        WHERE p.dni = '.$dni.' LIMIT 1');
        
        return view('reservas/index/nuevo', compact('cliente'));
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservas  $reservas
     * @return \Illuminate\Http\Response
     */
    public function show(Reservas $reservas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservas  $reservas
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservas $reservas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservas  $reservas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservas $reservas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservas  $reservas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservas $reservas)
    {
        //
    }

    public function pendientes(){
        return view('reservas/index/pendiente');
    }
    public function pagos(){
        return view('reservas/index/pago');
    }
    public function salud(){
        return view('reservas/salud/index');
    }
    public function postergacion(){
        return view('reservas/eventospostergacion/index');
    }
    public function solicitud(){
        return view('reservas/solicitud/atencion');
    }
    public function atencionSolicitud(){
        return view('reservas/solicitud/proceso');
    }
    public function transporte(){
        return view('transporte/index');
    }
    public function viaje(){
        return view('viaje/index');
    }
    public function reser(){
        
        $slug = Str::slug('Laravel 5 Framework de PHP', '-');
        return $slug;
    }
    public function buscar(Request $request){
        $dni=$request->post('dni');
        $cliente=DB::select('SELECT p.dni, p.nombres, p.apellidos FROM clientes c
        INNER JOIN personas p on p.idpersona=c.idpersona WHERE p.dni='.$dni.' LIMIT 1');
        
        return redirect()->route('reservas.formulario.nivel.admin');
    }
}
