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
        Schema::create('mascotas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 20)->nullable(false);
            $table->integer('edad');
            $table->string('observaciones', 256);
            $table->string('sexo', 10);
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('raza_id');
            $table->boolean('activo')->default(true);
            $table->timestamps();

            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('raza_id')->references('id')->on('razas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mascotas');
    }
};
