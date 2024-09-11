@extends('layouts.app')

@push('nav-form')
    @include('layouts.form', ['pdi_id' => $pdi->id])
@endpush

@section('content')
<form class="m-2" action="{{route('pdi.desenvolvimento_estudante', ['pdi_id' => $pdi->id])}}" method="POST">
    @csrf
    <h4>Desenvolvimento do Estudande</h1>
    <div class="form-group">
        <label for="sistema_linguistico" class="form-label">Sistema linguístico utilizado pelo estudante na sua comunicação</label>
        <select class="form-control @error('sistema_linguistico') is-invalid @enderror" name="sistema_linguistico" id="sistema_linguistico">
            <option value="" disabled></option>
            @foreach ($sistemas_linguisticos as $sistema)
                <option value="{{$sistema}}">{{$sistema}}</option>
                
            @endforeach
        </select>
    
        @error('sistema_linguistico')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </div>
    
    <div id="outro_sistema_linguistico-div" class="form-group d-none">
        <label for="outro_sistema_linguistico" class="form-label">Outro sistema linguistico</label>
        <select class="form-control @error('outro_sistema_linguistico') is-invalid @enderror" name="outro_sistema_linguistico" id="outro_sistema_linguistico">
            <option value="" disabled></option>
        </select>
    
        @error('outro_sistema_linguistico')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </div>
    
    <div class="form-group">
        <label for="tecnologia_assistiva_utilizada" class="form-label">Quais as ferramentas de Tecnologia Assistiva (TA) já utilizadas pelo estudante</label>
        <input class="form-control @error('tecnologia_assistiva_utilizada') is-invalid @enderror" type="text" value="{{old('tecnologia_assistiva_utilizada') ?? $pdi->desenvolvimento->tecnologia_assistiva_utilizada ?? ''}}" name="tecnologia_assistiva_utilizada" id="tecnologia_assistiva_utilizada">
    
        @error('tecnologia_assistiva_utilizada')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="recursos_equipamentos_necessarios" class="form-label">Tipo de recurso e/ou equipamento que precisa ser providenciado para o estudante</label>
        <input class="form-control @error('recursos_equipamentos_necessarios') is-invalid @enderror" type="text" value="{{old('recursos_equipamentos_necessarios') ?? $pdi->desenvolvimento->recursos_equipamentos_necessarios ?? ''}}" name="recursos_equipamentos_necessarios" id="recursos_equipamentos_necessarios">
    
    
        @error('recursos_equipamentos_necessarios')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="implicacoes_especificidade_educacional" class="form-label">Implicações da especificidade educacional do estudante para a acessibilidade curricular</label>
        <textarea class="form-control @error('implicacoes_especificidade_educacional') is-invalid @enderror" type="text" name="implicacoes_especificidade_educacional" id="implicacoes_especificidade_educacional" 
            cols="30" rows="7">{{old('implicacoes_especificidade_educacional') ?? $pdi->desenvolvimento->implicacoes_especificidade_educacional ?? ''}}</textarea>
    
    
        @error('implicacoes_especificidade_educacional')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="outras_informacoes_relevantes" class="form-label">Outras informações relevantes</label>
        <textarea class="form-control @error('outras_informacoes_relevantes') is-invalid @enderror" type="text" name="outras_informacoes_relevantes" id="outras_informacoes_relevantes" 
            cols="30" rows="7">{{old('outras_informacoes_relevantes') ?? $pdi->desenvolvimento->outras_informacoes_relevantes ?? ''}}</textarea>
    
    
        @error('outras_informacoes_relevantes')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </div>
    <div>
        <label for="percepcao" class="form-label">PERCEPÇÃO</label>
        <small id="percepcaoHelp" class="form-text">Considerar os seguintes aspectos: percepção visual, auditiva, tátil, cinestésica, espacial e temporal.</small>
        <textarea class="form-control @error('percepcao') is-invalid @enderror" type="text" name="percepcao" id="percepcao" aria-describedby="percepcaoHelp" 
            cols="30" rows="7">{{old('percepcao') ?? $pdi->desenvolvimento->percepcao ?? ''}}</textarea>
    
    
        @error('percepcao')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </div>
    <div>
        <label for="atencao" class="form-label">ATENÇÃO</label>
        <small id="atencaoHelp" class="form-text">Considerar os seguintes aspectos: seleção e manutenção de foco, concentração, compreensão de ordens, identificação de personagens.</small>
        <textarea class="form-control @error('atencao') is-invalid @enderror" type="text" name="atencao" id="atencao" aria-describedby="atencaoHelp" 
            cols="30" rows="7">{{old('atencao') ?? $pdi->desenvolvimento->atencao ?? ''}}</textarea>
    
        @error('atencao')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    
    </div>
    <div>
        <label for="memoria" class="form-label">MEMÓRIA</label>
        <small id="memoriaHelp" class="form-text">Considerar os seguintes aspectos: memória auditiva, visual, verbal e numérica.</small>
        <textarea class="form-control @error('memoria') is-invalid @enderror" type="text" name="memoria" id="memoria" aria-describedby="memoriaHelp" 
            cols="30" rows="7">{{old('memoria') ?? $pdi->desenvolvimento->memoria ?? ''}}</textarea>                                                                                  
    
        @error('memoria')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </div>
    <div>
        <label for="linguagem" class="form-label">LINGUAGEM</label>
        <small id="linguagemHelp" class="form-text">Considerar aspectos relacionados com a expressão e compreensão da Língua Portuguesa: oralidade, leitura, escrita, conhecimento sobre a Língua Brasileira de Sinais (estudante surdo) e uso de outros recursos de comunicação, como Braille (estudantes cegos e/ ou com baixa visão).</small>
        <textarea class="form-control @error('linguagem') is-invalid @enderror" type="text" name="linguagem" id="linguagem" aria-describedby="linguagemHelp" 
            cols="30" rows="7">{{old('linguagem') ?? $pdi->desenvolvimento->linguagem ?? ''}}</textarea>
    
        @error('linguagem')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </div>
    <div>
        <label for="raciocinio_logico" class="form-label">RACIOCÍNIO LÓGICO</label>
        <small id="raciocinio_logicoHelp" class="form-text">Considere os seguintes aspectos: compreensão de relações de igualdade e diferença, reconhecimento de situações e capacidade de conclusões lógicas; compreensão de enunciados; resolução de problemas cotidianos; resolução de situações-problema, compreensão do mundo que o cerca, compreensão de ordens e de enunciados, causalidade, sequência lógica etc.</small>
        <textarea class="form-control @error('raciocinio_logico') is-invalid @enderror" type="text" name="raciocinio_logico" id="raciocinio_logico" aria-describedby="raciocinio_logicoHelp" 
            cols="30" rows="7">{{old('raciocinio_logico') ?? $pdi->desenvolvimento->raciocinio_logico ?? ''}}</textarea>
    
        @error('raciocinio_logico')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </div>
    <div>
        <label for="desenvolvimento_capacidade_motora" class="form-label">DESENVOLVIMENTO E CAPACIDADE MOTORA</label>
        <small id="desenvolvimento_capacidade_motoraHelp" class="form-text">Considere os seguintes aspectos: postura, locomoção, manipulação de objetos e combinação de movimentos, lateralidade, equilíbrio, orientação espaço-temporal, coordenação motora.</small>
        <textarea class="form-control @error('desenvolvimento_capacidade_motora') is-invalid @enderror" type="text" name="desenvolvimento_capacidade_motora" id="desenvolvimento_capacidade_motora" aria-describedby="desenvolvimento_capacidade_motoraHelp" 
            cols="30" rows="7">{{old('desenvolvimento_capacidade_motora') ?? $pdi->desenvolvimento->desenvolvimento_capacidade_motora ?? ''}}</textarea>
    
        @error('desenvolvimento_capacidade_motora')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </div>
    <div>
        <label for="area_emocional_afetiva_social" class="form-label">ÁREA EMOCIONAL – AFETIVA – SOCIAL</label>
        <small id="area_emocional_afetiva_socialHelp" class="form-text">Considere os seguintes aspectos em comportamentos repetitivos e rotineiros: emoções, reação à frustração, isolamento, medos, interação grupal, cooperação, afetividade.</small>
        <textarea class="form-control @error('area_emocional_afetiva_social') is-invalid @enderror" type="text" name="area_emocional_afetiva_social" id="area_emocional_afetiva_social" aria-describedby="area_emocional_afetiva_socialHelp" 
            cols="30" rows="7">{{old('area_emocional_afetiva_social') ?? $pdi->desenvolvimento->area_emocional_afetiva_social ?? ''}}</textarea>

        @error('area_emocional_afetiva_social')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </div>
    <div>
        <label for="atividades_vida_autonoma" class="form-label">ATIVIDADES DA VIDA AUTÔNOMA</label>
        <small id="atividades_vida_autonomaHelp" class="form-text">Considere as atividades executadas no dia a dia, os auxílios recebidos e o grau de autonomia</small>
        <textarea class="form-control @error('atividades_vida_autonoma') is-invalid @enderror" type="text" name="atividades_vida_autonoma" id="atividades_vida_autonoma" aria-describedby="atividades_vida_autonomaHelp"
            cols="30" rows="7">{{old('atividades_vida_autonoma') ?? $pdi->desenvolvimento->atividades_vida_autonoma ?? ''}}</textarea>
    
    
        @error('atividades_vida_autonoma')
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

@endsection