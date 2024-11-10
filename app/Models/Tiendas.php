<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tiendas extends Model
{
    use HasFactory;

    protected $table = 'tiendas';
    protected $primaryKey = 'Tienda_ID';
    public $timestamps = false;
    protected $fillable = [
        'Nombre_Tienda',
        'Direccion',
        'Ciudad'
    ];
}
