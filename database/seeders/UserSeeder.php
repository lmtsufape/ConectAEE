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
        User::create([
            'nome' => "Administrador",
            'email' => "admin@gmail.com",
            'matricula' => 123456,
            'telefone' => '1233455654',
            'password' => bcrypt("password"),
            'cpf' => "106.981.574-45",
            'ativo' => true,
        ])->roles()->attach(1);

        User::create([
            'nome' => "Professor",
            'email' => "professor@gmail.com",
            'matricula' => 123896,
            'telefone' => '1233455654',
            'password' => bcrypt("password"),
            'cpf' => "007.982.270-36",
            'ativo' => true,
        ])->roles()->attach(2);;

        User::create([
            'nome' => "Professor2",
            'email' => "professor2@gmail.com",
            'matricula' => 1238926,
            'telefone' => '12332455654',
            'password' => bcrypt("password"),
            'cpf' => "426.886.970-05",
            'ativo' => true,
        ])->roles()->attach(2);;
    }
}
