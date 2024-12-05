@extends('layouts.app')
@section('title', 'Recuperar Senha')
@section('content')



    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
<div class="container">
  
      <h2>
          <strong>
              Recuperação de Senha
          </strong>
      </h2>
  
  
      <div>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="form-label">E-mail <font color="red">*</font> </label>
                <div class="col-md-11">
                    <input class="form-control" id="email" name="email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="d-flex justify-content-center gap-4 m-3">
                <a class="btn btn-secondary w-25" href="{{ route('login') }}">
                    Voltar
                </a>
                <button type="submit" class="btn btn-success w-25">
                    Enviar e-mail
                </button>
            </div>
        </form>
      </div>
</div>

@endsection
