<?php

namespace App\Http\Livewire\PaquetesAdmin\Paquetes;

use App\Models\PaquetesTuristicos;
use App\Models\TipoPaquetes;
use Livewire\WithPagination;
use Livewire\Component;

class TipoPaquetesTuristicos extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public $title = 'CREAR TIPO DE PAQUETE TURÍSTICO';
    public $idTipoPaquete, $nombre_de_tipo;

    public function resetUI()
    {
        $this->reset(['title', 'idTipoPaquete', 'nombre_de_tipo']);
        $this->resetValidation();
    }

    public function render()
    {
        $tipos = TipoPaquetes::paginate(10);

        return view('livewire.paquetes-admin.paquetes.tipo-paquetes-turisticos', compact('tipos'));
    }

    public function Edit(TipoPaquetes $tipo)
    {
        $this->title = 'EDITAR TIPO DE PAQUETE TURÍSTICO';
        $this->idTipoPaquete = $tipo->id;
        $this->nombre_de_tipo = $tipo->nombre;
        $this->emit('show-modal');
    }

    public function saveTipoPackage()
    {
        $this->validate(
            [
                'nombre_de_tipo' => 'required|string|min:3'
            ]
        );

        $title = 'MUY BIEN';
        $icon = 'success';
        if ($this->idTipoPaquete) {
            $tipo = TipoPaquetes::findOrFail($this->idTipoPaquete);
            $tipo->nombre = $this->nombre_de_tipo;
            $tipo->save();
            $this->emit('close-modal');
            $msg = 'Tipo de Paquete Actualizado Correctamente.';
        } else {
            $tipo = TipoPaquetes::create([
                'nombre' => $this->nombre_de_tipo
            ]);
            $msg = 'Tipo de Paquete Registrado Correctamente.';
        }

        $this->dispatchBrowserEvent('swal', [
            'title' => $title,
            'icon' => $icon,
            'text' => $msg
        ]);

        $this->resetUI();
    }

    public function deleteConfirm($id)
    {

        $this->dispatchBrowserEvent('swal-confirmTipoPersonal', [
            'title' => 'Estás seguro que deseas eliminar el Tipo de Paquete Turístico ?',
            'icon' => 'warning',
            'id' => $id
        ]);
    }

    protected $listeners = ['deleteTipoPaqueteTuristico'];

    public function deleteTipoPaqueteTuristico(TipoPaquetes $tipo)
    {
        $paquete = PaquetesTuristicos::where('tipo_paquete_id', $tipo->id)->get();
        // $tipos =  DB::table('tipoalmuerzo_paquetes')
        //     ->where('tipo_almuerzo_id', $tipo->id)
        //     ->get();
        $var = count($paquete);
        //dd($var);
        $title = 'MUY BIEN !';
        $icon = 'success';
        $msg = 'Tipo de Paquete Eliminado Correctamente.';
        if ($var > 0) {

            //dd($var);
            $title = 'ERROR !';
            $icon = 'error';
            $msg = 'No se puede Eliminar el Tipo porque se encuentra vinculado a un Paquete Turístico.';
        } else {
            $tipo->delete();
        }

        $this->dispatchBrowserEvent('swal', [
            'title' => $title,
            'icon' => $icon,
            'text' => $msg
        ]);
    }
}
