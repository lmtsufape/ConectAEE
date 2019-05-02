@extends('layouts.principal')
@section('title','Início')
@section('path','Início')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
              <div class="panel-heading">Início</div>
              <div class="panel-body">
                <div class="form-group">
                  <strong>Nome:</strong> {{$aluno->nome}}
                  <br><br>
                  @if(App\Gerenciar::where('user_id','=',\Auth::user()->id)->where('aluno_id','=',$aluno->id)->first()->isAdministrador == true)
                    <a class="btn btn-primary" href={{route('aluno.permissoes',['id'=>$aluno->id])}}>Gerenciar Permissões</a>
                  @endif
                  <a class="btn btn-danger" href="{{URL::previous()}}">Voltar</a>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
@endsection
