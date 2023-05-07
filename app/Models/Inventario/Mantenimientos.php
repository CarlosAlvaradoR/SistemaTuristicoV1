<?php

namespace App\Models\Inventario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Mantenimientos extends Model
{
    use HasFactory;
    protected $fillable = ['fecha_salida_mantenimiento', 'cantidad', 'observacion', 'equipo_id'];

    public static function mostrarMantenimientos($idEquipo, $opcion, $fecha_de_salida, $fecha_de_entrada)
    {

        if ($opcion == 1) {
            $mantenimientos = DB::table('equipos as e')
                ->leftJoin('mantenimientos as m', 'm.equipo_id', '=', 'e.id')
                ->leftJoin('devolucion_mantenimientos as dm', 'dm.mantenimientos_id', '=', 'm.id')
                ->where('m.equipo_id', $idEquipo)
                //->whereBetween('fecha_salida_mantenimiento', [$this->fecha_inicial, $this->fecha_final])

                ->select(
                    'm.id as idMantenimiento',
                    DB::raw('date_format(m.fecha_salida_mantenimiento, "%d-%m-%Y") as fecha_salida_mantenimiento'),
                    'm.cantidad',
                    'm.observacion',
                    'dm.id as idDevolucionMantenimiento',
                    DB::raw('date_format(dm.fecha_entrada_equipo, "%d-%m-%Y") as fecha_entrada_equipo'),
                    'dm.cantidad_equipos_arreglados_buen_estado',
                    'dm.observacion as obsDevolucion'
                )
                // ->toSql();
                // dd($mantenimientos);
                ->paginate(20, ['*'], 'mantenentPage');

            if ($fecha_de_salida && $fecha_de_entrada) {
                $mantenimientos = DB::table('equipos as e')
                    ->leftJoin('mantenimientos as m', 'm.equipo_id', '=', 'e.id')
                    ->leftJoin('devolucion_mantenimientos as dm', 'dm.mantenimientos_id', '=', 'm.id')
                    ->where('m.equipo_id', $idEquipo)
                    //->whereBetween('fecha_salida_mantenimiento', [$this->fecha_inicial, $this->fecha_final])
                    ->where(function ($query) use ($fecha_de_salida, $fecha_de_entrada) {
                        $query->where('m.fecha_salida_mantenimiento', '>=', $fecha_de_salida)
                            ->where('dm.fecha_entrada_equipo', '<=', $fecha_de_entrada);
                    })
                    ->select(
                        'm.id as idMantenimiento',
                        DB::raw('date_format(m.fecha_salida_mantenimiento, "%d-%m-%Y") as fecha_salida_mantenimiento'),
                        'm.cantidad',
                        'm.observacion',
                        'dm.id as idDevolucionMantenimiento',
                        DB::raw('date_format(dm.fecha_entrada_equipo, "%d-%m-%Y") as fecha_entrada_equipo'),
                        'dm.cantidad_equipos_arreglados_buen_estado',
                        'dm.observacion as obsDevolucion'
                    )
                    // ->get();
                    // ->toSql();
                    // dd($mantenimientos);
                    ->paginate(20, ['*'], 'mantenentPage');
            }
        }
        if ($opcion == 2) {

            $mantenimientos = DB::table('equipos as e')
                ->leftJoin('mantenimientos as m', 'm.equipo_id', '=', 'e.id')
                ->leftJoin('devolucion_mantenimientos as dm', 'dm.mantenimientos_id', '=', 'm.id')
                ->where('m.equipo_id', $idEquipo)
                //->whereBetween('fecha_salida_mantenimiento', [$this->fecha_inicial, $this->fecha_final])

                ->select(
                    'm.id as idMantenimiento',
                    DB::raw('date_format(m.fecha_salida_mantenimiento, "%d-%m-%Y") as fecha_salida_mantenimiento'),
                    'm.cantidad',
                    'm.observacion',
                    'dm.id as idDevolucionMantenimiento',
                    DB::raw('date_format(dm.fecha_entrada_equipo, "%d-%m-%Y") as fecha_entrada_equipo'),
                    'dm.cantidad_equipos_arreglados_buen_estado',
                    'dm.observacion as obsDevolucion'
                )
                // ->toSql();
                // dd($mantenimientos);
                ->get();

            if ($fecha_de_salida && $fecha_de_entrada) {
                $mantenimientos = DB::table('equipos as e')
                    ->leftJoin('mantenimientos as m', 'm.equipo_id', '=', 'e.id')
                    ->leftJoin('devolucion_mantenimientos as dm', 'dm.mantenimientos_id', '=', 'm.id')
                    ->where('m.equipo_id', $idEquipo)
                    //->whereBetween('fecha_salida_mantenimiento', [$this->fecha_inicial, $this->fecha_final])
                    ->where(function ($query) use ($fecha_de_salida, $fecha_de_entrada) {
                        $query->where('m.fecha_salida_mantenimiento', '>=', $fecha_de_salida)
                            ->where('dm.fecha_entrada_equipo', '<=', $fecha_de_entrada);
                    })
                    ->select(
                        'm.id as idMantenimiento',
                        DB::raw('date_format(m.fecha_salida_mantenimiento, "%d-%m-%Y") as fecha_salida_mantenimiento'),
                        'm.cantidad',
                        'm.observacion',
                        'dm.id as idDevolucionMantenimiento',
                        DB::raw('date_format(dm.fecha_entrada_equipo, "%d-%m-%Y") as fecha_entrada_equipo'),
                        'dm.cantidad_equipos_arreglados_buen_estado',
                        'dm.observacion as obsDevolucion'
                    )
                    ->get();
            }
        }

        return $mantenimientos;
    }
}
