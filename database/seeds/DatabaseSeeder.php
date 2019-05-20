<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(CargoSeeder::class);
        $this->call(AlunoSeeder::class);
        $this->call(GerenciarSeeder::class);
        $this->call(ForumAlunoSeeder::class);
        $this->call(MensagemForumAlunoSeeder::class);
        $this->call(TipoObjetivoSeeder::class);
        $this->call(ObjetivoSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(StatusObjetivoSeeder::class);
        $this->call(AtividadeSeeder::class);
        $this->call(SugestaoSeeder::class);
        $this->call(ForumObjetivoSeeder::class);
        $this->call(MensagemForumObjetivoSeeder::class);
        $this->call(InstituicaoSeeder::class);
    }
}
