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
    
    /** PARA LA EDICIÓN DE ITINEARIOS */
    public $title='EDITAR ACTIVIDADES', $idActividadSeleccionado, $idItinerario, $edicionActividad=false;
    public $nombre_de_actividad, $descripcion_de_itinerario;

    protected $listeners = ['quitarActividadItinerario','quitarActividad'];

    protected $rules = [
        'actividad' => 'required'
    ];

    function resetUI(){
        $this->reset(['title','idActividadSeleccionado','idItinerario','edicionActividad',
        'nombre_de_actividad','descripcion_de_itinerario']);
    }

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

    public function Edit(ItinerarioPaquetes $itinerario)
    {
        $actividad = ActividadesItinerarios::findOrFail($itinerario->actividad_id);
        $this->title = 'EDITAR TIPO DE ALIMENTACIÓN';
        $this->idItinerario = $itinerario->id;
        $this->idActividadSeleccionado = $actividad->id;
        $this->nombre_de_actividad = $actividad->nombre_actividad;
        $this->descripcion_de_itinerario = $itinerario->descripcion;
        //$this->edicionActividad = true;
        $this->emit('show-modal-editar-itinerario', 'edicionActividad de Atractivos');
    }


    public function Update()
    {
        $this->validate([
            'nombre_de_actividad' => 'required',
            'descripcion_de_itinerario' => 'required|min:3'
        ]);
        $actividad = ActividadesItinerarios::findOrFail($this->idActividadSeleccionado);
        $actividad->nombre_actividad = $this->nombre_de_actividad;
        $actividad->save();

        $itinerario = ItinerarioPaquetes::findOrFail($this->idItinerario);
        $itinerario->descripcion = $this->descripcion_de_itinerario;
        $itinerario->save();

        session()->flash('success', 'Actualizado Correctamente');

        $this->emit('close-modal-editar-itinerario', 'edicionActividad de Atractivos');
        $this->resetUI();
    }

    public function EditActividad(ActividadesItinerarios $actividad){
        $this->title = 'EDITAR TIPO DE ALIMENTACIÓN';
        $this->idItinerario = 0;
        $this->idActividadSeleccionado = $actividad->id;
        $this->nombre_de_actividad = $actividad->nombre_actividad;
        //$this->descripcion_de_itinerario = $itinerario->descripcion;
        $this->edicionActividad = true;
        $this->emit('show-modal-editar-itinerario', 'edicionActividad de Atractivos');
    }
    public function UpdateActividad(){
        $actividad = ActividadesItinerarios::findOrFail($this->idActividadSeleccionado);
        $actividad->nombre_actividad = $this->nombre_de_actividad;
        $actividad->save();

        session()->flash('success', 'Actualizado Correctamente');

        $this->emit('close-modal-editar-itinerario', 'edicionActividad de Atractivos');
        $this->resetUI();
    }

    public function addItinerarios(ActividadesItinerarios $actividad){
        $this->idActividad = $actividad->id;
        $this->nombre_actividadRegistrado = $actividad->nombre_actividad;
        $this->mostrarNombre = true;

        $this->emit('show-modal-actividades-itinerarios', 'edicionActividad de Atractivos');
    }


    public function deleteConfirm($id)
    {

        $this->dispatchBrowserEvent('swal-confirmActividad', [
            'title' => 'Estás seguro que deseas eliminar el Itinerario ?',
            'icon' => 'warning',
            'id' => $id
        ]);
    }

    public function deleteConfirmActividad($id)
    {

        $this->dispatchBrowserEvent('swal-confirmActividadDelete', [
            'title' => 'Estás seguro que deseas eliminar la Actividad ?',
            'icon' => 'warning',
            'id' => $id
        ]);
    }



    public function limpiar(){
        $this->idActividad = 0 ;
        $this->mostrarNombre = false;
    }

    public function quitarActividadItinerario(ItinerarioPaquetes $itinerario)
    {
        $itinerario->delete();
        session()->flash('success', 'Eliminado Correctamente');
    }

    public function quitarActividad(ActividadesItinerarios $actividad){
        $actividad->delete();
        session()->flash('success', 'Eliminado Correctamente');
    }
}
