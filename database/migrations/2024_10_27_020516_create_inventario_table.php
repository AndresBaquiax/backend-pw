<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inventario', function (Blueprint $table) {
            $table->id('Inventario_ID');
            $table->unsignedBigInteger('Producto_ID');
            $table->unsignedBigInteger('Tienda_ID');
            $table->integer('Stock');
            $table->string('Ubicacion_Producto')->nullable();
            $table->foreign('Producto_ID')->references('Producto_ID')->on('productos');
            $table->foreign('Tienda_ID')->references('Tienda_ID')->on('tiendas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventario');
    }
};
