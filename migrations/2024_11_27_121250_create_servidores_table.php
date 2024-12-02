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
        Schema::create('servidores', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('email')->nullable();
            $table->string('username')->unique()->nullable();
            $table->unsignedBigInteger('lotacao_id')->nullable();
            $table->unsignedBigInteger('funcao_id')->nullable();
            $table->unsignedBigInteger('situacao_id')->nullable();
            $table->unsignedBigInteger('divisao_id')->nullable();
            $table->unsignedBigInteger('carreira_id')->nullable();
            $table->unsignedBigInteger('area_id')->nullable();
            $table->unsignedBigInteger('especialidade_id')->nullable();
            $table->unsignedBigInteger('referencia_id')->nullable();
            $table->foreign('lotacao_id')->references('id')->on('lotacoes');
            $table->foreign('funcao_id')->references('id')->on('funcoes');
            $table->foreign('situacao_id')->references('id')->on('situacoes');
            $table->foreign('divisao_id')->references('id')->on('divisoes');
            $table->foreign('carreira_id')->references('id')->on('carreiras');
            $table->foreign('area_id')->references('id')->on('areas');
            $table->foreign('especialidade_id')->references('id')->on('especialidades');
            $table->foreign('referencia_id')->references('id')->on('referencias');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servidores');
    }
};

