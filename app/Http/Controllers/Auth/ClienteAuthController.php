<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\clientesModelo;

class ClienteAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.cliente-login');
    }

            public function showRegistroForm()
    {
        return view('auth.cliente-registro');
    }

        public function showPasswordRequestForm()
    {
        return view('Clientes.recuperar-contrasena'); // o la vista que tengas
    }


    public function login(Request $request)
    {
        // Validación
        $request->validate([
            'usuario' => 'required|string',
            'contrasena' => 'required|string',
        ]);

        // Buscar al cliente por usuario
        $cliente = clientesModelo::where('usuario', $request->usuario)->first();

        // Verificar si existe
        if (!$cliente) {
            return back()->withErrors([
                'usuario' => 'El usuario no existe.',
            ])->withInput();
        }

        // Validar contraseña hasheada
        if (!Hash::check($request->contrasena, $cliente->contrasena)) {
            return back()->withErrors([
                'contrasena' => 'Contraseña incorrecta.',
            ])->withInput();
        }

        // Iniciar sesión usando el guard de clientes
        Auth::guard('cliente')->login($cliente);

        return redirect()->route('cliente.dashboard');
    }
     // Cerrar sesión usando el guard de clientes
    public function logout()
    {
        Auth::guard('cliente')->logout();
        return redirect()->route('cliente.login');
    }
}
