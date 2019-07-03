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
      for ($i=1; $i<=2 ; $i++) {
        factory(Instituicao::class)->create([
            'endereco_id' => $i,
        ]);
      }
    }
}
