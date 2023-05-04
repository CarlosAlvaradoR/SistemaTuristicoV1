<?php

namespace App\Models\Viajes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ViajePaquetes extends Model
{
    use HasFactory;
    use HasSlug;

    protected $fillable = ['id', 'descripcion', 'fecha', 'hora', 'cantidad_participantes', 'estado', 'cod_string', 'slug', 'paquete_id'];


    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('cod_string')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public static function mostrarParticipantesDelViaje($idViaje)
    {
        $participantes = DB::table('personas as p')
            ->join('clientes as  c', 'p.id', '=', 'c.persona_id')
            ->join('reservas as r', 'c.id', '=', 'r.cliente_id')
            ->join('estado_reservas as er', 'r.estado_reservas_id', '=', 'er.id')
            ->join('participantes as parti', 'parti.reserva_id', '=', 'r.id')
            ->where('parti.viaje_paquetes_id', $idViaje)
            ->select(
                DB::raw('CONCAT(p.nombre, " ", p.apellidos) AS datos'),
                'parti.id'
            )
            ->get();
        return $participantes;
    }


    public static function mostrarItinerariosCumplidos($idPaquete, $idViaje)
    {
        $itinerarios = DB::select("SELECT ai.nombre_actividad,ip.id,ip.descripcion, ip.actividad_id,
        (CASE
            WHEN (SELECT COUNT(*) FROM itinerarios_cumplidos ic WHERE ic.viaje_paquetes_id = " . $idViaje . " AND ic.itinerario_paquetes_id = ip.id) > 0 
            THEN (SELECT ic.fecha_cumplimiento FROM itinerarios_cumplidos ic WHERE ic.viaje_paquetes_id = " . $idViaje . " AND ic.itinerario_paquetes_id = ip.id LIMIT 1)
            ELSE 'No cumplido'
        END) as fecha_cumplimiento  
        FROM actividades_itinerarios ai
        INNER JOIN itinerario_paquetes ip on ai.id = ip.actividad_id
        WHERE ai.paquete_id = " . $idPaquete . "");

        return $itinerarios;
    }
}
