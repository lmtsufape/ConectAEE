@extends('layouts.principal')

@section('content')
<div class="card">
  <div class="card-header">{{ __('Verifique seu email') }}</div>

  <div class="card-body">
    @if (session('resent'))
    <div class="alert alert-success" role="alert">
      {{ __('Um link de verificação foi enviado para o seu email.') }}
    </div>
    @endif

    {{ __('Antes de prosseguir, por favor cheque por um link de verificação no seu email.') }}
    {{ __('Se você não recebeu o email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
  </div>
</div>
@endsection
