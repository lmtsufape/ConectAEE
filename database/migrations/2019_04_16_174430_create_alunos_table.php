<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->date('data_nascimento');
            $table->string('cpf')->unique();
            $table->integer('matricula');
            $table->integer('idade_inicio_estudos');
            $table->integer('idade_escola_atual');

            $table->string('nome_pai');
            $table->string('escolaridade_pai');
            $table->string('profissao_pai');
            $table->string('nome_mae');
            $table->string('escolaridade_mae');
            $table->string('profissao_mae');
            $table->integer('num_irmaos');
            $table->string('contato_responsavel');
            $table->string('mora_com')->nullable();
            
            $table->string('escolaridade_atual_aluno');
            $table->string('historico_comum');
            $table->string('historico_especifico');
            $table->string('motivo_encaminhamento_aee');
            $table->string('avaliacao_geral_familiar');
            $table->string('avaliacao_geral_escolar');
            $table->string('anexos_laudos')->nullable();

            $table->string('cid')->nullable();
            $table->string('descricao_cid')->nullable();
            $table->string('imagem')->nullable();

            $table->foreignId('endereco_id')->constrained();
            $table->foreignId('escola_id')->constrained();
            $table->foreignId('professor_responsavel')->constrained('users');

            $table->timestamp('deleted_at')->nullable();
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
        Schema::dropIfExists('alunos');
    }
}
