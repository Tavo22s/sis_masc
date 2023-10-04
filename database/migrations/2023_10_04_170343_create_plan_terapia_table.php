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
        Schema::create('plan_terapia', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('terapia_id');
            $table->string('dosis', 20);
            $table->string('recomendaciones', 50);
            $table->timestamps();

            $table->foreign('terapia_id')->references('id')->on('terapia');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plan_terapia');
    }
};
