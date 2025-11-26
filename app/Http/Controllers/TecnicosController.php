<?php

namespace App\Http\Controllers;

use App\Models\tecnicosModelo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class tecnicosController extends Controller
{
    // Buscar y Paginar
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = DB::table('tecnicos');

        if($search){
            $query->where(function($q) use ($search){
                $q->where('ID_TECNICOS', 'LIKE', "%{$search}%")
                ->orwhere('Nombre', 'LIKE', "%{$search}%")
                ->orwhere('TipoDocumento','LIKE', "%{$search}");
            });
        }
        $datos = $query->paginate(10);
        return view("Tecnicos.tecnicos")->with("datos", $datos);
    }

    // Insertar Datos
    public function store(Request $request){
        $request->validate([
            'ID_TECNICOS' => 'required|unique:tecnicos,ID_TECNICOS',
            'Nombre' => 'required',
            'TipoDocumento' => 'required',
            'Correo' => 'required',
            'Telefono' => 'required|numeric',
        ],[
            'ID_TECNICOS.unique' => 'El tecnico con este documento ya existe en la plataforma.',
        ]);

        tecnicosModelo::create($request->all());
        return redirect()->route('tecnicos.index')->with('success','Tecnico Registrado en la Plataforma');
    }

    // Update - Versión SEGURA (sin Rule)
    public function update(Request $request, $idT)
    {
        $request->validate([
            'ID_TECNICOS' => 'required|unique:tecnicos,ID_TECNICOS,' . $idT . ',ID_TECNICOS',
            'Nombre' => 'required',
            'TipoDocumento' => 'required',
            'Correo' => 'required',
            'Telefono' => 'required|numeric',
        ], [
            'ID_TECNICOS.unique' => 'El tecnico con este documento ya existe en la plataforma.',
        ]);

        $tecnico = tecnicosModelo::findOrFail($idT);
        $tecnico->update([
            'ID_TECNICOS' => $request->ID_TECNICOS,
            'Nombre' => $request->Nombre,
            'TipoDocumento' => $request->TipoDocumento,
            'Correo' => $request->Correo,
            'Telefono' => $request->Telefono,
        ]);

        return redirect()->route('tecnicos.index')->with('success', 'Tecnico Actualizado en la Plataforma');
    }

    // Destroy
        public function destroy($idT)
        {
            $tecnico = tecnicosModelo::findOrFail($idT);
            $tecnico->delete();

            return redirect()->route('tecnicos.index')->with('success', 'Tecnico eliminado correctamente');
        }
}