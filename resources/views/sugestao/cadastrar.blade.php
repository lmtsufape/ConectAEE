@extends('layouts.principal')
@section('title','Cadastrar sugestão')
@section('navbar')
@endsection
@section('content')
<div class="container" style="color: #12583C">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default" style="margin-top: -20px; padding: 10px 20px;" id="login-card">
        <div class="panel-heading" id="login-card">
          <h2>
            <strong style="color: #12583C">
              Nova Sugestão
            </strong>
            <div style="font-size: 14px" id="login-card">
              <a href="{{route('aluno.listar')}}">Início</a>
              > <a href="{{route('aluno.gerenciar',$aluno->id)}}">Perfil de <strong>{{ explode(" ", $aluno->nome)[0]}}</strong></a>
              > <a href="{{route('objetivo.listar',$aluno->id)}}">Objetivos</a>
              > <a href="{{route('objetivo.gerenciar',[$objetivo->id])}}"><strong>{{$objetivo->titulo}}</strong></a>
              > Nova Sugestão
            </div>
          </h2>

          <hr style="border-top: 1px solid black;">
        </div>

        <div class="panel-body panel-body-cadastro" id="login-card">
          <div class="col-md-8 col-md-offset-2" id="login-card">
            <form method="POST" action="{{ route("sugestoes.criar") }}">
              {{ csrf_field() }}

              <input type="hidden" name="id_aluno" value="{{ $aluno->id }}">
              <input type="hidden" name="id_objetivo" value="{{ $objetivo->id }}">

              <div class="form-group{{ $errors->has('titulo') ? ' has-error' : '' }}" id="login-card">
                <label for="titulo" class="col-md-12 control-label">Título <font color="red">*</font></label>

                <div class="col-md-12" id="login-card">
                  <input id="titulo" type="text" class="form-control" name="titulo" value="{{ old('titulo') }}" autofocus>

                  @if ($errors->has('titulo'))
                  <span class="help-block">
                    <strong>{{ $errors->first('titulo') }}</strong>
                  </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('descricao') ? ' has-error' : '' }}" id="login-card">
                <label for="descricao" class="col-md-12 control-label">Descrição</label>

                <div class="col-md-12" id="login-card">
                  <textarea id="descricao" rows = "5" cols = "50" class="form-control" name="descricao">{{ old('descricao') }}</textarea>

                  @if ($errors->has('descricao'))
                  <span class="help-block">
                    <strong>{{ $errors->first('descricao') }}</strong>
                  </span>
                  @endif
                </div>
              </div>

              <div class="form-group" id="login-card">
                <div class="row col-md-12 text-center" id="login-card">
                  <br>
                  <a class="btn btn-secondary" href="{{route('objetivo.gerenciar',[$objetivo->id])}}" id="menu-a">
                    Voltar
                  </a>
                  <button type="submit" class="btn btn-primary">
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
