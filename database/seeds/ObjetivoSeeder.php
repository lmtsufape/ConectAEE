<?php

use Illuminate\Database\Seeder;
use App\Aluno;
use App\Objetivo;
use App\TipoObjetivo;
use App\Gerenciar;

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

        foreach($alunos as $aluno){
            $gerenciars = Gerenciar::where('aluno_id','=',$aluno->id)->get();
            for ($i=0; $i<2 ; $i++) {
                foreach ($gerenciars as $gerenciar) {

                    shuffle($tiposObjetivos);
                    factory(Objetivo::class)->create([
                        'aluno_id' => $aluno->id,
                        'user_id' => $gerenciar->user->id,
                        'tipo_objetivo_id' => $tiposObjetivos[0]['id'],
                    ]);
                }
            }
        }
    }
}
