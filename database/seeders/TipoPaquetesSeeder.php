<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\TipoPaquetes;
class TipoPaquetesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //$faker = Faker::create();
        TipoPaquetes::create([
            'nombre' => 'Standar'
        ]);
        TipoPaquetes::create([
            'nombre' => 'Personalizado'
        ]);

    }
}
