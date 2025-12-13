<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\AdministradoresModelo;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.admin-login');
    }
        public function showRegisterForm()
    {
        return view('auth.admin-registro');
    }

    public function login(Request $request)
    {
        // Validar entradas
        $request->validate([
            'usuario' => 'required|string',
            'contrasena' => 'required|string',
        ]);

        // Buscar admin por usuario
        $admin = AdministradoresModelo::where('usuario', $request->usuario)->first();

        if (!$admin) {
            return back()->withErrors([
                'usuario' => 'Usuario incorrecto.',
            ])->withInput();
        }

        // Verificar contraseña
        if (!Hash::check($request->contrasena, $admin->contrasena)) {
            return back()->withErrors([
                'contrasena' => 'Contraseña incorrecta.',
            ])->withInput();
        }

        // Login
        Auth::guard('admin')->login($admin);

        return redirect()->route('panel');
    }
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('admin.login');
    }

        

}
