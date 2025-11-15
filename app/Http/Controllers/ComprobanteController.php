<?php

namespace App\Http\Controllers;

use App\Models\ComprobanteModelo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComprobanteController extends Controller
{
    // Buscar y Paginar
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = DB::table('comprobante');

        if($search){
            $query->where(function($q) use ($search){
                $q->where('ID_COMPROBANTE', 'LIKE', "%{$search}%")
                ->orwhere('Monto', 'LIKE', "%{$search}%")
                ->orwhere('Fecha','LIKE', "%{$search}");
            });
        }
        $datos = $query->paginate(10);
        return view("comprobante")->with("datos", $datos);
    }

    // Insertar Datos
    public function store(Request $request){
        $request->validate([
            'ID_COMPROBANTE' => 'required|unique:comprobante,ID_COMPROBANTE',
            'Monto' => 'required',
            'Fecha' => 'required',
            'Estado_pago' => 'required',
        ],[
            'ID_COMPROBANTE.unique' => 'El comprobante con este documento ya existe en la plataforma.',
        ]);

        ComprobanteModelo::create($request->all());
        return redirect()->route('comprobante.index')->with('success','Conprobante Registrado en la Plataforma');
    }

    // Update - Versión SEGURA (sin Rule)
    public function update(Request $request, $documento)
    {
        $request->validate([
            'ID_COMPROBANTE' => 'required|unique:comprobante,ID_COMPROBANTE,' . $documento . ',ID_COMPROBANTE',
            'Monto' => 'required',
            'Fecha' => 'required',
            'Estado_pago' => 'required',
        ], [
            'ID_COMPROBANTE.unique' => 'El comprobante con este documento ya existe en la plataforma.',
        ]);

        $comprobante = comprobanteModelo::findOrFail($documento);
        $comprobante->update([
            'ID_COMPROBANTE' => $request->ID_COMPROBANTE,
            'Monto' => $request->Monto,
            'Fecha' => $request->Fecha,
            'Estado_pago' => $request->Estado_pago,
        ]);

        return redirect()->route('comprobante.index')->with('success', 'Comprobante Actualizado en la Plataforma');
    }

    // Destroy
        public function destroy($id)
        {
            $comprobante = comprobanteModelo::findOrFail($id);
            $comprobante->delete();

            return redirect()->route('comprobante.index')->with('success', 'comprobante eliminado correctamente');
        }
}