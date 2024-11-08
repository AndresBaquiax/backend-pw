<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Productos;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::all();
        return response()->json($productos, 200); //200: OK (correcto)
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'Nombre' => 'required',
                'Descripcion' => 'required',
                'Precio' => 'required',
                'Stock' => 'required',
                'Codigo_Producto' => 'required',
                'Categoria_ID' => 'required'
            ]);
            $productos = Producto::create($request->all());
            return response()->json($productos, 201); //201: Created (creado)
        } catch (\Exception $e) {
            return response()->json(['error' => 'Las validaciones no han sido exitosas'], 500); //500: Internal Server Error (error interno del servidor)
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //Validar los datos que llegan del request (petición)
        try {
            $request->validate([
                'Nombre' => 'required',
                'Descripcion' => 'required',
                'Precio' => 'required',
                'Stock' => 'required',
                'Codigo_Producto' => 'required',
                'Categoria_ID' => 'required'
            ]);
            $productos = Producto::findOrFail($id);//findOrFail: si no lo encuentra, lanza una excepción
            $productos->update($request->all());
            return response()->json($productos, 200); //200: OK (correcto)
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500); // 500: Internal Server Error (error interno del servidor)
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $productos = Producto::findOrFail($id);//findOrFail: si no lo encuentra, lanza una excepción
        $productos->delete();
        return response()->json('El estudiante ha sido eliminado', 200); //200: OK (correcto)
    }
}
