<?php

namespace Database\Seeders;

use Database\Seeders\Reservas\EstadoReservasSeeder;
use Database\Seeders\Reservas\TipoPagosSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RolsSeeder::class);
        $this->call(UsuariosSeeder::class);
        $this->call(TipoPaquetesSeeder::class);
        //$this->call(PaquetesTuristicosSeeder::class);


        // TODO LO QUE ES DE RESERVAS
        $this->call(EstadoReservasSeeder::class);
        $this->call(TipoPagosSeeder::class);
    }
}
