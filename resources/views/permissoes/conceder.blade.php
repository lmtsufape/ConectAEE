@extends('layouts.app')
@section('title', 'Conceder permissão')

@section('content')

    <h2>
        <strong style="color: #12583C">
            Nova Autorização
        </strong>
        <div style="font-size: 14px">
            <a href="{{ route('aluno.index') }}">Início</a>
            > <a href="{{ route('aluno.gerenciar', $aluno->id) }}">Perfil de
                <strong>{{ explode(' ', $aluno->nome)[0] }}</strong></a>
            > <a href="{{ route('aluno.permissoes', $aluno->id) }}">Autorizações</a>
            > Notificação
        </div>
    </h2>

    <hr style="border-top: 1px solid black;">

    <div>
        <form method="POST" action="{{ route('aluno.permissoes.criar') }}">
            {{ csrf_field() }}
            <input type="hidden" name="id_aluno" value="{{ $aluno->id }}">
            <div class="form-group{{ $errors->has('aluno') ? ' has-error' : '' }}">
                <label for="aluno" class="col-md-12 control-label">Aluno</label>
                <div class="col-md-12">
                    <input readonly id="aluno" type="text" class="form-control" name="aluno"
                        value="{{ $aluno->nome }}" autofocus>
                    @if ($errors->has('aluno'))
                        <span class="help-block">
                            <strong>{{ $errors->first('aluno') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                <label for="username" class="col-md-12 control-label">Requerente</label>
                <div class="col-md-12">
                    <input readonly id="username" type="text" class="form-control" name="username"
                        value="{{ $notificacao->remetente->username }}">
                    @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('perfil') ? ' has-error' : '' }}">
                <label for="perfil" class="col-md-12 control-label">Perfil</label>
                <div class="col-md-12">
                    <input readonly id="perfil" type="text" class="form-control" name="perfil"
                        value="{{ $notificacao->perfil->nome }}">
                    @if ($errors->has('perfil'))
                        <span class="help-block">
                            <strong>{{ $errors->first('perfil') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            @if ($notificacao->perfil->nome == 'Profissional Externo')
                <div id="div-especializacao" class="form-group{{ $errors->has('especializacao') ? ' has-error' : '' }}">
                @else
                    <div id="div-especializacao" class="form-group{{ $errors->has('especializacao') ? ' has-error' : '' }}"
                        style="display: none">
            @endif
            <label for="especializacao" class="col-md-12 control-label">Especialização</label>
            <div class="col-md-12">
                <input readonly id="especializacao" type="text" class="form-control" name="especializacao"
                    value="{{ $notificacao->perfil->especializacao }}" autofocus>
            </div>
            <label for="tipoUsuario" class="col-md-12 control-label">Tipo do
                Usuário</label>
            <div class="form-check col-md-12">
                <div class="row">
                    <span style="margin-left: 3%;">
                        <input id="isAdministrador" type="radio" class="form-check-input" name="tipoUsuario" value="3">
                        <label class="form-check-label" for="isAdministrador">Administrador</label>
                    </span>
                    <span style="margin-left: 1%;">
                        <input id="isPadrao" type="radio" class="form-check-input" name="tipoUsuario" value="1" checked>
                        <label id="isPadraoLabel" class="form-check-label" for="isPadrao">Padrão</label>
                    </span>
                    <span style="margin-left: 1%;">
                        <input id="isObservador" type="radio" class="form-check-input" name="tipoUsuario" value="2">
                        <label id="isObservadorLabel" class="form-check-label" for="isObservador">Observador</label>
                    </span>
                </div>
            </div>
            <div class="form-group">
                <div class="row col-md-12 text-center">
                    <br>
                    <a class="btn btn-secondary" href="{{ route('notificacao.listar') }}" id="menu-a">
                        Voltar
                    </a>
                    <button type="submit" class="btn btn-primary">
                        Conceder
                    </button>
                </div>
            </div>
        </form>
    </div>


    <script type="text/javascript">
        var perfil = document.getElementById("perfil").value;
        var adm = document.getElementById("isAdministrador");
        var obser = document.getElementById('isObservador');
        var obserLabel = document.getElementById('isObservadorLabel');
        var padrao = document.getElementById('isPadrao');
        var padraoLabel = document.getElementById('isPadraoLabel');

        if (perfil == "Responsável") {

            adm.checked = true;
            adm.readonly = true;
            obser.disabled = true;
            obser.hidden = true;
            obserLabel.hidden = true;
            padrao.disabled = true;
            padrao.hidden = true;
            padraoLabel.hidden = true;

            adm.onchange = function() {
                adm.checked = true;
            };
        }
        if (perfil == "Professor AEE") {
            adm.checked = true;
            adm.readonly = true;
            obser.disabled = true;
            obser.hidden = true;
            obserLabel.hidden = true;
            padrao.disabled = true;
            padrao.hidden = true;
            padraoLabel.hidden = true;

            adm.onchange = function() {
                adm.checked = true;
            };
        }
    </script>
@endsection
