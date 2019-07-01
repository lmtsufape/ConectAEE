<?php

namespace App\Http\Controllers;

use App\Endereco;
use App\Instituicao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InstituicaoController extends Controller
{
  public function cadastrar(){
      $estados = ['AC','AL','AP','AM','BA','CE','DF','ES','GO','MA','MT','MS','MG','PA',
                  'PB','PR','PE','PI','RJ','RN','RS','RO','RR','SC','SP','SE','TO'];

      return view("instituicao.cadastrar", ['estados' => $estados]);
  }

  public function inserir(){
      $instituicoes = Instituicao::all();

      return view("instituicao.inserir", ['instituicoes' => $instituicoes]);
  }

  public function criar(Request $request){

      $validator = Validator::make($request->all(), [
          'nome' => ['required','min:2','max:191'],
          'email' => ['nullable', 'string', 'email', 'max:255'],
          'telefone' => ['required','numeric'],
          'logradouro' => ['required'],
          'numero' => ['required','numeric'],
          'bairro' => ['required'],
          'cidade' => ['required'],
          'estado' => ['required'],
      ]);

      if($validator->fails()){
          return redirect()->back()->withErrors($validator->errors())->withInput();
      }

      $endereco = new Endereco();
      $endereco->logradouro = $request->logradouro;
      $endereco->numero = $request->numero;
      $endereco->bairro = $request->bairro;
      $endereco->cidade = $request->cidade;
      $endereco->estado = $request->estado;
      $endereco->save();

      $instituicao = new Instituicao();
      $instituicao->nome = $request->nome;
      $instituicao->telefone = $request->telefone;
      $instituicao->email = $request->email;
      $instituicao->endereco_id = $endereco->id;
      $instituicao->save();

      return redirect()->route("aluno.cadastrar",['instituicao' => $instituicao]);
  }
}
