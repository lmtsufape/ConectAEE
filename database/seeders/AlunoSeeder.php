<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Aluno;
use App\Models\Objetivo;
use App\Models\Atividade;

class AlunoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i=1; $i<=20 ; $i++) {
          factory(Aluno::class)->create([
              'endereco_id' => $i,
          ]);
        }

        $objetivos = Objetivo::all();

        foreach($objetivos as $objetivo){
          for ($i=0; $i<2 ; $i++) {
            factory(Atividade::class)->create([
                'objetivo_id' => $objetivo->id,
            ]);
          }
        }
    }
}
