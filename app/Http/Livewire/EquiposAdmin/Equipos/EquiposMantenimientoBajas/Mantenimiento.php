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
    public $idMantenimiento, $fecha_salida_mantenimiento, $cantidad, $observacion;
    public $idDevolucionMantenimientos, $fecha_entrada_equipo, $cantidad_equipos_arreglados_buen_estado, $observacion_de_entrada;
    public $title = 'AÑADIR EQUIPO EN MANTENIMIENTO';

    public function resetUI()
    {
        $this->reset([
            'fecha_inicial', 'fecha_final', 'idMantenimiento', 'fecha_salida_mantenimiento', 'cantidad', 'observacion',
            'idDevolucionMantenimientos', 'fecha_entrada_equipo', 'cantidad_equipos_arreglados_buen_estado', 'observacion_de_entrada',
            'title'
        ]);
    }
    public function mount($equipo)
    {
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
            // ->toSql();
            // dd($mantenimientos);
            ->paginate(20, ['*'], 'mantenentPage');
        return view('livewire.equipos-admin.equipos.equipos-mantenimiento-bajas.mantenimiento', compact('mantenimientos'));
    }

    public function saveMantenimientoDevoluciones()
    {
        $this->validate(
            [
                'fecha_salida_mantenimiento' => 'required|date',
                'cantidad' => 'required|numeric|min:1',
                'observacion' => 'nullable|string|min:5',
            ]
        );
        $msg = 'BUENÍSIMAS';

        if (
            $this->fecha_entrada_equipo ||
            $this->cantidad_equipos_arreglados_buen_estado ||
            $this->observacion_de_entrada
        ) {

            $this->validate(
                [
                    'fecha_entrada_equipo' => 'required|date',
                    'cantidad_equipos_arreglados_buen_estado' => 'required|numeric|min:1',
                    'observacion_de_entrada' => 'nullable|string|min:5',
                ]
            );
            
            if ($this->cantidad_equipos_arreglados_buen_estado > $this->cantidad) {
                $this->emit('alert', 'ALERTA !', 'warning', 'La Cantidad Entrante de Equipos no puede ser mayor 
                a la Cantidad que se dió en la Salida de Equipos.');
                return;
            }

            if ($this->idMantenimiento || $this->idDevolucionMantenimientos) {
                if ($this->idMantenimiento && $this->idDevolucionMantenimientos) {
                    $mantenimiento = Mantenimientos::findOrFail($this->idMantenimiento);
                    $devolucion = DevolucionMantenimientos::findOrFail($this->idDevolucionMantenimientos);

                    $mantenimiento->fecha_salida_mantenimiento = $this->fecha_salida_mantenimiento;
                    $mantenimiento->cantidad = $this->cantidad;
                    $mantenimiento->observacion = $this->observacion;

                    $devolucion->fecha_entrada_equipo = $this->fecha_entrada_equipo;
                    $devolucion->cantidad_equipos_arreglados_buen_estado = $this->cantidad_equipos_arreglados_buen_estado;
                    $devolucion->observacion = $this->observacion_de_entrada;

                    $mantenimiento->save();
                    $devolucion->save();

                } else {
                    $mantenimiento = Mantenimientos::findOrFail($this->idMantenimiento);
                    $mantenimiento->fecha_salida_mantenimiento = $this->fecha_salida_mantenimiento;
                    $mantenimiento->cantidad = $this->cantidad;
                    $mantenimiento->observacion = $this->observacion;
                    $mantenimiento->save();
                }
            } else {
                $mantenimiento = $this->crearMantenimiento();

                $equipo = Equipos::findOrFail($this->equipo->id);
                $equipo->stock = $equipo->stock - $this->cantidad;
                $equipo->save();

                $devolucion_mantenimientos = $this->crearDevolucionMantenimiento($mantenimiento->id);
                $msg = 'Se insertó correctamente la Información de Mantenimiento del Equipo/Implemento';

                
            }
        } else {
            if ($this->idMantenimiento || $this->idDevolucionMantenimientos) {
                if ($this->idMantenimiento && $this->idDevolucionMantenimientos) {
                    $mantenimiento = Mantenimientos::findOrFail($this->idMantenimiento);
                    $devolucion = DevolucionMantenimientos::findOrFail($this->idDevolucionMantenimientos);

                    $mantenimiento->fecha_salida_mantenimiento = $this->fecha_salida_mantenimiento;
                    $mantenimiento->cantidad = $this->cantidad;
                    $mantenimiento->observacion = $this->observacion;

                    $devolucion->fecha_entrada_equipo = $this->fecha_entrada_equipo;
                    $devolucion->cantidad_equipos_arreglados_buen_estado = $this->cantidad_equipos_arreglados_buen_estado;
                    $devolucion->observacion = $this->observacion_de_entrada;

                    $mantenimiento->save();
                    $devolucion->save();
                } else {
                    $mantenimiento = Mantenimientos::findOrFail($this->idMantenimiento);
                    $mantenimiento->fecha_salida_mantenimiento = $this->fecha_salida_mantenimiento;
                    $mantenimiento->cantidad = $this->cantidad;
                    $mantenimiento->observacion = $this->observacion;
                    $mantenimiento->save();
                }
            } else {
                $this->crearMantenimiento();
                $msg = 'Registrado Correctamente.';
            }
        }

        $this->resetUI();


        $this->dispatchBrowserEvent('swal', [
            'title' => 'MUY BIEN !',
            'icon' => 'success',
            'text' => $msg
        ]);
    }

    public function Edit(Mantenimientos $mantenimientos)
    {
        // dd($mantenimientos);
        $this->idMantenimiento = $mantenimientos->id;
        $this->fecha_salida_mantenimiento = $mantenimientos->fecha_salida_mantenimiento;
        $this->cantidad = $mantenimientos->cantidad;
        $this->observacion = $mantenimientos->observacion;

        $devolucion_mantenimientos = DevolucionMantenimientos::where('mantenimientos_id', $mantenimientos->id)->get();

        if (count($devolucion_mantenimientos) > 0) {
            $this->idDevolucionMantenimientos = $devolucion_mantenimientos[0]->id;
            $this->fecha_entrada_equipo = $devolucion_mantenimientos[0]->fecha_entrada_equipo;
            $this->cantidad_equipos_arreglados_buen_estado = $devolucion_mantenimientos[0]->cantidad_equipos_arreglados_buen_estado;
            $this->observacion_de_entrada = $devolucion_mantenimientos[0]->observacion;
        }


        // dd($this->fecha_entrada_equipo);
        $this->emit('show-modal');
    }

    public function crearMantenimiento(){
        $mantenimiento = Mantenimientos::create(
            [
                'fecha_salida_mantenimiento' => $this->fecha_salida_mantenimiento,
                'cantidad' => $this->cantidad,
                'observacion' => $this->observacion,
                'equipo_id' => $this->equipo->id
            ]
        );
        return $mantenimiento;
    }

    public function crearDevolucionMantenimiento($idMantenimiento){
        $devolucion = DevolucionMantenimientos::create(
            [
                'fecha_entrada_equipo' => $this->fecha_entrada_equipo,
                'cantidad_equipos_arreglados_buen_estado' => $this->cantidad_equipos_arreglados_buen_estado,
                'observacion' => $this->observacion_de_entrada,
                'mantenimientos_id' => $idMantenimiento
            ]
        );

    }
}
