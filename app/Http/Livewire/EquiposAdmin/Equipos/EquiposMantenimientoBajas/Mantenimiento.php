<?php

namespace App\Http\Livewire\EquiposAdmin\Equipos\EquiposMantenimientoBajas;

use App\Models\Equipos;
use App\Models\Inventario\BajaEquipos;
use App\Models\Inventario\DevolucionMantenimientos;
use App\Models\Inventario\Mantenimientos;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Mantenimiento extends Component
{
    public $equipo;
    public $opcion = 0;
    public $fecha_inicial, $fecha_final;
    public $fecha_salida_mantenimiento, $cantidad, $observacion;
    public $fecha_entrada_equipo, $cantidad_equipos_arreglados_buen_estado, $observacion_de_entrada;
    public $title = 'AÑADIR EQUIPO EN MANTENIMIENTO';

    public function mount($equipo){
        $this->equipo = $equipo;
    }
    public function render()
    {
        $mantenimientos = DB::table('equipos as e')
            ->leftJoin('mantenimientos as m', 'm.equipo_id', '=', 'e.id')
            ->leftJoin('devolucion_mantenimientos as dm', 'dm.mantenimientos_id', '=', 'm.id')
            ->where('m.equipo_id', $this->equipo->id)
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
            ->paginate(20, ['*'], 'mantenentPage');
        return view('livewire.equipos-admin.equipos.equipos-mantenimiento-bajas.mantenimiento', compact('mantenimientos'));
    }

    public function saveMantenimientoDevoluciones()
    {
        $mantenimiento = Mantenimientos::create(
            [
                'fecha_salida_mantenimiento' => $this->fecha_salida_mantenimiento,
                'cantidad' => $this->cantidad,
                'observacion' => $this->observacion,
                'equipo_id' => $this->equipo->id
            ]
        );

        $equipo = Equipos::findOrFail($this->equipo->id);
        $equipo->stock = $equipo->stock - $this->cantidad;
        $equipo->save();

        $msg = 'Se insertó correctamente la Información de Mantenimiento del Equipo/Implemento';

        $obs = '';
        if ($this->fecha_entrada_equipo) {
            if ($this->cantidad_equipos_arreglados_buen_estado) {
                if ($this->observacion_de_entrada) {
                    $devolucion = DevolucionMantenimientos::create(
                        [
                            'fecha_entrada_equipo' => $this->fecha_entrada_equipo,
                            'cantidad_equipos_arreglados_buen_estado' => $this->cantidad_equipos_arreglados_buen_estado,
                            'observacion' => $this->observacion_de_entrada,
                            'mantenimientos_id' => $mantenimiento->id
                        ]
                    );

                    $msg = 'Se insertó correctamente el Mantenimiento y Devolución del Equipo/Implemento ' . $this->equipo->nombre;
                }
            } else {
                $devolucion = DevolucionMantenimientos::create(
                    [
                        'fecha_entrada_equipo' => $this->fecha_entrada_equipo,
                        'cantidad_equipos_arreglados_buen_estado' => $this->cantidad_equipos_arreglados_buen_estado,
                        'observacion' => $obs,
                        'mantenimientos_id' => $mantenimiento->id
                    ]
                );
                $msg = 'Se insertó correctamente el Mantenimiento y Devolución del Equipo/Implemento ' . $this->equipo->nombre;
            }
        }

        $this->dispatchBrowserEvent('swal', [
            'title' => 'MUY BIEN !',
            'icon' => 'success',
            'text' => $msg
        ]);
    }

   
    
    
}
