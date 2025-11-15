<?php

namespace App\Http\Controllers;

use App\Models\InformeModelo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class  InformeController extends Controller
{
    // Buscar y Paginar
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = DB::table('informe');

        if($search){
            $query->where(function($q) use ($search){
                $q->where('ID_INFORME', 'LIKE', "%{$search}%")
                ->orwhere('Descripcion', 'LIKE', "%{$search}%")
                ->orwhere('Fecha','LIKE', "%{$search}");
            });
        }
        $datos = $query->paginate(10);
        return view("informe")->with("datos", $datos);
    }

    // Insertar Datos
    public function store(Request $request){
        $request->validate([
            'ID_INFORME' => 'required|unique:informe,ID_INFORME',
            'Descripcion' => 'required',
            'Fecha' => 'required',
            'Estado' => 'required',
        ],[
            'ID_INFORME.unique' => 'El informe con este documento ya existe en la plataforma.',
        ]);

        InformeModelo::create($request->all());
        return redirect()->route('informe.index')->with('success','informe Registrado en la Plataforma');
    }

    // Update - Versión SEGURA (sin Rule)
    public function update(Request $request, $documento)
    {
        $request->validate([
            'ID_INFORME' => 'required|unique:Informe,ID_INFORME,' . $documento . ',ID_INFORME',
            'Descripcion' => 'required',
            'Fecha' => 'required',
            'Estado' => 'required',
        ], [
            'ID_INFORME.unique' => 'El informe con este documento ya existe en la plataforma.',
        ]);

        $informe = InformeModelo::findOrFail($documento);
        $informe->update([
            'ID_INFORME' => $request->ID_INFORME,
            'Descripcion' => $request->Descripcion,
            'Fecha' => $request->Fecha,
            'Estado' => $request->Estado,
        ]);

        return redirect()->route('informe.index')->with('success', 'informe Actualizado en la Plataforma');
    }

    // Destroy
        public function destroy($id)
        {
            $informe = informeModelo::findOrFail($id);
            $informe->delete();

            return redirect()->route('informe.index')->with('success', 'informe eliminado correctamente');
        }
}