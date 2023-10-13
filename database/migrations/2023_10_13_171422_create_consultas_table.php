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
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mascota_id');
            $table->string('motivo_consulta', 50);
            $table->date('fecha_consulta');
            $table->string('recomendaciones', 50);
            $table->string('motivo_proxima_consulta', 50);
            $table->date('fecha_proxima_consulta');
            $table->boolean('activo')->default(true);
            $table->timestamps();

            $table->foreign('mascota_id')->references('id')->on('mascotas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultas');
    }
};
