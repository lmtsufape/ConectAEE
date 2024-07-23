<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Aluno;
use App\Models\ForumAluno;

class ForumAlunoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alunos = Aluno::all();
        
        foreach ($alunos as $aluno) {
            factory(ForumAluno::class)->create([
                'aluno_id' => $aluno->id,
            ]);
        }
    }
}
