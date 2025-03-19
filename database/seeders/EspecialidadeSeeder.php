<?php

namespace Database\Seeders;

use App\Models\Especialidade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EspecialidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Especialidade::insert([
            ['nome' => 'Professor do AEE'], 
            ['nome' => 'Professor Brailista'], 
            ['nome' => 'Professor Intérprete de Libras'], 
            ['nome' => 'Professor Instrutor de Libras']
        ]);
    }
}