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
        Schema::create('detalle_venta', function (Blueprint $table) {
            $table->id('Detalle_Venta_ID');
            $table->unsignedBigInteger('Venta_ID');
            $table->unsignedBigInteger('Producto_ID');
            $table->integer('Cantidad');
            $table->decimal('Precio_Unitario', 10, 2);
            $table->foreign('Venta_ID')->references('Venta_ID')->on('ventas');
            $table->foreign('Producto_ID')->references('Producto_ID')->on('productos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_venta');
    }
};
