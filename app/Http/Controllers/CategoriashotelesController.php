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
        return $idCategoriaHotel;
    }

    
    
    public function update(Request $request, Categoriashoteles $categoriashoteles)
    {
        //
    }

    
    
    public function destroy(Categoriashoteles $categoriashoteles)
    {
        //
    }
}
