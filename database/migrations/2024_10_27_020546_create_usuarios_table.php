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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('Usuario_ID');
            $table->string('Nombre_Usuario');
            $table->string('Correo')->unique();
            $table->string('Contraseña');
            $table->unsignedBigInteger('Rol_ID')->nullable();
            $table->foreign('Rol_ID')->references('Rol_ID')->on('roles');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
