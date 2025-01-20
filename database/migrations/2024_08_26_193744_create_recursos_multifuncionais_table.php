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
        Schema::create('recursos_multifuncionais', function (Blueprint $table) {
            $table->id();

            $table->string('trabalho_area_cognitiva');
            $table->string('objetivo_area_cognitiva');
            $table->string('trabalho_area_social');
            $table->string('objetivo_area_social');
            $table->string('trabalho_area_motora');
            $table->string('objetivo_area_motora');
            $table->string('trabalho_altas_habilidade_superdotacao');
            $table->string('objetivo_altas_habilidade_superdotacao');

            $table->string('atividades_para_desenvolver_aluno_aee');
            $table->string('recursos_materias_equipamentos');


            $table->foreignId('pdi_id')->constrained()->cascadeOnDelete();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recursos_multifuncionais');
    }
};
