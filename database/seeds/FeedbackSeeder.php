<?php

use Illuminate\Database\Seeder;
use App\Objetivo;
use App\Feedback;

class FeedbackSeeder extends Seeder
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
            $gerenciars = $objetivo->aluno->gerenciars;
            foreach($gerenciars as $gerenciar){
                factory(Feedback::class)->create([
                    'user_id' => $gerenciar->user->id,
                    'objetivo_id' => $objetivo->id,
                ]);
            }
        }
    }
}
