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
        Schema::create('detalle_carrito', function (Blueprint $table) {
            $table->id('Detalle_ID');
            $table->unsignedBigInteger('Carrito_ID');
            $table->unsignedBigInteger('Producto_ID');
            $table->integer('Cantidad');
            $table->decimal('Precio_Unitario', 10, 2);
            $table->foreign('Carrito_ID')->references('Carrito_ID')->on('carrito_compras');
            $table->foreign('Producto_ID')->references('Producto_ID')->on('productos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_carrito');
    }
};
