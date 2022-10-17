<?php

namespace App\Http\Livewire\PaquetesAdmin\TipoAcemilaPaquetes;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\TipoAcemilas;
use App\Models\TipoacemilaPaquetes;


class MostrarTipoAcemilaPaquetes extends Component
{
    public $idPaquete;
    public $tipo,$cantidad;
    
    protected $rules = [
        'tipo' => 'required',
        'cantidad' => 'required|numeric|min:1'
    ];


    public function mount($idPaquete){
        $this->idPaquete = $idPaquete;
    }


    public function render()
    {
        $tipos = TipoAcemilas::all();
        $tipos_acemilas = DB::select('SELECT tap.id, ta.nombre, tap.cantidad  FROM tipo_acemilas ta
        INNER JOIN tipoacemila_paquetes tap on ta.id = tap.tipo_acemila_id
        WHERE tap.paquete_id = '.$this->idPaquete.'');
        return view('livewire.paquetes-admin.tipo-acemila-paquetes.mostrar-tipo-acemila-paquetes',
                    compact('tipos', 'tipos_acemilas'));
    }

    public function guardarTipoAcemilaPaquete(){
        $this->validate();

        $guardar = TipoacemilaPaquetes::create([
            'cantidad' => $this->cantidad, 
            'tipo_acemila_id' => $this->tipo, 
            'paquete_id' => $this->idPaquete
        ]);

        $this->reset(['cantidad','tipo']);
        session()->flash('SatisfaccionTipoAcemila', 'Tipo de Acémila añadido correctamente al paquete');
    }

    public function quitarTipoAcemilaPaquete($idTipoAcemilaPaquete){
        $tipo_acemila_paquete = TipoacemilaPaquetes::findOrFail($idTipoAcemilaPaquete);
        $tipo_acemila_paquete->delete();
        session()->flash('message2', 'Pago por servicio eliminado correctamente');
    }
}
