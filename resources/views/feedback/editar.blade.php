@extends('layouts.principal')
@section('title','Editar feedback')
@section('navbar')
<a href="{{route('aluno.listar')}}">Início</a>
> <a href="{{route('aluno.gerenciar',$aluno->id)}}">Gerenciar: <strong>{{$aluno->nome}}</strong></a>
> <a href="{{route('objetivo.listar',$aluno->id)}}">Objetivos</a>
> <a href="{{route('objetivo.gerenciar',[$objetivo->id])}}"><strong>{{$objetivo->titulo}}</strong></a>
> <a href="{{route('sugestoes.listar',[$objetivo->id])}}">Sugestões</a>
> <a href="{{route('feedbacks.listar',[$sugestao->id])}}">Feedbacks</a>
> Editar
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Editar Feedback</div>

        <div class="panel-body">
          <form class="form-horizontal" method="POST" action="{{ route("feedback.atualizar") }}">
            {{ csrf_field() }}

            <input type="hidden" name="id_aluno" value="{{ $aluno->id }}">
            <input type="hidden" name="id_objetivo" value="{{ $objetivo->id }}">
            <input type="hidden" name="id_sugestao" value="{{ $sugestao->id }}">
            <input type="hidden" name="id_feedback" value="{{ $feedback->id }}">

            <div class="form-group{{ $errors->has('feedback') ? ' has-error' : '' }}">
              <label for="feedback" class="col-md-4 control-label">Feedback <font color="red">*</font></label>

              <div class="col-md-6">

                @if(old('feedback',NULL) != NULL)
                <textarea id="feedback" rows = "5" cols = "50" class="form-control" name="feedback">{{ old('feedback') }}</textarea>
                @else
                <textarea id="feedback" rows = "5" cols = "50" class="form-control" name="feedback">{{ $feedback->texto }}</textarea>
                @endif

                @if ($errors->has('feedback'))
                <span class="help-block">
                  <strong>{{ $errors->first('feedback') }}</strong>
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
