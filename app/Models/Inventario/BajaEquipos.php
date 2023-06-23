<?php

namespace App\Models\Inventario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BajaEquipos extends Model
{
    use HasFactory;
    protected $fillable = ['fecha_baja', 'motivo_baja', 'cantidad', 'equipo_id'];

    public static function mostrarBajaDeEquipos($idEquipo, $opcion, $fechaInicial, $fechaFinal)
    {
        if ($opcion == 1) {
            if ($fechaInicial && $fechaFinal) {
                $bajas = DB::table('baja_equipos')
                    ->where('equipo_id', $idEquipo)
                    ->whereBetween('fecha_baja', [$fechaInicial, $fechaFinal]) //BETWEEN
                    ->orderBy('id', 'DESC')
                    ->select(
                        'id',
                        DB::raw(
                            'date_format(fecha_baja, "%d-%m-%Y") as fecha_baja'
                        ),
                        'motivo_baja',
                        'cantidad',
                        'equipo_id',
                        'created_at'
                    )
                    ->paginate(20, ['*'], 'bajesPage');
            } else {
                $bajas = DB::table('baja_equipos')
                    ->where('equipo_id', $idEquipo)
                    ->orderBy('id', 'DESC')
                    ->select(
                        'id',
                        DB::raw(
                            'date_format(fecha_baja, "%d-%m-%Y") as fecha_baja'
                        ),
                        'motivo_baja',
                        'cantidad',
                        'equipo_id',
                        'created_at'
                    )
                    ->paginate(20, ['*'], 'bajesPage');
            }
        }

        if ($opcion == 2) {
            if ($fechaInicial && $fechaFinal) {
                $bajas = DB::table('baja_equipos')
                    ->where('equipo_id', $idEquipo)
                    ->whereBetween('fecha_baja', [$fechaInicial, $fechaFinal]) //BETWEEN
                    ->orderBy('id', 'DESC')
                    ->select(
                        'id',
                        DB::raw(
                            'date_format(fecha_baja, "%d-%m-%Y") as fecha_baja'
                        ),
                        'motivo_baja',
                        'cantidad',
                        'equipo_id',
                        'created_at'
                    )
                    ->get();
            } else {
                $bajas = DB::table('baja_equipos')
                    ->where('equipo_id', $idEquipo)
                    ->orderBy('id', 'DESC')
                    ->select(
                        'id',
                        DB::raw(
                            'date_format(fecha_baja, "%d-%m-%Y") as fecha_baja'
                        ),
                        'motivo_baja',
                        'cantidad',
                        'equipo_id',
                        'created_at'
                    )
                    ->get();
            }
        }


        return $bajas;
    }
}
