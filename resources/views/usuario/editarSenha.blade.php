@extends('layouts.principal')
@section('title','Alterar Senha')
@section('path','Início')
@section('navbar')
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default" style="margin-top: -20px; padding: 10px 20px;" id="login-card">
        <div class="panel-heading" id="login-card">
          <h2>
            <strong>
              Alterar Senha
            </strong>
            <div style="font-size: 14px" id="login-card">
              <a href="{{ route("home") }}">Início</a> >
              <a href="{{ route("usuario.editar") }}">Meus Dados</a> >
              Alterar Senha
            </div>
          </h2>

          <hr style="border-top: 1px solid black;">
        </div>

        <div class="panel-body" id="login-card">
          @if (\Session::has('success'))
            <div class="alert alert-success" id="login-card">
              <strong>Sucesso!</strong>
              {!! \Session::get('success') !!}
            </div>
          @elseif (\Session::has('fail'))
            <div class="alert alert-danger" id="login-card">
              <strong>Erro!</strong>
              {!! \Session::get('fail') !!}
            </div>
          @endif

          <div class="col-md-8 col-md-offset-2" id="login-card">
            <form method="POST" action="{{ route('usuario.atualizarSenha') }}">
              {{ csrf_field() }}

              <div class="form-group{{ $errors->has('senha_atual') ? ' has-error' : '' }}" id="login-card">
                <label for="senha_atual" class="col-md-12 control-label">Senha atual <font color="red">*</font> </label>

                <div class="col-md-12" id="login-card">
                  <input id="senha_atual" type="password" class="form-control" name="senha_atual" value="{{ old('senha_atual') }}">

                  @if ($errors->has('senha_atual'))
                  <span class="help-block">
                    <strong>{{ $errors->first('senha_atual') }}</strong>
                  </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('nova_senha') ? ' has-error' : '' }}" id="login-card">
                <label for="nova_senha" class="col-md-12 control-label">Nova senha <font color="red">*</font> </label>

                <div class="col-md-12" id="login-card">
                  <input id="nova_senha" type="password" class="form-control" name="nova_senha" value="{{ old('nova_senha') }}">

                  @if ($errors->has('nova_senha'))
                  <span class="help-block">
                    <strong>{{ $errors->first('nova_senha') }}</strong>
                  </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('nova_senha_confirm') ? ' has-error' : '' }}" id="login-card">
                <label for="nova_senha_confirm" class="col-md-12 control-label">Confirme nova senha <font color="red">*</font> </label>

                <div class="col-md-12" id="login-card">
                  <input id="nova_senha_confirm" type="password" class="form-control" name="nova_senha_confirm" value="{{ old('nova_senha_confirm') }}">

                  @if ($errors->has('nova_senha_confirm'))
                  <span class="help-block">
                    <strong>{{ $errors->first('nova_senha_confirm') }}</strong>
                  </span>
                  @endif
                </div>
              </div>

              <div class="form-group" id="login-card">
                <div class="row col-md-12 text-center" id="login-card">
                  <br>
                  <a class="btn btn-secondary" href="{{ route("usuario.editar") }}" id="menu-a">
                    Voltar
                  </a>
                  <button type="submit" class="btn btn-primary">
                    Atualizar
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
