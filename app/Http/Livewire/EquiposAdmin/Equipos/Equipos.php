<?php

namespace App\Http\Livewire\EquiposAdmin\Equipos;

use App\Models\Equipos as ModelsEquipos;
use App\Models\Marcas;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Equipos extends Component
{
    public $search ='';
    public $nombre_de_equipo, $descripcion,$cantidad, $precio_referencial, $tipo, $marca;


    public function render()
    {
        $equipos = DB::table('equipos as e')
            ->join('marcas as m', 'm.id', '=', 'e.marca_id')
            ->where('e.nombre', 'like', '%'.$this->search.'%')
            ->select(
                'e.id', 
                'e.nombre', 
                'e.descripcion',
                'e.stock',
                'e.precio_referencial', 
                'e.tipo', 
                'm.nombre as marca'
            )
            ->get();
        $marcas = Marcas::all();
        return view('livewire.equipos-admin.equipos.equipos', compact('equipos', 'marcas'));
    }

    public function saveEquipo(){
        $equipo = ModelsEquipos::create(
            [
                'nombre' => $this->nombre_de_equipo,
                'descripcion' => $this->descripcion,
                'stock' => $this->cantidad,
                'precio_referencial' => $this->precio_referencial,
                'tipo' => $this->tipo,
                'marca_id' => $this->marca,
               ]
        );
    }

}
