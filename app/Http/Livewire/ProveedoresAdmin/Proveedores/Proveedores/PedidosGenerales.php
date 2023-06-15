<?php

namespace App\Http\Livewire\ProveedoresAdmin\Proveedores\Proveedores;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class PedidosGenerales extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $cant = 20, $mostrar = 'TODO';
    public function render()
    {
        $condiciones = [
            'TODO' => [],
            'COMPLETADO' => ['ep.estado' => 'COMPLETADO'],
            'NO COMPLETADO' => ['ep.estado' => 'NO COMPLETADO'],
        ];

        $filtro = $condiciones[$this->mostrar] ?? [];

        $pedidos = DB::table('proveedores as p')
            ->join('pedidos as pe', 'p.id', '=', 'pe.proveedores_id')
            ->join('estado_pedidos as ep', 'ep.id', '=', 'pe.estado_pedidos_id')
            ->leftJoin('comprobante_pagos as cp', 'cp.pedidos_id', '=', 'pe.id')
            ->leftJoin('tipo_comprobantes as tc', 'tc.id', '=', 'cp.tipo_comprobante_id')
            ->leftJoin('archivo_comprobantes as ac', 'ac.comprobante_id', '=', 'cp.id')
            ->where($filtro)
            ->select(
                'p.nombre_proveedor',
                'p.ruc',
                'pe.fecha',
                //'pe.monto',
                'cp.numero_comprobante',
                'ac.ruta_archivo',
                'ep.estado',
                'p.slug',
                'ac.slug as slugArchivoComprobante',
                'pe.id as idPedido'
            )
            ->paginate($this->cant);

        
        // dd($pedidos);
        return view('livewire.proveedores-admin.proveedores.proveedores.pedidos-generales', compact('pedidos'));
    }
}
