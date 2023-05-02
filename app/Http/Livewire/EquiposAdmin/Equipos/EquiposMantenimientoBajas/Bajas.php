<?php

namespace App\Http\Livewire\EquiposAdmin\Equipos\EquiposMantenimientoBajas;

use App\Models\Equipos;
use App\Models\Inventario\BajaEquipos;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Bajas extends Component
{
    public $equipo;
    public $opcion = 0;
    public $fecha_inicial, $fecha_final;
    public $fecha_salida_mantenimiento, $cantidad, $observacion;
    public $fecha_entrada_equipo, $cantidad_equipos_arreglados_buen_estado, $observacion_de_entrada;
    public $title = 'AÑADIR EQUIPO EN MANTENIMIENTO';

    /** ATRIBUTOS DE BAJA DE EQUIPOS */
    public $fecha_baja, $motivo_baja, $cantidad_de_baja;
    
    public function mount($equipo){
        $this->equipo = $equipo;
    }

    public function render()
    {
        $bajas = DB::table('baja_equipos')
        ->where('equipo_id', $this->equipo->id)
        ->select('id', 
        DB::raw('date_format(fecha_baja, "%d-%m-%Y") as fecha_baja' 
            ), 'motivo_baja', 'cantidad', 'equipo_id')
        ->paginate(20, ['*'], 'bajesPage');
        
        return view('livewire.equipos-admin.equipos.equipos-mantenimiento-bajas.bajas', compact('bajas'));
    }

    public function saveBaja(){
        $this->validate(
            [
               'fecha_baja' => 'required', 
               'motivo_baja' => 'required', 
               'cantidad_de_baja' => 'required|numeric|min:1',  
            ]
        );
        $equipo = Equipos::findOrFail($this->equipo->id);
        if (($equipo->stock - $this->cantidad_de_baja) <= 0) {
            $this->dispatchBrowserEvent('swal', [
                'title' => 'ERROR !',
                'icon' => 'error',
                'text' => 'La cantidad Ingresada es Mayor al Stock con el que se cuenta. 
                        Por favor revice bien la cantidad a descontar.'
            ]);

            return;
        }

        $baja = BajaEquipos::create(
            [
                'fecha_baja' => $this->fecha_baja, 
                'motivo_baja' => $this->motivo_baja, 
                'cantidad' => $this->cantidad_de_baja, 
                'equipo_id' => $this->equipo->id
            ]
        );

        
        $equipo->stock = $equipo->stock - $this->cantidad_de_baja;
        $equipo->save();

        $this->dispatchBrowserEvent('swal', [
            'title' => 'MUY BIEN !',
            'icon' => 'success',
            'text' => 'Se dió de baja la cantidad de: '.$this->cantidad_de_baja. ' a '.$equipo->nombre
        ]);
    }
}
