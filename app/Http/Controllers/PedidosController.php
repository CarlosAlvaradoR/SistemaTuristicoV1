<?php

namespace App\Http\Controllers;

use App\Models\Pedidos\ArchivoComprobantes;
use App\Models\Pedidos\PagoProveedores;
use App\Models\Pedidos\Pedidos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedidos\Pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function show(Pedidos $pedidos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedidos\Pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedidos $pedidos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedidos\Pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedidos $pedidos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedidos\Pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedidos $pedidos)
    {
        //
    }

    public function mostrarComprobante(PagoProveedores $pago_proveedores){
        
        //$rutaArchivo = 'Pedidos/PagoProveedores/nombre_del_archivo'; // Obtén la ruta desde la base de datos
        $rutaArchivo = $pago_proveedores->ruta_archivo;
        // Obtén el contenido del archivo en el disco privado
        $contenidoArchivo = Storage::disk('private')->get($rutaArchivo);

        // Devuelve una respuesta adecuada con el contenido del archivo
        return response($contenidoArchivo)
            ->header('Content-Type', Storage::disk('private')->mimeType($rutaArchivo));
    }

    public function mostrarArchivoComprobante(ArchivoComprobantes $archivo){
        
         //$rutaArchivo = 'Pedidos/PagoProveedores/nombre_del_archivo'; // Obtén la ruta desde la base de datos
         $rutaArchivo = $archivo->ruta_archivo;
         // Obtén el contenido del archivo en el disco privado
         $contenidoArchivo = Storage::disk('private')->get($rutaArchivo);
 
         // Devuelve una respuesta adecuada con el contenido del archivo
         return response($contenidoArchivo)
             ->header('Content-Type', Storage::disk('private')->mimeType($rutaArchivo));
    }
}
