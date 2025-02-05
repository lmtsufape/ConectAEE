@extends('layouts.app')
@section('title', 'Meus Dados')

@section('content')

    <div class="row">
        <div class="col-md-12">
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

                    <div class="col-md-8 col-md-offset-2">
                        <form method="POST" action="{{ route('users.update', ['user_id' => $user->id]) }}">
                            @csrf
                            @method('update')

                            <div class="form-group @error('nome') is-invalid @enderror">
                                <label for="nome" class="col-md-12 form-label">Nome</label>

                                <input id="nome" type="text" class="form-control" name="nome"
                                    value="{{ old('nome') ?? $user->nome}}" required autofocus>

                                    @error('nome')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group @error('email') is-error @enderror">
                                <label for="email" class="col-md-12 control-label">E-mail<font color="red">*</font>
                                    </label>

                                <div class="col-md-12">
                              
                                    <input id="email" type="email" class="form-control" name="email"
                                        value="{{old('email') ?? $user->email}}">
                                  
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group @error('cpf') is-invalid @enderror">
                                <label for="cpf" class="col-md-12 control-label">CPF</label>
                                <input id="cpf" type="text" class="form-control" name="cpf" value="{{ old('cpf') ?? $user->cpf}}">
                        
                                @error('cpf')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group @error('telefone') is-invalid @enderror">
                                <label for="telefone" class="col-md-12 control-label">Telefone</label>

                                <div class="col-md-12">
                                    <input type="text" name="telefone" id="telefone" minlength="10"
                                        placeholder="(99) 99999-9999" maxlength="11" class="form-control"
                                        value="{{ old('telefone') ?? $user->telefone}}">

                                    @error('telefone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                         
                            <div class="d-flex justify-content-center gap-4 m-3">

                                <a class="btn btn-secondary w-25" href="{{url()->previous()}}">
                                    Voltar
                                </a>

                                <a href="" class="btn btn-primary w-25">
                                    Redefinir Senha
                                </a>

                                <button type="submit" class="btn btn-success w-25">
                                    Atualizar
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    @endsection
