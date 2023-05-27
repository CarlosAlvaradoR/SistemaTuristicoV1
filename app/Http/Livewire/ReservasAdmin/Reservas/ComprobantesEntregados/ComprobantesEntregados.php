<?php

namespace App\Http\Livewire\ReservasAdmin\Reservas\ComprobantesEntregados;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ComprobantesEntregados extends Component
{
    public $politicas = [];
    public function render()
    {
        DB::statement("SET sql_mode = '' ");
        $comprobantes = DB::table('personas as p')
            ->select(
                'p.nombre as nombreP',
                'p.apellidos',
                'pt.nombre',
                'tc.nombre_tipo',
                'sc.numero_serie',
                'sp.numero_de_serie'
            )
            ->join('clientes as c', 'p.id', '=', 'c.persona_id')
            ->join('reservas as r', 'r.cliente_id', '=', 'c.id')
            ->join('paquetes_turisticos as pt', 'pt.id', '=', 'r.paquete_id')
            ->join('pagos as pa', 'pa.reserva_id', '=', 'r.id')
            ->join('serie_pagos as sp', 'sp.id', '=', 'pa.serie_pagos')
            ->join('serie_comprobantes as sc', 'sc.id', '=', 'sp.serie_comprobantes_id')
            ->join('tipo_comprobantes as tc', 'tc.id', '=', 'sc.tipo_comprobantes_id')
            ->groupBy('pa.reserva_id')
            ->orderBy('r.fecha_reserva', 'DESC')
            ->get();

    
        return view('livewire.reservas-admin.reservas.comprobantes-entregados.comprobantes-entregados', compact('comprobantes'));
    }
}
