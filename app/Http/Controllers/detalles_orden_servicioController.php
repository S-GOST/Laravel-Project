<?php

namespace App\Http\Controllers;

use App\Models\detalles_orden_servicioModelo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class detalles_orden_servicioController extends Controller
{
    // Buscar y Paginar
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = DB::table('detalles_orden_servicio');

        if($search){
            $query->where(function($q) use ($search){
                $q->where('ID_DETALLES_ORDEN_SERVICIO', 'LIKE', "%{$search}%")
                ->orwhere('ID_ORDEN_SERVICIO', 'LIKE', "%{$search}%")
                ->orwhere('Precio','LIKE', "%{$search}");
            });
        }
        $datos = $query->paginate(10);
        return view("detalles_orden_servicio")->with("datos", $datos);
    }

    // Insertar Datos
    public function store(Request $request){
        $request->validate([
            'ID_DETALLES_ORDEN_SERVICIO' => 'required|unique:detalles_orden_servicio,ID_DETALLES_ORDEN_SERVICIO',
            'ID_ORDEN_SERVICIO' => 'required|string',
            'ID_SERVICIOS' => 'required|string',
            'ID_PRODUCTOS' => 'required|string',
            'Garantia' => 'required|string',
            'Estado' => 'required|string',
            'Precio' => 'required|string',
        ],[
            'ID_DETALLES_ORDEN_SERVICIO.unique' => 'Los detalles de la orden con este id ya existe en la plataforma.',
        ]);

        detalles_orden_servicioModelo::create($request->all());
        return redirect()->route('detalles_orden_servicio.index')->with('success','detalles de orden registrados en la Plataforma Correctamente');
    }

    // Update - Versión SEGURA (sin Rule)
    public function update(Request $request, $idDOS)
    {
        $request->validate([
            'ID_DETALLES_ORDEN_SERVICIO' => 'required|unique:detalles_orden_servicio,ID_DETALLES_ORDEN_SERVICIO,' . $idDOS . ',ID_DETALLES_ORDEN_SERVICIO',
            'ID_ORDEN_SERVICIO' => 'required|string',
            'ID_SERVICIOS' => 'required|string',
            'ID_PRODUCTOS' => 'required|string',
            'Garantia' => 'required|string',
            'Estado' => 'required|string',
            'Precio' => 'required|string',
        ], [
            'ID_DETALLES_ORDEN_SERVICIO.unique' => 'Los detalles de la orden de servicio con este id ya existe en la plataforma.',
        ]);

        $idDOS = detalles_orden_servicioModelo::findOrFail($idDOS);
        $idDOS->update([
            'ID_DETALLES_ORDEN_SERVICIO' => $request->ID_DETALLES_ORDEN_SERVICIO,
            'ID_ORDEN_SERVICIO' => $request->ID_ORDEN_SERVICIO,
            'ID_SERVICIOS' => $request->ID_SERVICIOS,
            'ID_PRODUCTOS' => $request->ID_PRODUCTOS,
            'Garantia' => $request->Garantia,
            'Estado' => $request->Estado,
            'Precio' => $request->Precio,
        ]);

        return redirect()->route('detalles_orden_servicio.index')->with('success', 'Detalles orden servicio Actualizada en la Plataforma');
    }

    // Destroy
        public function destroy($idDOS)
        {
            $idDOS = detalles_orden_servicioModelo::findOrFail($idDOS);
            $idDOS->delete();

            return redirect()->route('detalles_orden_servicio.index')->with('success', 'Detalles orden de servicio eliminada correctamente');
        }
}