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
        Schema::create('cotizaciones', function (Blueprint $table) {
            $table->id('Cotizacion_ID');
            $table->unsignedBigInteger('Cliente_ID');
            $table->timestamp('Fecha_Cotizacion')->useCurrent();
            $table->date('Vigencia');
            $table->decimal('Total_Cotizacion', 10, 2);
            $table->foreign('Cliente_ID')->references('Cliente_ID')->on('clientes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cotizaciones');
    }
};
