<?php

namespace Database\Seeders;

use App\Models\ContenedoresModel;
use App\Models\PilotosModel;
use App\Models\SizeContenedoresModel;
use App\Models\TransportistasModel;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('size_contenedores')->insert([
            'name' => 'HF',
        ]);

        DB::table('size_contenedores')->insert([
            'name' => 'PF',
        ]);

        DB::table('contenedores')->insert([
            'size' => 1,
            'identificador' => '654321gfdsa'
        ]);

        DB::table('contenedores')->insert([
            'size' => 2,
            'identificador' => '123456asdfg'
        ]);

        DB::table('transportistas')->insert([
            'name' => 'Transportes Arturo'
        ]);

        DB::table('transportistas')->insert([
            'name' => 'Chiquita'
        ]);

        DB::table('transportistas')->insert([
            'name' => 'Transportes Comerciales S.A.'
        ]);

        DB::table('status_pilotos')->insert([
            'name' => 'Activo',
            'description' => 'Cuando el piloto esta listo para viajar',
        ]);

        DB::table('status_pilotos')->insert([
            'name' => 'Suspendido',
            'description' => 'Cuando el piloto esta dado de baja',
        ]);

        DB::table('status_camiones')->insert([
            'name' => 'Activo',
            'description' => 'Cuando el camion esta listo para viajar',
        ]);

        DB::table('status_camiones')->insert([
            'name' => 'En Taller',
            'description' => 'Cuando el camion esta en taller',
        ]);

        DB::table('pilotos')->insert([
            'name' => 'Gerson Josue',
            'lastname' => 'Lopez Juarez',
            'telefono' => 39485785,
            'transportista_id' => 1,
            'status_id' => 1,
        ]);

        DB::table('pilotos')->insert([
            'name' => 'Julio Luis',
            'lastname' => 'Martinez Diaz',
            'telefono' => 48695832,
            'transportista_id' => 1,
            'status_id' => 1,
        ]);

        DB::table('camiones')->insert([
            'placa' => 'HTG123',
            'chasis' => '1234567a',
            'transportista_id' => 1,
            'status_id' => 1,
        ]);

        DB::table('camiones')->insert([
            'placa' => 'LKI968',
            'chasis' => '09393o',
            'transportista_id' => 1,
            'status_id' => 1,
        ]);

        $user = User::create([
            'name' => 'Rudy',
            'email' => 'rudy@gmail.com',
            'transportista_id' => 2,
            'password' => Hash::make("Carrito3"),
        ]);
        $user->assignRole('admin');

        $userTransportista = User::create([
            'name' => 'Transportista',
            'email' => 'transportista@gmail.com',
            'transportista_id' => 1,
            'password' => Hash::make("Carrito3"),
        ]);
        $userTransportista->assignRole('transportista');
    }
}
