<?php

namespace App\Http\Controllers;

use App\Models\PaquetesTuristicos;
use App\Models\Fotogalerias;
use App\Models\FotoPaquetes;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PaquetesTuristicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $paquetes=(DB::select('SELECT * FROM paquetes_turisticos p'));
        return view('paqueteturistico', compact('paquetes'));
    }

    public function detallepaquetes(){
        $galeriaFotos=(DB::select('SELECT fg.descripcionfoto, fg.imagen, f.idfotogaleria, idpaqueteturistico FROM foto_paquetes f
        INNER JOIN fotogalerias fg on f.idfoto_paquete=fg.idfotogaleria'));
        //return $galeriaFotos;
        return view('detallespaquete', compact('galeriaFotos'));
    }


    public function create()
    {
        //
        
    }

    
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre' => 'required',  'imagen_principal' => 'required|image|mimes:jpeg,png,svg|max:1024'
        ]);

         $paquetesTuristicos = $request->all();
         
         if($imagen_principal = $request->file('imagen_principal')) {
             $rutaGuardarImg = 'imagen/';
             $imagenPaquete = date('YmdHis'). "." . $imagen_principal->getClientOriginalExtension();
             $imagen_principal->move($rutaGuardarImg, $imagenPaquete);
             $paquetesTuristicos['imagen_principal'] = "$imagenPaquete";             
         }
         
         PaquetesTuristicos::create($paquetesTuristicos);
         return redirect()->route('paquetes.formulario.nuevo')->with("succes","Agregado con éxito");
        //return "Insertado";
    }

    
    public function show(PaquetesTuristicos $paquetesTuristicos)
    {
        //
    }
    public function edit(PaquetesTuristicos $paquetesTuristicos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaquetesTuristicos  $paquetesTuristicos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaquetesTuristicos $paquetesTuristicos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaquetesTuristicos  $paquetesTuristicos
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaquetesTuristicos $paquetesTuristicos)
    {
        //
    }
}
