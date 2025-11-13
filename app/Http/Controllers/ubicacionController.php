<?php

namespace App\Http\Controllers;

use App\Models\ubicacionModelo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ubicacionController extends Controller
{
    // Buscar y Paginar
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = DB::table('ubicacion');

        if($search){
            $query->where(function($q) use ($search){
                $q->where('ID_UBICACION', 'LIKE', "%{$search}%")
                ->orwhere('Direccion', 'LIKE', "%{$search}%")
                ->orwhere('Ciudad','LIKE', "%{$search}");
            });
        }
        $datos = $query->paginate(10);
        return view("ubicacion")->with("datos", $datos);
    }

    // Insertar Datos
    public function store(Request $request){
        $request->validate([
            'ID_UBICACION' => 'required|required',
            'Departamento' => 'required|string',
            'Ciudad' => 'required|numeric',
            'Direccion' => 'required|string',
        ],[
            'ID_UBICACION.unique' => 'La ubicacion con este id ya existe en la plataforma.',
        ]);

        ubicacionModelo::create($request->all());
        return redirect()->route('ubicacion.index')->with('success','ubicacion registrada en la Plataforma');
    }

    // Update - Versión SEGURA (sin Rule)
    public function update(Request $request, $idU)
    {
        $request->validate([
            'ID_UBICACION' => 'required|unique:ubicacion,ID_UBICACION,' . $idU . ',ID_UBICACION',
            'Departamento' => 'required',
            'Ciudad' => 'required',
            'Direccion' => 'required|required',
        ], [
            'ID_UBICACION.unique' => 'La ubicacion con este id ya existe en la plataforma.',
        ]);

        $idU = ubicacionModelo::findOrFail($idU);
        $idU->update([
            'ID_UBICACION' => $request->ID_UBICACION,
            'Departamento' => $request->Departamento,
            'Ciudad' => $request->Ciudad,
            'Direccion' => $request->Direccion,
        ]);

        return redirect()->route('ubicacion.index')->with('success', 'ubicacion Actualizada en la Plataforma');
    }

    // Destroy
        public function destroy($idU)
        {
            $idU = ubicacionModelo::findOrFail($idU);
            $idU->delete();

            return redirect()->route('ubicacion.index')->with('success', 'ubicacion eliminada correctamente');
        }
}
