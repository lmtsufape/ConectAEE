@extends('layouts.app')

@section('content')

    <div>
        <h1>Editar Escola</h1>

        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('alunos.index') }}">Início</a></li>
                <li class="breadcrumb-item"><a href="{{ route('escolas.index') }}">Escolas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Nova Escola</li>
            </ol>
        </nav>
    </div>

    <hr style="border-top: 1px solid #AAA;">


    <form method="POST" action="{{ route('escolas.update', $escola->id) }}">
        @csrf
        @method('PUT')

        <div class="row pb-4">
            <div class="col-md-6 ">
                <h3>Dados Escolares</h3>
                <div class="ps-2">
                    <div class="form-group pb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') ?? $escola->nome}}" autofocus>
                        @error('nome')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row pb-3">
                        <div class="form-group col-md-6">
                            <label for="codigo_mec" class="form-label">Código MEC</label>
                            <input type="number" class="form-control @error('codigo_mec') is-invalid @enderror" name="codigo_mec" id="codigo_mec" value="{{old('codigo_mec') ?? $escola->codigo_mec}}">
                            @error('codigo_mec')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="telefone" class="form-label">Telefone</label>
                            <input type="digit" class="form-control @error('telefone') is-invalid @enderror" name="telefone" id="telefone" minlength="13"
                                placeholder="DDD+Telefone" maxlength="14" value="{{ old('telefone') ?? $escola->telefone}}"
                                onkeypress="mask(this, mphone);" onblur="mask(this, mphone);">
                            @error('telefone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-md-12 form-label">E-Mail</label>
                        <input id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $escola->email}}">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h3>Endereço</h3>
                <div class="ps-2">
                    <div class="form-group pb-3">
                        <label for="municipio_id" class="form-label">Município</label>
                        <select name="municipio_id" id="municipio_id" class="form-control">
                            <option value="" selected disabled>Selecione o Município</option>
                            @foreach ($municipios as $municipio)
                                <option value="{{$municipio->id}}" @selected(old('municipio_id') ?? $escola->municipio_id == $municipio->id)>{{$municipio->nome}}</option>
                            @endforeach
                        </select>
                        @error('municipio_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row pb-3">
                        <div class="form-group col-md-9">
                            <label for="logradouro" class="form-label">Logradouro</label>
                            <input id="logradouro" class="form-control @error('logradouro') is-invalid @enderror" name="logradouro" value="{{ old('logradouro') ?? $escola->endereco->logradouro}}">
                            @error('logradouro')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="numero" class="form-label">Número</label>
                            <input id="numero" class="form-control @error('numero') is-invalid @enderror" name="numero" value="{{ old('cidade') ?? $escola->endereco->numero}}">
                            @error('numero')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row pb-3">
                        <div class="form-group col-md-6">
                            <label for="bairro" class="form-label">Bairro</label>
                            <input id="bairro" class="form-control @error('bairro') is-invalid @enderror" name="bairro" value="{{ old('cidade') ?? $escola->endereco->bairro}}">
                            @error('bairro')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cep" class="form-label">CEP</label>
                            <input id="cep" class="form-control @error('cep') is-invalid @enderror" name="cep" value="{{ old('cep') ?? $escola->endereco->cep}}">
                            @error('cep')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center gap-4 m-3">
            <a class="btn btn-secondary w-25" href="{{ route('escolas.index') }}">
                Voltar
            </a>
            <button type="submit" class="btn btn-success w-25">
                Cadastrar
            </button>
        </div>
    </form>
@endsection
