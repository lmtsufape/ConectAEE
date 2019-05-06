@extends('layouts.principal')
@section('title','Início')
@section('path','Início')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Nova Atividade</div>

          <div class="panel-body">
              <form class="form-horizontal" method="POST" action="{{ route("objetivo.sugestoes.criar") }}">
                  {{ csrf_field() }}

                  <input id="id_aluno" type="hidden" class="form-control" name="id_aluno" value="{{ $aluno->id }}">
                  <input id="id_objetivo" type="hidden" class="form-control" name="id_objetivo" value="{{ $objetivo->id }}">

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
                          <textarea id="descricao" rows = "5" cols = "50" class="form-control" name="descricao" value="{{ old('descricao') }}" autofocus></textarea>

                          @if ($errors->has('descricao'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('descricao') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <div class="form-group">
                      <div class="col-md-6 col-md-offset-4">
                          <a class="btn btn-danger" href="{{URL::previous()}}">Voltar</a>
                          <button type="submit" class="btn btn-success">
                              Cadastrar
                          </button>
                      </div>
                  </div>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
