@extends('layouts.app')
@section('title','Recuperar Senha')
@section('content')



  <div class="panel panel-default col-md-6 col-md-offset-3 sombra" id="login-card">
    <div class="panel-heading text-center" id="login-card">
      <h2>
        <strong>
          Recuperação de Senha
        </strong>
      </h2>
    </div>

    <div class="panel-body" style="margin-top: -30px" id="login-card">
      @if (session('status'))
        <div class="alert alert-success" role="alert" id="login-card">
          {{ session('status') }}
        </div>
      @endif

      <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" id="login-card">
          <label for="email" class="col-md-12 control-label">E-mail <font color="red">*</font> </label>

          <div class="col-md-12" id="login-card">
            <input id="email" class="form-control" name="email" value="{{ old('email') }}">

            @if ($errors->has('email'))
              <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
              </span>
            @endif
          </div>
        </div>

        <div class="form-group" id="login-card">
          <div class="col-md-12 text-center" style="padding-top:20px;" id="login-card">
            <a class="btn btn-secondary" href="{{ route('login') }}" id="menu-a">
              Voltar
            </a>
            <button style="width:auto;" type="submit" class="btn btn-primary">
              Enviar e-mail
            </button>
          </div>
        </div>

      </form>
    </div>
  </div>

</div>

@endsection
