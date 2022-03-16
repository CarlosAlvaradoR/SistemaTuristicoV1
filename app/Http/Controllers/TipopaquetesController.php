<?php

namespace App\Http\Controllers;

use App\Models\Tipopaquetes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TipopaquetesController extends Controller
{
    
    public function index()
    {
        $tipos=DB::select('SELECT idtipopaquete, nombretipo FROM tipopaquetes');
        return view('paquetes/tipopaquetes/index', compact('tipos'));
    }

    public function formularioNuevosTipos(){
        return view('paquetes/tipopaquetes/formularioNuevos');
    }


    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
        Tipopaquetes::create([
            'nombretipo'=> $request->post('nombretipo')
        ]);
        
        return redirect()->route('formulario.nuevo.tipo.paquete')->with("succes","Agregado con éxito"); 
    }

    
    public function show(Tipopaquetes $tipopaquetes)
    {
        //
    }

    
    public function edit($id)
    {
        //
        $tipos=DB::select('SELECT idtipopaquete, nombretipo FROM tipopaquetes where idtipopaquete = '.$id.' LIMIT 1');
        return view('paquetes/tipopaquetes/editar', compact('tipos'));
    }

    
    public function update(Request $request, $idtipopaquetes)
    {
        // ACTUALIZAR
        Tipopaquetes::where('idtipopaquete',$idtipopaquetes)
        ->update(['nombretipo'=>$request->post('nombretipo')]);
        
        
        return redirect()->route("index.tipo.paquete");
    }

    
    public function destroy($idtipopaquetes)
    {
        Tipopaquetes::where('idtipopaquete',$idtipopaquetes)
        ->delete();

        return redirect()->route("index.tipo.paquete");
    }
}
