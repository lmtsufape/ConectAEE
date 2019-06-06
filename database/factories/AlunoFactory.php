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
      'sexo' => $faker->randomElement($array = array ('M','F')),
      'data_de_nascimento' => $faker->date($format = 'd-m-Y',$max = 'now'),
    ];
});
