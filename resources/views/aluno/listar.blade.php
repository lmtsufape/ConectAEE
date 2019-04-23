@extends('layouts.principal')
@section('title','Início')
@section('path','Início')
@section('content')
    <div class="panel panel-default">
          <div class="panel-heading">Listar</div>

          <div class="panel-body">
              @foreach($alunos as $aluno)
                {{$aluno->nome}}<br>
              @endforeach
          </div>

          <a href="{{route('aluno.cadastrar')}}">Cadastrar</a>
        </div>
@endsection
