<?php

namespace App\Http\Livewire\ReservasAdmin\ConsultarReservas;

use App\Models\Personas;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ConsultarReservas extends Component
{
    public $search;
    public $valor = 0;

    public function render()
    {
        DB::statement("SET sql_mode = '' ");
        
        $reservas = DB::table('v_reserva_reservas_general as vrg')
            ->where('dni', $this->search)
            ->get();
        
        $this->valor = count($reservas);
        return view('livewire.reservas-admin.consultar-reservas.consultar-reservas', compact('reservas'));
    }

    public function search()
    {
        $this->render();
      
    }
}
