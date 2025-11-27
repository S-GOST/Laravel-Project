<?php

namespace App\Http\Controllers;

use App\Models\comprobanteModelo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class comprobanteController extends Controller
{
    // Buscar y Paginar
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = DB::table('comprobante');

        if($search){
            $query->where(function($q) use ($search){
                $q->where('ID_COMPROBANTE', 'LIKE', "%{$search}%")
                ->orwhere('ID_INFORME', 'LIKE', "%{$search}%")
                ->orwhere('ID_CLIENTES','LIKE', "%{$search}");
            });
        }
        $datos = $query->paginate(10);
        return view("comprobante.comprobante")->with("datos", $datos);
    }

    // Insertar Datos
    public function store(Request $request){
        $request->validate([
            'ID_COMPROBANTE' => 'required|unique:comprobante,ID_COMPROBANTE',
            'ID_INFORME' => 'required',
            'ID_CLIENTES' => 'required',
            'ID_ADMINISTRADOR' => 'required',
            'Monto' => 'required',
            'Fecha' => 'required',
            'Estado_pago' => 'required',
        ],[
            'ID_COMPROBANTE.unique' => 'El comprobante con este documento ya existe en la plataforma.',
        ]);

        comprobanteModelo::create($request->all());
        return redirect()->route('comprobante.index')->with('success','Comprobante Registrado en la Plataforma');
    }

    // Update - Versión SEGURA (sin Rule)
    public function update(Request $request, $idC)
    {
        $request->validate([
            'ID_COMPROBANTE' => 'required|unique:comprobante,ID_COMPROBANTE,' . $idC . ',ID_COMPROBANTE',
            'ID_INFORME' => 'required',
            'ID_CLIENTES' => 'required',
            'ID_ADMINISTRADOR' => 'required',
            'Monto' => 'required',
            'Fecha' => 'required',
            'Estado_pago' => 'required',
        ], [
            'ID_COMPROBANTE.unique' => 'El comprobante con este documento ya existe en la plataforma.',
        ]);

        $comprobantes = comprobanteModelo::findOrFail($idC);
        $comprobantes->update([
            'ID_COMPROBANTE' => $request->ID_COMPROBANTE,
            'ID_INFORME' => $request->ID_INFORME,
            'ID_CLIENTES' => $request->ID_CLIENTES,
            'ID_ADMINISTRADOR' => $request->ID_ADMINISTRADOR,
            'Monto' => $request->Monto,
            'Fecha' => $request->Fecha,
            'Estado_pago' => $request->Estado_pago,
        ]);

        return redirect()->route('comprobante.index')->with('success', 'Comprobante Actualizado en la Plataforma');
    }

    // Destroy
        public function destroy($idC)
        {
            $comprobantes = comprobanteModelo::findOrFail($idC);
            $comprobantes->delete();

            return redirect()->route('comprobante.index')->with('success', 'comprobante eliminado correctamente');
        }
}