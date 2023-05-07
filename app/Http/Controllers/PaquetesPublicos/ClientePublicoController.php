<?php

namespace App\Http\Controllers\PaquetesPublicos;

use App\Http\Controllers\Controller;
use App\Models\PaquetesTuristicos;
use Illuminate\Http\Request;
use App\Models\Personas;
use App\Models\Reservas\Clientes;
use App\Models\Reservas\Pagos;
use App\Models\Reservas\Reservas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientePublicoController extends Controller
{
    //
    public function index()
    { //Muestra el perfil del cliente
        $id = Auth::user()->id;
        //return $id; id, dni, nombre, apellidos, genero, telefono, dirección
        $persona = Personas::select('personas.dni', 'personas.nombre', 'personas.apellidos', 'personas.dirección')
            ->join('users', 'personas.id', '=', 'users.id')
            ->where('users.id', '=', $id)
            ->limit(1)
            ->get();
        return view('perfil_cliente.perfil_cliente', compact('persona'));
    }

    public function paquetesDelCliente()
    {
        return view('perfil_cliente.paquetes_comprados');
    }
}
