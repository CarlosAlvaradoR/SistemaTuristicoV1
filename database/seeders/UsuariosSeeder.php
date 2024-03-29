<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;
use App\Models\Personas;
use App\Models\Clientes;
use App\Models\Reservas\Nacionalidades;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $carlos = Personas::create([
            'dni'=>'70988855', 
            'nombre' => 'Carlos Emilio', 
            'apellidos' => 'Alvarado Robles', 
            'genero' => 1, 
            'telefono' => '98373833', 
            'dirección' => 'Av. Las Canteras'
        ]);

       $user1 = User::create([
            'name' => 'Carlos Emilio', 
            'email' => 'carlos2000emilioa@gmail.com', 
            'email_verified_at' =>'2022-12-12', 
            'password' => bcrypt('123456789'), 
            'persona_id' => $carlos->id
        ]);
        $user1->assignRole('admin');
        //$user1->givePermissionTo(['ver-paquetes', 'crear-paquetes', 'editar-paquetes']);


        $jefferson = Personas::create([
            'dni'=>'89837441', 
            'nombre' => 'Camilo Luis', 
            'apellidos' => 'Jara Gutiérrez', 
            'genero' => 1, 
            'telefono' => '98373833', 
            'dirección' => 'Av. Las Canteras'
        ]);

        $user2 = User::create([
            'name' => 'Camilo Luis', 
            'email' => 'jeff.silvestre.gutierrez@gmail.com', 
            'email_verified_at' =>'2022-12-12', 
            'password' => bcrypt('123456789'), 
            'persona_id' => $jefferson->id
        ]);
        $user2->assignRole('admin');
       // $user2->givePermissionTo(['crear-paquetes']);

        
        $persona3 = Personas::create([
            'dni'=>'192828188', 
            'nombre' => 'Miguel', 
            'apellidos' => 'Silva Zapata', 
            'genero' => 1, 
            'telefono' => '98827277', 
            'dirección' => 'Av. Las Canteras'
        ]);

        $user3 = User::create([
            'name' => 'Miguel', 
            'email' => 'jmiguelsilzajym@gmail.com', 
            'email_verified_at' =>'2022-12-12', 
            'password' => bcrypt('123456789'), 
            'persona_id' => $persona3->id
        ]);
        $user3->assignRole('admin');

       


        //CLIENTES
        // $faker = Faker::create();
        // for ($i=1; $i < 51; $i++) { 
        //     $persona = Personas::create([
        //         'dni'=> $faker->unique()->postcode, 
        //         'nombre' => $faker->name, 
        //         'apellidos' => $faker->lastname, 
        //         'genero' => rand(1,2), 
        //         'telefono' => $faker->phoneNumber, 
        //         'dirección' => $faker->address
        //     ]);
    
        //    $user = User::create([
        //         'name' => $persona->nombre, 
        //         'email' => $faker->email, 
        //         'email_verified_at' => now(), 
        //         'password' => bcrypt('123456789'), 
        //         'persona_id' => $persona->id
        //     ]);
        //     $user->assignRole('cliente');

        //     $cliente = Clientes::create([
        //         'persona_id' => $persona->id, 
        //         'user_id' => $user->id,
        //         'nacionalidad_id' => rand(1,200)
        //     ]);
        // }
    }
}
