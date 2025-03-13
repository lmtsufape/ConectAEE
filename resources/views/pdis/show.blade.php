@extends('layouts.app')

@section('content')
    <div class="panel-heading" id="login-card">
        <div class="row" style="margin-bottom: -20px" id="login-card">

            <div>
                <h2>
                    <strong style="color: #12583C">
                        Visualizar pdi
                    </strong>
                    <div style="font-size: 14px" id="login-card">
                       <a href="{{ route('alunos.index') }}">Início</a>> <a
                            href="{{ route('alunos.show', $pdi->aluno_id) }}">Perfil de
                            <strong>{{ $pdi->aluno->nome }}</strong></a>>
                        <a href="{{ route('pdis.index', $pdi->aluno_id) }}">Listar PDI's</a>>
                        Pdi
                    </div>
                </h2>
            </div>
        </div>
        <hr style="border-top: 1px solid #AAA;">
    </div>

    <div class="row">
        <div class="col-md-6">
            @isset($pdi->condicaoSaude)
                <h4 class="mb-4">Condições de Saúde</h4>

                <div class="card mb-3">
                    <div class="card-header">
                        <strong>Diagnóstico de Saúde</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="mb-2"><strong>Tem diagnóstico da área da saúde que indica surdez, deficiência
                                        visual, física ou intelectual, TEA transtorno global de desenvolvimento?</strong></p>
                                <p class="fw-bold">{{ $pdi->condicaoSaude->tem_diagnostico ? 'Sim' : 'Não' }}</p>
                            </div>
                        </div>

                        @if ($pdi->condicaoSaude->tem_diagnostico)
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="mb-2"><strong>Qual a data</strong></p>
                                    <p>{{ $pdi->condicaoSaude->data_diagnostico }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-2"><strong>Qual o resultado</strong></p>
                                    <p>{{ $pdi->condicaoSaude->resultado_diagnostico }}</p>
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="mb-2"><strong>Qual a situação do diagnóstico?</strong></p>
                                    <p>{{ $pdi->condicaoSaude->situacao_diagnostico }}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header">
                        <strong>Outras Condições de Saúde</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="mb-2"><strong>Tem outras condições de saúde?</strong></p>
                                <p class="fw-bold">{{ $pdi->condicaoSaude->tem_outras_condicoes ? 'Sim' : 'Não' }}</p>
                            </div>
                        </div>

                        @if ($pdi->condicaoSaude->tem_outras_condicoes)
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="mb-2"><strong>Quais condições?</strong></p>
                                    <p>{{ $pdi->condicaoSaude->outras_condicoes }}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header" id="headingMedicacao">
                        <strong>
                                Uso de Medicação
                        </strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="mb-2"><strong>Faz uso de alguma medicação?</strong></p>
                                <p class="fw-bold">{{ $pdi->condicaoSaude->faz_uso_medicacao ? 'Sim' : 'Não' }}</p>
                            </div>
                        </div>

                        @if ($pdi->condicaoSaude->faz_uso_medicacao)
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="mb-2"><strong>Qual a medicação?</strong></p>
                                    <p>{{ $pdi->condicaoSaude->medicacoes }}</p>
                                </div>
                            </div>
                        @endif
                    </div>

                </div>
                <div class="card mb-3">
                    <div class="card-header" id="headingAcompanhamento">
                        <strong>
                            
                                Acompanhamento Profissional
                        </strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="mb-2"><strong>Faz algum tipo de acompanhamento ou tratamento com
                                        profissionais?</strong></p>
                                <p class="fw-bold">{{ $pdi->condicaoSaude->faz_acompanhamento ? 'Sim' : 'Não' }}</p>
                            </div>
                        </div>

                        @if ($pdi->condicaoSaude->faz_acompanhamento)
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="mb-2"><strong>Quais profissionais?</strong></p>
                                    <p>{{ $pdi->condicaoSaude->acompanhamento }}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header">
                        <strong>Recomendações da Área de Saúde</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="mb-2"><strong>Existem recomendações da área de saúde?</strong></p>
                                <p class="fw-bold">{{ $pdi->condicaoSaude->tem_recomendacoes ? 'Sim' : 'Não' }}</p>
                            </div>
                        </div>

                        @if ($pdi->condicaoSaude->tem_recomendacoes)
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="mb-2"><strong>Quais recomendações?</strong></p>
                                    <p>{{ $pdi->condicaoSaude->recomendacoes }}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @endisset


        </div>
        <div class="col-md-6">
            @isset($pdi->desenvolvimento)
                <h4 class="mb-4"><strong>Desenvolvimento do Estudante</strong></h4>

                <div class="card shadow-sm mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Sistema linguístico utilizado pelo estudante</h5>
                        <p class="card-text">
                            {{ $pdi->desenvolvimento->sistema_linguistico ?? 'Não informado' }}
                        </p>
                    </div>
                </div>

                <div class="card shadow-sm mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Outro sistema linguístico</h5>
                        <p class="card-text">
                            {{ $pdi->desenvolvimento->outro_sistema_linguistico ?? 'Não informado' }}
                        </p>
                    </div>
                </div>

                <div class="card shadow-sm mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Tecnologia Assistiva Utilizada</h5>
                        <p class="card-text">
                            {{ $pdi->desenvolvimento->tecnologia_assistiva_utilizada ?? 'Não informado' }}
                        </p>
                    </div>
                </div>

                <div class="card shadow-sm mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Recurso e/ou equipamento necessário</h5>
                        <p class="card-text">
                            {{ $pdi->desenvolvimento->recursos_equipamentos_necessarios ?? 'Não informado' }}
                        </p>
                    </div>
                </div>

                <div class="card shadow-sm mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Implicações da especificidade educacional para a acessibilidade curricular</h5>
                        <p class="card-text">
                            {{ $pdi->desenvolvimento->implicacoes_especificidade_educacional ?? 'Não informado' }}
                        </p>
                    </div>
                </div>

                <div class="card shadow-sm mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Outras informações relevantes</h5>
                        <p class="card-text">
                            {{ $pdi->desenvolvimento->outras_informacoes_relevantes ?? 'Não informado' }}
                        </p>
                    </div>
                </div>

                <div class="card shadow-sm mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Percepção</h5>
                        <p class="card-text text-muted">
                            Considerar os seguintes aspectos: percepção visual, auditiva, tátil, cinestésica, espacial e
                            temporal.
                        </p>
                        <p class="card-text">
                            {{ $pdi->desenvolvimento->percepcao ?? 'Não informado' }}
                        </p>
                    </div>
                </div>

                <div class="card shadow-sm mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Atenção</h5>
                        <p class="card-text text-muted">
                            Considerar os seguintes aspectos: seleção e manutenção de foco, concentração, compreensão de ordens,
                            identificação de personagens.
                        </p>
                        <p class="card-text">
                            {{ $pdi->desenvolvimento->atencao ?? 'Não informado' }}
                        </p>
                    </div>
                </div>

                <div class="card shadow-sm mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Memória</h5>
                        <p class="card-text text-muted">
                            Considerar os seguintes aspectos: memória auditiva, visual, verbal e numérica.
                        </p>
                        <p class="card-text">
                            {{ $pdi->desenvolvimento->memoria ?? 'Não informado' }}
                        </p>
                    </div>
                </div>

                <div class="card shadow-sm mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Linguagem</h5>
                        <p class="card-text text-muted">
                            Considerar aspectos relacionados com a expressão e compreensão da Língua Portuguesa: oralidade,
                            leitura, escrita, conhecimento sobre a Língua Brasileira de Sinais (estudante surdo) e uso de outros
                            recursos de comunicação, como Braille (estudantes cegos e/ou com baixa visão).
                        </p>
                        <p class="card-text">
                            {{ $pdi->desenvolvimento->linguagem ?? 'Não informado' }}
                        </p>
                    </div>
                </div>

                <div class="card shadow-sm mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Raciocínio Lógico</h5>
                        <p class="card-text text-muted">
                            Considere os seguintes aspectos: compreensão de relações de igualdade e diferença, reconhecimento de
                            situações e capacidade de conclusões lógicas; compreensão de enunciados; resolução de problemas
                            cotidianos; resolução de situações-problema, compreensão do mundo que o cerca, compreensão de ordens
                            e de enunciados, causalidade, sequência lógica etc.
                        </p>
                        <p class="card-text">
                            {{ $pdi->desenvolvimento->raciocinio_logico ?? 'Não informado' }}
                        </p>
                    </div>
                </div>

                <div class="card shadow-sm mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Desenvolvimento e Capacidade Motora</h5>
                        <p class="card-text text-muted">
                            Considere os seguintes aspectos: postura, locomoção, manipulação de objetos e combinação de
                            movimentos, lateralidade, equilíbrio, orientação espaço-temporal, coordenação motora.
                        </p>
                        <p class="card-text">
                            {{ $pdi->desenvolvimento->desenvolvimento_capacidade_motora ?? 'Não informado' }}
                        </p>
                    </div>
                </div>

                <div class="card shadow-sm mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Área Emocional – Afetiva – Social</h5>
                        <p class="card-text text-muted">
                            Considere os seguintes aspectos em comportamentos repetitivos e rotineiros: emoções, reação à
                            frustração, isolamento, medos, interação grupal, cooperação, afetividade.
                        </p>
                        <p class="card-text">
                            {{ $pdi->desenvolvimento->area_emocional_afetiva_social ?? 'Não informado' }}
                        </p>
                    </div>
                </div>

                <div class="card shadow-sm mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Atividades da Vida Autônoma</h5>
                        <p class="card-text text-muted">
                            Considere as atividades executadas no dia a dia, os auxílios recebidos e o grau de autonomia.
                        </p>
                        <p class="card-text">
                            {{ $pdi->desenvolvimento->atividades_vida_autonoma ?? 'Não informado' }}
                        </p>
                    </div>
                </div>
            @endisset
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h4><strong>Especificidades Educacionais</strong></h4>
            <div class="container mt-4">
                <div class="card">
                    <div class="card-header">
                        <h4>NA ESCOLA</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="escola_acoes_existentes" class="form-label">Descreva as ações necessárias já
                                existentes</label>
                            <p class="form-control-plaintext">
                                {{ $pdi->especificidade->escola_acoes_existentes ?? 'Nenhuma informação disponível.' }}</p>
                        </div>
                        <div class="mb-3">
                            <label for="escola_acoes_desenvolvidas" class="form-label">Descreva as ações necessárias a
                                serem desenvolvidas</label>
                            <p class="form-control-plaintext">
                                {{ $pdi->especificidade->escola_acoes_desenvolvidas ?? 'Nenhuma informação disponível.' }}
                            </p>
                        </div>
                        <div class="mb-3">
                            <label for="escola_responsaveis_acoes" class="form-label">Descreva os responsáveis pelas ações
                                nas escolas</label>
                            <p class="form-control-plaintext">
                                {{ $pdi->especificidade->escola_responsaveis_acoes ?? 'Nenhuma informação disponível.' }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header">
                        <h4>NA SALA DE AULA</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="sala_aula_acoes_existentes" class="form-label">Descreva as ações necessárias já
                                existentes</label>
                            <p class="form-control-plaintext">
                                {{ $pdi->especificidade->sala_aula_acoes_existentes ?? 'Nenhuma informação disponível.' }}
                            </p>
                        </div>
                        <div class="mb-3">
                            <label for="sala_aula_acoes_desenvolvidas" class="form-label">Descreva as ações necessárias a
                                serem desenvolvidas</label>
                            <p class="form-control-plaintext">
                                {{ $pdi->especificidade->sala_aula_acoes_desenvolvidas ?? 'Nenhuma informação disponível.' }}
                            </p>
                        </div>
                        <div class="mb-3">
                            <label for="sala_aula_responsaveis_acoes" class="form-label">Descreva os responsáveis pelas
                                ações na sala de aula</label>
                            <p class="form-control-plaintext">
                                {{ $pdi->especificidade->sala_aula_responsaveis_acoes ?? 'Nenhuma informação disponível.' }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header">
                        <h4>NA SALA DO AEE</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="sala_aee_acoes_existentes" class="form-label">Descreva as ações necessárias já
                                existentes</label>
                            <p class="form-control-plaintext">
                                {{ $pdi->especificidade->sala_aee_acoes_existentes ?? 'Nenhuma informação disponível.' }}
                            </p>
                        </div>
                        <div class="mb-3">
                            <label for="sala_aee_acoes_desenvolvidas" class="form-label">Descreva as ações necessárias a
                                serem desenvolvidas</label>
                            <p class="form-control-plaintext">
                                {{ $pdi->especificidade->sala_aee_acoes_desenvolvidas ?? 'Nenhuma informação disponível.' }}
                            </p>
                        </div>
                        <div class="mb-3">
                            <label for="sala_aee_responsaveis_acoes" class="form-label">Descreva os responsáveis pelas
                                ações na sala do AEE</label>
                            <p class="form-control-plaintext">
                                {{ $pdi->especificidade->sala_aee_responsaveis_acoes ?? 'Nenhuma informação disponível.' }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header">
                        <h4>EM FAMÍLIA</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="familia_acoes_existentes" class="form-label">Descreva as ações necessárias já
                                existentes</label>
                            <p class="form-control-plaintext">
                                {{ $pdi->especificidade->familia_acoes_existentes ?? 'Nenhuma informação disponível.' }}
                            </p>
                        </div>
                        <div class="mb-3">
                            <label for="familia_acoes_desenvolvidas" class="form-label">Descreva as ações necessárias a
                                serem desenvolvidas</label>
                            <p class="form-control-plaintext">
                                {{ $pdi->especificidade->familia_acoes_desenvolvidas ?? 'Nenhuma informação disponível.' }}
                            </p>
                        </div>
                        <div class="mb-3">
                            <label for="familia_responsaveis_acoes" class="form-label">Descreva os responsáveis pelas
                                ações em Família</label>
                            <p class="form-control-plaintext">
                                {{ $pdi->especificidade->familia_responsaveis_acoes ?? 'Nenhuma informação disponível.' }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header">
                        <h4>NA COMUNIDADE</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="comunidade_acoes_existentes" class="form-label">Descreva as ações necessárias já
                                existentes</label>
                            <p class="form-control-plaintext">
                                {{ $pdi->especificidade->comunidade_acoes_existentes ?? 'Nenhuma informação disponível.' }}
                            </p>
                        </div>
                        <div class="mb-3">
                            <label for="comunidade_acoes_desenvolvidas" class="form-label">Descreva as ações necessárias a
                                serem desenvolvidas</label>
                            <p class="form-control-plaintext">
                                {{ $pdi->especificidade->comunidade_acoes_desenvolvidas ?? 'Nenhuma informação disponível.' }}
                            </p>
                        </div>
                        <div class="mb-3">
                            <label for="comunidade_responsaveis_acoes" class="form-label">Descreva os responsáveis pelas
                                ações na comunidade</label>
                            <p class="form-control-plaintext">
                                {{ $pdi->especificidade->comunidade_responsaveis_acoes ?? 'Nenhuma informação disponível.' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-6">
            <h4 class="mb-4"><strong>Sala de Recursos Multifuncionais</strong></h4>

            <div class="card mb-3 shadow-sm">
                <div class="card-header">
                    <h5 class="mb-0"></i> Área Cognitiva</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="trabalho_area_cognitiva" class="form-label">Trabalho a ser realizado</label>
                            <p class="form-control-plaintext">
                                {{ $pdi->recursosMultifuncionais->trabalho_area_cognitiva ?? 'Não informado' }}</p>
                        </div>
                        <div class="col-md-6">
                            <label for="objetivo_area_cognitiva" class="form-label">Objetivo a ser atingido</label>
                            <p class="form-control-plaintext">
                                {{ $pdi->recursosMultifuncionais->objetivo_area_cognitiva ?? 'Não informado' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3 shadow-sm">
                <div class="card-header">
                    <h5 class="mb-0">Área Social</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="trabalho_area_social" class="form-label">Trabalho a ser realizado</label>
                            <p class="form-control-plaintext">
                                {{ $pdi->recursosMultifuncionais->trabalho_area_social ?? 'Não informado' }}</p>
                        </div>
                        <div class="col-md-6">
                            <label for="objetivo_area_social" class="form-label">Objetivo a ser atingido</label>
                            <p class="form-control-plaintext">
                                {{ $pdi->recursosMultifuncionais->objetivo_area_social ?? 'Não informado' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3 shadow-sm">
                <div class="card-header">
                    <h5 class="mb-0">Área Motora</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="trabalho_area_motora" class="form-label">Trabalho a ser realizado</label>
                            <p class="form-control-plaintext">
                                {{ $pdi->recursosMultifuncionais->trabalho_area_motora ?? 'Não informado' }}</p>
                        </div>
                        <div class="col-md-6">
                            <label for="objetivo_area_motora" class="form-label">Objetivo a ser atingido</label>
                            <p class="form-control-plaintext">
                                {{ $pdi->recursosMultifuncionais->objetivo_area_motora ?? 'Não informado' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3 shadow-sm">
                <div class="card-header">
                    <h5 class="mb-0">Altas Habilidades e Superdotação</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="trabalho_altas_habilidade_superdotacao" class="form-label">Trabalho a ser
                                realizado</label>
                            <p class="form-control-plaintext">
                                {{ $pdi->recursosMultifuncionais->trabalho_altas_habilidade_superdotacao ?? 'Não informado' }}
                            </p>
                        </div>
                        <div class="col-md-6">
                            <label for="objetivo_altas_habilidade_superdotacao" class="form-label">Objetivo a ser
                                atingido</label>
                            <p class="form-control-plaintext">
                                {{ $pdi->recursosMultifuncionais->objetivo_altas_habilidade_superdotacao ?? 'Não informado' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3 shadow-sm">
                <div class="card-header">
                    <h5 class="mb-0"> Atividades e Recursos</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="atividades_para_desenvolver_aluno_aee" class="form-label">Atividades a
                                desenvolver</label>
                            <p class="form-control-plaintext">
                                {{ $pdi->recursosMultifuncionais->atividades_para_desenvolver_aluno_aee ?? 'Não informado' }}
                            </p>
                        </div>
                        <div class="col-md-6">
                            <label for="recursos_materias_equipamentos" class="form-label">Recursos e equipamentos</label>
                            <p class="form-control-plaintext">
                                {{ $pdi->recursosMultifuncionais->recursos_materias_equipamentos ?? 'Não informado' }}</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            <strong>Finalização</strong>
        </div>
        <div class="card-body">
            <label for="">Síntese da Avaliação Trimestral do estudante</label>
            <p class="form-control-plaintext">
                {{ $pdi->finalizacao->recursos_materias_equipamentos ?? 'Não informado' }}</p>
        </div>
    </div>

    <div class="text-center">
        <a class="btn btn-secondary w-50" href="{{ route('pdis.index', $pdi->aluno_id) }}">
            Voltar
        </a>
    </div>
@endsection
