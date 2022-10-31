<?php

namespace App\Http\Controllers\PaquetesPublicos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function mostrarPaquetes(){
        //return "Llegó";
        $id = Auth::user()->id;
        $paquetes_clientes = DB::select('SELECT concat(p.nombre, p.apellidos) as datos, r.fecha_reserva, r.monto, pt.nombre as paquete FROM personas p
        INNER JOIN clientes c on p.id = c.persona_id
        INNER JOIN reservas r on r.cliente_id = c.id
        INNER JOIN paquetes_turisticos pt on pt.id = r.paquete_id
        WHERE c.user_id = '.$id.'');

        return view('perfil_cliente.paquetes_comprados', compact('paquetes_clientes'));
    }
}
