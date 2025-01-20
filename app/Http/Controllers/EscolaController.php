<?php

namespace App\Http\Controllers;

use App\Http\Requests\escolas\StoreEscolaRequest;
use App\Http\Requests\escolas\UpdateEscolaRequest;
use App\Models\Endereco;
use App\Models\Escola;
use App\Models\Gre;
use App\Models\Municipio;
use ConsoleTVs\Charts\Classes\C3\Chart;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class EscolaController extends Controller
{
    public function index(Request $request){
        $escolas = QueryBuilder::for(Escola::class)
        ->allowedFilters([
            AllowedFilter::exact('gre_id','municipio.gres.id'),
            AllowedFilter::exact('municipio_id'), 
        ]) 
        ->defaultSort('nome')      
        ->paginate(10)->appends(request()->query());
        $gres = Gre::all();
        $municipios = Municipio::all();
        
        return view('escolas.index', compact('escolas', 'gres', 'municipios'));
    }

    public function show($escola_id){
        $escola = Escola::find($escola_id);

        return view('escolas.show', compact('escola'));
    }

    public function create(){
        $municipios = Municipio::all();

        return view('escolas.create', compact('municipios'));
    }

    public function store(StoreEscolaRequest $request){
        $endereco = Endereco::create($request->only(['logradouro', 'numero', 'bairro', 'cep', 'municipio_id']));
        $escola = Escola::create($request->only(['codigo_mec', 'nome', 'telefone', 'email', 'municipio_id']) + ['endereco_id' => $endereco->id]);

        return redirect()->route('escolas.index')->with('success', 'Escola Criada com Sucesso!');
    }

    public function edit($escola_id){
        $escola = Escola::find($escola_id);
        $municipios = Municipio::orderBy('nome')->get();

        return view('escolas.edit', compact('escola', 'municipios'));
    }

    public function update(UpdateEscolaRequest $request, $escola_id){
        $escola = Escola::findOrFail($escola_id);

        $escola->update($request->only(['codigo_mec', 'nome', 'telefone', 'email', 'municipio_id']));
        $escola->endereco->update($request->only(['logradouro', 'numero', 'bairro', 'cep', 'municipio_id']));
        
        return redirect()->route('escolas.index')->with('success','Escola Atualizada com Sucesso!');
    }

    public function destroy($escola_id){
        $escola = Escola::findOrFail($escola_id);
        $escola->delete();

        return redirect()->route('escolas.index')->with('success', 'Escola deletada com sucesso!');
    }
}
