<?php

namespace App\Http\Livewire\PaquetesAdmin\TipoAlmuerzoPaquetes;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\TipoAlmuerzos;
use App\Models\TipoalmuerzoPaquetes;

class MostrarTipoAlmuerzoPaquetes extends Component
{
    public $idPaquete;
    public $tipo_de_almuerzo,$observacion_del_almuerzo;
    
    protected $rules = [
        'tipo_de_almuerzo' => 'required',
        'observacion_del_almuerzo' => 'required'
    ];


    public function mount($idPaquete){
        $this->idPaquete = $idPaquete;
    }

    public function render()
    {
        $tipos = TipoAlmuerzos::all();

        $tipos_almuerzos = DB::select('SELECT tap.id,  tap.observacion, ta.nombre FROM tipo_almuerzos ta
        INNER JOIN tipoalmuerzo_paquetes tap on ta.id = tap.tipo_almuerzo_id
        WHERE tap.paquete_id = '.$this->idPaquete.'');
        return view('livewire.paquetes-admin.tipo-almuerzo-paquetes.mostrar-tipo-almuerzo-paquetes',
            compact('tipos','tipos_almuerzos'));
    }

    public function guardarTipoAlmuerzoPaquete(){
        $this->validate();
        $tipo_almuerzo = TipoalmuerzoPaquetes::create([
            'observacion' => $this->observacion_del_almuerzo, 
            'tipo_almuerzo_id' => $this->tipo_de_almuerzo, 
            'paquete_id' => $this->idPaquete
        ]);

        $this->reset(['observacion_del_almuerzo','tipo_de_almuerzo']);
        session()->flash('SatisfaccionAlmuerzo', 'Tipo de Almuerzo añadido correctamente al paquete');
    }

    public function quitarTipoAlmuerzoPaquete($idTipoAlmuerzoPaquete){
        $tipo_almuerzo_paquete = TipoalmuerzoPaquetes::findOrFail($idTipoAlmuerzoPaquete);
        $tipo_almuerzo_paquete->delete();
        session()->flash('message2', 'Pago por servicio eliminado correctamente');
    }
}
