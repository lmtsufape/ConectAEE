<?php

namespace Database\Seeders;

use App\Models\Escola;
use App\Models\Municipio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EscolaSeeder extends Seeder
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

                Escola::firstOrCreate(['codigo_mec' => $data['Cod Mec'], 'nome' => $data['Escola'], 'municipio_id' => Municipio::where('nome', $data['Município'])->value('id')]);
            }

            fclose($handle);
        }
    }
}
