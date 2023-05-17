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
    public $cant = 20, $estado_cumplimiento = '', $estado_pagos = '';

    public function render()
    {
        DB::statement("SET sql_mode = '' ");
        //$reservas = DB::select('SELECT * FROM v_reserva_reservas_general');

        //No selecciona ninguno
        $reservas = DB::table('v_reserva_reservas_general as vrg')
            ->whereNOTIn('vrg.idReserva', function ($query) {
                $query->select('par.reserva_id')->from('participantes as par');
            })
            ->whereNOTIn('vrg.idReserva', function ($query) {
                $query->select('pr.reserva_id')->from('postergacion_reservas as pr');
            })
            ->where('vrg.datos', 'like', '%' . $this->search . '%')
            ->paginate($this->cant);
        //dd($reservas);    
        //Selecciona los dos
        if ($this->estado_cumplimiento && $this->estado_pagos) {
            $reservas = DB::table('v_reserva_reservas_general as vrg')
                ->whereNOTIn('vrg.idReserva', function ($query) {
                    $query->select('par.reserva_id')->from('participantes as par');
                })
                ->whereNOTIn('vrg.idReserva', function ($query) {
                    $query->select('pr.reserva_id')->from('postergacion_reservas as pr');
                })
                ->where('vrg.datos', 'like', '%' . $this->search . '%')
                ->where('vrg.estado_reserva', '=', $this->estado_cumplimiento)
                ->where('vrg.estado_oficial', '=', $this->estado_pagos)
                ->paginate($this->cant);
        }
        //Selecciona $estado_cumplimiento
        if ($this->estado_cumplimiento) {
            $reservas = DB::table('v_reserva_reservas_general as vrg')
                ->whereNOTIn('vrg.idReserva', function ($query) {
                    $query->select('par.reserva_id')->from('participantes as par');
                })
                ->whereNOTIn('vrg.idReserva', function ($query) {
                    $query->select('pr.reserva_id')->from('postergacion_reservas as pr');
                })
                ->where('vrg.estado_reserva', '=', $this->estado_cumplimiento)
                ->where('vrg.datos', 'like', '%' . $this->search . '%')
                //->where('vrg.estado_oficial', '=', $this->estado_pagos)
                ->paginate($this->cant);
        }
        //Selecciona $estado_pagos
        if ($this->estado_pagos) {
            $reservas = DB::table('v_reserva_reservas_general as vrg')
                ->whereNOTIn('vrg.idReserva', function ($query) {
                    $query->select('par.reserva_id')->from('participantes as par');
                })
                ->whereNOTIn('vrg.idReserva', function ($query) {
                    $query->select('pr.reserva_id')->from('postergacion_reservas as pr');
                })
                //->where('vrg.estado_reserva', '=', $this->estado_cumplimiento)
                ->where('vrg.estado_oficial', '=', $this->estado_pagos)
                ->where('vrg.datos', 'like', '%' . $this->search . '%')
                ->paginate($this->cant);
        }
        //dd($reservas);
        return view('livewire.reservas-admin.reservas.reservas', compact('reservas'));
    }

    public function resetUI()
    {
        $this->reset(['cant', 'estado_pagos', 'estado_cumplimiento']);
    }
}
