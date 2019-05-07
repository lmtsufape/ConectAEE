<?php

use Illuminate\Database\Seeder;
use App\MensagemForumObjetivo;
use App\Objetivo;
use App\Gerenciar;
use App\Aluno;

class MensagemForumObjetivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alunos = Aluno::all();

        foreach($alunos as $aluno){
            $gerenciars = Gerenciar::where('aluno_id','=',$aluno->id)->get();
            for ($i=0; $i<2 ; $i++) { 
                foreach ($gerenciars as $gerenciar) {
                    $objetivos = Objetivo::where('user_id','=',$gerenciar->user->id)->get();
                    foreach($objetivos as $objetivo){
                        factory(MensagemForumObjetivo::class)->create([
                            'forum_objetivo_id' => $objetivo->forum->id,
                            'user_id' => $gerenciar->user->id,
                        ]);
                    }
                }
            }
        }
    }
}