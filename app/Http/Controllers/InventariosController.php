<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventarios;

class InventariosController extends Controller
{
    public function index()
    {
        $inventario = Inventarios::all();
        return response()->json($inventario, 200); //200: OK (correcto)
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'Producto_ID' => 'required',
                'Tienda_ID' => 'required',
                'Stock' => 'required'
            ]);
            $inventario = Inventarios::create($request->all());
            return response()->json($inventario, 201); //201: Created (creado)
        } catch (\Exception $e) {
            return response()->json(['error' => 'Las validaciones no han sido exitosas'], 500); //500: Internal Server Error (error interno del servidor)
        }
    }
    public function update(Request $request, $id)
    {
        //Validar los datos que llegan del request (petición)
        try {
            $request->validate([
                'Producto_ID' => 'required',
                'Tienda_ID' => 'required',
                'Stock' => 'required'
            ]);
            $inventario = Inventarios::findOrFail($id);//findOrFail: si no lo encuentra, lanza una excepción
            $inventario->update($request->all());
            return response()->json($inventario, 200); //200: OK (correcto)
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500); // 500: Internal Server Error (error interno del servidor)
        }
    }
    public function destroy(string $id)
    {
        $inventario = Inventarios::findOrFail($id);//findOrFail: si no lo encuentra, lanza una excepción
        $inventario->delete();
        return response()->json('Ha sido eliminado', 200); //200: OK (correcto)
    }
}
