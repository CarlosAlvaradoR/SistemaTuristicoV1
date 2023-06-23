<?php

namespace App\Http\Livewire\EquiposAdmin\Equipos\EquiposMantenimientoBajas;

use Livewire\WithPagination;
use App\Models\Equipos;
use App\Models\Inventario\DevolucionMantenimientos;
use App\Models\Inventario\Mantenimientos;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Mantenimiento extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $equipo;
    public $opcion = 0, $cantidad_stock = 0;
    public $fecha_inicial, $fecha_final;
    public $idMantenimiento, $fecha_salida_mantenimiento, $cantidad, $observacion;
    public $idDevolucionMantenimientos, $fecha_entrada_equipo, $cantidad_equipos_arreglados_buen_estado, $observacion_de_entrada;
    public $title = 'AÑADIR EQUIPO EN MANTENIMIENTO';

    public $fecha_de_salida, $fecha_de_entrada;

    public function resetUI()
    {
        $this->reset([
            'fecha_inicial', 'fecha_final', 'idMantenimiento', 'fecha_salida_mantenimiento', 'cantidad', 'observacion',
            'idDevolucionMantenimientos', 'fecha_entrada_equipo', 'cantidad_equipos_arreglados_buen_estado', 'observacion_de_entrada',
            'title'
        ]);
        $this->resetValidation();
    }
    public function mount($equipo)
    {
        $this->equipo = $equipo;
    }
    public function render()
    {
        $equipo = Equipos::findOrFail($this->equipo->id, ['stock']);
        $this->cantidad_stock = $equipo->stock;
        $mantenimientos = Mantenimientos::mostrarMantenimientos($this->equipo->id, 1, $this->fecha_de_salida, $this->fecha_de_entrada);
        // dd($mantenimientos);
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
        $msg = '';

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
                return $this->emit('alert', 'ALERTA !', 'warning', 'La Cantidad Entrante de Equipos no puede ser mayor 
                a la Cantidad que se dió en la Salida de Equipos.');
            }
            //LOS DOS ID
            //SÓLO UNO DE LOS ID (CORRECCIÓN)
            $msg = 'Información Actualizada Correctamente.';
            if ($this->idMantenimiento) {
                $mantenimiento = Mantenimientos::EditarMantenimiento(
                    $this->idMantenimiento,
                    $this->fecha_salida_mantenimiento,
                    $this->cantidad,
                    $this->observacion
                );
            }

            if ($this->idDevolucionMantenimientos) {
                $devolucion = Mantenimientos::EditarDevolucionMantenimiento(
                    $this->idDevolucionMantenimientos,
                    $this->fecha_entrada_equipo,
                    $this->cantidad_equipos_arreglados_buen_estado,
                    $this->observacion_de_entrada
                );
            }

            if (!$this->idMantenimiento && !$this->idDevolucionMantenimientos) {
                $mantenimiento = Mantenimientos::crearMantenimiento(
                    $this->fecha_salida_mantenimiento,
                    $this->cantidad,
                    $this->observacion,
                    $this->equipo->id
                );

                $devolucion = Mantenimientos::crearDevolucionMantenimiento(
                    $mantenimiento->id,
                    $this->fecha_entrada_equipo,
                    $this->cantidad_equipos_arreglados_buen_estado,
                    $this->observacion_de_entrada
                );

                $msg = 'Se insertó correctamente la Información de Mantenimiento del Equipo/Implemento.';
            }
        } else {

            $msg = 'Información Actualizada Correctamente.';
            if ($this->idMantenimiento) {
                $mantenimiento = Mantenimientos::EditarMantenimiento(
                    $this->idMantenimiento,
                    $this->fecha_salida_mantenimiento,
                    $this->cantidad,
                    $this->observacion
                );
            }
            if ($this->idDevolucionMantenimientos) {
                $devolucion = Mantenimientos::EditarDevolucionMantenimiento(
                    $this->idDevolucionMantenimientos,
                    $this->fecha_entrada_equipo,
                    $this->cantidad_equipos_arreglados_buen_estado,
                    $this->observacion_de_entrada
                );
            }

            if (!$this->idMantenimiento && !$this->idDevolucionMantenimientos) {
                $mantenimiento = Mantenimientos::crearMantenimiento(
                    $this->fecha_salida_mantenimiento,
                    $this->cantidad,
                    $this->observacion,
                    $this->equipo->id
                );

                
                $msg = 'Se insertó correctamente la Información de Mantenimiento del Equipo/Implemento.';
            }
        }

        $this->resetUI();

        $this->emit('close-modal');
        $this->emit('alert', 'MUY BIEN', 'success', $msg);
    }

    public function Edit(Mantenimientos $mantenimientos)
    {
        // dd($mantenimientos);
        $this->title = 'EDITAR INFORMACIÓN DE MANTENIMIENTO';
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
}
