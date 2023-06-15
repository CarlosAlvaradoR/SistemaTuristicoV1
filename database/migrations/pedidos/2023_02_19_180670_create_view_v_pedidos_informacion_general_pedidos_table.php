<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE OR REPLACE VIEW v_pedidos_informacion_general_pedidos AS
        SELECT p.nombre_proveedor, p.ruc, pe.fecha,
        (dp.precio_real * dp.cantidad_entrante)as monto,
        cp.numero_comprobante, ac.ruta_archivo, ep.estado, p.slug, ac.slug as slugArchivoComprobante,pe.id as idPedido,
        dp.pedidos_id
        FROM proveedores p
        INNER JOIN pedidos pe on p.id = pe.proveedores_id
        INNER JOIN detalle_pedidos dp on dp.pedidos_id = pe.id
        INNER JOIN estado_pedidos ep on ep.id = pe.estado_pedidos_id
        LEFT JOIN comprobante_pagos cp on cp.pedidos_id = pe.id
        LEFT JOIN tipo_comprobantes tc on tc.id = cp.tipo_comprobante_id
        LEFT JOIN archivo_comprobantes ac on ac.comprobante_id = cp.id
        --  WHERE ep.estado = 'COMPLETADO';
        -- GROUP BY dp.pedidos_id
        ;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS v_pedidos_informacion_general_pedidos;");
    }
};
