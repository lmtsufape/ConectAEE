@extends('layouts.principal')
@section('title','Início')
@section('path','Início')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Início</div>
        <div class="panel-body">
          <div class="form-group">
            <strong>Nome:</strong> {{$aluno->nome}}
            <br><br>
            <a class="btn btn-primary" href={{route('aluno.permissoes',['id'=>$aluno->id])}}>Gerenciar Permissões</a>
            <a class="btn btn-danger" href="{{URL::previous()}}">Voltar</a>
          </div>
        </div>
    </div>
@endsection
