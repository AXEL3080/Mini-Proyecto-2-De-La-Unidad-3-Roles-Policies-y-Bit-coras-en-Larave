<?php

namespace App\Policies;

use App\Models\Usuario;

class VentaPolicy
{
    public function create(Usuario $user): bool
    {
        return $user->rol === 'Cliente'; // Solo los clientes pueden comprar
    }
}