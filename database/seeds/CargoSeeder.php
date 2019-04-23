<?php

use Illuminate\Database\Seeder;
use App\Cargo;

class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Cargo::class)->create([
            'nome' => "Responsável",
            'especializacao' => NULL,
        ]);

        factory(Cargo::class)->create([
            'nome' => "Professor AEE",
            'especializacao' => NULL,
        ]);

        factory(Cargo::class)->create([
            'nome' => "Professor",
            'especializacao' => NULL,
        ]);

        factory(Cargo::class)->create([
            'nome' => "Profissional Externo de Saúde",
            'especializacao' => NULL,
        ]);
    }
}
