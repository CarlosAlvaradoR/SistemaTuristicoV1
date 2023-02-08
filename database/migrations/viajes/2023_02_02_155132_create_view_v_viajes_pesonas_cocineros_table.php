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
        DB::statement("CREATE OR REPLACE VIEW v_viajes_pesonas_cocineros AS
        SELECT pe.id, concat(pe.nombre,' ' ,pe.apellidos) as datos, pe.dni,pe.telefono, co.id as idCocinero FROM personas pe
        LEFT JOIN cocineros co on pe.id = co.persona_id");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS v_viajes_pesonas_cocineros;");
    }
};
