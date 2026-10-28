<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'existencia',
        'usuario_id',
    ];

    // Relación con categorías (Muchos a Muchos)
    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'categoria_producto');
    }

    // Relación con el usuario vendedor
    public function vendedor()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}