<?php

namespace App\Models\Inventario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EntregaEquipos extends Model
{
    use HasFactory;
    protected $fillable = ['fecha_entrega', 'hora_entrega', 'fecha_devoluvion', 'hora_devolucion', 'estado', 'participantes_id'];

    public static function consultarEquiposEntregadosParticipante($idEntregaEquipo)
    {
        $equipos_asignados = DB::table('entrega_equipos as ee')
            ->join('detalle_entregas as de', 'de.entrega_equipos_id', '=', 'ee.id')
            ->join('equipos as e', 'e.id', '=', 'de.equipo_id')
            ->join('marcas as m', 'm.id', '=', 'e.marca_id')
            ->where('de.entrega_equipos_id', $idEntregaEquipo)
            ->select('e.nombre', 'm.nombre as marca', 'de.cantidad', 'de.observacion', 'de.id', 'de.equipo_id', 'de.cantidad_devuelta')
            ->get();
        return $equipos_asignados;
    }
}
