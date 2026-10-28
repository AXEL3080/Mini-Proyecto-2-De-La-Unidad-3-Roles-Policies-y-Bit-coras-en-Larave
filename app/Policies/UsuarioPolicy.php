<?php

namespace App\Policies;

use App\Models\Usuario;

class UsuarioPolicy
{
    public function create(Usuario $user): bool
    {
        return $user->rol === 'Administrador';
    }

    public function update(Usuario $user, Usuario $usuario): bool
    {
        if ($user->rol === 'Administrador') {
            return true;
        }

        if ($user->rol === 'Gerente') {
            return $usuario->rol === 'Cliente';
        }

        return false;
    }

    public function delete(Usuario $user, Usuario $usuario): bool
    {
        return $user->rol === 'Administrador';
    }
}