<?php

namespace App\Http\Controllers;

use App\Models\HistorialModelo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistorialController extends Controller
{
    // Buscar y Paginar
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = DB::table('historial');

        if($search){
            $query->where(function($q) use ($search){
                $q->where('ID_HISTORIAL', 'LIKE', "%{$search}%")
                ->orwhere('Descripcion', 'LIKE', "%{$search}%")
                ->orwhere('Fecha_registro','LIKE', "%{$search}");
            });
        }
        $datos = $query->paginate(10);
        return view("historial")->with("datos", $datos);
    }

    // Insertar Datos
    public function store(Request $request){
        $request->validate([
            'ID_HISTORIAL' => 'required|unique:historial,ID_HISTORIAL',
            'Descripcion' => 'required',
            'fecha_registro' => 'required',
        ],[
            'ID_HISTORIAL.unique' => 'El historial con este documento ya existe en la plataforma.',
        ]);

        historiaModelo::create($request->all());
        return redirect()->route('historial.index')->with('success','historial Registrado en la Plataforma');
    }

    // Update - Versión SEGURA (sin Rule)
    public function update(Request $request, $documento)
    {
        $request->validate([
            'ID_HISTORIAL' => 'required|unique:historial,ID_HISTORIAL,' . $documento . ',ID_HISTORIAL',
            'Descripcion' => 'required',
            'Fecha_registro' => 'required',
        ], [
            'ID_HISTORIAL.unique' => 'El historial ya existe en la plataforma.',
        ]);

        $historial = historialModelo::findOrFail($documento);
        $historial->update([
            'ID_HISTORIAL' => $request->ID_HISTORIAL,
            'Descripcion' => $request->Descripcion,
            'Fecha_registro' => $request->Fecha_registro,
        ]);

        return redirect()->route('historial.index')->with('success', 'historial Actualizado en la Plataforma');
    }

    // Destroy
        public function destroy($id)
        {
            $historial = historialModelo::findOrFail($id);
            $historial->delete();

            return redirect()->route('historial.index')->with('success', 'historial eliminado correctamente');
        }
}