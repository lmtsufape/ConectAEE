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
        Schema::create('especificidade_educacionals', function (Blueprint $table) {
            $table->id();

            $table->text('escola_acoes_existentes');
            $table->text('escola_acoes_desenvolvidas');
            $table->text('escola_responsaveis_acoes');
            $table->text('sala_aula_acoes_existentes');
            $table->text('sala_aula_acoes_desenvolvidas');
            $table->text('sala_aula_responsaveis_acoes');
            $table->text('sala_aee_acoes_existentes');
            $table->text('sala_aee_acoes_desenvolvidas');
            $table->text('sala_aee_responsaveis_acoes');
            $table->text('familia_acoes_existentes');
            $table->text('familia_acoes_desenvolvidas');
            $table->text('familia_responsaveis_acoes');
            $table->text('saude_acoes_existentes');
            $table->text('saude_acoes_desenvolvidas');
            $table->text('saude_responsaveis_acoes');

            $table->string('organizacao_tipo_aee');
            $table->string('descricao_outro')->nullable();//analisar a permanencia

            $table->boolean('atendimento_sala_recursos_multifuncionais')->default(true);
            $table->string('tipo_sala')->nullable();
            $table->string('espaco_alternativo')->nullable();//outro_espaco

            $table->string('frequencia_atendimentos');
            $table->string('frequencia_outro')->nullable();//analisar a permanencia

            $table->string('profissionais_educacao_necessarios');
            $table->string('profissionais_educacao_outro')->nullable();//analisar a permanencia
            
            $table->foreignId('pdi_id')->constrained();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('especificidade_educacionals');
    }
};
