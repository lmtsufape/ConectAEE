<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class)->create([
            'name' => "Mariel",
            'username' => "mariel",
            'telefone' => "(81) 91111-1111",
        ]);

        factory(\App\User::class)->create([
            'name' => "Igor",
            'username' => "igor",
            'telefone' => "(81) 91111-1111",
        ]);
        
        factory(\App\User::class)->create([
            'name' => "Anderson",
            'username' => "anderson",
            'telefone' => "(81) 91111-1111",
        ]);

        factory(\App\User::class)->create([
            'name' => "Eberson",
            'username' => "bersin",
            'telefone' => "(81) 91111-1111",
        ]);

        factory(\App\User::class)->create([
            'name' => "Adelino",
            'username' => "adelino",
            'telefone' => "(81) 91111-1111",
        ]);

        factory(\App\User::class, 45)->create();
    }
}