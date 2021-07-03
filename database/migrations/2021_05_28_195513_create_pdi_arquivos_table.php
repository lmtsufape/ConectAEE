<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePdiArquivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pdi_arquivos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->integer('aluno_id');
            $table->foreign('aluno_id')->references('id')->on('alunos');

            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('filename');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pdi_arquivos');
    }
}
