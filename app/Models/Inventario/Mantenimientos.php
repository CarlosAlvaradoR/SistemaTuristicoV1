<?php

namespace App\Models\Inventario;

use App\Models\Equipos;
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
                    'dm.observacion as obsDevolucion',
                    'm.created_at'
                )
                ->orderBy('m.created_at', 'DESC')
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
                        'dm.observacion as obsDevolucion',
                        'm.created_at'
                    )
                    ->orderBy('m.created_at', 'DESC')
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
                    'dm.observacion as obsDevolucion',
                    'm.created_at'
                )
                ->orderBy('m.created_at', 'DESC')
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
                        'dm.observacion as obsDevolucion',
                        'm.created_at'
                    )
                    ->orderBy('m.created_at', 'DESC')
                    ->get();
            }
        }

        return $mantenimientos;
    }

    public static function crearMantenimiento($fecha_salida_mantenimiento, $cantidad, $observacion, $idEquipo)
    {
        $equipo = Equipos::findOrFail($idEquipo);
        if (($equipo->stock - $cantidad) < 0) {
            return abort(404);
        }

        $mantenimiento = Mantenimientos::create(
            [
                'fecha_salida_mantenimiento' => $fecha_salida_mantenimiento,
                'cantidad' => $cantidad,
                'observacion' => $observacion,
                'equipo_id' => $idEquipo
            ]
        );

        $equipo->stock = $equipo->stock - $cantidad;
        $equipo->save();

        return $mantenimiento;
    }

    public static function EditarMantenimiento($idMantenimiento, $fecha_salida_mantenimiento, $cantidad, $observacion)
    {
        $valor = 0;
        $mantenimiento = Mantenimientos::findOrFail($idMantenimiento); //
        $equipo = Equipos::findOrFail($mantenimiento->equipo_id);
        $devolucionMantenimientos = DevolucionMantenimientos::where('mantenimientos_id', $idMantenimiento)->get();
        switch ($cantidad) {
            case ($cantidad == $mantenimiento->cantidad):
                $valor = $mantenimiento->cantidad;
                break;
            case ($cantidad > $mantenimiento->cantidad):
                $valor = ($cantidad - $mantenimiento->cantidad);
                
                $equipo->stock = $equipo->stock - $valor;
                break;
            case ($cantidad < $mantenimiento->cantidad):
                $valor = ($mantenimiento->cantidad - $cantidad);
                $equipo->stock = $equipo->stock + $valor;
                break;
            default:
                # code...
                break;
        }

        $mantenimiento->fecha_salida_mantenimiento = $fecha_salida_mantenimiento;
        $mantenimiento->cantidad = $cantidad;
        $mantenimiento->observacion = $observacion;
        $mantenimiento->save();
        $equipo->save();

        return $mantenimiento;
    }




    /** TABLA DEVOLUCIÓN MANTENIMIENTOS CREACIÓN Y EDICIÓN */
    public static function crearDevolucionMantenimiento(
        $idMantenimiento,
        $fecha_entrada_equipo,
        $cantidad_equipos_arreglados_buen_estado,
        $observacion_de_entrada
    ) {
        $devolucion = DevolucionMantenimientos::create(
            [
                'fecha_entrada_equipo' => $fecha_entrada_equipo,
                'cantidad_equipos_arreglados_buen_estado' => $cantidad_equipos_arreglados_buen_estado,
                'observacion' => $observacion_de_entrada,
                'mantenimientos_id' => $idMantenimiento
            ]
        );

        $mantenimiento = Mantenimientos::findOrFail($idMantenimiento);
        $equipo = Equipos::findOrFail($mantenimiento->equipo_id);
        $equipo->stock = $equipo->stock + $cantidad_equipos_arreglados_buen_estado;
        $equipo->save();

        return $devolucion;
    }

    public static function EditarDevolucionMantenimiento(
        $idDevolucionMantenimientos,
        $fecha_entrada_equipo,
        $cantidad_equipos_arreglados_buen_estado,
        $observacion_de_entrada
    ) {
        $valor = 0;
        $devolucion = DevolucionMantenimientos::findOrFail($idDevolucionMantenimientos);

        $devolucion->fecha_entrada_equipo = $fecha_entrada_equipo;
        $devolucion->cantidad_equipos_arreglados_buen_estado = $cantidad_equipos_arreglados_buen_estado;
        $devolucion->observacion = $observacion_de_entrada;

        $mantenimiento = Mantenimientos::findOrFail($devolucion->mantenimientos_id);
        $equipo = Equipos::findOrFail($mantenimiento->equipo_id);

        switch ($cantidad_equipos_arreglados_buen_estado) {
            case ($cantidad_equipos_arreglados_buen_estado == $devolucion->cantidad_equipos_arreglados_buen_estado):
                $equipo->stock = $equipo->stock;
                break;
            case ($cantidad_equipos_arreglados_buen_estado < $devolucion->cantidad_equipos_arreglados_buen_estado):
                $valor = $devolucion->cantidad_equipos_arreglados_buen_estado - $cantidad_equipos_arreglados_buen_estado;
                $equipo->stock = $equipo->stock - $valor;
                break;
            case ($cantidad_equipos_arreglados_buen_estado > $devolucion->cantidad_equipos_arreglados_buen_estado):
                $valor = $cantidad_equipos_arreglados_buen_estado - $devolucion->cantidad_equipos_arreglados_buen_estado;
                $equipo->stock = $equipo->stock + $valor;
                break;

            default:
                # code...
                break;
        }
        $devolucion->save();
        $equipo->save();

        return $devolucion;
    }
}
