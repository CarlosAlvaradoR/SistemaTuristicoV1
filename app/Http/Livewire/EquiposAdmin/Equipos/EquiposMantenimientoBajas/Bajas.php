<?php

namespace App\Http\Livewire\EquiposAdmin\Equipos\EquiposMantenimientoBajas;

use App\Models\Equipos;
use App\Models\Inventario\BajaEquipos;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Bajas extends Component
{
    public $equipo;

    public $title = 'AÑADIR BAJA DE EQUIPO';

    /** ATRIBUTOS DE BAJA DE EQUIPOS */
    public $idBajaEquipo, $fecha_baja, $motivo_baja, $cantidad_de_baja;

    public function resetUI(){
        $this->reset(['idBajaEquipo', 'fecha_baja', 'motivo_baja', 'cantidad_de_baja']);
    }
    public function mount($equipo)
    {
        $this->equipo = $equipo;
    }

    public function render()
    {
        $bajas = DB::table('baja_equipos')
            ->where('equipo_id', $this->equipo->id)
            ->select(
                'id',
                DB::raw(
                    'date_format(fecha_baja, "%d-%m-%Y") as fecha_baja'
                ),
                'motivo_baja',
                'cantidad',
                'equipo_id'
            )
            ->paginate(20, ['*'], 'bajesPage');

        return view('livewire.equipos-admin.equipos.equipos-mantenimiento-bajas.bajas', compact('bajas'));
    }

    public function saveBaja()
    {
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

        $title = 'MUY BIEN !';
        $icon = 'success';
        $text = '';
        if ($this->idBajaEquipo) {
            $baja = BajaEquipos::findOrFail($this->idBajaEquipo);
            $cantidad_llenada = $baja->cantidad;
            $baja->fecha_baja = $this->fecha_baja;
            $baja->motivo_baja = $this->motivo_baja;
            $equipo->stock = $equipo->stock;
            if ($this->cantidad_de_baja > $cantidad_llenada) {
                $equipo->stock = $equipo->stock - ($this->cantidad_de_baja - $cantidad_llenada);
            }
            if ($this->cantidad_de_baja < $cantidad_llenada) {
                $equipo->stock = $equipo->stock + ($cantidad_llenada - $this->cantidad_de_baja);
            }
            $baja->cantidad = $this->cantidad_de_baja;
            $baja->save();


            $this->emit('close-modal-bajas');
            $text = 'Baja de Equipos Actuaizada Correctamente.';
        } else {
            $baja = BajaEquipos::create(
                [
                    'fecha_baja' => $this->fecha_baja,
                    'motivo_baja' => $this->motivo_baja,
                    'cantidad' => $this->cantidad_de_baja,
                    'equipo_id' => $this->equipo->id
                ]
            );
            $equipo->stock = $equipo->stock - $this->cantidad_de_baja;
            $text = 'Se dió de baja la cantidad de: '.$this->cantidad_de_baja. ' a '.$equipo->nombre ;
        }
        
        $equipo->save();

        $this->emit('alert', $title, $icon, $text);

        $this->resetUI();
    }

    public function Edit(BajaEquipos $baja)
    {
        $this->idBajaEquipo = $baja->id;
        $this->fecha_baja = $baja->fecha_baja;
        $this->motivo_baja = $baja->motivo_baja;
        $this->cantidad_de_baja = $baja->cantidad;

        $this->emit('show-modal-bajas');
    }
}
