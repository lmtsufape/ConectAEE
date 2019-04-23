@extends('layouts.principal')
@section('title','Início')
@section('path','Início')
@section('content')
    <div class="panel panel-default">
          <div class="panel-heading">Novo Aluno</div>

          <div class="panel-body">
              <form class="form-horizontal" method="POST" action="{{ route("aluno.criar") }}">
                  {{ csrf_field() }}

                  <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                      <label for="nome" class="col-md-4 control-label">Nome</label>

                      <div class="col-md-6">
                          <input id="nome" type="text" class="form-control" name="nome" value="{{ old('nome') }}" autofocus>

                          @if ($errors->has('nome'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('nome') }}</strong>
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
@endsection
