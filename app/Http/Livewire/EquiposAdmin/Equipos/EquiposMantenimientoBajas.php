<?php

namespace App\Http\Livewire\EquiposAdmin\Equipos;

use App\Models\Equipos;
use App\Models\Inventario\BajaEquipos;
use App\Models\Inventario\DevolucionMantenimientos;
use App\Models\Inventario\Mantenimientos;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class EquiposMantenimientoBajas extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';


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
        // if (!$this->fecha_inicial) {
        //     $this->fecha_inicial = date ('Y-m-d');
        // }
        // if (!$this->fecha_final) {
        //     $this->fecha_final = date ('Y-m-d');
        // }
        
        
        return view('livewire.equipos-admin.equipos.equipos-mantenimiento-bajas');
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



    
}
