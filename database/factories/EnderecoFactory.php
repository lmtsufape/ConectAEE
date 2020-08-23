<?php

use Faker\Generator as Faker;

$factory->define(App\Endereco::class, function (Faker $faker) {
    return [
      'numero' => $faker->buildingNumber,
      'rua' => $faker->streetName,
      'bairro' => $faker->citySuffix,
      'cep' => '55295250',
      'cidade' => 'Garanhuns',
      'estado' => 'PE'
      // 'cidade' => $faker->city,
      // 'estado' => $faker->stateAbbr,
    ];
});
