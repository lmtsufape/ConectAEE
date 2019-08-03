@extends('layouts.principal')
@section('title','Editar sugestão')
@section('navbar')
<a href="{{route('aluno.listar')}}">Início</a>
> <a href="{{route('aluno.gerenciar',$aluno->id)}}">Gerenciar: <strong>{{$aluno->nome}}</strong></a>
> <a href="{{route('objetivo.listar',$aluno->id)}}">Objetivos</a>
> <a href="{{route('objetivo.gerenciar',[$objetivo->id])}}"><strong>{{$objetivo->titulo}}</strong></a>
> <a href="{{route('sugestoes.listar',[$objetivo->id])}}">Sugestões</a>
> Editar: {{$sugestao->titulo}}
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Editar Sugestao</div>

        <div class="panel-body">
          <form class="form-horizontal" method="POST" action="{{ route("objetivo.sugestao.atualizar") }}">
            {{ csrf_field() }}

            <input type="hidden" name="id_aluno" value="{{ $aluno->id }}">
            <input type="hidden" name="id_objetivo" value="{{ $objetivo->id }}">
            <input type="hidden" name="id_sugestao" value="{{ $sugestao->id }}">

            <div class="form-group{{ $errors->has('titulo') ? ' has-error' : '' }}">
              <label for="titulo" class="col-md-4 control-label">Título <font color="red">*</font> </label>

              <div class="col-md-6">
                @if(old('titulo',NULL) != NULL)
                <input id="titulo" type="text" class="form-control" name="titulo" value="{{ old('titulo') }}" autofocus>
                @else
                <input id="titulo" type="text" class="form-control" name="titulo" value="{{ $sugestao->titulo }}" autofocus>
                @endif

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

                @if(old('descricao',NULL) != NULL)
                <textarea id="descricao" rows = "5" cols = "50" class="form-control" name="descricao">{{ old('descricao') }}</textarea>
                @else
                <textarea id="descricao" rows = "5" cols = "50" class="form-control" name="descricao">{{ $sugestao->descricao }}</textarea>
                @endif

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
                  Atualizar
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
