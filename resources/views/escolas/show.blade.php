@extends('layouts.app')
@section('title', 'Ver instituição')

@section('content')


  <div>
      <h2>
          <strong style="color: #12583C">
              {{ $instituicao->nome }}
          </strong>
          <div style="font-size: 14px">
              <a href="{{ route('alunos.index') }}">Início</a>
              > <a href="{{ route('instituicao.listar') }}">Instituições</a>
              > Instituição {{ $instituicao->nome }}
          </div>
      </h2>
  </div>
  <hr style="border-top: 1px solid #AAA;">

  <h3>
      <strong>
          Dados Institucionais:
      </strong>
  </h3>

  <hr style="border-top: 1px solid black;">

  <p><strong>Nome: </strong>{{ $instituicao->nome }}</p>
  <p><strong>Telefone: </strong>{{ $instituicao->telefone }}</p>
  <p><strong>Email: </strong>{{ $instituicao->email }}</p>
  <p><strong>CNPJ: </strong>{{ $instituicao->cnpj }}</p>

  <hr style="border-top: 1px solid black;">

  <div>
    <p><strong>Cidade: </strong>{{ $instituicao->endereco->cidade }}</p>
    <p><strong>Estado: </strong>{{ $instituicao->endereco->estado }}</p>
    <p><strong>Logradouro: </strong>{{ $instituicao->endereco->rua }}</p>
    <p><strong>Número: </strong>{{ $instituicao->endereco->numero }}</p>
    <p><strong>Bairro: </strong>{{ $instituicao->endereco->bairro }}</p>
    <p><strong>Cep: </strong>{{ $instituicao->endereco->cep }}</p>
  </div>

  <div class="text-center">
      <a class="btn btn-secondary" href="{{ route('instituicao.listar') }}">
          Voltar
      </a>
  </div>

@endsection
