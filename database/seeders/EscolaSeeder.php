<?php

namespace Database\Seeders;

use App\Models\Escola;
use App\Models\Gre;
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

                $escola = Escola::firstOrCreate(['codigo_mec' => $data['Cod Mec'], 'nome' => $data['Escola'],'endereco_id' => 1]);
                $escola->municipio()->attach( Municipio::where('nome', $data['Município'])->value('id'), ['gre_id' => Gre::where('nome', $data['Gre'])->value('id')]);
            }

            fclose($handle);
        }
    }
}
