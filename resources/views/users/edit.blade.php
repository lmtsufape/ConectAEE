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
                        <form method="POST" action="{{ route('users.update') }}">
                            @csrf
                            @method('update')

                            <div class="form-group @error('nome') is-invalid @enderror">
                                <label for="nome" class="col-md-12 form-label">Nome</label>

                                <input id="nome" type="text" class="form-control" name="nome"
                                    value="{{ old('nome') }}" required autofocus>

                                    @error('nome')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-12 control-label">E-mail<font color="red">*</font>
                                    </label>

                                <div class="col-md-12">
                                    @if (old('email', null) != null)
                                        <input id="email" type="email" class="form-control" name="email"
                                            value="{{ old('email') }}">
                                    @else
                                        <input id="email" type="email" class="form-control" name="email"
                                            value="{{ $usuario->email }}">
                                    @endif

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group @error('cpf') is-invalid @enderror">
                                <label for="cpf" class="col-md-12 control-label">CPF</label>
                                <input id="cpf" type="text" class="form-control" name="cpf" value="{{ old('cpf') }}">
                        
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
                                        value="{{ old('telefone') }}">

                                    @error('telefone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('senha') ? ' has-error' : '' }}">
                                <label for="senha" class="col-md-12 control-label">Confirme sua senha<font
                                        color="red">*</font></label>

                                <div class="col-md-12">
                                    <input type="password" name="senha" class="form-control">

                                    @error('senha')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row col-md-12 text-center">
                                    <br>

                                    <div class="col-md-6">
                                        <a href="" class="btn btn-secondary" id="menu-a">
                                            Alterar Senha
                                        </a>
                                    </div>

                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary">
                                            Atualizar
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    @endsection
