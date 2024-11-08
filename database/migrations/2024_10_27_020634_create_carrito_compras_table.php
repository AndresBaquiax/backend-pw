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
        Schema::create('carrito_compras', function (Blueprint $table) {
            $table->id('Carrito_ID');
            $table->unsignedBigInteger('Cliente_ID');
            $table->timestamp('Fecha_Creacion')->useCurrent();
            $table->string('Estado_Carrito', 50);
            $table->foreign('Cliente_ID')->references('Cliente_ID')->on('clientes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carrito_compras');
    }
};
