<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tiendas;

class TiendasController extends Controller
{
    public function index()
    {
        $tiendas = Tiendas::all();
        return response()->json($tiendas, 200); //200: OK (correcto)
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'Nombre_Tienda' => 'required',
                'Direccion' => 'required',
                'Ciudad' => 'required'
            ]);
            $tiendas = Tiendas::create($request->all());
            return response()->json($tiendas, 201); //201: Created (creado)
        } catch (\Exception $e) {
            return response()->json(['error' => 'Las validaciones no han sido exitosas'], 500); //500: Internal Server Error (error interno del servidor)
        }
    }
    public function update(Request $request, $id)
    {
        //Validar los datos que llegan del request (petición)
        try {
            $request->validate([
                'Nombre_Tienda' => 'required',
                'Direccion' => 'required',
                'Ciudad' => 'required'
            ]);
            $tiendas = Tiendas::findOrFail($id);//findOrFail: si no lo encuentra, lanza una excepción
            $tiendas->update($request->all());
            return response()->json($tiendas, 200); //200: OK (correcto)
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500); // 500: Internal Server Error (error interno del servidor)
        }
    }
    public function destroy(string $id)
    {
        $tiendas = Tiendas::findOrFail($id);//findOrFail: si no lo encuentra, lanza una excepción
        $tiendas->delete();
        return response()->json('la tienda ha sido eliminado', 200); //200: OK (correcto)
    }
}
