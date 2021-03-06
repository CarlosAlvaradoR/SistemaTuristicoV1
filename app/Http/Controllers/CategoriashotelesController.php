<?php

namespace App\Http\Controllers;

use App\Models\Categoriashoteles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CategoriashotelesController extends Controller
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
        return view('paquetes/categoriaHoteles/nuevo', compact('idpaquetes'));
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
        //
        $categoriaHotelesPaquete=  new Categoriashoteles();
        $categoriaHotelesPaquete->descripcion=$request->post('descripcion');
        $categoriaHotelesPaquete->idpaqueteturistico=$request->post('idpaqueteturistico');
        $categoriaHotelesPaquete->save();
        return redirect()->route("index.formulario.nueva.categoria.hotel.paquete",[$request->post('idpaqueteturistico')])->with("succes","Agregado con éxito");
    }

   
    public function show(Categoriashoteles $categoriashoteles)
    {
        //
    }

    
    
    public function edit($idCategoriaHotel)
    {
        //
        $categoriaHoteles=DB::select('SELECT idcategoriahotel, descripcion, idpaqueteturistico FROM categoriashoteles WHERE idcategoriahotel = '.$idCategoriaHotel.' LIMIT 1');
        

        return view('paquetes/categoriaHoteles/editar', compact('categoriaHoteles'));
    }

    
    
    public function update(Request $request, $idCategoriaHotel)
    {
        //
        Categoriashoteles::where('idcategoriahotel',$idCategoriaHotel)
        ->update(['descripcion'=>$request->post('descripcion')
        ]);
        
        return redirect()->route("paquetes.detalles",[$request->post('idpaqueteturistico')]);
    }

    
    
    public function destroy($idCategoriaHotel)
    {
        //
        $idPaquete=DB::select('SELECT idpaqueteturistico FROM categoriashoteles WHERE idcategoriahotel= '.$idCategoriaHotel.' LIMIT 1');
        
        Categoriashoteles::where('idcategoriahotel',$idCategoriaHotel)
        ->delete();

        return redirect()->route("paquetes.detalles",[$idPaquete[0]->idpaqueteturistico]);
    }
}
