<?php

namespace Database\Seeders;

use App\Models\Gre;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(){

        //Comentar
        $this->call(EspecialidadeSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(GreSeeder::class);
        $this->call(MunicipioSeeder::class);
        $this->call(EscolaSeeder::class);
        $this->call(UserSeeder::class);


        //Comentar
        $this->call(EnderecoSeeder::class);
        $this->call(AlunoSeeder::class);
        // $this->call(MensagemForumAlunoSeeder::class);

        //Não comentar
        $this->call(TipoObjetivoSeeder::class);
        $this->call(CorSeeder::class);

        //Comentar
        // $this->call(ObjetivoSeeder::class);

        //Comentar
        $this->call(AtividadeSeeder::class);
        $this->call(FeedbackSeeder::class);
    }
}
