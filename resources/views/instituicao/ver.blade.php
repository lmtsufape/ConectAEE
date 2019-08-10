@extends('layouts.principal')
@section('title','Gerenciar atividade')
@section('navbar')
<a href="{{route('aluno.listar')}}">Início</a>
> Instituição
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-heading">
          Instituicao: <strong>{{$instituicao->nome}}</strong>
        </div>

        <div class="panel-body">
          <div class="row">
            <div class="col-md-6">
              <font size="4" class="row">
                Dados Instituicionais:
              </font>

              <br>
              <strong>Nome: </strong>{{$instituicao->nome}}
              <br><br>
              <strong>Telefone: </strong>{{$instituicao->telefone}}
              <br><br>
              <strong>Email: </strong>{{$instituicao->email}}
            </div>

            <div class="col-md-6">
              <font size="4" class="row">
                Endereço:
              </font>

              <br>
              <strong>Logradouro: </strong>{{$instituicao->endereco->logradouro}}
              <br>
              <strong>Número: </strong>{{$instituicao->endereco->numero}}
              <br>
              <strong>Bairro: </strong>{{$instituicao->endereco->bairro}}
              <br>
              <strong>Cidade: </strong>{{$instituicao->endereco->cidade}}
              <br>
              <strong>Estado: </strong>{{$instituicao->endereco->estado}}
            </div>
          </div>

        </div>

        <div class="panel-footer">
          <a class="btn btn-danger" href="{{URL::previous()}}">
            <i class="material-icons">keyboard_backspace</i>
            <br>
            Voltar
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
