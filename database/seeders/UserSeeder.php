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
        factory(User::class)->create([
            'name' => "Administrador",
            'username' => "Gui",
            'email' => "admin@gmail.com",
            'password' => bcrypt("password"),
            'cpf' => "106.981.574-45",
        ]);

        factory(User::class)->create([
            'name' => "Professor AEE",
            'username' => "Edgar",
            'email' => "professoraee@gmail.com",
            'password' => bcrypt("password"),
            'cpf' => "106.981.514-45",
        ]);
    }
}
