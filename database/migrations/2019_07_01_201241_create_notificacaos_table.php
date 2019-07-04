<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notificacaos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('aluno_id');
            $table->integer('remetente_id');
            $table->integer('destinatario_id');
            $table->integer('perfil_id')->nullable();
            $table->boolean('lido');

            $table->foreign('aluno_id')->references('id')->on('alunos');
            $table->foreign('remetente_id')->references('id')->on('users');
            $table->foreign('destinatario_id')->references('id')->on('users');
            $table->foreign('perfil_id')->references('id')->on('perfils')->onDelete('cascade');

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
        Schema::dropIfExists('notificacaos');
    }
}
