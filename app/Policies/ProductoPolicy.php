<?php

namespace App\Policies;

use App\Models\Usuario;
use App\Models\Producto;

class ProductoPolicy
{
    public function viewAny(Usuario $user): bool
    {
        return true; // Clientes, gerentes y administradores pueden ver productos
    }

    public function create(Usuario $user): bool
    {
        return in_array($user->rol, ['Administrador', 'Gerente']);
    }

    public function update(Usuario $user, Producto $producto): bool
    {
        return in_array($user->rol, ['Administrador', 'Gerente']);
    }

    public function delete(Usuario $user, Producto $producto): bool
    {
        return in_array($user->rol, ['Administrador', 'Gerente']);
    }
}