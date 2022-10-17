<?php

namespace App\Http\Livewire\PaquetesAdmin\EquipoPaquete;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Equipos;
use App\Models\EquipoPaquetes;

class MostrarEquipoPaquetes extends Component
{

    public $idPaquete;
    public $equipo,$cantidad, $observacion;
    
    protected $rules = [
        'equipo' => 'required',
        'cantidad' => 'required|numeric|min:1',
        'observacion' => 'required'
    ];


    public function mount($idPaquete){
        $this->idPaquete = $idPaquete;
    }


    public function render()
    {
        $equipos = Equipos::all();
        $equipo_paquetes = DB::select('SELECT ep.id, e.nombre, ep.cantidad, ep.observacion  FROM equipos e
        INNER JOIN equipo_paquetes ep on e.id = ep.equipo_id
        WHERE ep.paquete_id = '.$this->idPaquete.'');

        return view('livewire.paquetes-admin.equipo-paquete.mostrar-equipo-paquetes',
                compact('equipos','equipo_paquetes'));
    }

    public function guardarEquipoPaquetes(){
        
        $this->validate();

        $equipo = EquipoPaquetes::create([
            'cantidad' => $this->cantidad, 
            'observacion' => $this->observacion, 
            'equipo_id' => $this->equipo, 
            'paquete_id' => $this->idPaquete
        ]);

        $this->reset(['cantidad','observacion', 'equipo']);
        session()->flash('Correct', 'Equipo añadido correctamente al paquete');


    }

    public function quitarEquipoPaquetes($idEquipoPaquetes){
        $equipo_paquetes = EquipoPaquetes::findOrFail($idEquipoPaquetes);
        $equipo_paquetes->delete();
        session()->flash('message2', 'Pago por servicio eliminado correctamente');
    }
}
