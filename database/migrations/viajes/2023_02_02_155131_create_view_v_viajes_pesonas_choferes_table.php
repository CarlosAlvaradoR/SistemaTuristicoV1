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
        DB::statement("CREATE OR REPLACE VIEW v_viajes_pesonas_choferes AS
        SELECT pe.id, concat(pe.nombre,' ' ,pe.apellidos) as datos, pe.dni,pe.telefono, ch.id as idChofer FROM personas pe
        LEFT JOIN choferes ch on pe.id = ch.persona_id");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS v_viajes_pesonas_choferes;");
    }
};
