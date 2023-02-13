<?php

namespace App\Http\Livewire\PaquetesAdmin\Paquetes;

use App\Models\AtractivosTuristicos;
use App\Models\Lugares;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class LugaresAtractivos extends Component
{
    /** ATRIBUTOS PARA LUGARES */
    public $title = 'CREAR NUEVOS LUGARES';
    public $nombre_del_lugar;
    public $edicion = false, $idLugar;

    /** ATRIBUTOS PARA ATRACTIVOS */
    public $title_atractivos = '';
    public $nombre_del_atractivo, $descripcion_del_atractivo, $idLugarSeleccionado;
    public $detalle_del_lugar, $atractivos = [];

    protected $listeners = ['deleteLugar' => 'deleteLugar'];

    

    public function render()
    {
        $lugares = DB::table('lugares as l')
            ->select('l.id', 'l.nombre')
            ->paginate(10);


        return view(
            'livewire.paquetes-admin.paquetes.lugares-atractivos',
            compact(
                'lugares'

            )
        );
    }

    public function guardarLugar()
    {
        $this->validate([
            'nombre_del_lugar' => 'required|min:2'
        ]);

        $lugar = Lugares::create(
            [
                'nombre' => $this->nombre_del_lugar
            ]
        );

        $this->resetUI();
    }

    public function Edit($idLugar)
    {
        $this->resetUI();
        $lugar = Lugares::findOrFail($idLugar);
        $this->idLugar = $lugar->id;
        $this->nombre_del_lugar = $lugar->nombre;

        $this->title = 'EDICIÓN DE LUGAR';
        $this->edicion = true;
        $this->emit('show-modal', 'Edicion de Mapas');
    }

    public function Update()
    {
        $lugar = Lugares::findOrFail($this->idLugar);
        $lugar->nombre = $this->nombre_del_lugar;
        $lugar->save();

        $this->resetUI();
        $this->emit('close-modal', 'Edicion de Mapas');
    }

    public function deleteConfirm($id)
    {

        $this->dispatchBrowserEvent('swal-confirmLugar', [
            'title' => 'Estás seguro que deseas eliminar el Lugar?',
            'icon' => 'warning',
            'id' => $id
        ]);
    }

    public function deleteLugar(Lugares $lugar)
    {

        $atractivos =  DB::table('atractivos_turisticos as atu')
            ->where('atu.lugar_id', $lugar->id)
            ->get();
        $var = count($atractivos);
        //dd($var);
        if ($var > 0) {

            session()->flash('error', 'No se puede Eliminar el Lugar porque tiene Atractivos Registrados');

            $this->resetUI();
        } else {
            $lugar->delete();
            //$eliminar = unlink($mapa_paquete->ruta . '');


            session()->flash('success', 'Eliminado Correctamente');
        }
    }

    function resetUI()
    {
        $this->reset([
            'nombre_del_lugar', 'title', 'edicion', 'idLugar', 'nombre_del_atractivo',
            'descripcion_del_atractivo', 'idLugarSeleccionado', 'detalle_del_lugar'
        ]);
    }

    public function guardarAtractivo()
    {
        $atractivo = AtractivosTuristicos::create([
            'nombre_atractivo' => $this->nombre_del_atractivo,
            'descripcion' => $this->descripcion_del_atractivo,
            'lugar_id' => $this->idLugarSeleccionado
        ]);
    }

    public function mostrarAtractivosDelLugar($idLugar)
    {
        $this->render();
        $this->idLugarSeleccionado = $idLugar;
        $lugar = Lugares::findOrFail($this->idLugarSeleccionado, ['nombre']);
        $this->detalle_del_lugar = $lugar->nombre;

        $this->atractivos =  DB::table('atractivos_turisticos as atu')
            ->where('atu.lugar_id', $this->idLugarSeleccionado)
            ->select('id', 'nombre_atractivo', 'descripcion')
            ->get();
    }
    public function EditAtractivo($idAtractivo)
    {
        
    }
}
