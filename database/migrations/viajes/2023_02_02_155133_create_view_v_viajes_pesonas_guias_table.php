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
        DB::statement("CREATE OR REPLACE VIEW v_viajes_pesonas_guias AS
        SELECT pe.id, concat(pe.nombre,' ' ,pe.apellidos) as datos, pe.dni,pe.telefono, gui.id as idGuia FROM personas pe
        LEFT JOIN guias gui on pe.id = gui.persona_id");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS v_viajes_pesonas_guias;");
    }
};
