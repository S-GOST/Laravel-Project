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
}