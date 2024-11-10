<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\TiendasController;
use App\Http\Controllers\InventariosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('productos', ProductoController::class);
Route::resource('tiendas', TiendasController::class);
Route::resource('inventarios', InventariosController::class);

