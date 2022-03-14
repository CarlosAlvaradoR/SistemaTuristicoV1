<?php

namespace App\Http\Controllers;

use App\Models\Fotogalerias;
use App\Models\FotoPaquetes;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;

class FotogaleriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $consulta=DB::select('SELECT fg.descripcionfoto, fg.imagen, f.idfotogaleria, idpaqueteturistico FROM foto_paquetes f
        INNER JOIN fotogalerias fg on f.idfoto_paquete=fg.idfotogaleria');
        return view('paquetes/fotogalerias/formularionuevasfotosgaleria');
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request, $idpaquete)
    {
        $request->validate([
            'nombre' => 'descripcionfoto',  'imagen' => 'required|image|mimes:jpeg,png,svg|max:1024'
        ]);

         $paquetesTuristicos = $request->all();
         
         if($imagen_principal = $request->file('imagen')) {
             $rutaGuardarImg = 'imagen/';
             $imagenPaquete = date('YmdHis'). "." . $imagen_principal->getClientOriginalExtension();
             $imagen_principal->move($rutaGuardarImg, $imagenPaquete);
             $paquetesTuristicos['imagen'] = "$imagenPaquete";             
         }
         
         Fotogalerias::create($paquetesTuristicos);

         //SEGUNDA INSERCION

         return "Insertad correctamente";
         //return redirect()->route('paquetes.formulario.nuevo')->with("succes","Agregado con éxito");
    }

    
    public function show(Fotogalerias $fotogalerias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fotogalerias  $fotogalerias
     * @return \Illuminate\Http\Response
     */
    public function edit(Fotogalerias $fotogalerias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fotogalerias  $fotogalerias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fotogalerias $fotogalerias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fotogalerias  $fotogalerias
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fotogalerias $fotogalerias)
    {
        //
    }
}
