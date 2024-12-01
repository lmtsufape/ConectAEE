<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
            'nome' => "Administrador",
            'email' => "admin@gmail.com",
            'matricula' => 123456,
            'telefone' => '1233455654',
            'password' => bcrypt("password"),
            'cpf' => "106.981.574-45",
            'flag_ativo' => true,
        ])->roles()->attach(1);


        $user2 = User::create([
            'nome' => "Professor",
            'email' => "professor@gmail.com",
            'matricula' => 123896,
            'telefone' => '1233455654',
            'password' => bcrypt("password"),
            'cpf' => "007.982.270-36",
            'flag_ativo' => true,
        ]);
        $user2->roles()->attach(2);
        $user2->escolas()->attach(5);

        $user3 = User::create([
            'nome' => "Professor2",
            'email' => "professor2@gmail.com",
            'matricula' => 1238926,
            'telefone' => '12332455654',
            'password' => bcrypt("password"),
            'cpf' => "426.886.970-05",
            'flag_ativo' => true,
        ]);
        $user3->roles()->attach(2);

        $user3->escolas()->attach(8);

    }
}
