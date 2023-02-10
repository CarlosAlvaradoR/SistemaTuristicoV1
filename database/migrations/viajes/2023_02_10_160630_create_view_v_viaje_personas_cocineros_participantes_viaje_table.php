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
        DB::statement("CREATE OR REPLACE VIEW v_viaje_personas_cocineros_participantes_viaje AS
        SELECT concat(p.nombre, ' ', p.apellidos) as datos, c.id as idCocinero, vpc.monto_pagar, vpc.id as idViajePaqueteCocinero,
        vpc.viaje_paquetes_id
        FROM personas p
        INNER JOIN cocineros c on c.persona_id = p.id
        INNER JOIN viaje_paquetes_cocineros vpc on vpc.cocinero_id = c.id");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS v_viaje_personas_cocineros_participantes_viaje;");
    }
};
