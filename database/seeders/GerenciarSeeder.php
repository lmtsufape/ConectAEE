<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gerenciar;
use App\Models\Aluno;
use App\Models\User;

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
            $array = range(2,8);
            unset($array[2]);
            shuffle($array);

            $array_users = range(2,count(User::all()));
            shuffle($array);

            factory(Gerenciar::class)->create([
                'aluno_id' => $aluno->id,
                'perfil_id' => array_pop($array),
                'user_id' => 1,
                'tipoUsuario' => 3,
            ]);
            factory(Gerenciar::class)->create([
                'aluno_id' => $aluno->id,
                'perfil_id' => 1,
                'user_id' => array_pop($array_users),
                'tipoUsuario' => 3,
            ]);
            factory(Gerenciar::class)->create([
                'aluno_id' => $aluno->id,
                'perfil_id' => array_pop($array),
                'user_id' => array_pop($array_users),
                'tipoUsuario' => 1,
            ]);
        }
        //factory(Gerenciar::class, count(Aluno::all()))->create();
    }
}
