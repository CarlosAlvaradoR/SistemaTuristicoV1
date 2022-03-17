<?php

namespace App\Http\Controllers;

use App\Models\Actividadesitinerarios;
use App\Models\ItinerariosPaquetes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActividadesitinerariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idpaquete)
    {
        //
        $idpaquetes=(DB::select('SELECT idpaqueteturistico FROM paquetes_turisticos WHERE idpaqueteturistico='.$idpaquete.' LIMIT 1'));
        return view('paquetes/itinerario/nuevo', compact('idpaquetes'));
    }

    
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
        $actividadesItinerarios=  new Actividadesitinerarios();
        $actividadesItinerarios->nombreactividad=$request->post('nombreactividad');
        $actividadesItinerarios->save();
        
        $idUltimaActividad=(DB::select('SELECT idactividaditinerario FROM actividadesitinerarios ORDER BY idactividaditinerario DESC LIMIT 1'));

        $itinerarioPaquetes= new ItinerariosPaquetes();
        $itinerarioPaquetes->descripcion=$request->post('descripcion');
        $itinerarioPaquetes->idpaqueteturistico=$request->post('idpaqueteturistico');
        $itinerarioPaquetes->idactividaditinerario=($idUltimaActividad[0]->idactividaditinerario);
        $itinerarioPaquetes->save();

        return redirect()->route("index.formulario.nuevo.itinerario",[$request->post('idpaqueteturistico')])->with("succes","Agregado con éxito");
    }

    public function show(Actividadesitinerarios $actividadesitinerarios)
    {
        //
    }

    
    public function edit($idActividadItinerario)
    {
        $actividadesItinerarios=DB::select('SELECT a.idactividaditinerario, a.nombreactividad, i.descripcion, i.idpaqueteturistico   FROM actividadesitinerarios a
        INNER JOIN itinerarios_paquetes i on a.idactividaditinerario=i.idactividaditinerario WHERE a.idactividaditinerario= '.$idActividadItinerario.' LIMIT 1');
        
        return view('paquetes/itinerario/editar', compact('actividadesItinerarios'));
    }


    public function update(Request $request, $idActividadItinerario)
    {
        //
        Actividadesitinerarios::where('idactividaditinerario',$idActividadItinerario)
        ->update(['nombreactividad'=>$request->post('nombreactividad')]);

        ItinerariosPaquetes::where('idactividaditinerario',$idActividadItinerario)
        ->update(['descripcion'=>$request->post('descripcion')]);
        
        
        return redirect()->route("paquetes.detalles",[$request->post('idpaqueteturistico')]);
    }

    
    public function destroy($idActividadItinerario)
    {
        $idPaquete=DB::select('SELECT i.idpaqueteturistico FROM itinerarios_paquetes i WHERE i.idactividaditinerario = '.$idActividadItinerario.' LIMIT 1');
        //itinerarios_paquetes, descripcion, idpaqueteturistico, , created_at, updated_at
        ItinerariosPaquetes::where('idactividaditinerario',$idActividadItinerario)
        ->delete();

        Actividadesitinerarios::where('idactividaditinerario',$idActividadItinerario)
        ->delete();

        return redirect()->route("paquetes.detalles",[$idPaquete[0]->idpaqueteturistico]);
    }
}
