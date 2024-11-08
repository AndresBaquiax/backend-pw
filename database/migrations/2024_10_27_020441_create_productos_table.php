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
        Schema::create('productos', function (Blueprint $table) {
            $table->id('Producto_ID');
            $table->string('Nombre');
            $table->text('Descripcion')->nullable();
            $table->decimal('Precio', 10, 2);
            $table->integer('Stock');
            $table->string('Codigo_Producto')->unique();
            $table->unsignedBigInteger('Categoria_ID')->nullable();
            $table->foreign('Categoria_ID')->references('Categoria_ID')->on('categorias');
            $table->string('Imagen')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
