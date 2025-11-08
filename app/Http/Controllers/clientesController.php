<?php

namespace App\Http\Controllers;

use App\Models\clientesModelo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class clientesController extends Controller
{
    // Buscar y Paginar
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = DB::table('clientes');

        if($search){
            $query->where(function($q) use ($search){
                $q->where('ID_CLIENTES', 'LIKE', "%{$search}%")
                ->orwhere('Nombre', 'LIKE', "%{$search}%")
                ->orwhere('ID_UBICACION','LIKE', "%{$search}");
            });
        }
        $datos = $query->paginate(10);
        return view("clientes")->with("datos", $datos);
    }

    // Insertar Datos
    public function store(Request $request){
        $request->validate([
            'ID_CLIENTES' => 'required|unique:clientes,ID_CLIENTES',
            'ID_UBICACION' => 'required',
            'Nombre' => 'required',
            'TipoDocumento' => 'required',
            'Correo' => 'required',
            'Telefono' => 'required|numeric',
        ],[
            'ID_CLIENTES.unique' => 'El cliente con este documento ya existe en la plataforma.',
        ]);

        clientesModelo::create($request->all());
        return redirect()->route('clientes.index')->with('success','Cliente Registrado en la Plataforma');
    }

    // Update - Versión SEGURA (sin Rule)
    public function update(Request $request, $documento)
    {
        $request->validate([
            'ID_CLIENTES' => 'required|unique:clientes,ID_CLIENTES,' . $documento . ',ID_CLIENTES',
            'ID_UBICACION' => 'required',
            'Nombre' => 'required',
            'TipoDocumento' => 'required',
            'Correo' => 'required',
            'Telefono' => 'required|numeric',
        ], [
            'ID_CLIENTES.unique' => 'El cliente con este documento ya existe en la plataforma.',
        ]);

        $cliente = clientesModelo::findOrFail($documento);
        $cliente->update([
            'ID_CLIENTES' => $request->ID_CLIENTES,
            'ID_UBICACION' => $request->ID_UBICACION,
            'Nombre' => $request->Nombre,
            'TipoDocumento' => $request->TipoDocumento,
            'Correo' => $request->Correo,
            'Telefono' => $request->Telefono,
        ]);

        return redirect()->route('clientes.index')->with('success', 'Cliente Actualizado en la Plataforma');
    }

    // Destroy
    public function destroy($id)
    {
        try {
            $cliente = DB::table('clientes')->where('ID_CLIENTES', $id)->first();

            if (!$cliente) {
                return redirect()->back()->withErrors(['Cliente no encontrado']);
            }

            DB::transaction(function () use ($id) {
                DB::statement('SET FOREIGN_KEY_CHECKS=0');

                // Eliminar registros relacionados
                DB::table('historial')
                    ->whereIn('ID_COMPROBANTE', function($query) use ($id) {
                        $query->select('ID_COMPROBANTE')
                              ->from('comprobante')
                              ->where('ID_CLIENTES', $id);
                    })
                    ->delete();

                DB::table('comprobante')->where('ID_CLIENTES', $id)->delete();
                DB::table('detalles_orden_servicio')
                    ->whereIn('ID_ORDEN_SERVICIO', function($query) use ($id) {
                        $query->select('ID_ORDEN_SERVICIO')
                              ->from('orden_servicio')
                              ->whereIn('ID_MOTOS', function($q) use ($id) {
                                  $q->select('ID_MOTOS')
                                    ->from('motos')
                                    ->where('ID_CLIENTES', $id);
                              });
                    })
                    ->delete();

                DB::table('orden_servicio')
                    ->whereIn('ID_MOTOS', function($query) use ($id) {
                        $query->select('ID_MOTOS')
                              ->from('motos')
                              ->where('ID_CLIENTES', $id);
                    })
                    ->delete();

                DB::table('motos')->where('ID_CLIENTES', $id)->delete();
                DB::table('clientes')->where('ID_CLIENTES', $id)->delete();

                DB::statement('SET FOREIGN_KEY_CHECKS=1');
            });

            return redirect()->route('clientes.index')->with('success', 'Cliente eliminado correctamente');
            
        } catch (\Exception $e) {
            DB::statement('SET FOREIGN_KEY_CHECKS=1');
            return redirect()->back()->withErrors(['Error al eliminar el cliente: ' . $e->getMessage()]);
        }
    }
}