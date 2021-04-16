@extends('layouts.principal')
@section('title','Ver instituição')
@section('navbar')
@endsection

@section('content')
<div class="container" style="color: #12583C">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default" style="margin-top: -20px; padding: 10px 20px;" id="login-card">

        <div class="panel-heading" id="login-card">
          <div class="row" style="margin-bottom: -20px" id="login-card">

            <div class="col-md-6" id="login-card">
              <h2>
                <strong style="color: #12583C">
                  {{$instituicao->nome}}
                </strong>
              <div style="font-size: 14px" id="login-card">
                <a href="{{route('aluno.listar')}}">Início</a>
                > <a href="{{route('instituicao.listar')}}">Instituições</a>
                > Instituição {{$instituicao->nome}}
              </div>
              </h2>
            </div>
          </div>
          <hr style="border-top: 1px solid #AAA;">
        </div>

        <div class="panel-body" style="margin-top: -30px" id="login-card">
          <div class="col-md-8 col-md-offset-2" id="login-card">
            <h3>
              <strong>
                Dados Institucionais:
              </strong>
            </h3>

            <hr style="border-top: 1px solid #AAA;">

            <strong>Nome: </strong>{{$instituicao->nome}}
            <br>
            <strong>Telefone: </strong>{{$instituicao->telefone}}
            <br>
            <strong>Email: </strong>{{$instituicao->email}}

            <h3>
              <strong>
                Endereço:
              </strong>
            </h3>

            <hr style="border-top: 1px solid #AAA;">

            <div class="col-md-6" style="padding:0px" id="login-card">
              <strong>Cep: </strong>{{$instituicao->endereco->cep}}
              <br>
              <strong>Rua: </strong>{{$instituicao->endereco->rua}}
              <br>
              <strong>Bairro: </strong>{{$instituicao->endereco->bairro}}
              <br>
              <strong>Cidade: </strong>{{$instituicao->endereco->cidade}}
              <br>
              <strong>Estado: </strong>{{$instituicao->endereco->estado}}
            </div>

            <div class="col-md-6" style="padding: 0px" id="login-card">
              <strong>Número: </strong>{{$instituicao->endereco->numero}}
            </div>

          </div>
        </div>

        <div class="panel-footer" style="background-color:white" id="login-card">
          <div class="text-center" id="login-card">
            <a class="btn btn-secondary" href="{{route('instituicao.listar')}}" id="menu-a">
              Voltar
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
