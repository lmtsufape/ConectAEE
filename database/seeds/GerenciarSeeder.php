<?php

use Illuminate\Database\Seeder;
use App\Gerenciar;
use App\Aluno;
use App\User;

class GerenciarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alunos = Aluno::all();
        $users_count = count(User::all());
        
        foreach ($alunos as $aluno) {
            $array = range(1,4);
            shuffle($array);

            factory(Gerenciar::class)->create([
                'aluno_id' => $aluno->id,
                'cargo_id' => array_pop($array),
                'user_id' => rand(1,$users_count),
                'isAdministrador' => True,
            ]);
            factory(Gerenciar::class)->create([
                'aluno_id' => $aluno->id,
                'cargo_id' => array_pop($array),
                'user_id' => rand(1,$users_count),
                'isAdministrador' => False,
            ]);
        }
        //factory(Gerenciar::class, count(Aluno::all()))->create();
    }
}
