<?php

namespace App\Http\Controllers;

use App\Models\motosModelo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class motosController extends Controller
{
    // Buscar y Paginar
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = DB::table('motos');

        if($search){
            $query->where(function($q) use ($search){
                $q->where('ID_MOTOS', 'LIKE', "%{$search}%")
                ->orwhere('Placa', 'LIKE', "%{$search}%")
                ->orwhere('ID_CLIENTES','LIKE', "%{$search}");
            });
        }
        $datos = $query->paginate(10);
        return view("motos")->with("datos", $datos);
    }

    // Insertar Datos
    public function store(Request $request){
        $request->validate([
            'ID_MOTOS' => 'required|required',
            'ID_CLIENTES' => 'required',
            'Placa' => 'required|string',
            'Modelo' => 'required|numeric',
            'Marca' => 'required|string',
            'Recorrido' => 'required|numeric',
        ],[
            'ID_MOTOS.unique' => 'La moto con este id ya existe en la plataforma.',
        ]);

        motosModelo::create($request->all());
        return redirect()->route('motos.index')->with('success','Moto registrada en la Plataforma');
    }

    // Update - Versión SEGURA (sin Rule)
    public function update(Request $request, $idM)
    {
        $request->validate([
            'ID_MOTOS' => 'required|unique:motos,ID_MOTOS,' . $idM . ',ID_MOTOS',
            'ID_CLIENTES' => 'required',
            'Placa' => 'required',
            'Modelo' => 'required',
            'Marca' => 'required|required',
            'Recorrido' => 'required|numeric',
        ], [
            'ID_ORDEN_SERVICIO.unique' => 'La orden de servicio con este id ya existe en la plataforma.',
        ]);

        $idM = motosModelo::findOrFail($idM);
        $idM->update([
            'ID_MOTOS' => $request->ID_MOTOS,
            'ID_CLIENTES' => $request->ID_CLIENTES,
            'Placa' => $request->Placa,
            'Modelo' => $request->Modelo,
            'Marca' => $request->Marca,
            'Recorrido' => $request->Recorrido,
        ]);

        return redirect()->route('motos.index')->with('success', 'Moto Actualizada en la Plataforma');
    }

    // Destroy
        public function destroy($idM)
        {
            $idM = motosModelo::findOrFail($idM);
            $idM->delete();

            return redirect()->route('motos.index')->with('success', 'Moto eliminada correctamente');
        }
}