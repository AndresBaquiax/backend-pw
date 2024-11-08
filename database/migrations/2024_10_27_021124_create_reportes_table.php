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
        Schema::create('reportes', function (Blueprint $table) {
            $table->id('Reporte_ID');
            $table->string('Tipo_Reporte');
            $table->timestamp('Fecha_Generacion')->useCurrent();
            $table->unsignedBigInteger('Usuario_Generador');
            $table->foreign('Usuario_Generador')->references('Usuario_ID')->on('usuarios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reportes');
    }
};
