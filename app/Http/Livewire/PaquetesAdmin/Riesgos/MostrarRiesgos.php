<?php

namespace App\Http\Livewire\PaquetesAdmin\Riesgos;

use App\Models\Paquetes\Riesgos;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class MostrarRiesgos extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $idPaquete;
    public $descripcion;


    public function mount($idPaquete){
        $this->idPaquete = $idPaquete;
    }


    public function render()
    {
        $riesgos = DB::table('paquetes_turisticos as pt')
            ->join('riesgos as r', 'r.paquete_id', '=', 'pt.id')
            ->where('r.paquete_id', $this->idPaquete)
            ->select(
                'r.descripcion', 
                'r.id'
                )
            ->paginate(2);
        return view('livewire.paquetes-admin.riesgos.mostrar-riesgos', compact('riesgos'));
    }

    public function guardarRiesgodelPaquete(){
        $riesgos = Riesgos::create([
            'descripcion' => $this->descripcion,
            'paquete_id' => $this->idPaquete
        ]);
    }

    public function Editar(){

    }

    public function Eliminar(){

    }
}
