<?php

namespace App\Http\Controllers\PaquetesPublicos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Personas;

class ClientePublicoController extends Controller
{
    //
    public function index(){ //Muestra el perfil del cliente
        $id = Auth::user()->id;
            //return $id; id, dni, nombre, apellidos, genero, telefono, dirección
        $persona = Personas::select('personas.dni','personas.nombre','personas.apellidos', 'personas.dirección' )
            ->join('users', 'personas.id', '=' , 'users.id')
            ->where('users.id', '=', $id )
            ->limit(1)
            ->get();
        return view('perfil_cliente.perfil_cliente', compact('persona'));
    }
}
