<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'name' => "Guilherme Silva",
            'username' => "Gui",
            'email' => "guilherme.dna06@gmail.com",
            'password' => bcrypt("password"),
            'cpf' => "106.981.574-45",
        ]);

        factory(User::class)->create([
            'name' => "Edgar Vinicius",
            'username' => "Edgar",
            'email' => "adgar.carvalho@hotmail.com",
            'password' => bcrypt("password"),
            'cpf' => "106.981.514-45",
        ]);

        factory(User::class)->create([
            'name' => "Igor",
            'username' => "igor",
            'email' => "igor@gmail.com",
            'cpf' => "106.981.524-45",
        ]);

        //factory(User::class, 45)->create();
    }
}
