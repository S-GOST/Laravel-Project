<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\TecnicosModelo;

class TecnicoAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.tecnico-login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'usuario' => 'required|string',
            'contrasena' => 'required|string',
        ]);

        $tecnico = TecnicosModelo::where('usuario', $request->usuario)->first();

        if (!Hash::check($request->contrasena, $tecnico->contrasena)) {
            return back()->withErrors([
                'contrasena' => 'Contraseña incorrecta.',
            ])->withInput();
        }

        // Login
        Auth::guard('tecnico')->login($tecnico);

        return redirect()->route('tecnico.dashboard');
    }

    /**
     * Cerrar sesión del cliente
     */
    public function logout(Request $request)
    {
        Auth::guard('tecnico')->logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('tecnico.login');
    }
}
