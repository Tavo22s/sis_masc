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
        Schema::create('examen_medicos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('consulta_id');
            $table->integer('peso');
            $table->string('temperatura', 10);
            $table->string('frecuencia_cardiaca', 10);
            $table->string('frecuencia_respiratoria', 10);
            $table->string('tllc', 10);
            $table->string('mucosa', 20);
            $table->string('observaciones', 254);
            $table->boolean('activo')->default(true);
            $table->timestamps();

            $table->foreign('consulta_id')->references('id')->on('consultas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('examen_medicos');
    }
};
