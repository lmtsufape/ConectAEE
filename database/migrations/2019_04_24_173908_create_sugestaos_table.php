<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSugestaosTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('sugestaos', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->timestamps();

      $table->string('titulo');
      $table->text('descricao')->nullable();
      $table->dateTime('data');
      $table->integer('objetivo_id')->unsigned();

      $table->foreign('objetivo_id')->references('id')->on('objetivos')->onDelete('cascade');
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('sugestaos');
  }
}
