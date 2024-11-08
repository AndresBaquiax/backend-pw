<?php
// app/Models/Producto.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';
    protected $primaryKey = 'Producto_ID';
    public $timestamps = false;

    protected $fillable = [
        'Nombre',
        'Descripcion',
        'Precio',
        'Stock',
        'Codigo_Producto',
        'Categoria_ID',
        'Imagen',
    ];

    // Accesor para obtener la URL completa de la imagen
    public function getImagenUrlAttribute()
    {
        return $this->Imagen ? url($this->Imagen) : null;
    }
}