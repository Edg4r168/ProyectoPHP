<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('docente')->insert([
            'nombre' => 'admin',
            'apellido' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin'),
        ]);

        DB::table('estudiante')->insert([
            'nombre' => 'Juan',
            'apellido' => 'Perez',
            'email' => 'juan@example.com',
            'pin' => '12345',
        ]);

        DB::table('grupo')->insert([
            'nombre' => ' Grupo 4G4',
            'descripcion' => 'Grupo de la mañana',
        ]);

        DB::table('estudiante_grupo')->insert([
            'grupo_id' => 1,
            'estudiante_id' => 1,
        ]);
    }
}
