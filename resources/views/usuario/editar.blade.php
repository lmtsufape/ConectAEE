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
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <strong>Sucesso!</strong>
                            {!! \Session::get('success') !!}
                        </div>
                    @elseif (\Session::has('fail'))
                        <div class="alert alert-danger">
                            <strong>Erro!</strong>
                            {!! \Session::get('fail') !!}
                        </div>
                    @endif

                    <div class="col-md-8 col-md-offset-2">
                        <form method="POST" action="{{ route('user.update') }}">
                            @csrf
                            @method('update')

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-12 control-label">Nome<font color="red">*</font>
                                    </label>

                                <div class="col-md-12">
                                    @if (old('nome', null) != null)
                                        <input id="nome" type="text" class="form-control" name="nome"
                                            value="{{ old('nome') }}" required autofocus>
                                    @else
                                        <input id="nome" type="text" class="form-control" name="nome"
                                            value="{{ $usuario->nome }}" required autofocus>
                                    @endif

                                    @error('nome')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label for="username" class="col-md-12 control-label">Nome de Usuário<font color="red">*
                                    </font></label>

                                <div class="col-md-12">
                                    @if (old('username', null) != null)
                                        <input id="username" type="username" class="form-control" name="username"
                                            value="{{ old('username') }}">
                                    @else
                                        <input id="username" type="username" class="form-control" name="username"
                                            value="{{ $usuario->username }}">
                                    @endif

                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
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

                            <div class="form-group{{ $errors->has('cpf') ? ' has-error' : '' }}">
                                <label for="cpf" class="col-md-12 control-label">CPF<font color="red">*</font>
                                    </label>

                                <div class="col-md-12">
                                    @if (old('cpf', null) != null)
                                        <input id="cpf" type="text" class="form-control" name="cpf"
                                            value="{{ old('cpf') }}">
                                    @else
                                        <input id="cpf" type="text" class="form-control" name="cpf"
                                            value="{{ $usuario->cpf }}">
                                    @endif

                                    @error('cpf')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('telefone') ? ' has-error' : '' }}">
                                <label for="telefone" class="col-md-12 control-label">Telefone<font color="red">*</font>
                                    </label>

                                <div class="col-md-12">
                                    @if (old('telefone', null) != null)
                                        <input type="text" name="telefone" id="telefone" minlength="10"
                                            placeholder="DDD+Telefone" maxlength="11" class="form-control"
                                            value="{{ old('telefone') }}">
                                    @else
                                        <input type="text" name="telefone" id="telefone" minlength="10"
                                            placeholder="DDD+Telefone" maxlength="11" class="form-control"
                                            value="{{ $usuario->telefone }}">
                                    @endif

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
