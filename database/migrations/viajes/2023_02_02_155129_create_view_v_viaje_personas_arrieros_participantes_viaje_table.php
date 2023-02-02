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
        DB::statement("CREATE OR REPLACE VIEW v_viaje_personas_arrieros_participantes_viaje AS
        SELECT concat(p.nombre, ' ', p.apellidos) as datos, a.id as idArriero, aq.monto, aq.id as idAcemilasAlquiladas,
        aq.viaje_paquetes_id
        FROM personas p
        INNER JOIN arrieros a on a.persona_id = p.id
        INNER JOIN acemilas_alquiladas aq on aq.arrieros_id = a.id");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS v_viaje_personas_arrieros_participantes_viaje;");
    }
};
