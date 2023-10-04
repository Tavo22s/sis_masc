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
        Schema::create('mascota', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 20)->nullable(false);
            $table->integer('edad');
            $table->string('observaciones', 150);
            $table->string('sexo', 10);
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('raza_id');
            $table->unsignedBigInteger('especie_id');
            $table->boolean('activo')->default(true);
            $table->timestamps();

            $table->foreign('cliente_id')->references('id')->on('cliente');
            $table->foreign('raza_id')->references('id')->on('raza');
            $table->foreign('especie_id')->references('id')->on('especie');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mascota');
    }
};
