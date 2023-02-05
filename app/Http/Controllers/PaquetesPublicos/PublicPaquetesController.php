<?php

namespace App\Http\Controllers\PaquetesPublicos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaquetesTuristicos;
use Illuminate\Support\Facades\Auth;

class PublicPaquetesController extends Controller
{
    //
    public function inicio(){
        $paquetes = PaquetesTuristicos::paginate(6);
        return view('paquetes_publico.inicio', compact('paquetes'));
    }

    public function index(){
        $paquetes = PaquetesTuristicos::paginate(10);
        return view('paquetes_publico.destinos', compact('paquetes'));
    }

    
    public function mostrarDetalleDestinos(PaquetesTuristicos $paquete){
        //return $paquete;
        return view('paquetes_publico.detalle_destinos', compact('paquete'));
    }

    public function mostrarFormularioReservaPublica(PaquetesTuristicos $paquete){
        return view('reservar_publico.reservar', compact('paquete'));
    }

    public function store(Request $request){
        
    }
}
