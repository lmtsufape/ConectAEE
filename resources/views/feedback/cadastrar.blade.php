@extends('layouts.principal')
@section('title','Cadastrar feedback')
@php($aluno = $sugestao->objetivo->aluno)
@php($objetivo = $sugestao->objetivo)

@section('navbar')
<a href="{{route('aluno.listar')}}">Início</a>
> <a href="{{route('aluno.gerenciar',$aluno->id)}}">Gerenciar: <strong>{{$aluno->nome}}</strong></a>
> <a href="{{route('objetivo.listar',$aluno->id)}}">Objetivos</a>
> <a href="{{route('objetivo.gerenciar',[$objetivo->id])}}"><strong>{{$objetivo->titulo}}</strong></a>
> <a href="{{route('sugestoes.listar',[$objetivo->id])}}">Sugestões</a>
> <a href="{{route('feedbacks.listar',[$sugestao->id])}}">Feedbacks</a>
> Novo
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Feedbacks de <strong>{{$sugestao->titulo}}</strong></div>

        <div class="panel-body">
          <form class="form-horizontal" method="POST" action="{{ route("feedbacks.criar") }}">
            {{ csrf_field() }}

            <input id="id_aluno" type="hidden" class="form-control" name="id_aluno" value="{{ $aluno->id }}">
            <input id="id_objetivo" type="hidden" class="form-control" name="id_objetivo" value="{{ $objetivo->id }}">
            <input id="id_sugestao" type="hidden" class="form-control" name="id_sugestao" value="{{ $sugestao->id }}">

            <div class="form-group{{ $errors->has('feedback') ? ' has-error' : '' }}">
              <label for="feedback" class="col-md-4 control-label">Feedback <font color="red">*</font> </label>

              <div class="col-md-6">
                <textarea name="feedback" class="form-control" placeholder="Informe seu feedback."></textarea>

                @if ($errors->has('feedback'))
                <span class="help-block">
                  <strong>{{ $errors->first('feedback') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <input value="Enviar" type="submit" class="btn btn-success">
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
