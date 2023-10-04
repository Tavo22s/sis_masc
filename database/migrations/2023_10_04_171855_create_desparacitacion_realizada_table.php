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
        Schema::create('desparacitacion_realizada', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mascota_id');
            $table->date('fecha_desparacitacion');
            $table->date('fecha_proxima_desparacitacion');
            $table->string('tipo', 7);
            $table->string('producto', 15);
            $table->string('peso', 4);
            $table->string('recomendaciones', 50);
            $table->timestamps();

            $table->foreign('mascota_id')->references('id')->on('mascota');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('desparacitacion_realizada');
    }
};
