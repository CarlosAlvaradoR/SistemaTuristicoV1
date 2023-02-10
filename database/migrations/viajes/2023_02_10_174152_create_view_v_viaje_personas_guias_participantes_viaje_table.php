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
        DB::statement("CREATE OR REPLACE VIEW v_viaje_personas_guias_participantes_viaje AS
        SELECT concat(p.nombre, ' ', p.apellidos) as datos, g.id as idGuia, vpg.monto_pagar, vpg.id as idViajePaqueteCocinero,
        vpg.viaje_paquetes_id
        FROM personas p
        INNER JOIN guias g on g.persona_id = p.id
        INNER JOIN viaje_paquetes_guias vpg on vpg.guias_id = g.id");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS v_viaje_personas_guias_participantes_viaje;");
    }
};
