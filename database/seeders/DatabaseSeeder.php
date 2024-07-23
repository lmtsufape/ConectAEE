<?php

namespace Database\Seeders;

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
        $this->call(UserSeeder::class);

        //Não comentar
        $this->call(PerfilSeeder::class);

        //Comentar
        $this->call(EnderecoSeeder::class);
        $this->call(AlunoSeeder::class);
        $this->call(InstituicaoSeeder::class);
        $this->call(AlunoInstituicaoSeeder::class);
        $this->call(GerenciarSeeder::class);
        $this->call(ForumAlunoSeeder::class);
        $this->call(MensagemForumAlunoSeeder::class);

        //Não comentar
        $this->call(TipoObjetivoSeeder::class);
        $this->call(CorSeeder::class);

        //Comentar
        $this->call(ObjetivoSeeder::class);

        //Não comentar
        $this->call(StatusSeeder::class);
        $this->call(StatusObjetivoSeeder::class);

        //Comentar
        $this->call(AtividadeSeeder::class);
        $this->call(SugestaoSeeder::class);
        $this->call(ForumObjetivoSeeder::class);
        $this->call(MensagemForumObjetivoSeeder::class);
        $this->call(FeedbackSeeder::class);
        $this->call(NotificacaoSeeder::class);
    }
}
