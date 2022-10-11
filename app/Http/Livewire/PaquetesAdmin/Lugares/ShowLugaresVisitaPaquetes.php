<?php

namespace App\Http\Livewire\PaquetesAdmin\Lugares;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\VisitaAtractivosPaquetes;

class ShowLugaresVisitaPaquetes extends Component
{

    public $idPaquete;

    public function mount($idPaquete){
        $this->idPaquete = $idPaquete;
    }

    public function render()
    {
        $todoLugares = DB::select('SELECT l.nombre,a.nombre_atractivo, a.descripcion, a.id FROM lugares l
        INNER JOIN  atractivos_turisticos a on a.lugar_id=l.id
            WHERE NOT EXISTS (
                SELECT * FROM visita_atractivos_paquetes vap
                WHERE vap.atractivo_id=a.id AND vap.paquete_id = '.$this->idPaquete.'
            )');
        
        $lugaresVisitar = DB::select('SELECT l.id, nombre, nombre_atractivo, descripcion, lugar_id, vat.id FROM lugares l
        INNER JOIN atractivos_turisticos a ON l.id= a.lugar_id
        INNER JOIN visita_atractivos_paquetes vat on vat.atractivo_id =a.id
        WHERE paquete_id = '.$this->idPaquete.'');

        return view('livewire.paquetes-admin.lugares.show-lugares-visita-paquetes', compact('todoLugares','lugaresVisitar'));
    }

    public function agregarLugarPaquete($idPaquete){
        $visita = VisitaAtractivosPaquetes::create([
            'atractivo_id' => $idPaquete,
            'paquete_id' => $this->idPaquete
        ]);
    }

    public function quitarLugarPaquete($idVisitaAtractivoPaquete){
        //dd($idVisitaAtractivoPaquete);
        $quitar = VisitaAtractivosPaquetes::findOrFail($idVisitaAtractivoPaquete);
        //$doctorName = $user->name; //Obtiene el nombre del médico
        $quitar->delete();
    }
}
