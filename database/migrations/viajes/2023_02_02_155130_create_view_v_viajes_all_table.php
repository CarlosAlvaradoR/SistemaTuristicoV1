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
        DB::statement("CREATE OR REPLACE VIEW v_viajes_all AS
        SELECT pt.id as idPaquete,pt.nombre,pt.slug, vp.descripcion, vp.fecha, vp.cantidad_participantes,
        vp.hora, vp.estado, vp.id as id
        FROM paquetes_turisticos pt
        INNER JOIN viaje_paquetes vp on vp.paquete_id = pt.id");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS v_viajes_all;");
    }
};
