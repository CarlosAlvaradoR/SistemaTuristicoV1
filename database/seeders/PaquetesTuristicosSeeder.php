<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\PaquetesTuristicos;
class PaquetesTuristicosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();
        for ($i=1; $i < 51; $i++) { 
            PaquetesTuristicos::create([
                'nombre' => $faker->firstNameMale,
                 'precio' => $faker->randomNumber(2),
                 'precio_dolares' => $faker->randomNumber(2),
                 'estado' => rand(0, 1),
                 'imagen_principal' => $faker->lastName,
                 'slug' => $faker->unique()->lastName,
                 'tipo_paquete_id' => 1 
            ]);
        }
    }
}
