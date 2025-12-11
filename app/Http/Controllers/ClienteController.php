<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\clientesModelo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{

    /**
     * Mostrar formulario de login
     */

        public function login(Request $request)
        {
            $credentials = $request->validate([
                'usuario' => 'required|string',
                'contrasena' => 'required|string',
            ]);

            if (Auth::guard('cliente')->attempt([
                'usuario' => $credentials['usuario'],
                'password' => $credentials['contrasena'], // Laravel usa "password" como clave
            ])) {
                $request->session()->regenerate();
                return redirect()->route('cliente.panel');
            }

            return back()->withErrors([
                'usuario' => 'Usuario o contraseña incorrectos.',
            ]);
        }




    /**
     * Mostrar dashboard del cliente
     */
    public function dashboard(Request $request)
    {
        if (!Auth::guard('cliente')->check()) {
            return redirect()->route('cliente.login');
        }
        
        $cliente = Auth::guard('cliente')->user();
        
        $datosDashboard = [
            'ordenes_activas' => 3,
            'proxima_cita' => '15 de Mayo, 10:00 AM',
            'servicios_realizados' => 24,
            'valoracion' => 4.8,
        ];
        
        return view('clientes.dashboard', compact('cliente', 'datosDashboard'));
    }

        public function panel()
        {
            $cliente = Auth::guard('cliente')->user();
            return view('cliente.panel', compact('cliente'));
        }

    /**
     * Mostrar perfil del cliente
        */
        public function perfil(Request $request)
        {
            if (!Auth::guard('cliente')->check()) {
                return redirect()->route('cliente.login');
            }
            
            $cliente = Auth::guard('cliente')->user();
            
            return view('clientes.perfil', compact('cliente'));
        }
    
    /**
     * Actualizar perfil del cliente
     */
        public function actualizarPerfil(Request $request)
        {
            if (!Auth::guard('cliente')->check()) {
                return redirect()->route('cliente.login');
            }
            
            $cliente = Auth::guard('cliente')->user();
            
            $validated = $request->validate([
                'Nombre' => 'required|string|max:255',
                'Correo' => 'required|email|max:255|unique:clientes,Correo,' . $cliente->id,
                'Telefono' => 'nullable|string|max:20',
                'dni' => 'nullable|string|max:15',
            ]);
            
            $cliente->update($validated);
            
            return redirect()->route('cliente.perfil')
                ->with('success', 'Perfil actualizado correctamente');
        }
    
    /**
     * Mostrar formulario para nueva orden
     */
        public function nuevaOrden(Request $request)
        {
            if (!Auth::guard('cliente')->check()) {
                return redirect()->route('cliente.login');
            }
            
            $cliente = Auth::guard('cliente')->user();
            return view('clientes.orden.nueva', compact('cliente'));
        }
        
    /**
     * Mostrar estado de las órdenes
     */
        public function estadoOrden(Request $request)
        {
            if (!Auth::guard('cliente')->check()) {
                return redirect()->route('cliente.login');
            }
            
            $cliente = Auth::guard('cliente')->user();
            return view('clientes.orden.estado', compact('cliente'));
        }
    
    /**
     * Mostrar informes y avances - CORREGIDO
     */
        public function informes(Request $request)
        {
            if (!Auth::guard('cliente')->check()) {
                return redirect()->route('cliente.login');
            }
            
            $cliente = Auth::guard('cliente')->user();
            return view('clientes.informes', compact('cliente'));
        }
        
        public function verInforme($id)
        {
            if (!Auth::guard('cliente')->check()) {
                return redirect()->route('cliente.login');
            }
            
            $cliente = Auth::guard('cliente')->user();
            // En producción, aquí buscarías el informe específico por ID
            return view('clientes.informe.detalle', compact('cliente'));
        }

    /**
     * Mostrar historial de servicios
     */
        public function historial(Request $request)
        {
            if (!Auth::guard('cliente')->check()) {
                return redirect()->route('cliente.login');
            }
            
            $cliente = Auth::guard('cliente')->user();
            return view('clientes.historial', compact('cliente'));
        }
    
    /**
     * Mostrar gestión de citas
     */
        public function citas(Request $request)
        {
            if (!Auth::guard('cliente')->check()) {
                return redirect()->route('cliente.login');
            }
            
            $cliente = Auth::guard('cliente')->user();
            return view('clientes.citas', compact('cliente'));
        }
        
        /**
         * Mostrar productos del cliente
         */
        public function productos(Request $request)
        {
            if (!Auth::guard('cliente')->check()) {
                return redirect()->route('cliente.login');
            }
            
            $cliente = Auth::guard('cliente')->user();
            return view('clientes.productos', compact('cliente'));
        }
    
    /**
     * Mostrar servicios del cliente - CORREGIDO
     */
    public function servicios(Request $request)
    {
        if (!Auth::guard('cliente')->check()) {
            return redirect()->route('cliente.login');
        }
        
        $cliente = Auth::guard('cliente')->user();
        return view('clientes.servicios', compact('cliente'));
    }
        
    /**
     * Procesar login
     */
    public function loginPost(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        if (Auth::guard('cliente')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('cliente.dashboard');
        }
        
        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }
    
    /**
     * Cerrar sesión del cliente
     */

}