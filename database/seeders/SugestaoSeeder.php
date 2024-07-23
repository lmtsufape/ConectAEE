<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Aluno;
use App\Models\Objetivo;
use App\Models\Sugestao;

class SugestaoSeeder extends Seeder
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
          for ($i=1; $i<=2 ; $i++) {
            factory(Sugestao::class)->create([
                'objetivo_id' => $objetivo->id,
                'data' => date('d.m.Y',strtotime("-".$i." days")),
                'user_id' => $i
            ]);
          }
        }
    }
}
