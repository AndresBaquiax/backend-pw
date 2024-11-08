<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::all()->map(function ($producto) {
            // Generar la URL de la imagen si existe
            $producto->ImagenUrl = $producto->imagen ? url($producto->imagen) : null;
            return $producto;
        });
    
        return response()->json($productos, 200);
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
                'Categoria_ID' => 'required',
                'Imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            
            // Limpia el nombre del producto para que sea un nombre de archivo válido
            $nombreProducto = preg_replace('/[^A-Za-z0-9\-]/', '_', $request->Nombre);

            if ($request->hasFile('Imagen')) {
                $imageName = $nombreProducto . '.' . $request->Imagen->extension();
                $request->Imagen->move(public_path('images'), $imageName);
                $imagePath = 'images/' . $imageName;
            } else {
                $imagePath = null;
            }

            $productos = Producto::create([
                'Nombre' => $request->Nombre,
                'Descripcion' => $request->Descripcion,
                'Precio' => $request->Precio,
                'Stock' => $request->Stock,
                'Codigo_Producto' => $request->Codigo_Producto,
                'Categoria_ID' => $request->Categoria_ID,
                'Imagen' => $imagePath,
            ]);

            return response()->json($productos, 201); //201: Created (creado)
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500); // 500: Internal Server Error (error interno del servidor)
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $producto = Producto::findOrFail($id);

        // Generar la URL completa de la imagen
        $producto->ImagenUrl = $producto->imagen ? url($producto->imagen) : null;

        return response()->json($producto, 200);
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
            Log::info('Datos recibidos para actualizar:', $request->all());
            $productos->update($request->all());
            return response()->json($productos, 200); //200: OK (correcto)
        } catch (\Exception $e) {
            Log::error('Error al actualizar el producto:', ['error' => $e->getMessage()]);
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
        return response()->json('El producto ha sido eliminado', 200); //200: OK (correcto)
    }
}
