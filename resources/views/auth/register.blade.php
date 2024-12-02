@extends('layouts.app')
@section('title', 'Cadastrar')
@section('content')


    <div class="container border rounded-5 bg-white">
        
        
        <form class="m-3" method="POST" action="{{ route('users.store') }}">
            @csrf
            
            <h2>
                <strong>
                    Cadastrar
                </strong>
            </h2>
            <div class="form-group">
                <label for="nome" class="col-md-12 control-label">Nome Completo</label>

                <div class="col-md-12">
                    <input id="nome" type="text" class="form-control  @error('nome') is-invalid @enderror"
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
                    <input id="email" type="email" class="form-control  @error('email') is-invalid @enderror"
                        name="email" placeholder="Digite seu email" value="{{ old('email') }}">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="cpf" class="control-label">CPF</label>
                    <input id="cpf" type="text" class="form-control @error('cpf') is-invalid @enderror"
                        name="cpf" placeholder="Digite seu CPF" value="{{ old('cpf') }}">
                    @error('cpf')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group col-md-6">
                    <label for="matricula" class="col-md-6 control-label">Matrícula
                    </label>
                    <input type="text" name="matricula" id="matricula" class="form-control @error('matricula') is-invalid @enderror"
                        value="{{ old('matricula') }}">

                    @error('matricula')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="especialidade" class="col-md-6 control-label">Especialidade</label>

                <select class="form-control @error('especialidade') is-invalid @enderror" name="especialidade" id="especialidade">
                    <option value="" disabled selected>Defina a especialidade</option>
                    @foreach ($especialidades as $especialidade)
                        <option value="{{$especialidade->id}}" @selected($especialidade->nome == old('especialidade'))>{{$especialidade->nome}}</option>
                    @endforeach
                </select>

                @error('matricula')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            

            <div class="form-group">
                <label for="telefone" class="col-md-12 control-label">Telefone
                </label>

                <div class="col-md-12">
                    <input type="digit" name="telefone" id="telefone" minlength="10"
                        class="form-control @error('telefone') is-invalid @enderror" maxlength="14"
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
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        placeholder="Digite sua senha" name="password">
                    <span style="color: #8c8c8c; font-size: 12px">A senha deve possuir no minimo 8 caracteres.</span>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="password_confirmation" class="col-md-12 control-label">Confirme a senha</label>

                <div class="col-md-12">
                    <input id="password_confirmation" type="password" placeholder="Repita sua senha" class="form-control"
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

@endsection
