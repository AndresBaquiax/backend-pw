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
        Schema::create('backup', function (Blueprint $table) {
            $table->id('Backup_ID');
            $table->timestamp('Fecha_Backup')->useCurrent();
            $table->enum('Tipo_Backup', ['Completo', 'Incremental', 'Diferencial']);
            $table->string('Ubicacion_Almacenamiento');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('backup');
    }
};
