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
                ->orwhere('TipoDocumento','LIKE', "%{$search}");
            });
        }
        $datos = $query->paginate(10);
        return view("Clientes.clientes")->with("datos", $datos);
    }

    // Insertar Datos
    public function store(Request $request){
        $request->validate([
            'ID_CLIENTES' => 'required|unique:clientes,ID_CLIENTES',
            'Ubicacion' => 'required',
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
            'Ubicacion' => 'required',
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
            'Ubicacion' => $request->Ubicacion,
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
            $id = clientesModelo::findOrFail($id);
            $id->delete();

            return redirect()->route('clientes.index')->with('success', 'Cliente eliminado correctamente');
        }
        public function verMotosCliente($id)
        {
            $cliente = ClientesModelo::find($id);
            $motos = $cliente->motos; // aquí obtienes todas las motos
 
            return view('Clientes.vermotosCliente', compact('cliente', 'motos'));
        }

}