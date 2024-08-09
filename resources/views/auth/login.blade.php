@extends('layouts.app')
@section('title','ConectAEE')
@section('content')

    <div class="d-flex flex-row justify-content-center align-item-center" style="min-height: 70vh">
        <div class="col-md-7">
            <div class="d-flex flex-column m-5">
                <div class="container p-5 ">
                    <img src="{{asset('images/logo.png')}}" width="250px" height="130px">
                    <p class="text-justify pt-5">
                        O ConectAEE é um sistema pensado para que a educação inclusiva seja uma realidade nas escolas e
                        instituições de ensino do Brasil e que dá suporte ao acompanhamento de alunos
                        que necessitam de Atendimento Educacional Especializado (AEE), permitindo uma maior
                        integração entre escola, família e profissionais da Saúde, uma vez que a troca de informações
                        entre cada um desses indivíduos é indispensável.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="col-md-9 bg-white rounded-5 shadow-lg">
                <h2 class="text-center">
                    <strong style="color: #12583C">
                        Entrar
                    </strong>
                </h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group{{ $errors->has('username') || $errors->has('email') ? ' has-error' : '' }}">
                        <label for="login" class="col-md-12 control-label text-left">E-mail</label>
                        <div class="col-md-12">
                            <input id="login" type="text" class="form-control" name="login"
                                    value="{{ old('username') ?: old('email') }}" placeholder="exemplo@email.com"
                                    autofocus>
                            @if ($errors->has('username') || $errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') ?: $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-12 control-label">Senha</label>
                        <div class="col-md-12">
                            <input id="password" type="password" class="form-control" name="password"
                                    placeholder="Insira a senha">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label style="font-size:13px;">
                                    <input type="checkbox" name="remember"
                                            value="{{ old('remember') ? 'checked' : '' }}">
                                    <span style="font-family: Arial; color: #7F7F7F">
                                    Lembrar e-mail e senha
                                    </span>
                                </label>
                                <button type="submit" class="btn btn-success w-100">
                                    Entrar
                                </button>
                                <p style="font-size: 13px; margin-bottom: -15px">
                                    <a href="{{ route('password.request') }}">Clique aqui </a>se você esqueceu sua senha.
                                </p>
                                <hr class="p-2" style="border-top: 1px solid #CCC">
                                <a class="btn btn-primary w-100" href="{{ route('register') }}" id="signup">
                                    Cadastre-se
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row bg-white" style="padding:8%;">
        <div class="col-md-4" style="border: 1px solid; border-radius: 20px; box-shadow: 2px 2px 2px #999; width: 32%; margin-right: 1%; height: 500px">
            <div class="panel panel-default" style="width:100%">
                    <center>
                        <img src="{{asset('images/professores.jpg')}}" width="200px" height="200px"
                                style="border-radius: 50%;">
                    </center>
                    <div class="text-center">
                        <h2 style="color: #12583C">
                            <strong>
                                Educadores
                            </strong>
                        </h2>
                    </div>

                    <div class="hifen text-center">
                        <p style="color: #12583C">
                            Saiba o que está acontecendo em outras salas de aula e mantenha o registro do seu
                            cotidiano com o aluno para que seus familiares possam acompanhar seu progresso.
                        </p>
                    </div>
            </div>
        </div>

        <div class="col-md-4" style="border: 1px solid; border-radius: 20px; box-shadow: 2px 2px 2px #999; width: 32%; margin-right: 1%; height: 500px">
            <div class="panel panel-default" style="width:100%; height: 100%">
                    <center>
                        <img src="{{asset('images/profissionais.jpg')}}" width="200px" height="200px"
                                style="border-radius: 50%;">
                    </center>
                    <div class="text-center">
                        <h2 style="color: #12583C">
                            <strong>
                                Profissionais
                            </strong>
                        </h2>
                    </div>

                    <div class="hifen text-center">
                        <p style="color: #12583C;">
                            Interaja com profissionais da Educação e forneça sugestões de como aumentar a qualidade
                            de vida dos seus pacientes no ambiente escolar.
                        </p>
                    </div>
            </div>
        </div>

        <div class="col-md-4" style="border: 1px solid; border-radius: 20px; box-shadow: 2px 2px 2px #999; width: 32%; height: 500px">
            <div class="panel panel-default" style="width:100%; height: 100%">
                <center>
                    <img src="{{asset('images/familia.jpg')}}" width="200px" height="200px"
                            style="border-radius: 50%;">
                </center>
                <div class="text-center">
                    <h2 style="color: #12583C">
                        <strong>
                            Familiares
                        </strong>
                    </h2>
                </div>

                <div class="hifen text-center">
                    <p style="color: #12583C">
                        Verifique quais atividades estão sendo realizadas com o seu familiar, quais objetivos
                        estão sendo alcançados e fique à vontade para tirar dúvidas no fórum.
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection
