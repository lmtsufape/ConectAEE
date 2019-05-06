<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Atividade;
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

$factory->define(Atividade::class, function (Faker $faker) {
    return [
        'titulo' => $faker->words($nb = 3, $asText = true),
        'descricao' => $faker->text($maxNbChars = 500),
        'prioridade' => $faker->randomElement($array = array ('Alta','Média','Baixa')),
        'status' => $faker->randomElement($array = array ("Não iniciada","Iniciada", "Em andamento", "Finalizada")),
        'data' => new DateTime(),
        'objetivo_id' => 1,
    ];
});
