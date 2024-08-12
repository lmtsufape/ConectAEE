<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePdisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pdis', function (Blueprint $table) {
            $table->id();

            $table->string('percepcao')->nullable();
            $table->string('atencao')->nullable();
            $table->string('memoria')->nullable();
            $table->string('linguagem')->nullable();
            $table->string('raciocinio_logico')->nullable();
            $table->string('desenvolvimento_capacidade_motora')->nullable();
            $table->string('area_emocional_afetiva_social')->nullable();
            $table->string('atividades_vida_autonoma')->nullable();

            $table->string('escola_acoes_existentes');
            $table->string('escola_acoes_desenvolvidas');
            $table->string('escola_responsaveis_acoes');
            $table->string('sala_aula_acoes_existentes');
            $table->string('sala_aula_acoes_desenvolvidas');
            $table->string('sala_aula_responsaveis_acoes');
            $table->string('sala_aee_acoes_existentes');
            $table->string('sala_aee_acoes_desenvolvidas');
            $table->string('sala_aee_responsaveis_acoes');
            $table->string('familia_acoes_existentes');
            $table->string('familia_acoes_desenvolvidas');
            $table->string('familia_responsaveis_acoes');
            $table->string('saude_acoes_existentes');
            $table->string('saude_acoes_desenvolvidas');
            $table->string('saude_responsaveis_acoes');

            $table->string('recursos_multi_trabalho_area_cognitiva');
            $table->string('recursos_multi_objetivo_area_cognitiva');
            $table->string('recursos_multi_trabalho_area_social');
            $table->string('recursos_multi_objetivo_area_social');
            $table->string('recursos_multi_trabalho_area_motora');
            $table->string('recursos_multi_objetivo_area_motora');
            $table->string('recursos_multi_trabalho_altas_habilidade_superdotacao');
            $table->string('recursos_multi_objetivo_altas_habilidade_superdotacao');




            $table->string('resumo_avaliacao_trimestral');

            $table->foreignId('aluno_id')->constrained();
            $table->foreignId('user_id')->constrained();

            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pdis');
    }
}
