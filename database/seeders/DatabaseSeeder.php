<?php

namespace Database\Seeders;

use App\Models\Reservas\PoliticaDeCumplimientos;
use Database\Seeders\Pedidos\BancosSeeder;
use Database\Seeders\Pedidos\EstadoPedidosSeeder;
use Database\Seeders\Pedidos\TipoComprobantesSeeder;
use Database\Seeders\Reservas\CuentaPagosSeeder;
use Database\Seeders\Reservas\EstadoReservasSeeder;
use Database\Seeders\Reservas\EventoPostergacionesSeeder;
use Database\Seeders\Reservas\nacionalidadesesSeeder;
use Database\Seeders\Reservas\NacionalidadesSeeder;
use Database\Seeders\Reservas\TipoPagosSeeder;
use Database\Seeders\Users\RolPermissionSeeder;
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
        $this->call(NacionalidadesSeeder::class);
        $this->call(RolsSeeder::class);
        $this->call(RolPermissionSeeder::class);
        $this->call(UsuariosSeeder::class);
        $this->call(TipoPaquetesSeeder::class);
        //$this->call(PaquetesTuristicosSeeder::class);


        // TODO LO QUE ES DE RESERVAS
        $this->call(PoliticaDeCumplimientos::class);
        $this->call(EstadoReservasSeeder::class);
        $this->call(TipoPagosSeeder::class);
        $this->call(CuentaPagosSeeder::class);
        $this->call(EventoPostergacionesSeeder::class);


        /** MÓDULO PEDIDOS */
        $this->call(EstadoPedidosSeeder::class);
        $this->call(BancosSeeder::class);
        $this->call(TipoComprobantesSeeder::class);
    }
}
