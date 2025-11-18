<?php

namespace App\Http\Controllers;

use App\Models\serviciosModelo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class serviciosController extends Controller
{
    // Buscar y Paginar
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = DB::table('servicios');

        if($search){
            $query->where(function($q) use ($search){
                $q->where('ID_SERVICIOS', 'LIKE', "%{$search}%")
                ->orwhere('Nombre', 'LIKE', "%{$search}%")
                ->orwhere('Categoria','LIKE', "%{$search}");
            });
        }
        $datos = $query->paginate(10);
        return view("servicios")->with("datos", $datos);
    }

    // Insertar Datos
    public function store(Request $request){
        $request->validate([
            'ID_SERVICIOS' => 'required|unique:servicios,ID_SERVICIOS',
            'Nombre' => 'required',
            'Categoria' => 'required|string',
            'Garantia' => 'required|numeric',
            'Estado' => 'required|string',
            'Precio' => 'required|numeric',
        ],[
            'ID_SERVICIOS.unique' => 'El servicio con este id ya existe en la plataforma.',
        ]);

        serviciosModelo::create($request->all());
        return redirect()->route('servicios.index')->with('success','Servicio registrado en la Plataforma');
    }

    // Update - Versión SEGURA (sin Rule)
    public function update(Request $request, $idS)
    {
        $request->validate([
            'ID_SERVICIOS' => 'required|unique:servicios,ID_SERVICIOS,' . $idS . ',ID_SERVICIOS',
            'Nombre' => 'required',
            'Categoria' => 'required',
            'Garantia' => 'required',
            'Estado' => 'required|required',
            'Precio' => 'required|numeric',
        ], [
            'ID_SERVICIOS.unique' => 'El servicio con este id ya existe en la plataforma.',
        ]);

        $servicio = serviciosModelo::findOrFail($idS);
        $servicio->update([
            'ID_SERVICIOS' => $request->ID_SERVICIOS,
            'Nombre' => $request->Nombre,
            'Categoria' => $request->Categoria,
            'Garantia' => $request->Garantia,
            'Estado' => $request->Estado,
            'Precio' => $request->Precio,
        ]);

        return redirect()->route('servicios.index')->with('success', 'Servicio Actualizado en la Plataforma');
    }

    // Destroy
        public function destroy($idS)
        {
            $servicio = serviciosModelo::findOrFail($idS);
            $servicio->delete();

            return redirect()->route('servicios.index')->with('success', 'Moto eliminada correctamente');
        }
}