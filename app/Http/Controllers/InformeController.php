<?php

namespace App\Http\Controllers;

use App\Models\informeModelo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class  informeController extends Controller
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
        return view("Informe.informe")->with("datos", $datos);
    }

    // Insertar Datos
    public function store(Request $request){
        $request->validate([
            'ID_INFORME' => 'required|unique:informe,ID_INFORME',
            'ID_DETALLES_ORDEN_SERVICIO' => 'required',
            'ID_ADMINISTRADOR' => 'required',
            'ID_TECNICOS' => 'required',
            'Descripcion' => 'required',
            'Fecha' => 'required',
            'Estado' => 'required',
        ],[
            'ID_INFORME.unique' => 'El informe con este documento ya existe en la plataforma.',
        ]);

        informeModelo::create($request->all());
        return redirect()->route('informe.index')->with('success','informe Registrado en la Plataforma');
    }

    // Update - Versión SEGURA (sin Rule)
    public function update(Request $request, $id)
    {
        $request->validate([
            'ID_INFORME' => 'required|unique:Informe,ID_INFORME,' . $id . ',ID_INFORME',
            'ID_DETALLES_ORDEN_SERVICIO' => 'required',
            'ID_ADMINISTRADOR' => 'required',
            'ID_TECNICOS' => 'required',
            'Descripcion' => 'required',
            'Fecha' => 'required',
            'Estado' => 'required',
        ], [
            'ID_INFORME.unique' => 'El informe con este documento ya existe en la plataforma.',
        ]);

        $informe = informeModelo::findOrFail($id);
        $informe->update([
            'ID_INFORME' => $request->ID_INFORME,
            'ID_DETALLES_ORDEN_SERVICIO' => $request->ID_DETALLES_ORDEN_SERVICIO,
            'ID_ADMINISTRADOR' => $request->ID_ADMINISTRADOR,
            'ID_TECNICOS' => $request->ID_TECNICOS,
            'Descripcion' => $request->Descripcion,
            'Fecha' => $request->Fecha,
            'Estado' => $request->Estado,
        ]);

        return redirect()->route('informe.index')->with('success', 'informe Actualizado en la Plataforma');
    }

    // Destroy
        public function destroy($idI)
        {
            $informe = informeModelo::findOrFail($idI);
            $informe->delete();

            return redirect()->route('informe.index')->with('success', 'informe eliminado correctamente');
        }
}