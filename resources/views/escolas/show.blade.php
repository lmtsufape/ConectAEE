@extends('layouts.app')
@section('title', 'Ver instituição')

@section('content')


    <div>
        <h2>
            <strong style="color: #12583C">
                {{ $escola->nome }}
            </strong>
            <div style="font-size: 14px">
                <a href="{{ route('alunos.index') }}">Início</a>
                > <a href="{{ route('escolas.index') }}">Escolas</a>
                > Instituição {{ $escola->nome }}
            </div>
        </h2>
    </div>
    <hr style="border-top: 1px solid #AAA;">

    <h3>
        <strong>
            Dados da Escola:
        </strong>
    </h3>

    <hr style="border-top: 1px solid black;">

    <div class="ps-2">
        <p><strong>Código MEC: </strong>{{ $escola->codigo_mec }}</p>
        <p><strong>Nome: </strong>{{ $escola->nome }}</p>
        <p><strong>Telefone: </strong>{{ $escola->telefone }}</p>
        <p><strong>Email: </strong>{{ $escola->email }}</p>
    </div>

    <hr style="border-top: 1px solid black;">
    <h4>Endereço</h4>
    <div class="ps-2">
        <p><strong>Município: </strong>{{ $escola->endereco->municipio->nome }}</p>
        <p><strong>Logradouro: </strong>{{ $escola->endereco->logradouro }}</p>
        <p><strong>Número: </strong>{{ $escola->endereco->numero }}</p>
        <p><strong>Bairro: </strong>{{ $escola->endereco->bairro }}</p>
        <p><strong>Cep: </strong>{{ $escola->endereco->cep }}</p>
    </div>

    <div class="text-center">
        <a class="btn btn-secondary" href="javascript:history.back()">
            Voltar
        </a>
    </div>

@endsection
