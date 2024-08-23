<?php

namespace Database\Factories;

use App\Models\Aluno;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Aluno::class, function (Faker $faker) {
  $str     = $faker->name();
  $order   = array("Sr. ", "Sra. ", "Dr. ", "Dra. ", "Srta. ");
  $replace = '';

  return [
    'matricula' => 23434,
    'idade_inicio_estudos' => 2,
    'idade_escola_atual' => 2,
    'nome_pai' => 'sdfsdfdsf',
    'escolaridade_pai' => 'sdfasdf',
    'profissao_pai' => 'sdfasdf',
    'nome_mae' => 'sdfsadf',
    'escolaridade_mae' => 'sdfsadf',
    'profissao_mae' => 'sdfsfd',
    'num_irmaos' => 23,
    'contato_responsavel' => '2324354545',
    'imagem' => '',
    'municipio_id' => 1,
    'escola_id' => 1,
    'professor_responsavel' => 2,
    'nome' => str_replace($order, $replace, $str),
    'cid' => 'H910',
    'cpf' => $faker->cpf,
    'descricao_cid' => 'Perda de audição ototóxica',
    'observacao' => $faker->text($maxNbChars = 300),
    'sexo' => $faker->randomElement($array = array ('M','F')),
    'data_de_nascimento' => $faker->date($format = 'd-m-Y',$max = 'now'),
  ];
});
