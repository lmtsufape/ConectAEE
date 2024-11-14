@extends('layouts.app')
@section('title', 'Cadastrar instituição')

@section('content')

    <h2>
        <strong style="color: #12583C">
            Nova Instituição
        </strong>
        <div style="font-size: 14px" id="login-card">
            <a href="{{ route('escola.index') }}">Escolas</a>
            > Nova Escola
        </div>
    </h2>

    <hr style="border-top: 1px solid #AAA;">

            <form method="POST" action="{{ route('escola.store') }}">
                @csrf

                <hr style="border-top: 1px solid #AAA;">

                <div class="form-group @error('nome') is-invalid @enderror" id="login-card">
                    <label for="nome" class="col-md-12 control-label"> Nome<small class="text-danger">*</small> </label>

                    <input id="nome" type="text" class="form-control" name="nome" value="{{ old('nome') }}" autofocus>

                    @error('nome')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror    
                </div>

                <div class="row" style="padding:0px" id="login-card">
                    <div class="col-md-12" style="padding:0px" id="login-card">
                        <div class="col-md-4" id="login-card">
                            <div class="form-group{{ $errors->has('telefone') ? ' has-error' : '' }}" id="login-card">
                                <label for="telefone" class="col-md-12 control-label">Telefone<font color="red">*</font>
                                </label>

                                <input type="digit" class="form-control" name="telefone" id="telefone" minlength="13"
                                    placeholder="DDD+Telefone" maxlength="14" value="{{ old('telefone') }}"
                                    onkeypress="mask(this, mphone);" onblur="mask(this, mphone);">

                                @error('telefone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror    
                            </div>
                        </div>

                        <div class="col-md-4" id="login-card">
                            <div class="form-group @error('email') is-invalid @enderror" id="login-card">
                                <label for="email" class="col-md-12 control-label">E-Mail</label>

                                <input id="email" class="form-control" name="email" value="{{ old('email') }}">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror    
                            </div>
                        </div>

                        <div class="col-md-4" id="login-card">
                            <div class="form-group @error('cnpj') is-invalid @enderror" id="login-card">
                                <label for="cnpj" class="col-md-12 control-label">CNPJ</label>

                                <input id="cnpj" class="form-control" name="cnpj" value="{{ old('cnpj') }}">

                                @error('cnpj')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror    
                            </div>
                        </div>
                        <div class="form-group @error('municipio') is-invalid @enderror" id="login-card">
                            <label for="municipio" class="col-md-12 control-label">Município<font color="red">*</font></label>


                            <input id="municipio" class="form-control" name="municipio" value="{{ old('cidade') }}">

                            @error('municipio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror    
                        </div>
                    </div>
                </div>     

                <div class="form-group" id="login-card">
                    <div class="text-center" id="login-card">
                        <br>
                        <a class="btn btn-secondary" href="{{ route('escola.index') }}" id="menu-a">
                            Voltar
                        </a>
                        <button type="submit" class="btn btn-primary">
                            Cadastrar
                        </button>
                    </div>
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
