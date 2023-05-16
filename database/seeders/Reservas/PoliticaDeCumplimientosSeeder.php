<?php

namespace Database\Seeders\Reservas;

use App\Models\Reservas\PoliticaDeCumplimientos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PoliticaDeCumplimientosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $politica = PoliticaDeCumplimientos::create(['cantidad_de_dias' => 10]);
    }
}
