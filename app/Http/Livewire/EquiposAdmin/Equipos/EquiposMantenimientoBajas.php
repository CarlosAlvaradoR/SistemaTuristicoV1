<?php

namespace App\Http\Livewire\EquiposAdmin\Equipos;

use App\Models\Equipos;
use App\Models\Inventario\BajaEquipos;
use App\Models\Inventario\DevolucionMantenimientos;
use App\Models\Inventario\Mantenimientos;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class EquiposMantenimientoBajas extends Component
{
    public $equipo;
    public $opcion = 0;
    public $fecha_inicial, $fecha_final;
    public $fecha_salida_mantenimiento, $cantidad, $observacion;
    public $fecha_entrada_equipo, $cantidad_equipos_arreglados_buen_estado, $observacion_de_entrada;
    public $title = 'AÑADIR EQUIPO EN MANTENIMIENTO';
    /** ATRIBUTOS DE BAJA DE EQUIPOS */
    public $fecha_baja, $motivo_baja, $cantidad_de_baja;

    public function mount($equipo)
    {
        $this->equipo = $equipo;
        
    }

    public function render()
    {
        if (!$this->fecha_inicial) {
            $this->fecha_inicial = date ('Y-m-d');
        }
        if (!$this->fecha_final) {
            $this->fecha_final = date ('Y-m-d');
        }
        $mantenimientos = DB::table('equipos as e')
            ->leftJoin('mantenimientos as m', 'm.equipo_id', '=', 'e.id')
            ->leftJoin('devolucion_mantenimientos as dm', 'dm.mantenimientos_id', '=', 'm.id')
            ->where('m.equipo_id', $this->equipo->id)
            ->whereBetween('fecha_salida_mantenimiento', [$this->fecha_inicial, $this->fecha_final])
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
        $bajas = DB::table('baja_equipos')
        ->where('equipo_id', $this->equipo->id)
        ->select('id', 
        DB::raw('date_format(fecha_baja, "%d-%m-%Y") as fecha_baja' 
            ), 'motivo_baja', 'cantidad', 'equipo_id')
        ->get();
        return view('livewire.equipos-admin.equipos.equipos-mantenimiento-bajas', compact('mantenimientos','bajas'));
    }

    public function openModal(int $opcion)
    {
        switch ($opcion) {
            case '1':
                # Abrir modal para crear Mantenimientos
                $this->title = 'MANTENIMIENTO EN EQUIPO/IMPLEMENTO: '.$this->equipo->nombre;
                $this->opcion = $opcion;
                break;
            case '2':
                # Abrir modal para crear Editar Mantenimientos y Llenar los componentes
                $this->opcion = $opcion;
                break;
            case '3':
                # Abrir modal para crear Editar Mantenimientos y Llenar los componentes
                $this->opcion = $opcion;
                break;
            case '4':
                # Abrir modal para crear Editar Mantenimientos y Llenar los componentes
                $this->opcion = $opcion;
                break;
            default:
                # code...
                break;
        }
        $this->emit('show-modal', 'Edicion de Atractivos');
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

    public function Update()
    {
    }

    public function saveBaja(){
        $baja = BajaEquipos::create(
            [
                'fecha_baja' => $this->fecha_baja, 
                'motivo_baja' => $this->motivo_baja, 
                'cantidad' => $this->cantidad_de_baja, 
                'equipo_id' => $this->equipo->id
            ]
        );

        $equipo = Equipos::findOrFail($this->equipo->id);
        $equipo->stock = $equipo->stock - $this->cantidad_de_baja;
        $equipo->save();

        $this->dispatchBrowserEvent('swal', [
            'title' => 'MUY BIEN !',
            'icon' => 'success',
            'text' => 'Se dió de baja la cantidad de: '.$this->cantidad_de_baja. ' a '.$equipo->nombre
        ]);
    }
}
