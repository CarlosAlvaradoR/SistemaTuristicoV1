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



        /** PERMISOS DEL MÓDULO EQUIPOS */
        # Equipos
        Permission::firstOrCreate(['name' => 'ver-interfaz-de-equipos']);
        Permission::firstOrCreate(['name' => 'ver-reporte-de-equipos']);
        Permission::firstOrCreate(['name' => 'crear-equipos']);
        Permission::firstOrCreate(['name' => 'editar-equipos']);
        Permission::firstOrCreate(['name' => 'eliminar-equipos']);
        Permission::firstOrCreate(['name' => 'añadir-equipos']);
        Permission::firstOrCreate(['name' => 'quitar-equipos']);
        Permission::firstOrCreate(['name' => 'añadir-MantenimientoBajas-de-equipos']);
        # Marcas
        Permission::firstOrCreate(['name' => 'ver-interfaz-de-marcas']);
        Permission::firstOrCreate(['name' => 'crear-marca-de-equipos']);
        Permission::firstOrCreate(['name' => 'editar-marca-de-equipos']);
        Permission::firstOrCreate(['name' => 'eliminar-marca-de-equipos']);


        // Obtener el rol de superadmin
        $superadminRole = \Spatie\Permission\Models\Role::findByName('admin');

        // Asignar el rol de superadministrador al usuario
        //$user->assignRole($superadminRole);

        // Obtener todos los permisos disponibles
        $permissions = Permission::all();

        // Sincronizar los permisos al rol de superadministrador
        $superadminRole->syncPermissions($permissions);

        
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
