<?php

namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UsuarioFactory extends Factory
{
    protected $model = Usuario::class;

    public function definition(): array
    {
        $nombres = ['Juan', 'Mario', 'Maria', 'Pedro'];
        $apellidos = ['Lopez', 'Sanchez', 'Hernandez', 'Martinez'];

        $nombre = $this->faker->randomElement($nombres);
        $apellido = $this->faker->randomElement($apellidos);

        // Agregamos un número aleatorio único para evitar duplicados en el correo
        $sufijoUnique = $this->faker->unique()->numberBetween(100, 999);

        return [
            'nombre' => $nombre,
            'apellidos' => $apellido,
            'correo' => strtolower(substr($nombre, 0, 1) . $apellido . $sufijoUnique) . '@tuxtla.tecnm.mx',
            'clave' => Hash::make('123'),
            'rol' => $this->faker->randomElement(['Cliente', 'Gerente']),
        ];
    }
}