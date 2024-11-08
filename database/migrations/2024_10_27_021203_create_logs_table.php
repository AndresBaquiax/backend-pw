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
        Schema::create('logs', function (Blueprint $table) {
            $table->id('Log_ID');
            $table->unsignedBigInteger('Usuario_ID');
            $table->text('Acción');
            $table->timestamp('Fecha_Hora')->useCurrent();
            $table->foreign('Usuario_ID')->references('Usuario_ID')->on('usuarios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logs');
    }
};
