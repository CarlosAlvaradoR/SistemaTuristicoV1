<?php

namespace App\Http\Livewire\PaquetesAdmin\TipoAlimentacionPaquete;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\TipoAlimentaciones;
use App\Models\TipoalimentacionPaquetes;

class MostrarTipoAlimentacionPaquete extends Component
{
    public $idPaquete;
    public $descripcion,$tipo;
    
    protected $rules = [
        'descripcion' => 'required',
        'tipo' => 'required'
    ];


    public function mount($idPaquete){
        $this->idPaquete = $idPaquete;
    }


    public function render()
    {
        $tipos = TipoAlimentaciones::all();
        $alimentaciones = DB::select('SELECT tap.id, tap.descripcion, t.nombre FROM tipo_alimentaciones t
        INNER JOIN tipoalimentacion_paquetes tap on t.id = tap.tipoalimentacion_id
        WHERE tap.paquete_id = '.$this->idPaquete.'');

        return view('livewire.paquetes-admin.tipo-alimentacion-paquete.mostrar-tipo-alimentacion-paquete', 
            compact('tipos','alimentaciones'));
    }

    public function guardarAlimentacionCampo(){
        $this->validate();

        $alimentacionCampo = TipoalimentacionPaquetes::create([
            'descripcion' => $this->descripcion,
            'tipoalimentacion_id' => $this->tipo,
            'paquete_id' => $this->idPaquete
        ]);

        $this->reset(['descripcion','tipo']);
    }

    public function quitarAlimentacionCampo($idAlimentacionCampo){
        $alimentacion_campo = TipoalimentacionPaquetes::findOrFail($idAlimentacionCampo);
        $alimentacion_campo->delete();
        session()->flash('message2', 'Pago por servicio eliminado correctamente');
    }
}
