<?php

namespace Database\Seeders;

use App\Models\Gre;
use App\Models\Municipio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MunicipioSeeder extends Seeder
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

                $municipio = Municipio::firstOrCreate(['nome' => $data['Município']]);
            }

            fclose($handle);
        }
    }
}
