<?php

namespace App\Http\Livewire\PaquetesAdmin\TipoTransportePaquete;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\TipotransportePaquetes;
use App\Models\TipoTransportes;

class MostrarTipoTransportePaquete extends Component
{
    public $idPaquete;
    public $cantidad,$descripcion, $tipo;
    
    protected $rules = [
        'cantidad' => 'required|numeric|min:1',
        'descripcion' => 'required',
        'tipo' => 'required'
    ];


    public function mount($idPaquete){
        $this->idPaquete = $idPaquete;
    }

    public function render()
    {
        $tipos = TipoTransportes::all();
        $tipos_paquetes = DB::select('SELECT ttp.id, ttp.descripcion, ttp.cantidad, tt.nombre_tipo FROM tipo_transportes tt
        INNER JOIN tipotransporte_paquetes ttp on tt.id = ttp.tipotransporte_id
        WHERE ttp.paquete_id = '.$this->idPaquete.'');

        return view('livewire.paquetes-admin.tipo-transporte-paquete.mostrar-tipo-transporte-paquete', 
                compact('tipos', 'tipos_paquetes'));
    }

    public function guardarTipoTransportePaquete(){
        //dd($this->descripcion, $this->cantidad, $this->tipo);
        $this->validate();
        $tipo_transporte = TipotransportePaquetes::create([
            'descripcion' => $this->descripcion,
            'cantidad' => $this->cantidad,
            'tipotransporte_id' => $this->tipo,
            'paquete_id' => $this->idPaquete
        ]);

        $this->reset(['cantidad','tipo','descripcion']);

    }

    public function quitarTipoTransportePaquete($idTipoTransportePaquete){
        $tipo_transporte = TipotransportePaquetes::findOrFail($idTipoTransportePaquete);
        $tipo_transporte->delete();
        session()->flash('message2', 'Pago por servicio eliminado correctamente');
    }
}
