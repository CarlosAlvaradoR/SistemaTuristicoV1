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
        /** PERMISOS DEL MÓDULO USUARIOS */
        Permission::firstOrCreate(['name' => 'administrar-configuracion-del-sistema']);
        Permission::firstOrCreate(['name' => 'administrar-usuarios-del-sistema']);
        Permission::firstOrCreate(['name' => 'administrar-roles-del-sistema']);

        
        
        /** PERMISOS DEL MÓDULO PAQUETES */
        Permission::firstOrCreate(['name' => 'ver-interfaz-de-paquetes-turisticos']);
        Permission::firstOrCreate(['name' => 'crear-paquetes-turisticos']);
        Permission::firstOrCreate(['name' => 'editar-paquetes-turisticos']);
        Permission::firstOrCreate(['name' => 'ver-manipular-componentes-de-paquetes-turisticos']);
        Permission::firstOrCreate(['name' => 'crear-editar-eliminar-atractivos-de-paquetes-turisticos']);
        Permission::firstOrCreate(['name' => 'crear-editar-eliminar-tipos-de-personal-de-paquetes-turisticos']);
        Permission::firstOrCreate(['name' => 'crear-editar-eliminar-tipos-de-transporte-de-paquetes-turisticos']);
        Permission::firstOrCreate(['name' => 'crear-editar-eliminar-tipos-de-alimentacion-de-paquetes-turisticos']);
        Permission::firstOrCreate(['name' => 'crear-editar-eliminar-tipos-de-acemilas-de-paquetes-turisticos']);
        Permission::firstOrCreate(['name' => 'crear-editar-eliminar-tipos-de-almuerzos-de-paquetes-turisticos']);
        Permission::firstOrCreate(['name' => 'crear-editar-eliminar-tipos-de-paquetes-turisticos']);






        /** PERMISOS DEL MÓDULO RESERVAS */
        Permission::firstOrCreate(['name' => 'crear-editar-reservas']);
        Permission::firstOrCreate(['name' => 'ver-interfaz-de-reservas-generales']);
        Permission::firstOrCreate(['name' => 'llenar-solicitud-de-devolucion']);
        Permission::firstOrCreate(['name' => 'ver-informacion-de-pagos']);
        Permission::firstOrCreate(['name' => 'ver-interfaz-de-solicitudes-generales']);
        Permission::firstOrCreate(['name' => 'ver-interfaz-de-devoluciones-generales']);
        Permission::firstOrCreate(['name' => 'ver-crear-editar-eliminar-criterios-medicos']);
        Permission::firstOrCreate(['name' => 'ver-crear-editar-eliminar-eventos-de-postergacion']);
        Permission::firstOrCreate(['name' => 'ver-crear-editar-eliminar-tipos-de-pagos']);
        Permission::firstOrCreate(['name' => 'ver-reportes-en general-de-reservas']);
        Permission::firstOrCreate(['name' => 'ver-crear-editar-eliminar-politica-de-cumplimiento-de-reserva']);
        Permission::firstOrCreate(['name' => 'ver-y-manipular-comprobantes']);
        








        /** PERMISOS DEL MÓDULO VIAJES */
        Permission::firstOrCreate(['name' => 'ver-interfaz-de-viajes']);
        Permission::firstOrCreate(['name' => 'añadir-participantes-de-viajes']);
        Permission::firstOrCreate(['name' => 'añadir-traslado-de-viajes']);
        Permission::firstOrCreate(['name' => 'añadir-almuerzos-de-viajes']);
        Permission::firstOrCreate(['name' => 'añadir-boletas-de-pago-de-viajes']);
        Permission::firstOrCreate(['name' => 'añadir-actividades-de-aclimatacion-de-viajes']);
        Permission::firstOrCreate(['name' => 'añadir-hospedajes-de-viajes']);
        Permission::firstOrCreate(['name' => 'añadir-itinerarios-de-viajes']);
        Permission::firstOrCreate(['name' => 'manipular-componentes-de-choferes-cocineros-guias-arrieros']);
        Permission::firstOrCreate(['name' => 'ver-reporte-de-viajes']);
        Permission::firstOrCreate(['name' => 'manipular-componentes-de-empresas']);
        Permission::firstOrCreate(['name' => 'crear-editar-eliminar-asociaciones']);
        Permission::firstOrCreate(['name' => 'crear-editar-eliminar-hoteles']);
        Permission::firstOrCreate(['name' => 'crear-editar-eliminar-tipos-de-vehiculo']);
        Permission::firstOrCreate(['name' => 'crear-editar-eliminar-tipos-de-licencias']);

            




        /** PERMISOS DEL MÓDULO PEDIDOS */
        Permission::firstOrCreate(['name' => 'ver-interfaz-de-proveedores']);
        Permission::firstOrCreate(['name' => 'crear-proveedores']);
        Permission::firstOrCreate(['name' => 'editar-proveedores']);
        Permission::firstOrCreate(['name' => 'eliminar-proveedores']);
        Permission::firstOrCreate(['name' => 'añadir-cuentas-bancarias']);
        Permission::firstOrCreate(['name' => 'crear-pedidos-de-proveedores']);

        Permission::firstOrCreate(['name' => 'ver-interfaz-de-pedidos-generales']);
        # Marcas
        Permission::firstOrCreate(['name' => 'ver-interfaz-de-entidades-financieras']);
        Permission::firstOrCreate(['name' => 'crear-entidades-financieras']);
        Permission::firstOrCreate(['name' => 'editar-entidades-financieras']);
        Permission::firstOrCreate(['name' => 'eliminar-entidades-financieras']);

        Permission::firstOrCreate(['name' => 'ver-crear-editar-tipos-de-comprobante']);





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
