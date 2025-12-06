<?php
// app/Http/Controllers/CheckoutController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        // Obtener carrito de la sesión
        $carrito = session()->get('carrito', []);
        
        // Si el carrito está vacío, redirigir al carrito
        if (empty($carrito)) {
            return redirect()->route('carrito.show')->with('error', 'Tu carrito está vacío');
        }
        
        // Calcular totales
        $subtotal = 0;
        foreach ($carrito as $item) {
            $subtotal += $item['precio'] * $item['cantidad'];
        }
        
        $envio = 9.99;
        $descuento = 30.00; // Descuento fijo por ahora
        $total = $subtotal + $envio - $descuento;
        
        // Obtener datos del cliente si ya existen en sesión
        $cliente = session()->get('cliente', []);
        
        return view('checkout', compact('carrito', 'subtotal', 'envio', 'descuento', 'total', 'cliente'));
    }
    
    public function store(Request $request)
    {
        // Validar datos del formulario
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'documento' => 'required|string|max:20',
            'telefono' => 'required|string|max:20',
            'correo' => 'required|email|max:255',
            'direccion' => 'required|string|max:500',
            'comentarios' => 'nullable|string|max:1000'
        ]);
        
        // Guardar datos del cliente en sesión
        session()->put('cliente', $validated);
        
        // Redirigir a la confirmación del pedido
        return redirect()->route('confirmacion.index');
    }
}