<?php

namespace Database\Seeders;

use App\Models\Gre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lista_escolas = database_path("seeders/ListaDeEscolas.csv");

        if (($handle = fopen($lista_escolas, 'r')) !== false) {
            $first_linha = fgetcsv($handle);

          
            while (($linha = fgetcsv($handle)) !== false) {
                $data = array_combine($first_linha, $linha);

                Gre::firstOrCreate(['nome' => $data['Gre']]);
            }

            fclose($handle);
        }
    }
}
