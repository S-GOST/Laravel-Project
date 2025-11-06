<?php

namespace App\Http\Controllers;

use App\Models\administradoresModelo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdministradoresController extends Controller
{
    public function index(Request $request)
    {
        // Obtener todos los administradores con paginación
        $datos = administradoresModelo::paginate(10);

        // Enviar los datos a la vista
        return view('administradores')->with('datos', $datos);
    }

    public function store(Request $request)
    {
        // Validar campos
        $request->validate([
            'Nombre' => 'required|unique:administradores,Nombre',
            'Correo' => 'required|email',
            'Contrasena' => 'required',
            'Telefono' => 'required'
        ]);

        // Crear registro
        administradoresModelo::create($request->all());

        // Redirigir con mensaje
        return redirect()->route('administradores.index')->with('success', 'Administrador registrado correctamente');
    }
}
