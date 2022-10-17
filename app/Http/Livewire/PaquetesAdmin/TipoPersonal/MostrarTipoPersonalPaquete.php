<?php

namespace App\Http\Livewire\PaquetesAdmin\TipoPersonal;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\TipoPersonales;
use App\Models\PersonalTipos;

class MostrarTipoPersonalPaquete extends Component
{

    public $idPaquete;
    public $cantidad,$tipo_id;
    
    protected $rules = [
        'cantidad' => 'required|numeric|min:1',
        'tipo_id' => 'required'
    ];


    public function mount($idPaquete){
        $this->idPaquete = $idPaquete;
    }


    public function render()
    {
        $tipos = TipoPersonales::all();
        $personales = DB::select('SELECT pt.id, tp.nombre_tipo, pt.cantidad FROM tipo_personales tp
        INNER JOIN personal_tipos pt on tp.id = pt.tipo_id
        WHERE paquete_id = '.$this->idPaquete.'');
        return view('livewire.paquetes-admin.tipo-personal.mostrar-tipo-personal-paquete', compact('tipos', 'personales'));
    }


    public function guardarPersonalTipoPaquete(){
        //dd("Llegó");
        $this->validate();

        $personal_types = PersonalTipos::create([
            'cantidad' => $this->cantidad,
            'tipo_id' => $this->tipo_id,
            'paquete_id' => $this->idPaquete
        ]);
        $this->reset(['cantidad','tipo_id']);
    }

    public function quitarPersonalTipoPaquetes($idPersonalTipo){
        $personal_tipo = PersonalTipos::findOrFail($idPersonalTipo);
        $personal_tipo->delete();
        session()->flash('message2', 'Pago por servicio eliminado correctamente');
    }
}
