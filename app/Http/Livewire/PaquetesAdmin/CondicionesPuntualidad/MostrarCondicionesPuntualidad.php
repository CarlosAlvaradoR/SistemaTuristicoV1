<?php

namespace App\Http\Livewire\PaquetesAdmin\CondicionesPuntualidad;

use App\Models\Paquetes\CondicionPuntualidades;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class MostrarCondicionesPuntualidad extends Component
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
        $condiciones = DB::table('paquetes_turisticos as pt')
            ->join('condicion_puntualidades as cp', 'cp.paquete_id', '=', 'pt.id')
            ->where('cp.paquete_id', $this->idPaquete)
            ->select(
                'cp.descripcion', 
                'cp.id'
                )
            ->paginate(2);
       
        return view('livewire.paquetes-admin.condiciones-puntualidad.mostrar-condiciones-puntualidad',
    compact('condiciones'));
    }

    public function guardarCondicionesPuntualidadPaquete(){
        $condiciones = CondicionPuntualidades::create([
            'descripcion' => $this->descripcion,
            'paquete_id' => $this->idPaquete
        ]);
    }

    public function EditarCondicionesPuntuaidad(){

    }

    public function EliminarCondicionesPuntualidad(){

    }

}
