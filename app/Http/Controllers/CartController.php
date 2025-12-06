<?php
// app/Http/Controllers/CartController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto; // Asegúrate de tener este modelo

class CartController extends Controller
{
    public function show(Request $request)
    {
        // Obtener el carrito de la sesión
        $carrito = session()->get('carrito', []);
        
        // Calcular totales
        $subtotal = 0;
        foreach ($carrito as $item) {
            $subtotal += $item['precio'] * $item['cantidad'];
        }
        
        $envio = 9.99;
        $descuento = 0;
        $total = $subtotal + $envio - $descuento;
        
        return view('carrito', compact('carrito', 'subtotal', 'envio', 'descuento', 'total'));
    }
    
    public function add(Request $request)
    {
        $productoId = $request->input('producto_id');
        $cantidad = $request->input('cantidad', 1);
        
        // Buscar producto en la base de datos
        $producto = Producto::find($productoId);
        
        if (!$producto) {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }
        
        // Obtener carrito actual
        $carrito = session()->get('carrito', []);
        
        // Verificar si el producto ya está en el carrito
        if (isset($carrito[$productoId])) {
            // Incrementar cantidad
            $carrito[$productoId]['cantidad'] += $cantidad;
        } else {
            // Agregar nuevo producto
            $carrito[$productoId] = [
                'id' => $producto->id,
                'nombre' => $producto->nombre,
                'descripcion' => $producto->descripcion,
                'precio' => $producto->precio,
                'cantidad' => $cantidad,
                'imagen' => $producto->imagen,
                'icono' => $producto->icono ?? 'fa-box' // Icono por defecto
            ];
        }
        
        // Guardar en sesión
        session()->put('carrito', $carrito);
        
        return response()->json([
            'success' => true,
            'carrito' => $carrito,
            'total_items' => count($carrito)
        ]);
    }
    
    public function remove($id)
    {
        $carrito = session()->get('carrito', []);
        
        if (isset($carrito[$id])) {
            unset($carrito[$id]);
            session()->put('carrito', $carrito);
        }
        
        return redirect()->back()->with('success', 'Producto eliminado del carrito');
    }
    
    public function update(Request $request, $id)
    {
        $cantidad = $request->input('cantidad', 1);
        
        $carrito = session()->get('carrito', []);
        
        if (isset($carrito[$id])) {
            $carrito[$id]['cantidad'] = $cantidad;
            session()->put('carrito', $carrito);
        }
        
        return redirect()->back()->with('success', 'Cantidad actualizada');
    }
}