@extends('layouts.app')

@push('nav-form')
    @include('layouts.form', ['pdi_id' => $pdi->id])
@endpush

@section('content')

<form class="m-2" action="{{route('pdi.condicoes_saude', ['pdi_id' => $pdi->id])}}" method="POST" >
    @csrf
    <h4>Condições de Saúde</h1>
    <div class="form-group">
        <label class="form-label">Tem diagnóstico da área da saúde que indica surdez, deficiência visual, física ou intelectual, TEA transtorno global de desenvolvimento?</label>
        <fieldset>
            <label for="tem_diagnostico_sim" class="form-check-label form-check-inline">
                <input type="radio" id="tem_diagnostico_sim" name="tem_diagnostico" value="true" class="form-check-input">
                Sim
            </label>
    
            <label for="tem_diagnostico_nao" class="form-check-label form-check-inline">
                <input type="radio" id="tem_diagnostico_nao" name="tem_diagnostico" value="false" class="form-check-input">
                Não
            </label>
        </fieldset>
        <div id="tem_diagnostico-sim" class="d-none">
            <div class="form-group">
                <label for="data_diagnostico" class="form-label">Qual a data</label>
                <input type="date" name="data_diagnostico" id="data_diagnostico" class="form-control @error('data_diagnostico') is-invalid @enderror">

                @error('data_diagnostico')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
    
            <div class="form-group">
                <label for="resultado_diagnostico" class="form-label">Qual o resultado</label>
                <input type="text" name="resultado_diagnostico" id="resultado_diagnostico" class="form-control @error('resultado_diagnostico') is-invalid @enderror">

                @error('resultado_diagnostico')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
    
        </div>
        <div id="tem_diagnostico-nao" class="d-none">
            <div class="form-group">
                <label for="situacao_diagnostico" class="form-label">qual a situação do diagnostico?</label>
                <input type="text" name="situacao_diagnostico" id="situacao_diagnostico" class="form-control @error('situacao_diagnostico') is-invalid @enderror">
   
                @error('situacao_diagnostico')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
    
        </div>
    </div>
    <div>
        <label class="form-label">Tem outras condições de saúde?</label>
        <fieldset>
            <label for="tem_outras_condicoes_sim" class="form-check-label form-check-inline">
                <input type="radio" id="tem_outras_condicoes_sim" name="tem_outras_condicoes" value="true" class="form-check-input">
                Sim
            </label>
    
            <label for="tem_outras_condicoes_nao" class="form-check-label form-check-inline">
                <input type="radio" id="tem_outras_condicoes_nao" name="tem_outras_condicoes" value="false" class="form-check-input">
                Não
            </label>
        </fieldset>
        <div id="tem_outras_condicoes-sim" class="d-none">
            <div class="form-group">
                <label for="outras_condicoes" class="form-label">Quais condições?</label>
                <input type="text" name="outras_condicoes" id="outras_condicoes" class="form-control @error('outras_condicoes') is-invalid @enderror">
       
                @error('outras_condicoes')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
    
        </div>
    </div>
    <div>
        <label class="form-label">Faz uso de alguma medicação?</label>
        <fieldset>
            <label for="faz_uso_medicacao_sim" class="form-check-label form-check-inline">
                <input type="radio" id="faz_uso_medicacao_sim" name="faz_uso_medicacao" value="true" class="form-check-input">
                Sim
            </label>
    
            <label for="faz_uso_medicacao_nao" class="form-check-label form-check-inline">
                <input type="radio" id="faz_uso_medicacao_nao" name="faz_uso_medicacao" value="false" class="form-check-input">
                Não
            </label>
        </fieldset>
        <div id="faz_uso_medicacao-sim" class="d-none">
            <div class="form-group">
                <label for="medicacoes" class="form-label">qual a situação do diagnostico?</label>
                <input type="text" name="medicacoes" id="medicacoes" class="form-control @error('medicacoes') is-invalid @enderror">
      
                @error('medicacoes')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
    
        </div>
    </div>
    <div>
        <label class="form-label">Existem recomendações da área de saúde?</label>
        <fieldset>
            <label for="tem_recomendacoes_sim" class="form-check-label form-check-inline">
                <input type="radio" id="tem_recomendacoes_sim" name="tem_recomendacoes" value="true" class="form-check-input">
                Sim
            </label>
    
            <label for="tem_recomendacoes_nao" class="form-check-label form-check-inline">
                <input type="radio" id="tem_recomendacoes_nao" name="tem_recomendacoes" value="false" class="form-check-input" >
                Não
            </label>
        </fieldset>
        <div id="tem_recomendacoes-sim" class="d-none">
            <div class="form-group">
                <label for="recomendacoes" class="form-label">qual a situação do diagnostico?</label>
                <input type="text" name="recomendacoes" id="recomendacoes" class="form-control @error('recomendacoes') is-invalid @enderror">
     
                @error('recomendacoes')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
    
        </div>
    </div>
    <div>
        <label class="form-label">Faz algum tipo de acompanhamento ou tratamento com profissionais?</label>
        <fieldset>
            <label for="faz_acompanhamento_sim" class="form-check-label form-check-inline">
                <input type="radio" id="faz_acompanhamento_sim" name="faz_acompanhamento" value="true" class="form-check-input">
                Sim
            </label>
    
            <label for="faz_acompanhamento_nao" class="form-check-label form-check-inline">
                <input type="radio" id="faz_acompanhamento_nao" name="faz_acompanhamento" value="false" class="form-check-input">
                Não
            </label>
        </fieldset>
        <div id="faz_acompanhamento-sim" class="d-none">
            <div class="form-group">
                <label for="acompanhamento" class="form-label">qual a situação do diagnostico?</label>
                <input type="text" name="acompanhamento" id="acompanhamento" class="form-control @error('acompanhamento') is-invalid @enderror">
      
                @error('acompanhamento')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
    
        </div>
    </div>
    <div class="d-flex justify-content-end pt-5 pb-3">
        <button class="btn btn-success" type="submit">Salvar e Continuar</button>
    </div>
</form>

@endsection

@push('scripts')
    <script>

        $('input[name="tem_diagnostico"]').on('change', function() {
            if ($('#tem_diagnostico_sim').is(':checked')) {
                $('#tem_diagnostico-sim').removeClass('d-none');
                $('#tem_diagnostico-nao').addClass('d-none');

            } else if($('#tem_diagnostico_nao').is(':checked')) {
                $('#tem_diagnostico-nao').removeClass('d-none');
                $('#tem_diagnostico-sim').addClass('d-none');

            }
        });

        function ocultarDiv(nomeInput) {
            $(`input[name="${nomeInput}"]`).on('change', function() {
                if ($(`#${nomeInput}_sim`).is(':checked')) {
                    $(`#${nomeInput}-sim`).removeClass('d-none');
                } else {
                    $(`#${nomeInput}-sim`).addClass('d-none');
                }
            });
        }
        ocultarDiv('tem_outras_condicoes');
        ocultarDiv('faz_uso_medicacao');
        ocultarDiv('tem_recomendacoes');
        ocultarDiv('faz_acompanhamento');


        
    </script>
@endpush
