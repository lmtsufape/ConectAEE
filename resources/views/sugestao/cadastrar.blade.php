@extends('layouts.principal')
@section('title','Cadastrar sugestão')
@section('navbar')
<a href="{{route('aluno.listar')}}">Início</a>
> <a href="{{route('aluno.gerenciar',$aluno->id)}}">Gerenciar: <strong>{{$aluno->nome}}</strong></a>
> <a href="{{route('objetivo.listar',$aluno->id)}}">Objetivos</a>
> <a href="{{route('objetivo.gerenciar',[$aluno->id,$objetivo->id])}}"><strong>{{$objetivo->titulo}}</strong></a>
> <a href="{{route('sugestoes.listar',[$aluno->id,$objetivo->id])}}">Sugestões</a>
> Nova
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Nova Atividade</div>

        <div class="panel-body">
          <form class="form-horizontal" method="POST" action="{{ route("sugestoes.criar") }}">
            {{ csrf_field() }}

            <input type="hidden" name="id_aluno" value="{{ $aluno->id }}">
            <input type="hidden" name="id_objetivo" value="{{ $objetivo->id }}">

            <div class="form-group{{ $errors->has('titulo') ? ' has-error' : '' }}">
              <label for="titulo" class="col-md-4 control-label">Título</label>

              <div class="col-md-6">
                <input id="titulo" type="text" class="form-control" name="titulo" value="{{ old('titulo') }}" autofocus>

                @if ($errors->has('titulo'))
                <span class="help-block">
                  <strong>{{ $errors->first('titulo') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('descricao') ? ' has-error' : '' }}">
              <label for="descricao" class="col-md-4 control-label">Descrição</label>

              <div class="col-md-6">
                <textarea id="descricao" rows = "5" cols = "50" class="form-control" name="descricao">{{ old('descricao') }}</textarea>

                @if ($errors->has('descricao'))
                <span class="help-block">
                  <strong>{{ $errors->first('descricao') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-success">
                  Cadastrar
                </button>
              </div>
            </div>
          </form>
        </div>

        <div class="panel-footer">
          <a class="btn btn-danger" href="{{URL::previous()}}">Voltar</a>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection
