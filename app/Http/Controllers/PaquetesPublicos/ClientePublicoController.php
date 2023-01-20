<?php

namespace App\Http\Controllers\PaquetesPublicos;

use App\Http\Controllers\Controller;
use App\Models\PaquetesTuristicos;
use Illuminate\Http\Request;
use App\Models\Personas;
use App\Models\Reservas\Clientes;
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
        
        $idUser = Auth::user()->id;
        $cliente = DB::select("SELECT * FROM clientes WHERE user_id = $idUser LIMIT 1");

        $paquetes_comprados = Personas::select(
            'personas.dni',
            DB::raw('CONCAT(personas.nombre," " ,personas.apellidos) AS datos'),
            'pt.nombre',
            'r.fecha_reserva',
            //'b.monto',
            //'SUM(pa.monto) as pago',
            DB::raw('SUM(pa.monto) as pago'),
            'er.nombre_estado',
            'r.id'
        )
            ->join('clientes as c', 'personas.id', '=', 'c.persona_id')
            ->join('reservas  as r', 'r.cliente_id', '=', 'c.id')
            ->join('paquetes_turisticos as pt', 'pt.id', '=', 'r.paquete_id')
            ->join('estado_reservas as er', 'er.id', '=', 'r.estado_reservas_id')
            ->join('pagos as pa', 'pa.reserva_id', '=', 'r.id')
            //->join('boletas as b', 'pa.reserva_id', '=', 'r.id')
            ->where('c.id','=', $cliente[0]->id)
            ->groupBy('pa.reserva_id')
            ->orderBy('r.updated_at','DESC')
            ->get();
        return view('perfil_cliente.paquetes_comprados', compact('paquetes_comprados'));
    }
}
