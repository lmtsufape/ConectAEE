@extends('layouts.background_branco')
@section('title','ConectAEE')
@section('content')

<div class="row" style="background-color:#12583C; padding:20px;">
  <br>
  <div class="col-md-7">
    <div class="panel panel-default" style="width:100%;background-color:#12583C; margin:20px;">

      <div class="panel-body col-md-12 texto">
        <h1> <strong>ConectAEE</strong> </h1>
        <p class="text-align-left">
          É um sistema pensado para que a educação inclusiva seja uma realidade nas escolas e
          instituições de ensino do Brasil e que dá suporte ao acompanhamento de alunos
          que necessitam de Atendimento Educacional Especializado (AEE), permitindo uma maior
          integração entre escola, família e profissionais da Saúde, uma vez que a troca de informações
          entre cada um desses indivíduos é indispensável.
        </p>
      </div>

    </div>
  </div>

  <div class="col-md-4">
    <div class="panel panel-default" id="login-card-container" style="padding-top:10px; box-shadow: 4px 4px 4px 4px #12443C" >
      <div class="text-center" style="height:15px;" id="login-card">
        <h2>
          <strong style="color: #12583C">
            Entrar
          </strong>
        </h2>
      </div>

      <div class="panel-body" id="login-card">
        <form method="POST" action="{{ route('login') }}" >
          {{ csrf_field() }}

          <div class="form-group{{ $errors->has('username') || $errors->has('email') ? ' has-error' : '' }}" id="login-card" >
            <label for="login" class="col-md-12 control-label text-left">E-mail</label>

            <div class="col-md-12" id="login-card">
              <input id="login" type="text" class="form-control" name="login" value="{{ old('username') ?: old('email') }}" placeholder="exemplo@email.com" autofocus>

              @if ($errors->has('username') || $errors->has('email'))
              <span class="help-block">
                <strong>{{ $errors->first('username') ?: $errors->first('email') }}</strong>
              </span>
              @endif
            </div>
          </div>

          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}" id="login-card" >
            <label for="password" class="col-md-12 control-label">Senha</label>

            <div class="col-md-12" id="login-card">
              <input id="password" type="password" class="form-control" name="password" placeholder="********">

              @if ($errors->has('password'))
                <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
              @endif
            </div>
          </div>

          <div class="form-group" id="login-card">
            <div class="col-md-12" id="login-card">
              <div class="checkbox" id="login-card">
                <label style="font-size:13px;">
                  <input type="checkbox" name="remember" value="{{ old('remember') ? 'checked' : '' }}">
                  Lembrar e-mail e senha
                </label>

                <button type="submit" style="width: 100%; margin: 10px 0px; background-color: #6f5; color: white; font-weight: bold; font-size: 15px; padding: 7px; border-radius: 5px; border-color: #6f5; box-shadow: 4px 4px 4px #CCC">
                  Entrar
                </button>
                <p style="font-size: 13px; margin-bottom: -15px">
                  <a style="font-size: 13px; font-weight: bold; color: #0398fc" href="{{ route('password.request') }}" id="login-card">
                    Clique aqui
                  </a>
                  se você esqueceu sua senha.
                </p>
                <hr style="border-top: 1px solid #CCC">
                <p style="font-size: 13px; margin-top: -15px">Clique em Cadastre-se para criar uma conta.</p>
                <a href="{{ route('register') }}" style="width: 100%; margin: 10px 0px; background-color: #0398fc; color: white; font-weight: bold; font-size: 15px; padding: 7px; border-radius: 5px; border-color: #0398fc; box-shadow: 4px 4px 4px #CCC" class="btn btn-primary" id="signup">
                  Cadastre-se
                </a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>

<div class="row" style="padding:8%; background-color:#FFFFFF;" id="login-bottom">
  <div class="col-md-10 col-md-offset-1" id="login-bottom">

    <div class="col-md-4" style="border: 1px solid; border-radius: 20px; box-shadow: 2px 2px 2px #999; height: 100%">
      <div class="panel panel-default" style="width:100%">

        <div class="panel-body" >
          <div class="text-center">
            <h2 style="color: #12583C">
              <strong>
                Educadores
              </strong>
            </h2>
          </div>

          <div class="hifen text-center">
            <p style="color: #12583C">
              Saiba o que está acontecendo em outras salas de aula e mantenha o registro do seu cotidiano com o aluno para que seus familiares possam acompanhar seu progresso.
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4" style="border: 1px solid; border-radius: 20px; box-shadow: 2px 2px 2px #999;">
      <div class="panel panel-default" style="width:100%; height: 100%">

        <div class="panel-body">
          <div class="text-center">
            <h2 style="color: #12583C">
              <strong>
                Profissionais
              </strong>
            </h2>
          </div>

          <div class="hifen text-center">
            <p style="color: #12583C">
              Interaja com profissionais da Educação e forneça sugestões de como aumentar a qualidade de vida dos seus pacientes no ambiente escolar.
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-4" style="border: 1px solid; border-radius: 20px; box-shadow: 2px 2px 2px #999">
      <div class="panel panel-default" style="width:100%; height: 100%">
        <div class="panel-body">
          <div class="text-center">
            <h2 style="color: #12583C">
              <strong>
                Familiares
              </strong>
            </h2>
          </div>

          <div class="text-center">
            <p style="color: #12583C">
              Verifique quais atividades estão sendo realizadas com o seu familiar, quais objetivos estão sendo alcançados e fique à vontade para tirar dúvidas no fórum.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

@endsection
