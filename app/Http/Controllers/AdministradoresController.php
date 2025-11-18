<?php

namespace App\Http\Controllers;

use App\Models\administradoresModelo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class administradoresController extends Controller
{
    // Buscar y Paginar
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = DB::table('administradores');

        if($search){
            $query->where(function($q) use ($search){
                $q->where('ID_ADMINISTRADOR', 'LIKE', "%{$search}%")
                ->orwhere('Nombre', 'LIKE', "%{$search}%")
                ->orwhere('TipoDocumento','LIKE', "%{$search}");
            });
        }
        $datos = $query->paginate(10);
        return view("administradores")->with("datos", $datos);
    }

    // Insertar Datos
    public function store(Request $request){
        $request->validate([
            'ID_ADMINISTRADOR' => 'required|unique:administradores,ID_ADMINISTRADOR',
            'Nombre' => 'required',
            'Correo' => 'required',
            'TipoDocumento' => 'required',
            'Telefono' => 'required|numeric',
        ],[
            'ID_ADMINISTRADOR.unique' => 'El administrador con este documento ya existe en la plataforma.',
        ]);

        administradoresModelo::create($request->all());
        return redirect()->route('administradores.index')->with('success','Administrador Registrado en la Plataforma');
    }

    // Update - Versión SEGURA (sin Rule)
    public function update(Request $request, $idA)
    {
        $request->validate([
            'ID_ADMINISTRADOR' => 'required|unique:administradores,ID_ADMINISTRADOR,' . $idA . ',ID_ADMINISTRADOR',
            'Nombre' => 'required',
            'Correo' => 'required',
            'TipoDocumento' => 'required',
            'Telefono' => 'required|numeric',
        ], [
            'ID_ADMINISTRADOR.unique' => 'El administrador con este documento ya existe en la plataforma.',
        ]);

        $administrador = administradoresModelo::findOrFail($idA);
        $administrador->update([
            'ID_ADMINISTRADOR' => $request->ID_ADMINISTRADOR,
            'Nombre' => $request->Nombre,
            'Correo' => $request->Correo,
            'TipoDocumento' => $request->TipoDocumento,
            'Telefono' => $request->Telefono,
        ]);

        return redirect()->route('administradores.index')->with('success', 'Adminisstrador Actualizado en la Plataforma');
    }

    // Destroy
        public function destroy($idA)
        {
            $administrador = administradoresModelo::findOrFail($idA);
            $administrador->delete();

            return redirect()->route('administradores.index')->with('success', 'Administrador eliminado correctamente');
        }
}