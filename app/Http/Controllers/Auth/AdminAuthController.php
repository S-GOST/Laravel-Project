<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\AdministradoresModelo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        // Validar entrada - usar nombres exactos del formulario
        $request->validate([
            'Usuario' => 'required|string',
            'contrasena' => 'required|string',
        ]);

        // Depuración (opcional, quitar en producción)
        \Log::info('Intento de login', [
            'usuario' => $request->Usuario,
            'ip' => $request->ip()
        ]);

        // Buscar al administrador por el usuario
        $admin = AdministradoresModelo::where('Usuario', $request->Usuario)->first();

        if (!$admin) {
            \Log::warning('Usuario no encontrado: ' . $request->Usuario);
            return back()->withErrors([
                'Usuario' => 'Credenciales incorrectas.',
            ])->withInput($request->only('Usuario'));
        }

        // Verificar contraseña - asegurar que usamos el campo correcto
        // Primero, verificar si la contraseña está hasheada
        if (Hash::check($request->contrasena, $admin->Contrasena)) {
            Auth::guard('admin')->login($admin, $request->filled('remember'));
            
            \Log::info('Login exitoso para: ' . $admin->Usuario);
            
            return redirect()->intended('/admin/dashboard');
        }

        \Log::warning('Contraseña incorrecta para usuario: ' . $request->Usuario);
        
        return back()->withErrors([
            'Usuario' => 'Credenciales incorrectas.',
        ])->withInput($request->only('Usuario'));
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}