<?php

namespace Database\Factories;

use App\Models\Endereco;
use Faker\Generator as Faker;

$factory->define(Endereco::class, function (Faker $faker) {
    return [
      'numero' => $faker->buildingNumber,
      'logradouro' => $faker->streetName,
      'bairro' => $faker->citySuffix,
      'cep' => '55295250',
      'municipio_id' => 2,
      // 'cidade' => $faker->city,
      // 'estado' => $faker->stateAbbr,
    ];
});
