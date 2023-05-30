<?php

namespace App\Http\Livewire\ReservasAdmin\Reservas\ComprobantesEntregados;

use App\Models\Reservas\SeriePagos;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Livewire\Component;

class ComprobantesEntregados extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $title = 'EDITAR INFORMACIÓN DEL COMPROBANTE';
    public $idSeriePago, $estado, $motivo_de_baja = '';
    public $dni;
    public $cant = 50; //100 y 250

    public function resetUI()
    {
        $this->reset(['title', 'idSeriePago', 'estado', 'motivo_de_baja']);
        $this->reset('dni');
        $this->resetValidation();
    }

    public function render()
    {
        DB::statement("SET sql_mode = '' ");
        if ($this->dni) {
            $comprobantes = DB::table('personas as p')
                ->select(
                    'p.nombre as nombreP',
                    'p.apellidos',
                    'p.dni',
                    'pt.nombre',
                    'tc.nombre_tipo',
                    'sc.numero_serie',
                    'sp.numero_de_serie',
                    'sp.estado',
                    'sp.motivo_de_baja',
                    'sp.id as idSeriePago'
                )
                ->join('clientes as c', 'p.id', '=', 'c.persona_id')
                ->join('reservas as r', 'r.cliente_id', '=', 'c.id')
                ->join('paquetes_turisticos as pt', 'pt.id', '=', 'r.paquete_id')
                ->join('pagos as pa', 'pa.reserva_id', '=', 'r.id')
                ->join('serie_pagos as sp', 'sp.id', '=', 'pa.serie_pagos')
                ->join('serie_comprobantes as sc', 'sc.id', '=', 'sp.serie_comprobantes_id')
                ->join('tipo_comprobantes as tc', 'tc.id', '=', 'sc.tipo_comprobantes_id')
                ->where('p.dni', $this->dni)
                ->groupBy('pa.reserva_id')
                ->orderBy('r.fecha_reserva', 'DESC')
                ->paginate($this->cant);
        } else {
            $comprobantes = DB::table('personas as p')
                ->select(
                    'p.nombre as nombreP',
                    'p.apellidos',
                    'p.dni',
                    'pt.nombre',
                    'r.slug',
                    'tc.nombre_tipo',
                    'sc.numero_serie',
                    'sp.numero_de_serie',
                    'sp.estado',
                    'sp.motivo_de_baja',
                    'sp.id as idSeriePago'
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
                ->paginate($this->cant);
        }




        return view('livewire.reservas-admin.reservas.comprobantes-entregados.comprobantes-entregados', compact('comprobantes'));
    }

    public function Editar(SeriePagos $seriePagos)
    {
        $this->idSeriePago = $seriePagos->id;
        $this->estado = $seriePagos->estado;
        $this->motivo_de_baja = $seriePagos->motivo_de_baja;
        $this->emit('show-modal');
    }

    public function guardar()
    {
        $this->validate(
            [
                'estado' => 'required|string|in:VÁLIDO, NO VÁLIDO',
                'motivo_de_baja' => 'nullable|string|min:5'
            ]
        );
        $seriePagos = SeriePagos::find($this->idSeriePago);
        // dd($seriePagos);
        $seriePagos->estado = $this->estado;
        $seriePagos->motivo_de_baja = $this->motivo_de_baja;
        $seriePagos->save();

        $this->emit('alert', 'MUY BIEN!', 'success', 'Información de Comprobante Actualizada Correctamente.');
        $this->emit('close-modal');
    }

    public function search()
    {
        $this->render();
    }
}
