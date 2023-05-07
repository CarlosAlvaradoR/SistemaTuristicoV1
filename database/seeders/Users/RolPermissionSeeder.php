<?php

namespace Database\Seeders\Users;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear permisos 
        Permission::firstOrCreate(['name' => 'ver-paquetes']);
        Permission::firstOrCreate(['name' => 'crear-paquetes']);
        Permission::firstOrCreate(['name' => 'editar-paquetes']);
        
        // Permission::firstOrCreate(['name' => 'write-a-post']);
        // Permission::firstOrCreate(['name' => 'edit-a-post']);
        // Permission::firstOrCreate(['name' => 'delete-a-post']);
        
        // // Crear roles 
        // $superAdmin = Role::firstOrCreate(['name' => 'SuperAdmin']);
        // $admin = Role::firstOrCreate(['name' => 'Admin']);
        
        // // Dar permiso a cierto rol 
        // $superAdmin->givePermissionTo(['write-a-post', 'edit-a-post', 'delete-a-post']);
        // $admin->givePermissionTo(['escribir-una-publicación']);


        // User::find(2)->assignRole(['Admin']);
    }
}
