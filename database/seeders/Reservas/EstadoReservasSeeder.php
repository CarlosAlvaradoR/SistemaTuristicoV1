<?php

namespace Database\Seeders\Reservas;

use App\Models\Reservas\EstadoReservas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadoReservasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $estado_reserva = EstadoReservas::create(['nombre_estado' => 'COMPLETADO']);
        $estado_reserva = EstadoReservas::create(['nombre_estado' => 'PENDIENTE DE PAGO']);
    }
}
