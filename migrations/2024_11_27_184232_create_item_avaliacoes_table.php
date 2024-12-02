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
        Schema::create('item_avaliacoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('avaliacao_id');
            $table->unsignedBigInteger('competencia_id');
            $table->unsignedBigInteger('indicador_id')->nullable();
            $table->unsignedBigInteger('gestor_escala_id');
            $table->unsignedBigInteger('servidor_escala_id');
            $table->foreign('avaliacao_id')->references('id')->on('avaliacoes');
            $table->foreign('gestor_escala_id')->references('id')->on('escala_competencias');
            $table->foreign('servidor_escala_id')->references('id')->on('escala_competencias');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_avaliacoes');
    }
};
