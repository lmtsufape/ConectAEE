<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnderecosTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('enderecos', function (Blueprint $table) {
      $table->id();

      $table->string('logradouro');
      $table->string('numero');
      $table->string('bairro');
      $table->string('cep');
      $table->foreignId('municipio_id')->constrained();

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
    Schema::dropIfExists('enderecos');
  }
}
