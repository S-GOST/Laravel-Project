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
                ->orwhere('ID_ORDEN_SERVICIO', 'LIKE', "%{$search}%")
                ->orwhere('ID_COMPROBANTE', 'LIKE', "%{$search}%")
                ->orwhere('ID_INFORME', 'LIKE', "%{$search}%")
                ->orwhere('ID_TECNICOS', 'LIKE', "%{$search}%")
                ->orwhere('ID_CLIENTES', 'LIKE', "%{$search}%")
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
            'ID_ORDEN_SERVICIO' => 'required',
            'ID_COMPROBANTE' => 'required',
            'ID_INFORME' => 'required',
            'ID_TECNICOS' => 'required',
            'ID_CLIENTES' => 'required',
            'Descripcion' => 'required',
            'Fecha_registro' => 'required',
        ],[
            'ID_HISTORIAL.unique' => 'El historial con este documento ya existe en la plataforma.',
        ]);

        historialModelo::create($request->all());
        return redirect()->route('historial.index')->with('success','historial Registrado en la Plataforma');
    }

    // Update - Versión SEGURA (sin Rule)
    public function update(Request $request, $idH)
    {
        $request->validate([
            'ID_HISTORIAL' => 'required|unique:historial,ID_HISTORIAL,' . $idH . ',ID_HISTORIAL',
            'ID_ORDEN_SERVICIO' => 'required',
            'ID_COMPROBANTE' => 'required',
            'ID_INFORME' => 'required',
            'ID_TECNICOS' => 'required',
            'ID_CLIENTES' => 'required',
            'Descripcion' => 'required',
            'Fecha_registro' => 'required',
        ], [
            'ID_HISTORIAL.unique' => 'El historial ya existe en la plataforma.',
        ]);

        $historial = historialModelo::findOrFail($idH);
        $historial->update([
            'ID_HISTORIAL' => $request->ID_HISTORIAL,
            'ID_ORDEN_SERVICIO' => $request->ID_ORDEN_SERVICIO,
            'ID_COMPROBANTE' => $request->ID_COMPROBANTE,
            'ID_INFORME' => $request->ID_INFORME,
            'ID_TECNICOS' => $request->ID_TECNICOS,
            'ID_CLIENTES' => $request->ID_CLIENTES,
            'Descripcion' => $request->Descripcion,
            'Fecha_registro' => $request->Fecha_registro,
        ]);

        return redirect()->route('historial.index')->with('success', 'historial Actualizado en la Plataforma');
    }

    // Destroy
        public function destroy($idH)
        {
            $historial = historialModelo::findOrFail($idH);
            $historial->delete();

            return redirect()->route('historial.index')->with('success', 'historial eliminado correctamente');
        }
}