<?php

namespace App\Http\Controllers\PaquetesPublicos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaquetesTuristicos;
class PublicPaquetesController extends Controller
{
    //
    public function index(){
        $paquetes = PaquetesTuristicos::paginate(10);
        return view('paquetes_publico.destinos', compact('paquetes'));
    }

    
    public function mostrarDetalleDestinos(PaquetesTuristicos $paquete){
        //return $paquete;
        return view('paquetes_publico.detalle_destinos', compact('paquete'));
    }

    public function mostrarFormularioReservaPublica(){
        return view('reservar_publico.reservar');
    }
}
