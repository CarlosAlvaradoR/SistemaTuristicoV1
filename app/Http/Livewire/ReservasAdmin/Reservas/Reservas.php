<?php

namespace App\Http\Livewire\ReservasAdmin\Reservas;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Reservas extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;
    public $cant = 20;

    public function render()
    {
        DB::statement("SET sql_mode = '' ");
        //$reservas = DB::select('SELECT * FROM v_reserva_reservas_general');
        $reservas = DB::table('v_reserva_reservas_general')
            ->paginate($this->cant);
        
        return view('livewire.reservas-admin.reservas.reservas', compact('reservas'));
    }
}
