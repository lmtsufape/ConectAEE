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
            $table->date('data_de_nascimento');
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
            

            $table->char('sexo', 1);
            $table->string('cid')->nullable();
            $table->string('descricao_cid')->nullable();
            $table->text('observacao')->nullable();
            $table->string('imagem')->nullable();

            $table->foreignId('municipio_id')->constrained();
            $table->foreignId('escola_id')->constrained();
            $table->foreignId('endereco_id')->constrained()->onDelete('cascade');
            $table->foreignId('professor_responsavel')->constrained('users');

            $table->timestamps();
            $table->softDeletes();
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
