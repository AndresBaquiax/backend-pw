<?php

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
        'Categoria_ID'
    ];
}