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
            $table->bigIncrements('id');
            $table->timestamps();

            $table->integer('aluno_id');
            $table->foreign('aluno_id')->references('id')->on('alunos');

            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('nomeEscola');
            $table->string('anoEscolaridade');
            $table->string('professorRegular');
            $table->string('modalidadeEscolar');

            $table->boolean('banhoSozinho');
            $table->boolean('banheiroSozinho');
            $table->boolean('escovaDentesSozinho');

            $table->boolean('comeSozinho');
            $table->boolean('bebeAguaSozinho');

            $table->string('problemaGestacao');
            $table->string('descProbGestacao')->nullable();
            $table->string('ambienteFamiliar');
            $table->string('aprendizagemEscolar');

            $table->string('recomendacoesSaude');
            $table->string('diagnosticoSaude');
            $table->string('problemasSaude');
            $table->string('descricaoMedicamentos')->nullable();

            $table->string('sistemaLinguistico');
            $table->string('tipoRecursoUsado');
            $table->string('tipoRecursoProvidenciado');
            $table->string('implicacoesEspecificidades');
            $table->string('informacoesRelevantes')->nullable();

            $table->string('avaliacaoMotora');
            $table->string('avaliacaoEmocional');
            $table->string('especificidadesObjetivo');
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
