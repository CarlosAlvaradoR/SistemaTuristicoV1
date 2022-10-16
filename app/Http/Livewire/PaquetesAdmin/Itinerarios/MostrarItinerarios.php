<?php

namespace App\Http\Livewire\PaquetesAdmin\Itinerarios;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\ActividadesItinerarios;
use App\Models\ItinerarioPaquetes;

class MostrarItinerarios extends Component
{
    public $idPaquete;
    public $actividad,$descripcion_itinerario;
    
    protected $rules = [
        'actividad' => 'required',
        'descripcion_itinerario' => 'required'
    ];


    public function mount($idPaquete){
        $this->idPaquete = $idPaquete;
    }


    public function render()
    {
        //dd($this->idPaquete);
        $actividades_itinerarios = DB::select('SELECT a.id,nombre_actividad, descripcion, actividad_id, paquete_id, i.id as id_iti FROM actividades_itinerarios a
        INNER JOIN itinerario_paquetes i on a.id = actividad_id
        WHERE i.paquete_id = '.$this->idPaquete.'');
        return view('livewire.paquetes-admin.itinerarios.mostrar-itinerarios', compact('actividades_itinerarios'));
    }

    public function guardarActividadItinerario(){
        $this->validate();

        $actividadG=ActividadesItinerarios::create([
            'nombre_actividad' => $this->actividad
        ]);
        $itinerarioG=ItinerarioPaquetes::create([
            'descripcion' => $this->descripcion_itinerario, 
            'actividad_id' => $actividadG->id,
            'paquete_id' => $this->idPaquete
        ]);

        $this->reset(['descripcion_itinerario','actividad']);
    }

    public function quitarActividadItinerario($idActividad, $idItinerario){
        //dd($idActividad, $idItinerario);
        
        $itinerario = ItinerarioPaquetes::findOrFail($idItinerario);
        $itinerario->delete();

        $actividad = ActividadesItinerarios::findOrFail($idActividad);
        $actividad->delete();
       
    }



}
