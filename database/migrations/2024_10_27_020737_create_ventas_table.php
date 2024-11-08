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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id('Venta_ID');
            $table->unsignedBigInteger('Cliente_ID');
            $table->timestamp('Fecha_Venta')->useCurrent();
            $table->decimal('Total_Venta', 10, 2);
            $table->string('Forma_Pago')->nullable();
            $table->foreign('Cliente_ID')->references('Cliente_ID')->on('clientes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
