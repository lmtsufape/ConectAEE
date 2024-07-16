@extends('layouts.app')
@section('title','Cadastrar')
@section('content')


        <div>
            <div>
                <h2>
                    <strong>
                        Cadastrar
                    </strong>
                </h2>
            </div>

            <div>
                <form method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-12 control-label">Nome<font color="red">*</font></label>

                        <div class="col-md-12">
                            <input id="name" type="text" class="form-control" placeholder="Digite seu nome completo"
                                   name="name" value="{{ old('name') }}" autofocus>

                            @if ($errors->has('name'))
                                <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
              </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                        <label for="username" class="col-md-12 control-label">Nome de usuário<font color="red">*</font>
                        </label>

                        <div class="col-md-12">
                            <input id="username" type="username" class="form-control"
                                   placeholder="Digite seu nome de Usuário" name="username"
                                   value="{{ old('username') }}">

                            @if ($errors->has('username'))
                                <span class="help-block">
              <strong>{{ $errors->first('username') }}</strong>
            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-12 control-label">E-Mail<font color="red">*</font></label>

                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control" name="email"
                                   placeholder="Digite seu email" value="{{ old('email') }}">

                            @if ($errors->has('email'))
                                <span class="help-block">
              <strong>{{ $errors->first('email') }}</strong>
            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('cpf') ? ' has-error' : '' }}">
                        <label for="cpf" class="col-md-12 control-label">CPF<font color="red">*</font></label>

                        <div class="col-md-12">
                            <input id="cpf" type="text" class="form-control" onkeydown="fMasc( this, mCPF );" placeholder="000.000.000-00" name="cpf"
                                   placeholder="Digite seu CPF" value="{{ old('cpf') }}">

                            @if ($errors->has('cpf'))
                                <span class="help-block">
              <strong>{{ $errors->first('cpf') }}</strong>
            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('telefone') ? ' has-error' : '' }}">
                        <label for="telefone" class="col-md-12 control-label">Telefone<font color="red">*</font>
                        </label>

                        <div class="col-md-12">
                            <input type="digit" name="telefone" id="telefone" minlength="10" placeholder="DDD+Telefone"
                                   class="form-control"
                                   maxlength="14" value="{{ old('telefone') }}" onkeypress="mask(this, mphone);" onblur="mask(this, mphone);">

                            @if ($errors->has('telefone'))
                                <span class="help-block">
              <strong>{{ $errors->first('telefone') }}</strong>
            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-12 control-label">Senha<font color="red">*</font> </label>
                        <div class="col-md-12">
                            <input id="password" type="password" class="form-control" placeholder="Digite sua senha"
                                   name="password">
                            <span style="color: #8c8c8c; font-size: 12px">A senha deve possuir no minimo 6 caracteres.</span>

                            @if ($errors->has('password'))
                                <span class="help-block">
              <strong>{{ $errors->first('password') }}</strong>
            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password-confirm" class="col-md-12 control-label">Confirme a senha<font
                                    color="red">*</font> </label>

                        <div class="col-md-12">
                            <input id="password-confirm" type="password" placeholder="Repita sua senha"
                                   class="form-control" name="password_confirmation">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12 text-center" style="padding-top:20px;">
                            <a class="btn btn-secondary" href="{{ route('login') }}" id="menu-a">
                                Voltar
                            </a>
                            <button id="submit" type="submit" class="btn btn-primary">
                                Cadastrar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script type="text/javascript">
        function fMasc(objeto,mascara) {
            obj=objeto
            masc=mascara
            setTimeout("fMascEx()",1)
        }

        function fMascEx() {
            obj.value=masc(obj.value)
        }

        function mCPF(cpf){
            cpf=cpf.replace(/\D/g,"")
            cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
            cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
            cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
            return cpf
        }

        function mTel(tel) {
            tel=tel.replace(/\D/g,"")
            tel=tel.replace(/^(\d)/,"($1")
            tel=tel.replace(/(.{3})(\d)/,"$1)$2")
            if(tel.length == 9) {
                tel=tel.replace(/(.{1})$/,"-$1")
            } else if (tel.length == 10) {
                tel=tel.replace(/(.{2})$/,"-$1")
            } else if (tel.length == 11) {
                tel=tel.replace(/(.{3})$/,"-$1")
            } else if (tel.length == 12) {
                tel=tel.replace(/(.{4})$/,"-$1")
            } else if (tel.length > 12) {
                tel=tel.replace(/(.{4})$/,"-$1")
            }
            return tel;
        }
    </script>

    <script type="text/javascript">
        function mask(o, f) {
            setTimeout(function() {
                var v = mphone(o.value);
                if (v != o.value) {
                    o.value = v;
                }
            }, 1);
        }

        function mphone(v) {
            var r = v.replace(/\D/g, "");
            r = r.replace(/^0/, "");
            if (r.length > 10) {
                r = r.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1)$2-$3");
            } else if (r.length > 5) {
                r = r.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1)$2-$3");
            } else if (r.length > 2) {
                r = r.replace(/^(\d\d)(\d{0,5})/, "($1)$2");
            } else {
                r = r.replace(/^(\d*)/, "($1");
            }
            return r;
        }
    </script>

@endsection
