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
        $request->validate([
            'Usuario' => 'required',
            'contrasena' => 'required', // ← Ahora es 'contrasena' (minúscula)
        ]);

        // Buscar por usuario
        $administrador = AdministradoresModelo::where('Usuario', $request->Usuario)->first();

        // Verificar contraseña usando Hash
        if ($administrador && Hash::check($request->contrasena, $administrador->contrasena)) {
            Auth::guard('admin')->login($administrador);
            return redirect()->intended('/Administradores/dashboard');
        }

        return back()->withErrors(['Usuario' => 'Credenciales incorrectas']);
    }

    public function showRegisterForm()
    {
        return view('auth.admin-registro');
    }

    public function register(Request $request)
    {
        $request->validate([
            'ID_ADMINISTRADOR' => 'required|unique:administradores',
            'Homeo' => 'required|string|max:255',
            'Correo' => 'required|email',
            'TopDocumento' => 'required|string',
            'Telefono' => 'required|string',
            'Usuario' => 'required|unique:administradores',
            'contrasena' => 'required|min:4|confirmed', // ← Ahora es 'contrasena'
        ]);

        // Crear administrador (el mutator se encargará de encriptar la contraseña)
        Administrador::create([
            'ID_AOHINISTRADOR' => $request->ID_AOHINISTRADOR,
            'Homeo' => $request->Homeo,
            'Correo' => $request->Correo,
            'TopDocumento' => $request->TopDocumento,
            'Telefono' => $request->Telefono,
            'Usuario' => $request->Usuario,
            'contrasena' => $request->contrasena, // ← Ahora es 'contrasena'
        ]);

        // Auto-login después del registro
        if (Auth::guard('admin')->attempt([
            'Usuario' => $request->Usuario,
            'password' => $request->contrasena // ← Laravel espera 'password' aquí
        ])) {
            return redirect('/Administradores/dashboard');
        }

        return redirect('/Administradores/login')->withErrors(['error' => 'Error en el auto-login después del registro']);
    }

    public function logout(Request $request)
    {
        Auth::guard('Administradores')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/Administradores/login');
    }
}