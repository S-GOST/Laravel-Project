<?php

namespace App\Http\Controllers;

use App\Models\tecnicosModelo;
use Illuminate\Http\Request;

class TecnicosController extends Controller
{
    /* =============================
       LISTAR + BUSCAR + PAGINAR
    ==============================*/
    public function index(Request $request)
    {
        $search = $request->search;

        $datos = tecnicosModelo::when($search, function ($query) use ($search) {
            $query->where('Nombre', 'like', "%$search%")
                  ->orWhere('ID_TECNICOS', 'like', "%$search%")
                  ->orWhere('Correo', 'like', "%$search%")
                  ->orWhere('Telefono', 'like', "%$search%")
                  ->orWhere('TipoDocumento', 'like', "%$search%");
        })
        ->orderBy('ID_TECNICOS', 'desc')
        ->paginate(10);

        // Asegúrate de que esta vista exista o cámbiala por la correcta
        return view('Administradores.Tecnicos.tecnicos', compact('datos'));
    }

    /* =============================
       CREAR TÉCNICO
    ==============================*/
    public function store(Request $request)
    {
        $request->validate([
            'ID_TECNICOS'   => 'required|unique:tecnicos,ID_TECNICOS',
            'Nombre'        => 'required|string|max:255',
            'TipoDocumento' => 'required|string|max:50',
            'Correo'        => 'required|email|unique:tecnicos,Correo',
            'Telefono'      => 'required|string|max:20',
        ]);

        tecnicosModelo::create($request->all());

        // Redirige a la ruta nombrada correcta
        return redirect()->route('admin.tecnicos.index')
            ->with('success', 'Técnico registrado correctamente');
    }

    /* =============================
       ACTUALIZAR TÉCNICO
    ==============================*/
    public function update(Request $request, $idT)
    {
        $request->validate([
            'Nombre'        => 'required|string|max:255',
            'TipoDocumento' => 'required|string|max:50',
            'Correo'        => 'required|email|unique:tecnicos,Correo,' . $idT . ',ID_TECNICOS',
            'Telefono'      => 'required|string|max:20',
        ]);

        $tecnico = tecnicosModelo::findOrFail($idT);
        $tecnico->update($request->all());

        // Redirige a la ruta nombrada correcta
        return redirect()->route('admin.tecnicos.index')
            ->with('success', 'Técnico actualizado correctamente');
    }

    /* =============================
       ELIMINAR TÉCNICO
    ==============================*/
    public function destroy($idT)
    {
        tecnicosModelo::findOrFail($idT)->delete();

        // Redirige a la ruta nombrada correcta
        return redirect()->route('admin.tecnicos.index')
            ->with('success', 'Técnico eliminado correctamente');
    }
}