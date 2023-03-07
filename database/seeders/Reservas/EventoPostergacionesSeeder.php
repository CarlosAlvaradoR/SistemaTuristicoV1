<?php

namespace Database\Seeders\Reservas;

use App\Models\Reservas\EventoPostergaciones;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventoPostergacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $evento_postergacion = EventoPostergaciones::create(['nombre_evento' => 'CANCELACIÓN DE VIAJE']);
    }
}
