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
        Schema::create('plan_terapias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('terapia_id');
            $table->unsignedBigInteger('consulta_id');
            $table->string('dosis', 20);
            $table->string('recomendaciones', 254);
            $table->timestamps();

            $table->foreign('terapia_id')->references('id')->on('terapias');
            $table->foreign('consulta_id')->references('id')->on('consultas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plan_terapias');
    }
};
