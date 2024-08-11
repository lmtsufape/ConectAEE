@extends('layouts.app')
@section('title', 'Cadastrar')
@section('content')


    <div class="container-md border rounded-5 bg-white">
        <div>
            <h2>
                <strong>
                    Cadastrar
                </strong>
            </h2>
        </div>

        <div>
            <form method="POST" action="{{ route('user.store') }}">
                @csrf

                <div class="form-group">
                    <label for="nome" class="col-md-12 control-label">Nome Completo</label>

                    <div class="col-md-12">
                        <input id="nome" type="text" class="form-control  @error('nome') is-invali @enderror"
                            placeholder="Digite seu nome completo" name="nome" value="{{ old('nome') }}" autofocus>

                        @error('nome')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group">
                    <label for="email" class="col-md-12 control-label">E-Mail</label>

                    <div class="col-md-12">
                        <input id="email" type="email" class="form-control  @error('email') is-invali @enderror"
                            name="email" placeholder="Digite seu email" value="{{ old('email') }}">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="cpf" class="col-md-12 control-label">CPF</label>

                    <div class="col-md-12">
                        <input id="cpf" type="text" class="form-control @error('cpf') is-invali @enderror"
                            name="cpf" placeholder="Digite seu CPF" value="{{ old('cpf') }}">

                        @error('cpf')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="matricula" class="col-md-12 control-label">Matrícula
                    </label>

                    <div class="col-md-12">
                        <input type="text" name="matricula" id="matricula" minlength="10"
                            class="form-control @error('matricula') is-invali @enderror" maxlength="14"
                            value="{{ old('matricula') }}">

                        @error('matricula')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="telefone" class="col-md-12 control-label">Telefone
                    </label>

                    <div class="col-md-12">
                        <input type="digit" name="telefone" id="telefone" minlength="10"
                            class="form-control @error('telefone') is-invali @enderror" maxlength="14"
                            value="{{ old('telefone') }}">

                        @error('telefone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="col-md-12 control-label">Senha </label>
                    <div class="col-md-12">
                        <input id="password" type="password" class="form-control @error('password') is-invali @enderror"
                            placeholder="Digite sua senha" name="password">
                        <span style="color: #8c8c8c; font-size: 12px">A senha deve possuir no minimo 6 caracteres.</span>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="password-confirm" class="col-md-12 control-label">Confirme a senha</label>

                    <div class="col-md-12">
                        <input id="password-confirm" type="password" placeholder="Repita sua senha" class="form-control"
                            name="password_confirmation">
                    </div>
                </div>

                <div class="col-md-12 text-center" style="padding-top:20px;">
                    <a class="btn btn-secondary" href="{{ route('login') }}" id="menu-a">
                        Voltar
                    </a>
                    <button type="submit" class="btn btn-primary">
                        Cadastrar
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
