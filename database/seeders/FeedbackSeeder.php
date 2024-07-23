<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sugestao;
use App\Models\Feedback;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sugestoes = Sugestao::all();
        foreach($sugestoes as $sugestao){
            $gerenciars = $sugestao->objetivo->aluno->gerenciars;
            foreach($gerenciars as $gerenciar){
                if($gerenciar->user->id != $sugestao->user->id){
                  factory(Feedback::class)->create([
                    'user_id' => $gerenciar->user->id,
                    'sugestao_id' => $sugestao->id,
                  ]);
                }
            }
        }
    }
}
