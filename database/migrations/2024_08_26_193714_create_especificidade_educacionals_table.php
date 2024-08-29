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

            $table->enum('organizacao_tipo_aee', [
                'Sala de Recursos Multifuncional',
                'Intérprete na sala regular',
                'Professor de Libras',
                'Domiciliar',
                'Hospitalar',
                'Outro'
            ])->default('Outro');
            $table->string('descricao_outro')->nullable();

            $table->boolean('atendimento_sala_recursos_multifuncionais')->default(false);
            $table->enum('tipo_sala', ['tipo_1', 'tipo_2'])->nullable();
            $table->string('espaco_alternativo')->nullable();//outro_espaco

            $table->enum('frequencia_atendimentos', [
                '1 vez por semana',
                '2 vezes por semana',
                '3 vezes por semana',
                '4 vezes por semana',
                'Todo o período de aulas, na própria sala de aula',
                'Outro'
            ])->default('1 vez por semana');
            $table->string('frequencia_outro')->nullable();

            $table->enum('profissionais_educacao_necessarios', [
                'Professor Brailista',
                'Professor Intérprete de Libras',
                'Professor Instrutor de Libras',
                'Profissional de Apoio Escolar',
                'Não é necessário o apoio de outro profissional',
                'Outro'
            ])->default('Não é necessário o apoio de outro profissional');
            $table->string('profissionais_educacao_outro')->nullable();
            
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
