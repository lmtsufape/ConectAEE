<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Objetivo;
use App\Models\StatusObjetivo;

class StatusObjetivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objetivos = Objetivo::all();

        foreach($objetivos as $objetivo){
          factory(StatusObjetivo::class)->create([
              'objetivo_id' => $objetivo->id,
          ]);
        }
    }
}
