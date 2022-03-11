<?php

namespace App\Http\Controllers;

use App\Models\Mapasreferenciales;
use App\Models\MapasPaquetes;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MapasreferencialesController extends Controller
{
    
    
    public function index()
    {
        //
    }

    
    
    public function create()
    {
        //
    }

    
    
    public function store(Request $request)
    {
       
        $mapasReferenciales=  new Mapasreferenciales();
        $mapasReferenciales->nombreruta=$request->post('nombreruta');
        $mapasReferenciales->descripcionruta=$request->post('descripcionruta');
        $mapasReferenciales->save();

        //idpaqueteturistico
        $idmapareferencial=(DB::select('SELECT idmapareferencial FROM mapasreferenciales m ORDER BY idmapareferencial desc limit 1'));

        $mapaPaquetes=new MapasPaquetes();
        $mapaPaquetes->idmapareferencial=($idmapareferencial[0]->idmapareferencial);
        $mapaPaquetes->idpaqueteturistico=$request->post('idpaqueteturistico');
        $mapaPaquetes->save();
        
        //return "Insertado correctamente";
        return redirect()->route("paquetes.detalles.nuevo.paquetes",[$request->post('idpaqueteturistico')])->with("succes","Agregado con éxito");
    }

   
    public function show(Mapasreferenciales $mapasreferenciales)
    {
        //
    }

    
    
    public function edit($id)
    {
        $rutas=(DB::select('SELECT idmapareferencial, nombreruta, descripcionruta FROM mapasreferenciales m WHERE idmapareferencial = '.$id.' LIMIT 1'));
        //echo $id;
        return view('paquetes/mapapaquetes/formularioeditarmapa',compact('rutas'));
    }

    
    
    public function update(Request $request, $id)
    {
        //
        Mapasreferenciales::where('idmapareferencial',$id)
        ->update(['nombreruta'=>$request->post('nombreruta'),'descripcionruta'=>$request->post('descripcionruta')]);
        
        $idpaquete=(DB::select('SELECT  mp.idpaqueteturistico FROM mapasreferenciales m
        INNER JOIN mapas_paquetes mp on mp.idmapareferencial=m.idmapareferencial
        WHERE m.idmapareferencial= '.$id.' LIMIT 1'));
        return redirect()->route("paquetes.detalles",[$idpaquete[0]->idpaqueteturistico]);
        
    }

    
    
    public function destroy(Mapasreferenciales $mapasreferenciales)
    {
        //
    }
}
