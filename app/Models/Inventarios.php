<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inventarios extends Model
{
    use HasFactory;

    protected $table = 'inventario';
    protected $primaryKey = 'Inventario_ID';
    public $timestamps = false;
    protected $fillable = [
        'Producto_ID',
        'Tienda_ID',
        'Stock'
    ];
}
