<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\TipoPaquetes;
use App\Models\TipoPersonales;
use App\Models\TipoTransportes;
use App\Models\TipoAlimentaciones; 
use App\Models\TipoAcemilas; 
use App\Models\TipoAlmuerzos; 


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







        /** Tipos de personal */
        TipoPersonales::create([
            'nombre_tipo' => 'Cocinero'
        ]);

        TipoPersonales::create([
            'nombre_tipo' => 'Guia'
        ]);

        TipoPersonales::create([
            'nombre_tipo' => 'Conductor'
        ]);
        TipoPersonales::create([
            'nombre_tipo' => 'Arriero'
        ]);
        TipoPersonales::create([
            'nombre_tipo' => 'Almacenero'
        ]);

        /*** Tipos de trsnaporte */
        
        TipoTransportes::create([
            'nombre_tipo' => 'Terrestre'
        ]);
        TipoTransportes::create([
            'nombre_tipo' => 'Aereo'
        ]);
        TipoTransportes::create([
            'nombre_tipo' => 'Marítimo'
        ]);


        /**  Tipos de Alimentación*/
        
        TipoAlimentaciones::create([
            'nombre' => 'Vegetariano'
        ]);
        TipoAlimentaciones::create([
            'nombre' => 'Postre'
        ]);
        TipoAlimentaciones::create([
            'nombre' => 'Buffet'
        ]);
        TipoAlimentaciones::create([
            'nombre' => 'Carne'
        ]);


        /** Tipos de acémila */
        TipoAcemilas::create([
            'nombre' => 'Caballos'
        ]);
        TipoAcemilas::create([
            'nombre' => 'Llamas'
        ]);

        TipoAcemilas::create([
            'nombre' => 'Burros'
        ]);
        TipoAcemilas::create([
            'nombre' => 'Alpacas'
        ]);

        /*** Tipos de almuerzos */
        
        TipoAlmuerzos::create([
            'nombre' => 'Social'
        ]);
        TipoAlmuerzos::create([
            'nombre' => 'Especial'
        ]);
        TipoAlmuerzos::create([
            'nombre' => 'Personalizado'
        ]);

    }
}
