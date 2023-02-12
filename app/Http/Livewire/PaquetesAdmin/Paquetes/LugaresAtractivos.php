<?php

namespace App\Http\Livewire\PaquetesAdmin\Paquetes;

use App\Models\Lugares;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class LugaresAtractivos extends Component
{
    public $title = 'CREAR NUEVOS LUGARES';
    public $nombre_del_lugar;
    public $edicion = false, $idLugar;
    function resetUI()
    {
        $this->reset(['nombre_del_lugar', 'title','edicion','idLugar']);
    }

    public function render()
    {
        $lugares = DB::table('lugares')
            ->select('id', 'nombre')
            ->get();
        
        return view('livewire.paquetes-admin.paquetes.lugares-atractivos',
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

    public function Edit($idLugar){
        $this->resetUI();
        $lugar = Lugares::findOrFail($idLugar);
        $this->idLugar = $lugar->id;
        $this->nombre_del_lugar = $lugar->nombre;

        $this->title = 'EDICIÓN DE LUGAR';
        $this->edicion = true;
        $this->emit('show-modal', 'Edicion de Mapas');
    }

    public function Update(){
        $lugar = Lugares::findOrFail($this->idLugar);
        $lugar->nombre = $this->nombre_del_lugar;
        $lugar->save();

        $this->resetUI();
        $this->emit('close-modal', 'Edicion de Mapas');
    }

    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('swal-confirmMapa', [
            'title' => 'Estás seguro que deseas eliminar el Mapa?',
            'icon' => 'warning',
            'id' => $id
        ]);
    }

    public function deleteMapa($idMapa)
    {
        

        /*$mapa_paquete = MapaPaquetes::findOrFail($idMapa);

        $mapa_paquete->delete();
        $eliminar = unlink($mapa_paquete->ruta . '');

        $this->resetUI();*/
    }

    
}
