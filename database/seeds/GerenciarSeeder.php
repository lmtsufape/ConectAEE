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
            factory(Gerenciar::class)->create([
                'aluno_id' => $aluno->id,
                'cargo_id' => rand(1,4),
                'user_id' => rand(1,$users_count),
            ]);
            factory(Gerenciar::class)->create([
                'aluno_id' => $aluno->id,
                'cargo_id' => rand(1,4),
                'user_id' => rand(1,$users_count),
            ]);
        }
        
        //factory(Gerenciar::class, count(Aluno::all()))->create();
    }
}
