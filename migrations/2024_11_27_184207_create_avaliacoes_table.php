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
        Schema::create('avaliacoes', function (Blueprint $table) {
            $table->id();
            $table->date('data_emissao');
            $table->date('data_devolucao');
            $table->unsignedBigInteger('tipo_id');
            $table->unsignedBigInteger('servidor_id');
            $table->unsignedBigInteger('gestor_id');
            $table->unsignedBigInteger('referencia_id')->nullable();
            $table->unsignedBigInteger('carreira_id')->nullable();;
            $table->unsignedBigInteger('area_id')->nullable();;
            $table->unsignedBigInteger('especialidade_id')->nullable();
            $table->unsignedBigInteger('lotacao_id');
            $table->unsignedBigInteger('situacao_id');
            $table->unsignedBigInteger('divisao_id');
            $table->unsignedBigInteger('funcao_id')->nullable();
            $table->unsignedBigInteger('posto_id');
            $table->integer('fase');
            $table->date('periodo_inicial');
            $table->date('periodo_final');
            $table->date('data_gestor');
            $table->date('data_servidor');
            $table->tinyInteger('status'); // 0 pendente_gestor, 1 pendente_servidor, 2 finalizado_gestor, 3 concluida
            $table->foreign('tipo_id')->references('id')->on('tipos');
            $table->foreign('servidor_id')->references('id')->on('servidores');
            $table->foreign('gestor_id')->references('id')->on('servidores');
            $table->foreign('referencia_id')->references('id')->on('referencias');
            $table->foreign('carreira_id')->references('id')->on('carreiras');
            $table->foreign('area_id')->references('id')->on('areas');
            $table->foreign('especialidade_id')->references('id')->on('especialidades');
            $table->foreign('lotacao_id')->references('id')->on('lotacoes');
            $table->foreign('situacao_id')->references('id')->on('situacoes');
            $table->foreign('divisao_id')->references('id')->on('divisoes');
            $table->foreign('funcao_id')->references('id')->on('funcoes');
            $table->foreign('posto_id')->references('id')->on('postos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avaliacoes');
    }
};

