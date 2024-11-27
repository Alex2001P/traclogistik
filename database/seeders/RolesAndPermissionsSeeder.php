<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear permisos
        $dashboard = Permission::create(['name' => 'dashboard']);
        $transportistaP = Permission::create(['name' => 'transportista']);
        $pedidos = Permission::create(['name' => 'pedidos']);
        $oficina = Permission::create(['name' => 'oficina']);
        $createTransportista = Permission::create(['name' => 'createTransportista']);
        $registrarUsuarios = Permission::create(['name' => 'registrarUsuarios']);
        $pilotos = Permission::create(['name' => 'pilotos']);
        $camiones = Permission::create(['name' => 'camiones']);

        $ver = Permission::create(['name' => 'view']);

        // Crear roles y asignar permisos
        $admin = Role::create(['name' => 'admin']);
        $transportista = Role::create(['name' => 'transportista']);

        $admin->givePermissionTo([$dashboard, $pedidos, $oficina, $createTransportista, $registrarUsuarios]);
        $transportista->givePermissionTo([$transportistaP, $pilotos, $camiones]);
    }
}
