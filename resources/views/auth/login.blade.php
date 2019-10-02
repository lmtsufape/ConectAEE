@extends('layouts.principal')
@section('title','Entrar')
@section('content')
<div class="container">
  <div class="row">

    <div id="painel0" class="flex col-xl-12">

      <div class="col-md-6">
        <div class="panel panel-default" style="width:100%">
          <div class="panel-heading">Info</div>

          <div class="panel-body">
          </div>

        </div>
      </div>

      <div class="col-md-6">
        <div class="panel panel-default" style="width:100%">
          <div class="panel-heading">Login</div>

          <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
              {{ csrf_field() }}

              <div class="form-group{{ $errors->has('username') || $errors->has('email') ? ' has-error' : '' }}">
                <label for="login" class="col-md-4 control-label">Usuário ou Email <font color="red">*</font> </label>

                <div class="col-md-6">
                  <input id="login" type="text" class="form-control" name="login" value="{{ old('username') ?: old('email') }}" required autofocus>

                  @if ($errors->has('username') || $errors->has('email'))
                  <span class="help-block">
                    <strong>{{ $errors->first('username') ?: $errors->first('email') }}</strong>
                  </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">Senha <font color="red">*</font> </label>

                <div class="col-md-6">
                  <input id="password" type="password" class="form-control" name="password" required>

                  @if ($errors->has('password'))
                  <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                  @endif
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Lembrar nome de usuário e senha
                    </label>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-8 col-md-offset-4">
                  <button type="submit" class="btn btn-primary">
                    Entrar
                  </button>

                  <a class="btn btn-link" href="{{ route('password.request') }}">
                    Esqueceu sua senha?
                  </a>
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>

    </div>

    <div id="painel1" class="flex col-xl-12" style="height:350px">

      <div class="col-md-4">
        <div class="panel panel-default" style="width:100%; background-color:#71C9B1;">
          <div class="panel-heading">Educadores</div>

          <div class="panel-body" >

            <div class="hifen text-justify">
              <h3>
                <strong>
                  Saiba o que está acontecendo em outras salas de aula e mantenha o registro do seu cotidiano com o aluno para os Familiares poderem acompanhar o progresso dele.
                </strong>
              </h3>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="panel panel-default" style="width:100%; background-color:#71C9B1;">
          <div class="panel-heading">Profissionais de Saúde</div>

          <div class="panel-body">
            <div class="hifen text-justify">
              <h3>
                <strong>
                  Interaja com profissionais da Educação e forneça sugestões de como aumentar a qualidade de vida dos seus pacientes no ambiente escolar.
                </strong>
              </h3>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="panel panel-default" style="width:100%; background-color:#71C9B1;">
          <div class="panel-heading">Familiares</div>

          <div class="panel-body">
            <div class="hifen text-justify">
              <h3>
                <strong>
                  Verifique quais atividades estão sendo realizadas com o seu familiar, quais objetivos estão sendo alcançados e fique à vontade para tirar dúvidas no fórum.
                </strong>
              </h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

  var width = screen.width;

  if (width <= 1000){
    document.getElementById("painel0").className = "col-xl-12";
    document.getElementById("painel1").className = "col-xl-12";
  }

</script>
@endsection
