@extends('layouts.app')
@section('title', 'Meus Dados')

@section('content')

    <div>
        <div>
            <h2>
                <strong style="color: #12583C">
                    Meus Dados
                </strong>
                <div style="font-size: 14px">
                    <a href="{{ route('home') }}">Início</a> >
                    Meus dados
                </div>
            </h2>

            <hr style="border-top: 1px solid black;">
        </div>

        <div>
            <form method="POST" action="{{ route('users.update', ['user_id' => $user->id]) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nome" class="form-label">Nome</label>
                    <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome"
                        value="{{ old('nome') ?? $user->nome}}" required autofocus>

                        @error('nome')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="cpf" class="control-label">CPF</label>
                        <input id="cpf" type="text" class="form-control @error('cpf') is-invalid @enderror" name="cpf" value="{{ old('cpf') ?? $user->cpf}}" required>
                        @error('cpf')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="matricula" class="control-label">Matrícula</label>
                        <input id="matricula" type="text" class="form-control @error('matricula') is-invalid @enderror" name="matricula" value="{{ old('matricula') ?? $user->matricula}}" required>
                        @error('matricula')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="email" class="control-label">E-mail</label>
                        <input id="email" type="email" class="form-control @error('email') is-error @enderror" name="email"
                            value="{{old('email') ?? $user->email}}" required>
                    
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label for="telefone" class="control-label">Telefone</label>
                        <input type="text" name="telefone" id="telefone" minlength="10"
                            placeholder="(99) 99999-9999" maxlength="11" class="form-control @error('telefone') is-invalid @enderror"
                            value="{{ old('telefone') ?? $user->telefone}}">
                        @error('telefone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                
                <div class="d-flex justify-content-center gap-4 m-3 pt-5">

                    <a class="btn btn-secondary w-25" href="{{session()->previousUrl() ?? route('home')}}">
                        Voltar
                    </a>

                    <a data-bs-toggle="modal" data-bs-target="#redefinirModal" class="btn btn-primary w-25">
                        Redefinir Senha
                    </a>

                    <button type="submit" class="btn btn-success w-25">
                        Atualizar
                    </button>
                </div>

            </form>
    </div>
    @push('modais')
        @include('users.redefinir_senha-modal')
    @endpush

@endsection
