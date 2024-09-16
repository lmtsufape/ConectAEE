@extends('layouts.app')

@push('nav-form')
    @include('layouts.form', ['pdi_id' => $pdi->id])
@endpush

@section('content')

<form class="m-2" action="{{route('pdi.especificidade_educacional', ['pdi_id' => $pdi->id])}}" method="POST">
    @csrf
    <div>
        <h4>NA ESCOLA</h4>
        <div>
            <label for="escola_acoes_existentes" class="form-label">Descreva as ações necessárias já existentes</label>
            <textarea class="form-control @error('escola_acoes_existentes') is-invalid @enderror" name="escola_acoes_existentes" id="escola_acoes_existentes" 
                cols="30" rows="7">{{old('escola_acoes_existentes') ?? $pdi->especificidade->escola_acoes_existentes ?? ''}}</textarea>
            @error('escola_acoes_existentes')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div>
            <label for="escola_acoes_desenvolvidas" class="form-label">Descreva as ações necessárias a serem desenvolvidas</label>
            <textarea class="form-control @error('escola_acoes_desenvolvidas') is-invalid @enderror" type="text" name="escola_acoes_desenvolvidas" id="escola_acoes_desenvolvidas" 
                cols="30" rows="7">{{old('escola_acoes_desenvolvidas') ?? $pdi->especificidade->escola_acoes_desenvolvidas ?? ''}}</textarea>
    
            @error('escola_acoes_desenvolvidas')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div>
            <label for="escola_responsaveis_acoes" class="form-label">Descreva os responsáveis pelas ações nas escolas</label>
            <textarea class="form-control @error('escola_responsaveis_acoes') is-invalid @enderror" type="text" name="escola_responsaveis_acoes" id="escola_responsaveis_acoes" 
                cols="30" rows="7">{{old('escola_responsaveis_acoes') ?? $pdi->especificidade->escola_responsaveis_acoes ?? ''}}</textarea>
    
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
            <textarea class="form-control @error('sala_aula_acoes_existentes') is-invalid @enderror" type="text" name="sala_aula_acoes_existentes" id="sala_aula_acoes_existentes" 
                cols="30" rows="7">{{old('sala_aula_acoes_existentes') ?? $pdi->especificidade->sala_aula_acoes_existentes ?? ''}}</textarea>
    
            @error('sala_aula_acoes_existentes')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div>
            <label for="sala_aula_acoes_desenvolvidas" class="form-label">Descreva as ações necessárias a serem desenvolvidas</label>
            <textarea class="form-control @error('sala_aula_acoes_desenvolvidas') is-invalid @enderror" type="text" name="sala_aula_acoes_desenvolvidas" id="sala_aula_acoes_desenvolvidas" 
                cols="30" rows="7">{{old('sala_aula_acoes_desenvolvidas') ?? $pdi->especificidade->sala_aula_acoes_desenvolvidas ?? ''}}</textarea>
    
            @error('sala_aula_acoes_desenvolvidas')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div>
            <label for="sala_aula_responsaveis_acoes" class="form-label">Descreva os responsáveis pelas ações na sala de aula</label>
            <textarea class="form-control @error('sala_aula_responsaveis_acoes') is-invalid @enderror" type="text" name="sala_aula_responsaveis_acoes" id="sala_aula_responsaveis_acoes" 
                cols="30" rows="7">{{old('sala_aula_responsaveis_acoes') ?? $pdi->especificidade->sala_aula_responsaveis_acoes ?? ''}}</textarea>
    
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
            <textarea class="form-control @error('sala_aee_acoes_existentes') is-invalid @enderror" type="text" name="sala_aee_acoes_existentes" id="sala_aee_acoes_existentes" 
                cols="30" rows="7">{{old('sala_aee_acoes_existentes') ?? $pdi->especificidade->sala_aee_acoes_existentes ?? ''}}</textarea>
    
            @error('sala_aee_acoes_existentes')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div>
            <label for="sala_aee_acoes_desenvolvidas" class="form-label">Descreva as ações necessárias a serem desenvolvidas</label>
            <textarea class="form-control @error('sala_aee_acoes_desenvolvidas') is-invalid @enderror" type="text" name="sala_aee_acoes_desenvolvidas" id="sala_aee_acoes_desenvolvidas" 
                cols="30" rows="7">{{old('sala_aee_acoes_desenvolvidas') ?? $pdi->especificidade->sala_aee_acoes_desenvolvidas ?? ''}}</textarea>
    
            @error('sala_aee_acoes_desenvolvidas')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div>
            <label for="sala_aee_responsaveis_acoes" class="form-label">Descreva os responsáveis pelas ações na sala do AEE</label>
            <textarea class="form-control @error('sala_aee_responsaveis_acoes') is-invalid @enderror" type="text" name="sala_aee_responsaveis_acoes" id="sala_aee_responsaveis_acoes" 
                cols="30" rows="7">{{old('sala_aee_responsaveis_acoes') ?? $pdi->especificidade->sala_aee_responsaveis_acoes ?? ''}}</textarea>
    
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
            <textarea class="form-control @error('familia_acoes_existentes') is-invalid @enderror" type="text" name="familia_acoes_existentes" id="familia_acoes_existentes" 
                cols="30" rows="7">{{old('familia_acoes_existentes') ?? $pdi->especificidade->familia_acoes_existentes ?? ''}}</textarea>
    
            @error('familia_acoes_existentes')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div>
            <label for="familia_acoes_desenvolvidas" class="form-label">Descreva as ações necessárias a serem desenvolvidas</label>
            <textarea class="form-control @error('familia_acoes_desenvolvidas') is-invalid @enderror" type="text" name="familia_acoes_desenvolvidas" id="familia_acoes_desenvolvidas" 
                cols="30" rows="7">{{old('familia_acoes_desenvolvidas') ?? $pdi->especificidade->familia_acoes_desenvolvidas ?? ''}}</textarea>
    
            @error('familia_acoes_desenvolvidas')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div>
            <label for="familia_responsaveis_acoes" class="form-label">Descreva os responsáveis pelas ações em Família</label>
            <textarea class="form-control @error('familia_responsaveis_acoes') is-invalid @enderror" type="text" name="familia_responsaveis_acoes" id="familia_responsaveis_acoes" 
                cols="30" rows="7">{{old('familia_responsaveis_acoes') ?? $pdi->especificidade->familia_responsaveis_acoes ?? ''}}</textarea>
    
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
            <textarea class="form-control @error('saude_acoes_existentes') is-invalid @enderror" type="text" name="saude_acoes_existentes" id="saude_acoes_existentes" 
                cols="30" rows="7">{{old('saude_acoes_existentes') ?? $pdi->especificidade->saude_acoes_existentes ?? ''}}</textarea>
    
            @error('saude_acoes_existentes')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div>
            <label for="saude_acoes_desenvolvidas" class="form-label">Descreva as ações necessárias a serem desenvolvidas</label>
            <textarea class="form-control @error('saude_acoes_desenvolvidas') is-invalid @enderror" type="text" name="saude_acoes_desenvolvidas" id="saude_acoes_desenvolvidas" 
                cols="30" rows="7">{{old('saude_acoes_desenvolvidas') ?? $pdi->especificidade->saude_acoes_desenvolvidas ?? ''}}</textarea>
    
            @error('saude_acoes_desenvolvidas')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div>
            <label for="saude_responsaveis_acoes" class="form-label">Descreva os responsáveis pelas ações relativas à saúde</label>
            <textarea class="form-control @error('saude_responsaveis_acoes') is-invalid @enderror" type="text" name="saude_responsaveis_acoes" id="saude_responsaveis_acoes" 
                cols="30" rows="7">{{old('saude_responsaveis_acoes') ?? $pdi->especificidade->saude_responsaveis_acoes ?? ''}}</textarea>
    
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
            <option value="" disabled selected>Selecione uma opção</option>
            @foreach ($organizacoes as $organizacao)
                <option value="{{$organizacao}}" @selected((old('organizacao_tipo_aee') ?? $pdi->especificidade->organizacao_tipo_aee ?? '') == $organizacao)>{{$organizacao}}</option>
            @endforeach
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
            <label for="tipo_sala" class="form-label">Qual a sala?</label>
            <select class="form-control @error('tipo_sala') is-invalid @enderror" name="tipo_sala" id="tipo_sala">
                <option value="" disabled selected>Selecione uma opção</option>
                @foreach ($tipo_salas as $tipo)
                    <option value="{{$tipo['value']}}" @selected((old('tipo_sala') ?? $pdi->especificidade->tipo_sala ?? '') == $tipo['value'])>{{$tipo['descricao']}}</option>
                @endforeach
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
                <input class="form-control @error('espaco_alternativo') is-invalid @enderror" type="text" name="espaco_alternativo" id="espaco_alternativo" value="{{old('espaco_alternativo') ?? $pdi->especificidade->espaco_alternativo ?? ''}}">
    
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
            <option value="" disabled selected>Selecione uma opção</option>
            @foreach ($atendimentos as $atendimento)
                <option value="{{$atendimento}}" @selected((old('frequencia_atendimentos') ?? $pdi->especificidade->frequencia_atendimentos ?? '') == $atendimento)>{{$atendimento}}</option>
            @endforeach
        </select>
    
        @error('frequencia_atendimentos')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </div>
    <div id="frequencia_atendimentosDiv" class="d-none">
        <label for="frequencia_outro" class="form-label">Se o atendimento não for realizado nas salas de recursos multifuncionais, é realizado em qual espaço</label>
        <input class="form-control @error('frequencia_outro') is-invalid @enderror" type="text" name="frequencia_outro" id="frequencia_outro">

        @error('frequencia_outro')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="profissionais_educacao_necessarios" class="form-label">QUAIS PROFISSIONAIS DA EDUCAÇÃO ESPECÍFICA SERÃO NECESSÁRIOS PARA ESTE ESTUDANTE</label>
        <select class="form-control @error('profissionais_educacao_necessarios') is-invalid @enderror" name="profissionais_educacao_necessarios" id="profissionais_educacao_necessarios">
            <option value="" disabled selected>Selecione uma opção</option>
            @foreach ($profissionais as $profissional)
                <option value="{{$profissional}}" @selected((old('profissionais_educacao_necessarios') ?? $pdi->especificidade->profissionais_educacao_necessarios ?? '') == $profissional)>{{$profissional}}</option>
            @endforeach
        </select>
    
        @error('profissionais_educacao_necessarios')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </div>
    <div id="profissionais_educacao_necessariosDiv" class="d-none">
        <label for="profissionais_educacao_outro" class="form-label">Se o atendimento não for realizado nas salas de recursos multifuncionais, é realizado em qual espaço</label>
        <input class="form-control @error('profissionais_educacao_outro') is-invalid @enderror" type="text" name="profissionais_educacao_outro" id="profissionais_educacao_outro">

        @error('profissionais_educacao_outro')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </div>
    <div class="d-flex justify-content-between pt-5 pb-3">
        <a class="btn btn-danger" href="{{}}">Salvar e Voltar</a>
        <button class="btn btn-success" type="submit">Salvar e Continuar</button>
    </div>
</form>

@push('scripts')
    <script>
         $(document).ready(function() {
            function marcarRadio(nomeCampo, valorEsperado) {
                $('input[name="' + nomeCampo + '"]').each(function() {
                    if ($(this).val() === String(valorEsperado)) {
                        $(this).click();
                    }
                });
            }

            marcarRadio('atendimento_sala_recursos_multifuncionais', @json(old('atendimento_sala_recursos_multifuncionais') ?? $pdi->especificidade->atendimento_sala_recursos_multifuncionais ?? false));

            
        });

        $('input[name="atendimento_sala_recursos_multifuncionais"]').on('change', function() {
            if ($('#atendimento_sala_recursos_multifuncionais_sim').is(':checked')) {
                $('#atendimento_sala_recursos_multifuncionais-sim').removeClass('d-none');
                $('#atendimento_sala_recursos_multifuncionais-nao').addClass('d-none');

            } else if($('#atendimento_sala_recursos_multifuncionais_nao').is(':checked')) {
                $('#atendimento_sala_recursos_multifuncionais-nao').removeClass('d-none');
                $('#atendimento_sala_recursos_multifuncionais-sim').addClass('d-none');

            }
        });
    </script>
@endpush
@endsection