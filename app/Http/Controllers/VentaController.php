<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Producto;
use App\Http\Requests\StoreVentaRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class VentaController extends Controller
{
    public function store(StoreVentaRequest $request)
    {
        $this->authorize('create', Venta::class);

        $producto = Producto::findOrFail($request->producto_id);

        if ($producto->existencia < $request->cantidad) {
            return back()->withErrors(['cantidad' => 'Stock insuficiente']);
        }

        $total = $producto->precio * $request->cantidad;

        $venta = Venta::create([
            'producto_id' => $producto->id,
            'vendedor_id' => $producto->usuario_id,
            'cliente_id' => Auth::id(),
            'fecha' => now(),
            'total' => $total,
        ]);

        $producto->decrement('existencia', $request->cantidad);

        Log::channel('ventas')->info('Venta creada', [
            'venta_id' => $venta->id,
            'producto_id' => $producto->id,
            'cliente_id' => Auth::id(),
            'vendedor_id' => $producto->usuario_id,
            'total' => $total
        ]);

        return redirect()->route('ventas.index');
    }
}