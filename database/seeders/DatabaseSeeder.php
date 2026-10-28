<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Crear un Administrador fijo para pruebas de acceso total
        Usuario::create([
            'nombre' => 'Administrador',
            'apellidos' => 'General',
            'correo' => 'admin@tuxtla.tecnm.mx',
            'clave' => Hash::make('123'),
            'rol' => 'Administrador',
        ]);

        // Generar usuarios aleatorios usando el Factory (Juan, Mario, Maria, Pedro)
        Usuario::factory()->count(10)->create();

        // Llamar al seeder de categorías
        $this->call([
            CategoriaSeeder::class,
            ProductoSeeder::class,
        ]);
    }
}