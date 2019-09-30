@extends('layouts.principal')
@section('title','Recuperar Senha')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Recuperação de Senha</div>

        <div class="panel-body">
          @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif

          <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <label for="email" class="col-md-4 control-label">E-Mail</label>

              <div class="col-md-6">
                <input id="email" class="form-control" name="email" value="{{ old('email') }}">

                @if ($errors->has('email'))
                  <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                  Enviar e-mail para recuperação de senha
                </button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
