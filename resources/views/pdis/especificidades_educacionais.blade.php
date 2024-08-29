@extends('layouts.app')

@push('nav-form')
    @include('layouts.form', ['pdi_id' => $pdi->id])
@endpush

@section('content')

<form action="{{route('pdi.especificidade_educacional')}}" method="POST">
    @csrf
    <div>
        <h4>NA ESCOLA</h4>
        <div>
            <label for="escola_acoes_existentes" class="form-label">Descreva as ações necessárias já existentes</label>
            <input class="form-control @error('escola_acoes_existentes') is-invalid @enderror" type="text" name="escola_acoes_existentes" id="escola_acoes_existentes">
    
            @error('escola_acoes_existentes')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div>
            <label for="escola_acoes_desenvolvidas" class="form-label">Descreva as ações necessárias a serem desenvolvidas</label>
            <input class="form-control @error('escola_acoes_desenvolvidas') is-invalid @enderror" type="text" name="escola_acoes_desenvolvidas" id="escola_acoes_desenvolvidas">
    
            @error('escola_acoes_desenvolvidas')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div>
            <label for="escola_responsaveis_acoes" class="form-label">Descreva os responsáveis pelas ações nas escolas</label>
            <input class="form-control @error('escola_responsaveis_acoes') is-invalid @enderror" type="text" name="escola_responsaveis_acoes" id="escola_responsaveis_acoes">
    
            @error('escola_responsaveis_acoes')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div>
        <h4>NA SALA DE AULA</h4>
        <div>
            <label for="sala_aula_acoes_existentes" class="form-label">Descreva as ações necessárias já existentes</label>
            <input class="form-control @error('sala_aula_acoes_existentes') is-invalid @enderror" type="text" name="sala_aula_acoes_existentes" id="sala_aula_acoes_existentes">
    
            @error('sala_aula_acoes_existentes')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div>
            <label for="sala_aula_acoes_desenvolvidas" class="form-label">Descreva as ações necessárias a serem desenvolvidas</label>
            <input class="form-control @error('sala_aula_acoes_desenvolvidas') is-invalid @enderror" type="text" name="sala_aula_acoes_desenvolvidas" id="sala_aula_acoes_desenvolvidas">
    
            @error('sala_aula_acoes_desenvolvidas')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div>
            <label for="sala_aula_responsaveis_acoes" class="form-label">Descreva os responsáveis pelas ações na sala de aula</label>
            <input class="form-control @error('sala_aula_responsaveis_acoes') is-invalid @enderror" type="text" name="sala_aula_responsaveis_acoes" id="sala_aula_responsaveis_acoes">
    
            @error('sala_aula_responsaveis_acoes')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div>
        <h4>NA SALA DO AEE</h4>
        <div>
            <label for="sala_aee_acoes_existentes" class="form-label">Descreva as ações necessárias já existentes</label>
            <input class="form-control @error('sala_aee_acoes_existentes') is-invalid @enderror" type="text" name="sala_aee_acoes_existentes" id="sala_aee_acoes_existentes">
    
            @error('sala_aee_acoes_existentes')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div>
            <label for="sala_aee_acoes_desenvolvidas" class="form-label">Descreva as ações necessárias a serem desenvolvidas</label>
            <input class="form-control @error('sala_aee_acoes_desenvolvidas') is-invalid @enderror" type="text" name="sala_aee_acoes_desenvolvidas" id="sala_aee_acoes_desenvolvidas">
    
            @error('sala_aee_acoes_desenvolvidas')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div>
            <label for="sala_aee_responsaveis_acoes" class="form-label">Descreva os responsáveis pelas ações na sala do AEE</label>
            <input class="form-control @error('sala_aee_responsaveis_acoes') is-invalid @enderror" type="text" name="sala_aee_responsaveis_acoes" id="sala_aee_responsaveis_acoes">
    
            @error('sala_aee_responsaveis_acoes')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div>
        <h4>EM FAMÍLIA</h4>
        <div>
            <label for="familia_acoes_existentes" class="form-label">Descreva as ações necessárias já existentes</label>
            <input class="form-control @error('familia_acoes_existentes') is-invalid @enderror" type="text" name="familia_acoes_existentes" id="familia_acoes_existentes">
    
            @error('familia_acoes_existentes')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div>
            <label for="familia_acoes_desenvolvidas" class="form-label">Descreva as ações necessárias a serem desenvolvidas</label>
            <input class="form-control @error('familia_acoes_desenvolvidas') is-invalid @enderror" type="text" name="familia_acoes_desenvolvidas" id="familia_acoes_desenvolvidas">
    
            @error('familia_acoes_desenvolvidas')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div>
            <label for="familia_responsaveis_acoes" class="form-label">Descreva os responsáveis pelas ações em Família</label>
            <input class="form-control @error('familia_responsaveis_acoes') is-invalid @enderror" type="text" name="familia_responsaveis_acoes" id="familia_responsaveis_acoes">
    
            @error('familia_responsaveis_acoes')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div>
        <h4>RELATIVO À SAÚDE</h4>
        <div>
            <label for="saude_acoes_existentes" class="form-label">Descreva as ações necessárias já existentes</label>
            <input class="form-control @error('saude_acoes_existentes') is-invalid @enderror" type="text" name="saude_acoes_existentes" id="saude_acoes_existentes">
    
            @error('saude_acoes_existentes')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div>
            <label for="saude_acoes_desenvolvidas" class="form-label">Descreva as ações necessárias a serem desenvolvidas</label>
            <input class="form-control @error('saude_acoes_desenvolvidas') is-invalid @enderror" type="text" name="saude_acoes_desenvolvidas" id="saude_acoes_desenvolvidas">
    
            @error('saude_acoes_desenvolvidas')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div>
            <label for="saude_responsaveis_acoes" class="form-label">Descreva os responsáveis pelas ações relativas à saúde</label>
            <input class="form-control @error('saude_responsaveis_acoes') is-invalid @enderror" type="text" name="saude_responsaveis_acoes" id="saude_responsaveis_acoes">
    
            @error('saude_responsaveis_acoes')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div>
        <label for="organizacao_tipo_aee" class="form-label">TIPO DE AEE</label>
        <select class="form-control" name="organizacao_tipo_aee" id="organizacao_tipo_aee">
            <option value="" disabled></option>
        </select>
    
        @error('organizacao_tipo_aee')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </div>
    <div>
        <label for="atendimento_sala_recursos_multifuncionais" class="form-label">O ATENDIMENTO É REALIZADO NAS SALAS DE RECURSOS MULTIFUNCIONAIS</label>
        <fieldset>
            <label for="atendimento_sala_recursos_multifuncionais_sim" class="form-check-label form-check-inline">
                <input class="form-check-input" type="radio" id="atendimento_sala_recursos_multifuncionais_sim" name="atendimento_sala_recursos_multifuncionais" value="true" required>
                Sim
            </label>
    
            <label for="atendimento_sala_recursos_multifuncionais_nao" class="form-check-label form-check-inline">
                <input class="form-check-input" type="radio" id="atendimento_sala_recursos_multifuncionais_nao" name="atendimento_sala_recursos_multifuncionais" value="false">
                Não
            </label>
        </fieldset>
        <div id="atendimento_sala_recursos_multifuncionais-sim" class="d-none">
            <label for="tipo_sala" class="form-label"></label>
            <select class="form-control" name="tipo_sala" id="tipo_sala">
                <option value=""></option>
            </select>
    
            @error('tipo_sala')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div id="atendimento_sala_recursos_multifuncionais-nao" class="d-none">
            <div class="form-group">
                <label for="espaco_alternativo" class="form-label">Se o atendimento não for realizado nas salas de recursos multifuncionais, é realizado em qual espaço</label>
                <input class="form-control @error('espaco_alternativo') is-invalid @enderror" type="text" name="espaco_alternativo" id="espaco_alternativo">
    
                @error('espaco_alternativo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="frequencia_atendimentos" class="form-label">FREQUÊNCIA DE ATENDIMENTOS SEMANAIS</label>
        <select class="form-control @error('frequencia_atendimentos') is-invalid @enderror" name="frequencia_atendimentos" id="frequencia_atendimentos">
            <option value="" disabled></option>
        </select>
    
        @error('frequencia_atendimentos')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="profissionais_educacao_necessarios" class="form-label">QUAIS PROFISSIONAIS DA EDUCAÇÃO ESPECÍFICA SERÃO NECESSÁRIOS PARA ESTE ESTUDANTE</label>
        <select class="form-control @error('profissionais_educacao_necessarios') is-invalid @enderror" name="profissionais_educacao_necessarios" id="profissionais_educacao_necessarios">
            <option value="" disabled></option>
        </select>
    
        @error('profissionais_educacao_necessarios')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </div>
</form>

@endsection