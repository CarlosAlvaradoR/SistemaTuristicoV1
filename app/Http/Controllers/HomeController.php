<?php

namespace App\Http\Controllers;

use App\Models\Equipos;
use App\Models\Personas;
use App\Models\Reservas\Reservas;
use App\Models\Viajes\ViajePaquetes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->hasRole('cliente')) {
            return redirect()->route('cliente.perfil');
        }
        $reservas = Reservas::where('fecha_reserva', date('Y-m-d'))->get();
        $equipos = Equipos::all();
        $viajes = ViajePaquetes::where('estado', 2)
        ->where('fecha', date('Y-m-d'))
        ->get();
        
        $usuarios = Personas::select(
            'personas.nombre AS nombre_persona',
            'personas.apellidos',
            'users.name AS nombre_usuario',
            'users.email',
            'users.id',
            DB::raw('GROUP_CONCAT(roles.name SEPARATOR \', \') AS nombres_roles')
        )
            ->leftJoin('users', 'personas.id', '=', 'users.persona_id')
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->groupBy('users.id')
            ->where('roles.name', '!=','cliente')
            ->get();

        return view('home', compact('reservas','equipos', 'viajes', 'usuarios'));
    }
}
