@extends('layouts.app')
@section('title', 'Cadastrar instituição')

@section('content')

    <h2>
        <strong style="color: #12583C">
            Nova Escola
        </strong>
        <div style="font-size: 14px">
            <a href="{{ route('escolas.index') }}">Escolas</a>
            > Nova Escola
        </div>
    </h2>

    <hr style="border-top: 1px solid #AAA;">

    <form method="POST" action="{{ route('escolas.store') }}">
        @csrf

        <div class="row pb-4">
            <div class="col-md-6">
                <h3>Dados Escolares</h3>
                <div class="ps-2">
                    <div class="form-group pb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" autofocus>
                        @error('nome')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row pb-3">
                        <div class="form-group col-md-6">
                            <label for="codigo_mec" class="form-label">Código MEC</label>
                            <input type="number" class="form-control @error('codigo_mec') is-invalid @enderror" name="codigo_mec" id="codigo_mec">
                            @error('codigo_mec')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="telefone" class="form-label">Telefone</label>
                            <input type="digit" class="form-control @error('telefone') is-invalid @enderror" name="telefone" id="telefone" minlength="13"
                                placeholder="DDD+Telefone" maxlength="14" value="{{ old('telefone') }}"
                                onkeypress="mask(this, mphone);" onblur="mask(this, mphone);">
                            @error('telefone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="email" class="col-md-12 form-label">E-Mail</label>
                        <input id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
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
                        <select name="municipio_id" id="municipio_id" class="form-control @error('municipio_id') is-invalid @enderror">
                            <option value="" selected disabled>Selecione o Município</option>
                            @foreach ($municipios as $municipio)
                                <option value="{{$municipio->id}}" @selected(old('municipio_id') == $municipio->id)>{{$municipio->nome}}</option>
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
                            <input id="logradouro" class="form-control @error('logradouro') is-invalid @enderror" name="logradouro" value="{{ old('logradouro') }}">
                            @error('logradouro')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="numero" class="form-label">Número</label>
                            <input id="numero" class="form-control @error('numero') is-invalid @enderror" name="numero" value="{{ old('numero') }}">
                            @error('numero')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="bairro" class="form-label">Bairro</label>
                            <input id="bairro" class="form-control @error('bairro') is-invalid @enderror" name="bairro" value="{{ old('bairro') }}">
                            @error('bairro')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cep" class="form-label">CEP</label>
                            <input id="cep" class="form-control @error('cep') is-invalid @enderror" name="cep" value="{{ old('cep') }}">
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


    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>

@endsection
