<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Familia;
use Faker\Generator as Faker;

$factory->define(Familia::class, function (Faker $faker) {
    return [
        'nome_mae' => $faker->name(),
        'nome_pai' => $faker->name(),
        'nome_responsavel' => $faker->name(),
        'numero_irmaos' => rand(1, 10)
    ];
});
