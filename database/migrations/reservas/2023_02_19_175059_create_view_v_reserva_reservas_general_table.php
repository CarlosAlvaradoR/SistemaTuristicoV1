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
        DB::statement("SET sql_mode = '' ");
        $query = 'CREATE OR REPLACE VIEW v_reserva_reservas_general as
        SELECT p.dni, concat(p.nombre, " ",p.apellidos) as datos,
        r.id as idReserva, 
        pt.id as idPaquete, pt.nombre,
        r.fecha_reserva, 
        SUM(pa.monto) as pago, 
        (SELECT SUM(ps.monto) FROM pagos ps WHERE ps.estado_pago = "ACEPTADO" AND ps.reserva_id = r.id) as aceptado,
        (SELECT SUM(ps.monto) FROM pagos ps WHERE ps.estado_pago = "NO ACEPTADO" AND ps.reserva_id = r.id) as no_aceptado,
        (SELECT SUM(ps.monto) FROM pagos ps WHERE ps.estado_pago = "EN PROCESO" AND ps.reserva_id = r.id) as en_proceso,
        er.nombre_estado, 
        (CASE
            WHEN (SELECT SUM(ps.monto) FROM pagos ps WHERE ps.estado_pago = "ACEPTADO" AND ps.reserva_id = r.id) >= pt.precio THEN "PAGO COMPLETADO"
            WHEN (SELECT SUM(ps.monto) FROM pagos ps WHERE ps.estado_pago = "EN PROCESO" AND ps.reserva_id = r.id) <= pt.precio THEN "EN PROCESO"
            ELSE "PENDIENTE DE PAGO"
        END) as estado_oficial,
        b.numero_boleta,r.id,
        (SELECT (DATEDIFF(fecha_reserva, curdate()))) as dias_faltantes,
        case 
          when (SELECT fecha_reserva-curdate())>=0 AND (SELECT fecha_reserva-curdate()) <=(SELECT pc.cantidad_de_dias FROM politica_de_cumplimientos pc LIMIT 1)  then "PRÓXIMA A CUMPLIRSE"  
          when  (SELECT fecha_reserva-curdate())>(SELECT pc.cantidad_de_dias FROM politica_de_cumplimientos pc LIMIT 1) then "EN PROGRAMACIÓN"  
          when (SELECT fecha_reserva-curdate())<0 then "PASADOS DE FECHA"
        end as estado_reserva,
        r.slug
        FROM personas p
        INNER JOIN clientes c on p.id=c.persona_id
        INNER JOIN reservas r on r.cliente_id=c.id
        INNER JOIN paquetes_turisticos pt on pt.id=r.paquete_id
        INNER JOIN estado_reservas er on er.id = r.estado_reservas_id
        INNER JOIN pagos pa on pa.reserva_id = r.id
        INNER JOIN boletas b on b.id = pa.boleta_id
        GROUP BY pa.reserva_id , pa.estado_pago
        ORDER BY r.fecha_reserva DESC';
        DB::statement($query);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('DROP VIEW IF EXISTS v_reserva_reservas_general;');
    }
};
