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
        DB::statement("CREATE OR REPLACE VIEW v_viaje_personas_arrieros AS
        SELECT concat(p.nombre, ' ', p.apellidos) as datos, a.id as idArriero FROM personas p
        INNER JOIN arrieros a on a.persona_id = p.id");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS v_viaje_personas_arrieros;");
    }
};
