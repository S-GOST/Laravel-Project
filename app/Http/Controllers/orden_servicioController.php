<?php

namespace App\Http\Controllers;

use App\Models\orden_servicioModelo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class orden_servicioController extends Controller
{
    // Buscar y Paginar
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = DB::table('orden_servicio');

        if($search){
            $query->where(function($q) use ($search){
                $q->where('ID_ORDEN_SERVICIO', 'LIKE', "%{$search}%")
                ->orwhere('Fecha_inicio', 'LIKE', "%{$search}%")
                ->orwhere('ID_ORDEN_SERVICIO','LIKE', "%{$search}");
            });
        }
        $datos = $query->paginate(10);
        return view("orden_servicio.orden_servicio")->with("datos", $datos);
    }

    // Insertar Datos
    public function store(Request $request){
        $request->validate([
            'ID_ORDEN_SERVICIO' => 'required|unique:orden_servicio,ID_ORDEN_SERVICIO',
            'ID_CLIENTES' => 'required',
            'ID_ADMINISTRADOR' => 'required',
            'ID_TECNICOS' => 'required',
            'ID_MOTOS' => 'required|required',
            'Fecha_inicio' => 'required|date',
            'Fecha_estimada' => 'required|date',
            'Fecha_fin' => 'required|date',
        ],[
            'ID_ORDEN_SERVICIO.unique' => 'La orden de servico con este id ya existe en la plataforma.',
        ]);

        orden_servicioModelo::create($request->all());
        return redirect()->route('orden_servicio.index')->with('success','Orden de servicio registrada en la Plataforma');
    }

    // Update - Versión SEGURA (sin Rule)
    public function update(Request $request, $idO)
    {
        $request->validate([
            'ID_ORDEN_SERVICIO' => 'required|unique:orden_servicio,ID_ORDEN_SERVICIO,' . $idO . ',ID_ORDEN_SERVICIO',
            'ID_CLIENTES' => 'required',
            'ID_ADMINISTRADOR' => 'required',
            'ID_TECNICOS' => 'required',
            'ID_MOTOS' => 'required|required',
            'Fecha_inicio' => 'required|date',
            'Fecha_estimada' => 'required|date',
            'Fecha_fin' => 'required|date',
        ], [
            'ID_ORDEN_SERVICIO.unique' => 'La orden de servicio con este id ya existe en la plataforma.',
        ]);

        $idO = orden_servicioModelo::findOrFail($idO);
        $idO->update([
            'ID_ORDEN_SERVICIO' => $request->ID_ORDEN_SERVICIO,
            'ID_CLIENTES' => $request->ID_CLIENTES,
            'ID_ADMINISTRADOR' => $request->ID_ADMINISTRADOR,
            'ID_TECNICOS' => $request->ID_TECNICOS,
            'ID_MOTOS' => $request->ID_MOTOS,
            'Fecha_inicio' => $request->Fecha_inicio,
            'Fecha_estimada' => $request->Fecha_estimada,
            'Fecha_fin' => $request->Fecha_fin,
            'Estado' => $request->Estado,
        ]);

        return redirect()->route('orden_servicio.index')->with('success', 'Orden servicio Actualizada en la Plataforma');
    }

    // Destroy
        public function destroy($idO)
        {
            $idO = orden_servicioModelo::findOrFail($idO);
            $idO->delete();

            return redirect()->route('orden_servicio.index')->with('success', 'Orden servicio eliminada correctamente');
        }
}