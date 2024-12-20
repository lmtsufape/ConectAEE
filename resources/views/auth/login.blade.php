@extends('layouts.app')
@section('title','ConectAEE')
@section('content')

    <div class="d-flex flex-row justify-content-center align-item-center" style="min-height: 70vh">
        <div class="col-md-7">
            <div class="d-flex flex-column m-5">
                <div class="container p-5 ">
                    <img src="{{asset('images/logo3.png')}}" width="250px" height="130px">
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
            <div class="col-md-9 bg-white p-5 m-5 rounded-5 shadow-lg ">
                <h2 class="text-center">
                    <strong style="color: #12583C">
                        Entrar
                    </strong>
                </h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email"
                                value="{{ old('email') }}" placeholder="Digite seu e-mail" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-1">
                        <label for="password" class="form-label">Senha</label>
                        <div class="input-group">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password"
                                    placeholder="Digite sua senha">
                            <button class="btn btn-outline-white border" type="button" id="olhoPassword">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                                </svg>
                            </button>
                        </div>
                        @error ('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        
                    </div>
                    <div class="form-group">
                        <div class="form-check form-check-inline mb-3">
                            <input type="checkbox" name="remember" id="remember" value="{{ old('remember') ? 'checked' : '' }}" class="form-check-input">
                            <label for="remember" class="form-check-label">Lembre-se de mim</label>
                        </div>
                        <button type="submit" class="btn btn-success w-100 mb-2">
                            Entrar
                        </button>
                        <a class="" href="{{ route('password.request') }}">Esqueceu sua senha?</a>
                        
                        <hr style="border-top: 1px solid black">

                        <a class="btn btn-primary w-100" href="{{ route('users.create') }}">
                            Cadastre-se
                        </a>
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
@push('scripts')
    $(document).ready(function (){
        $('#olhoPassword').click(function(){
            let input = $('#password');

            if(input.attr('type') == 'password'){
                input.attr('type', 'text');
                $(this).html(
                    `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash-fill" viewBox="0 0 16 16">
                        <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7 7 0 0 0 2.79-.588M5.21 3.088A7 7 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474z"/>
                        <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12z"/>
                    </svg>`
                  );
            }else{
                input.attr('type', 'password')
                $(this).html(
                    `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                    </svg>`
                );
            }
        })
    })
@endpush