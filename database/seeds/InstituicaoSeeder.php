<?php

use Illuminate\Database\Seeder;
use App\Instituicao;

class InstituicaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Instituicao::class, 2)->create();
    }
}
