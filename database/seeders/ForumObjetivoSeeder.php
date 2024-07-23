<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Objetivo;
use App\Models\ForumObjetivo;

class ForumObjetivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objetivos = Objetivo::all();
        
        foreach ($objetivos as $objetivo) {
            factory(ForumObjetivo::class)->create([
                'objetivo_id' => $objetivo->id,
            ]);
        }
    }
}
