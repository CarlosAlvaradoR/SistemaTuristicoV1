<?php

namespace App\Http\Controllers\PaquetesPublicos;

use App\Http\Controllers\Controller;
use App\Models\FotoGalerias;
use Illuminate\Http\Request;
use App\Models\PaquetesTuristicos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PublicPaquetesController extends Controller
{
    //
    public function inicio()
    {
        $paquetes = PaquetesTuristicos::paginate(6);
        return view('paquetes_publico.inicio', compact('paquetes'));
    }

    public function index()
    {
        $paquetes = PaquetesTuristicos::paginate(10);
        return view('paquetes_publico.destinos', compact('paquetes'));
    }


    public function mostrarDetalleDestinos(PaquetesTuristicos $paquete)
    {
        //return $paquete;
        // GALERÍAS
        $galerias = FotoGalerias::where('paquete_id', $paquete->id)
            ->get();

        $mapa = DB::table('mapa_paquetes as mp')
            ->where('mp.paquete_id', $paquete->id)
            ->select('mp.ruta', 'mp.descripcion')
            ->first();

        $lugares = DB::table('lugares as l')
            ->join('atractivos_turisticos as atu', 'atu.lugar_id', '=', 'l.id')
            ->join('visita_atractivos_paquetes as vap', 'vap.atractivo_id', '=', 'atu.id')
            ->where('vap.paquete_id', $paquete->id)
            ->select('l.nombre', 'atu.nombre_atractivo')
            ->get();

        $itinerarios = DB::table('actividades_itinerarios as ai')
            ->join('itinerario_paquetes as ip', 'ai.id', '=', 'ip.actividad_id')
            ->where('ai.paquete_id', $paquete->id)
            ->select('ai.nombre_actividad', 'ip.descripcion')
            ->get();

        $boletos_pagar_paquete = DB::table('boletos_pagar_paquetes as bpp')
            ->where('bpp.paquete_id', $paquete->id)
            ->select('bpp.descripcion', 'bpp.precio')
            ->get();

        $categoria_hoteles = DB::table('categoria_hoteles as ch')
            ->where('ch.paquete_id', $paquete->id)
            ->select('ch.descripcion')
            ->get();

        $personal_acompañante = DB::table('tipo_personales as tp')
            ->join('personal_tipos as pt', 'pt.tipo_id', '=', 'tp.id')
            ->where('pt.paquete_id', $paquete->id)
            ->select('tp.nombre_tipo', 'pt.cantidad')
            ->get();

        $tipo_transportes = DB::table('tipo_transportes as tt')
            ->join('tipotransporte_paquetes as ttp', 'ttp.tipotransporte_id', '=', 'tt.id')
            ->where('ttp.paquete_id', $paquete->id)
            ->select('tt.nombre_tipo', 'ttp.cantidad')
            ->get();

        $tipo_alimentaciones = DB::table('tipo_alimentaciones as ta')
            ->join('tipoalimentacion_paquetes as tap', 'tap.tipoalimentacion_id', '=', 'ta.id')
            ->where('tap.paquete_id', $paquete->id)
            ->select('ta.nombre', 'tap.descripcion')
            ->get();

        $equipos = DB::table('equipos as e')
            ->join('equipo_paquetes as ep', 'ep.equipo_id', '=', 'e.id')
            ->where('ep.paquete_id', $paquete->id)
            ->select('e.nombre', 'ep.cantidad', 'ep.observacion')
            ->get();

        $tipo_acemilas = DB::table('tipo_acemilas as ta')
            ->join('tipoacemila_paquetes as tap', 'tap.paquete_id', '=', 'ta.id')
            ->where('tap.paquete_id', $paquete->id)
            ->select('ta.nombre', 'tap.cantidad')
            ->get();

        $tipo_almuerzos = DB::table('tipo_almuerzos as ta')
            ->join('tipoalmuerzo_paquetes as tap', 'tap.tipo_almuerzo_id', '=', 'ta.id')
            ->where('tap.paquete_id', $paquete->id)
            ->select('ta.nombre', 'tap.observacion')
            ->get();

        $condicionespuntualidad = DB::table('condicion_puntualidades as cp')
            ->where('cp.paquete_id', $paquete->id)
            ->select('cp.descripcion')
            ->get();

        $riesgos = DB::table('riesgos as r')
            ->where('r.paquete_id', $paquete->id)
            ->select('r.descripcion')
            ->get();

        return view('paquetes_publico.detalle_destinos',
            compact(
                'paquete',
                'galerias',
                'mapa',
                'lugares',
                'itinerarios',
                'boletos_pagar_paquete',
                'categoria_hoteles',
                'personal_acompañante',
                'tipo_transportes',
                'tipo_alimentaciones',
                'equipos',
                'tipo_acemilas',
                'tipo_almuerzos',
                'condicionespuntualidad',
                'riesgos'
            )
        );
    }

    public function mostrarFormularioReservaPublica(PaquetesTuristicos $paquete)
    {
        return view('reservar_publico.reservar', compact('paquete'));
    }

    public function store(Request $request)
    {
    }
}
