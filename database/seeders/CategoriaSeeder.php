<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        Categoria::create(['nombre' => 'Electrónica', 'descripcion' => 'Dispositivos y gadgets tecnológicos']);
        Categoria::create(['nombre' => 'Ropa', 'descripcion' => 'Prendas de vestir y moda']);
        Categoria::create(['nombre' => 'Hogar', 'descripcion' => 'Artículos y muebles para el hogar']);
    }
}