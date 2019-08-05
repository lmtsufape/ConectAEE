<?php

use Illuminate\Database\Seeder;
use App\Aluno;
use App\Objetivo;
use App\TipoObjetivo;
use App\Gerenciar;
use App\RandomColor;

class ObjetivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alunos = Aluno::all();
        $tiposObjetivos = TipoObjetivo::all()->toArray();
        $cores = RandomColor::many(3, array('luminosity'=>'light'));

        foreach($alunos as $aluno){
            $gerenciars = Gerenciar::where('aluno_id','=',$aluno->id)->take(2)->get();
            for ($i=0; $i<2 ; $i++) {
                foreach ($gerenciars as $gerenciar) {
                    $cor = "";

                    if($gerenciar->user->id == 1){
                      $cor = $cores[0];
                    }else if($gerenciar->user->id == 5){
                      $cor = $cores[1];
                    }else{
                      $cor = $cores[2];
                    }

                    shuffle($tiposObjetivos);
                    factory(Objetivo::class)->create([
                        'aluno_id' => $aluno->id,
                        'user_id' => $gerenciar->user->id,
                        'tipo_objetivo_id' => $tiposObjetivos[0]['id'],
                        'cor' => $cor
                    ]);
                }
            }
        }
    }
}
