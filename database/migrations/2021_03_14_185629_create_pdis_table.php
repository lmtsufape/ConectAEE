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
