<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $table = 'ventas';

    protected $fillable = [
        'producto_id',
        'cliente_id',
        'vendedor_id',
        'cantidad',
        'total',
    ];

    // Relación con el producto vendido
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    // Relación con el usuario que actúa como cliente (comprador)
    public function cliente()
    {
        return $this->belongsTo(Usuario::class, 'cliente_id');
    }

    // Relación con el usuario que actúa como vendedor
    public function vendedor()
    {
        return $this->belongsTo(Usuario::class, 'vendedor_id');
    }
}