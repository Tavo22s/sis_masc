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
        Schema::create('vacunacion_realizada', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mascota_id');
            $table->unsignedBigInteger('vacuna_id');
            $table->date('fecha_consulta');
            $table->boolean('ind_vacunacion');
            $table->date('fecha_proxima_vacunacion');
            $table->string('observaciones', 50);
            $table->string('recomendaciones', 50);
            $table->timestamps();

            $table->foreign('mascota_id')->references('id')->on('mascota');
            $table->foreign('vacuna_id')->references('id')->on('vacuna');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacunacion_realizada');
    }
};
