<?php

namespace App\Http\Controllers;

use App\Models\orden_servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class orden_servicioController extends Controller
{
    
        public function index(Request $request)
    {
        $search = $request->input('search');
        
        // Usar DB::table() para poder paginar
        $query = DB::table('orden_servicio');
        
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('ID_CLIENTES', 'LIKE', "%{$search}%")
                  ->orWhere('ID_MOTOS', 'LIKE', "%{$search}%")
                  ->orWhere('Fecha_inicio', 'LIKE', "%{$search}%");
            });
        }
        // Paginar los resultados (10 por página)
        $datos = $query->paginate(10);
        
        return view("orden_servicio")->with("datos", $datos);
    }

        //Insertar Datos
    public function store(Request $request){
        $request->validate([
            'ID_ORDEN_SERVICIO' => 'required|unique:orden_servicio,ID_ORDEN_SERVICIO',
            'ID_CLIENTES' => 'required',
            'ID_ADMINISTRADOR' => 'required',
            'ID_TECNICOS' => 'required',
            'ID_MOTOS' => 'required',
            'Fecha_inicio' => 'required|numeric',
            'Fecha_estimada' => 'required|numeric',
            'Fecha_fin' => 'required|numeric',
            'Estado' => 'required|',
        ],[
            'ID_ORDEN_SERVICIO.unique' => 'El cliente con este documento ya existe en la plataforma.',
        ]);

        orden_servicioModelo::create($request->all());
        return redirect()->route('orden_servicio.index')->with('success','Orden de servicio Registrada en la Plataforma');
    }
        //Udate
        public function update(Request $request, $or){
            $request->validate([
            'ID_ORDEN_SERVICIO' => 'required|unique:orden_servicio,ID_ORDEN_SERVICIO,'. $or . ',ID_ORDEN_SERVICIO',
            'ID_CLIENTES' => 'required',
            'ID_ADMINISTRADOR' => 'required',
            'ID_TECNICOS' => 'required',
            'ID_MOTOS' => 'required',
            'Fecha_inicio' => 'required|numeric',
            'Fecha_estimada' => 'required|numeric',
            'Fecha_fin' => 'required|numeric',
            'Estado' => 'required|',
        ],[
            'ID_ORDEN_SERVICIO.unique' => 'La orden de servicio con este ID ya existe en la plataforma.',
        ]);
        $orden_servicio = orden_servicioModelo::findOrFail($or);
        $orden_servicio->update([
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
           return redirect()->route('orden_servicio.index')->with('success','Orden de servicio Actualizada en la Plataforma');

    }


}