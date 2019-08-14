<?php

use App\Aluno;
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
    return [
      'nome' => $faker->name,
      'cid' => 'H910',
      'codigo' => str_random(8),
      'descricao_cid' => 'Perda de audição ototóxica',
      'observacao' => $faker->text($maxNbChars = 300),
      'sexo' => $faker->randomElement($array = array ('M','F')),
      'data_de_nascimento' => $faker->date($format = 'd-m-Y',$max = 'now'),
      'imagem' => "/images/avatar.png",
    ];
});
