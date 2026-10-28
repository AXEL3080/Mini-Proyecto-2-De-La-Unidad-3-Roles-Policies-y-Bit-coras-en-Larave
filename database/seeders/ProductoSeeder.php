<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    public function run(): void
    {
        $laptop = Producto::create([
            'nombre' => 'Laptop Gamer',
            'descripcion' => '16GB RAM, 512GB SSD',
            'precio' => 15000.00,
            'existencia' => 5,
            'usuario_id' => 1,
        ]);
        // Asociamos múltiples categorías (ej. ID 1 y 2)
        $laptop->categorias()->attach([1]);

        $mouse = Producto::create([
            'nombre' => 'Mouse Inalámbrico',
            'descripcion' => 'Ergonómico con USB recargable',
            'precio' => 350.00,
            'existencia' => 20,
            'usuario_id' => 1,
        ]);
        // Asociamos una categoría (ej. ID 1)
        $mouse->categorias()->attach([1]);
    }
}