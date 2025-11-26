<?php

namespace App\Http\Controllers;

use App\Models\productosModelo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class productosController extends Controller
{
    // Buscar y Paginar
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = DB::table('productos');

        if($search){
            $query->where(function($q) use ($search){
                $q->where('ID_PRODUCTOS', 'LIKE', "%{$search}%")
                ->orwhere('Nombre', 'LIKE', "%{$search}%")
                ->orwhere('Categoria','LIKE', "%{$search}");
            });
        }
        $datos = $query->paginate(10);
        return view("Productos.productos")->with("datos", $datos);
    }

    // Insertar Datos
    public function store(Request $request){
        $request->validate([
            'ID_PRODUCTOS' => 'required|unique:productos,ID_PRODUCTOS',
            'Categoria' => 'required|string',
            'Marca' => 'required',
            'Nombre' => 'required',
            'Garantia' => 'required|string',
            'Precio' => 'required|numeric',
            'Cantidad' => 'required|numeric',
            'Estado' => 'required|string',
        ],[
            'ID_PRODUCTOS.unique' => 'El producto con este id ya existe en la plataforma.',
        ]);

        productosModelo::create($request->all());
        return redirect()->route('productos.index')->with('success','Producto registrado en la Plataforma');
    }

    // Update - Versión SEGURA (sin Rule)
    public function update(Request $request, $idP)
    {
        $request->validate([
            'ID_PRODUCTOS' => 'required|unique:productos,ID_PRODUCTOS,' . $idP . ',ID_PRODUCTOS',
            'Categoria' => 'required',
            'Marca' => 'required',
            'Nombre' => 'required',
            'Garantia' => 'required',
            'Precio' => 'required|numeric',
            'Cantidad' => 'required|numeric',
            'Estado' => 'required|required',
        ], [
            'ID_PRODUCTOS.unique' => 'El producto con este id ya existe en la plataforma.',
        ]);

        $producto = productosModelo::findOrFail($idP);
        $producto->update([
            'ID_PRODUCTOS' => $request->ID_PRODUCTOS,
            'Categoria' => $request->Categoria,
            'Marca' => $request->Marca,
            'Nombre' => $request->Nombre,
            'Garantia' => $request->Garantia,
            'Estado' => $request->Estado,
            'Precio' => $request->Precio,
        ]);

        return redirect()->route('productos.index')->with('success', 'Producto Actualizado en la Plataforma');
    }

    // Destroy
        public function destroy($idP)
        {
            $producto = productosModelo::findOrFail($idP);
            $producto->delete();

            return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente');
        }
}
