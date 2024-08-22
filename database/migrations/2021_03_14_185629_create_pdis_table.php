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

          

            $table->enum('sistema_linguistico', [
                'Comunicação Verbal/Fala',
                'Comunicação Alternativa/Suplementar',
                'Comunicação Alternativa/Voz',
                'Outro'
            ])->default('Comunicação Verbal/Fala');
            $table->string('outro_sistema_linguistico')->nullable();

            $table->text('tecnologia_assistiva_utilizada')->nullable();
            $table->text('recursos_equipamentos_necessarios')->nullable();
            $table->text('implicacoes_especificidade_educacional_acessibilidade_curricular')->nullable();
            $table->text('outras_informacoes_relevantes')->nullable();

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


            $table->string('recursos_multi_trabalho_area_cognitiva');
            $table->string('recursos_multi_objetivo_area_cognitiva');
            $table->string('recursos_multi_trabalho_area_social');
            $table->string('recursos_multi_objetivo_area_social');
            $table->string('recursos_multi_trabalho_area_motora');
            $table->string('recursos_multi_objetivo_area_motora');
            $table->string('recursos_multi_trabalho_altas_habilidade_superdotacao');
            $table->string('recursos_multi_objetivo_altas_habilidade_superdotacao');

            $table->string('atividades_para_desenvolver_aluno_aee');
            $table->string('recursos_materias_equipamentos_na_sala_recursos_multi');

            $table->string('resumo_avaliacao_trimestral_aluno');

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
