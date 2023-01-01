<?php

namespace App\Http\Livewire\PaquetesAdmin\Itinerarios;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\ActividadesItinerarios;
use App\Models\ItinerarioPaquetes;

class MostrarItinerarios extends Component
{
    public $idPaquete;
    public $actividad, $descripcion_itinerario;
    public $idActividad = 0, $nombre_actividadRegistrado = '', $mostrarNombre = false;

    protected $rules = [
        'actividad' => 'required'
    ];


    public function mount($idPaquete)
    {
        $this->idPaquete = $idPaquete;
    }


    public function render()
    {
        //dd($this->idPaquete);
        $actividades_itinerarios = DB::select('SELECT a.id, a.nombre_actividad, i.descripcion, i.id as idItinerario FROM `actividades_itinerarios` a
        LEFT JOIN `itinerario_paquetes` i on a.id = i.actividad_id
        WHERE a.paquete_id = '.$this->idPaquete.'
        ORDER BY a.id');
        return view('livewire.paquetes-admin.itinerarios.mostrar-itinerarios', compact('actividades_itinerarios'));
    }

    public function guardarActividadItinerario()
    {
        $this->validate();

        $actividadG = ActividadesItinerarios::create([
            'nombre_actividad' => $this->actividad,
            'paquete_id' => $this->idPaquete
        ]);

        $this->idActividad = $actividadG->id;
        $this->nombre_actividadRegistrado = $actividadG->nombre_actividad;
        $this->mostrarNombre = true;



        $this->reset(['actividad']);
        session()->flash('insertado_correctamente', 'Registro insertado correctamente.');
    }

    public function agregarItinerarioaActividad()
    {
        $validatedData = $this->validate([
            'descripcion_itinerario' => 'required|min:3'
        ]);

        $itinerarioG=ItinerarioPaquetes::create([
            'descripcion' => $this->descripcion_itinerario, 
            'actividad_id' => $this->idActividad
        ]);
        $this->reset(['descripcion_itinerario']);
        session()->flash('insertado_correctamente', 'Registro insertado correctamente.');

    }

    public function limpiar(){
        $this->idActividad = 0 ;
        $this->mostrarNombre = false;
    }

    public function quitarActividadItinerario($idActividad, $idItinerario)
    {
        //dd($idActividad, $idItinerario);

        $itinerario = ItinerarioPaquetes::findOrFail($idItinerario);
        $itinerario->delete();

        $actividad = ActividadesItinerarios::findOrFail($idActividad);
        $actividad->delete();
    }
}
