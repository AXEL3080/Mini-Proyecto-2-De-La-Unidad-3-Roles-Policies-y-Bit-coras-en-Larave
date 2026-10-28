<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios';

    protected $fillable = [
        'nombre',
        'apellidos',
        'correo',
        'clave',
        'rol',
    ];

    protected $hidden = [
        'clave',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'clave' => 'hashed',
        ];
    }

    // Método requerido para que Laravel reconozca 'clave' como contraseña en el Auth
    public function getAuthPassword()
    {
        return $this->clave;
    }

    // Relación: Un usuario vende muchos productos
    public function productos()
    {
        return $this->hasMany(Producto::class, 'usuario_id');
    }

    // Ventas como vendedor
    public function ventasComoVendedor()
    {
        return $this->hasMany(Venta::class, 'vendedor_id');
    }

    // Ventas como cliente
    public function ventasComoCliente()
    {
        return $this->hasMany(Venta::class, 'cliente_id');
    }

    // Relación hasManyThrough obligatoria: Usuario -> Productos -> Categorias
    public function categoriasMedianteProductos()
    {
        return $this->hasManyThrough(
            Categoria::class,
            Producto::class,
            'usuario_id', // Clave foránea en productos
            'id',         // Clave foránea en categorias
            'id',         // Clave local en usuarios
            'id'          // Clave local en productos
        );
    }
}