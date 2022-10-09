<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;
use App\Models\Personas;

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
        Personas::create([
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
            'persona_id' => 1
        ]);
        $user1->assignRole('admin');

        $jefferson = Personas::create([
            'dni'=>'89837441', 
            'nombre' => 'Jefferson Anthony', 
            'apellidos' => 'Silvestre Gutierrez', 
            'genero' => 1, 
            'telefono' => '98373833', 
            'dirección' => 'Av. Las Canteras'
        ]);

        $user2 = User::create([
            'name' => 'Jefferson Anthony', 
            'email' => 'jeff.silvestre.gutierrez@gmail.com', 
            'email_verified_at' =>'2022-12-12', 
            'password' => bcrypt('123456789'), 
            'persona_id' => $jefferson->id
        ]);
        $user2->assignRole('admin');

    }
}
