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
        Schema::create('lotacao_postos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lotacao_id');
            $table->foreign('lotacao_id')->references('id')->on('lotacoes');
            $table->unsignedBigInteger('posto_id');
            $table->foreign('posto_id')->references('id')->on('postos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lotacao_postos');
    }
};
