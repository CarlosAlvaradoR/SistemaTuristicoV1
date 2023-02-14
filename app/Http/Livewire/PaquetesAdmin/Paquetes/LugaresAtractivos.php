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
    public $consulta, $idLugarSeleccionado;

    /** ATRIBUTOS PARA ATRACTIVOS */
    public $title_atractivos = '';
    public $nombre_del_atractivo, $descripcion_del_atractivo;
    public $detalle_del_lugar; //$atractivos = [];
    public $edicion_atractivo, $idAtractivo;

    protected $listeners = ['deleteLugar' => 'deleteLugar', 'deleteAtractivo' => 'deleteAtractivo'];



    public function render()
    {
        $lugares = DB::table('lugares as l')
            ->select('l.id', 'l.nombre')
            ->paginate(50);

        if ($this->idLugarSeleccionado) {
            /*$atractivos = DB::table('atractivos_turisticos as atu')
            ->where('atu.lugar_id', $this->idLugar)
            ->select('id', 'nombre_atractivo', 'descripcion')
            ->get();*/
            $this->consulta = "SELECT atu.id, atu.nombre_atractivo, atu.descripcion FROM atractivos_turisticos atu
            WHERE atu.lugar_id = " . $this->idLugarSeleccionado . "";
            $atractivos = DB::select($this->consulta);
        } else {
            $this->consulta = "";
            $atractivos = [];
        }
        return view(
            'livewire.paquetes-admin.paquetes.lugares-atractivos',
            compact(
                'lugares',
                'atractivos'
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
        $this->resetUI();
        $this->idLugarSeleccionado = $idLugar;
        $lugar = Lugares::findOrFail($idLugar, ['nombre']);
        $this->detalle_del_lugar = $lugar->nombre;
        $this->title_atractivos = 'AÑADIR ATRACTIVOS EN - ' . $this->detalle_del_lugar;


        /*$this->atractivos =  DB::table('atractivos_turisticos as atu')
            ->where('atu.lugar_id', $this->idLugarSeleccionado)
            ->select('id', 'nombre_atractivo', 'descripcion')
            ->get();*/
    }
    public function EditAtractivo($idAtractivo)
    {
        $atractivo = AtractivosTuristicos::findOrFail($idAtractivo);

        $this->idAtractivo = $atractivo->id;
        $this->nombre_del_atractivo = $atractivo->nombre_atractivo;
        $this->descripcion_del_atractivo = $atractivo->descripcion;
        $this->title = 'EDICIÓN DE ATRACTIVO';
        $this->edicion_atractivo = true;
        $this->emit('show-modal-atractivos', 'Edicion de Atractivos');
    }

    public function UpdateAtractivo()
    {
        $atractivo = AtractivosTuristicos::findOrFail($this->idAtractivo);
        $atractivo->nombre_atractivo = $this->nombre_del_atractivo;
        $atractivo->descripcion = $this->descripcion_del_atractivo;
        $atractivo->save();

        session()->flash('success', 'Atractivo Actualizado Correctamente');
        //$this->resetUI();
        $this->emit('close-modal-atractivos', 'Edicion de Ataractivos');
    }

    public function deleteConfirmAtractivo($id)
    {
        $this->dispatchBrowserEvent('swal-confirmAtractivo', [
            'title' => 'Estás seguro que deseas eliminar el Atractivo ?',
            'icon' => 'warning',
            'id' => $id
        ]);
    }

    public function deleteAtractivo(AtractivosTuristicos $atractivo)
    {
        $atractivo_paquete = DB::select("SELECT * FROM visita_atractivos_paquetes
        WHERE atractivo_id = " . $atractivo->id . "");
        $var = count($atractivo_paquete);
        if ($var > 0) {
            session()->flash('error', 'El Atractivo se encuentra registrado en uno o varios Paquetes');
            
            //$this->resetUI();
        } else {
            $atractivo->delete();
            session()->flash('success', 'Atractivo Eliminado Correctamente');
        }
    }
}
