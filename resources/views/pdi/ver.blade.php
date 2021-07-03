@extends('layouts.principal')
@section('title','Ver PDI')
@section('navbar')
@endsection

@section('content')
    <div class="container" style="color: #12583C">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default" style="margin-top: -20px; padding: 10px 20px;" id="login-card">

                    <div class="panel-heading" id="login-card">
                        <div class="row" style="margin-bottom: -20px" id="login-card">

                            <div class="col-md-6" id="login-card">
                                <h2>
                                    <strong style="color: #12583C">
                                        Ver Pdi - {{$pdi->created_at}}
                                    </strong>
                                    <div style="font-size: 14px" id="login-card">
                                        <a href="{{route('aluno.listar')}}">Início</a>
                                        > <a href="{{route('aluno.listar')}}">Início</a>> <a
                                                href="{{route('aluno.gerenciar',$pdi->aluno_id)}}">Perfil de
                                            <strong>{{ explode(" ", \App\Aluno::find($pdi->aluno_id)->nome)[0]}}</strong></a>>
                                        <a href="{{route('pdi.listar', $pdi->aluno_id)}}">Listar PDI's</a>>
                                        Pdi
                                    </div>
                                </h2>
                            </div>
                        </div>
                        <hr style="border-top: 1px solid #AAA;">
                    </div>

                    <div class="panel-body" style="margin-top: -30px" id="login-card">
                        <div class="col-md-8 col-md-offset-2" id="login-card">
                            <h3>
                                <strong>
                                    Informação Familiares
                                </strong>
                            </h3>

                            <hr style="border-top: 1px solid #AAA;">

                            <strong>Nome da Mãe:</strong> {{$pdi->nomeMae}}
                            <br>
                            <strong>Nome do Pai:</strong> {{$pdi->nomePai}}
                            <br>
                            <strong>Nome do Responsavel (Mora Com):</strong> {{$pdi->nomeResponsavel}}
                            <br>
                            <strong>Numero de Irmãos:</strong> {{$pdi->numeroIrmaos}}
                        </div>
                    </div>

                    <div class="panel-body" style="margin-top: -30px" id="login-card">
                        <div class="col-md-8 col-md-offset-2" id="login-card">
                            <h3>
                                <strong>
                                    Informação Escolar:
                                </strong>
                            </h3>

                            <hr style="border-top: 1px solid #AAA;">

                            <strong>Nome da escola: </strong> {{$pdi->nomeEscola}}
                            <br>
                            <strong>Nome do professor da sala regular: </strong> {{$pdi->professorRegular}}
                            <br>
                            <strong>Modalidade de inicio da vida escolar: </strong>
                            @if($pdi->modalidadeEscolar == "EducInfantil")
                                Educação Infantil
                            @else
                                Anos Iniciais do Ensino Fundamental
                            @endif
                            <br>
                            <strong>Ano de escolaridade atual: </strong> {{$pdi->anoEscolaridade}} Ano

                            <h3 style="padding-top: 20px">
                                <strong>
                                    Autonomia do Estudante:
                                </strong>
                            </h3>

                            <hr style="border-top: 1px solid #AAA;">

                            <div class="col-md-6" style="padding:0px" id="login-card">
                                <strong>Toma banho sozinho ? </strong>
                                @if($pdi->banhoSozinho == true)
                                    Sim
                                @else
                                    Não
                                @endif
                                <br>
                                <strong>Usa o banheiro sozinho ? </strong>
                                @if($pdi->banhoSozinho == true)
                                    Sim
                                @else
                                    Não
                                @endif
                                <br>
                                <strong>Escova os Dentes sozinho ? </strong>
                                @if($pdi->escovaDentesSozinho == true)
                                    Sim
                                @else
                                    Não
                                @endif
                            </div>

                            <div class="col-md-6" style="padding: 0px" id="login-card">
                                <strong>Come Sozinho ?</strong>
                                @if($pdi->comeSozinho == true)
                                    Sim
                                @else
                                    Não
                                @endif
                                <br>
                                <strong>Bebe água sozinho ?</strong>
                                @if($pdi->bebeAguaSozinho)
                                    Sim
                                @else
                                    Não
                                @endif
                            </div>

                            <div class="col-md-12" style="padding:0px; padding-top:20px;" id="login-card">
                                <h3>
                                    <strong>Ambito Familiar</strong>
                                </h3>
                                Apontar de forma descritiva as condições familiares do estudante.

                                <hr style="border-top: 1px solid #AAA;">

                                <strong>Houve algum problema durante a gestação da mãe ?</strong>
                                <br>{{$pdi->problemaGestacao}}
                                <br><br>
                                @if($pdi->descProbGestacao != null)
                                    <strong>Quais os problemas? (Uso de medicamentos, drogas ou doenças):</strong>
                                    <p>{{$pdi->descProbGestacao}}
                                    </p>
                                @endif
                                <strong>Características do ambiente familiar:</strong>
                                <br>{{$pdi->ambienteFamiliar}}
                                <br><br>
                                <strong>Condições do ambiente familiar para a aprendizagem escolar:</strong>
                                <br>{{$pdi->aprendizagemEscolar}}
                            </div>
                            <div class="col-md-12" style="padding:0px; padding-top:20px;" id="login-card">
                                <h3>
                                    <strong>Condições de Saúde Geral</strong>
                                </h3>
                                Caso o estudante apresente alguma deficiência, problemas de comportamento e/ou problemas
                                de
                                saúde, descreva:
                                <hr style="border-top: 1px solid #AAA;">

                                <strong>Existem recomendações da área da saúde? Se sim, quais?</strong>
                                <br>{{$pdi->recomendacoesSaude}}
                                <br><br>

                                <strong>Tem diagnóstico da área da saúde que indica surdez, deficiência visual, física
                                    ou intelectual ou transtorno global de desenvolvimento? Se sim, qual a data e o
                                    resultado do diagnóstico? Se não, qual é a situação do estudante quanto ao
                                    diagnóstico?</strong>
                                <br>{{$pdi->diagnosticoSaude}}
                                <br><br>

                                <strong>Tem outros problemas de saúde? Se sim, quais? Faz uso de medicamentos
                                    controlados?</strong>
                                <br>{{$pdi->problemasSaude}}
                                <br><br>
                                @if($pdi->descricaoMedicamentos != null)
                                    <strong>Se sim, quais? O medicamento interfere no processo de aprendizagem?
                                        Explique:</strong>
                                    <br>{{$pdi->descricaoMedicamentos}}
                                @endif
                            </div>

                            <div class="col-md-12" style="padding:0px; padding-top:20px;" id="login-card">
                                <h3>
                                    <strong>Especificidades Educacionais do Estudante</strong>
                                </h3>
                                Caso o estudante apresente alguma especificidade, descreva:

                                <hr style="border-top: 1px solid #AAA;">

                                <strong>Sistema linguístico utilizado pelo estudante na sua comunicação:</strong>
                                <br>{{$pdi->sistemaLinguistico}}
                                <br><br>

                                <strong>Tipo de recurso e/ou equipamento já utilizado pelo estudante:</strong>
                                <br>{{$pdi->tipoRecursoUsado}}
                                <br><br>

                                <strong>Tipo de recurso e/ou equipamento que precisa ser providenciado para o
                                    estudante:</strong>
                                <br>{{$pdi->tipoRecursoProvidenciado}}
                                <br><br>

                                <strong>Implicações das especificidades do estudante para a acessibilidade
                                    curricular:</strong>
                                <br>{{$pdi->implicacoesEspecificidades}}
                                <br><br>

                                @if($pdi->informacoesRelevantes != null)
                                    <strong>Outras informações relevantes:</strong>
                                    <br>{{$pdi->informacoesRelevantes}}
                                @endif
                            </div>

                            <div class="col-md-12" style="padding:0; padding-top:20px; " id="login-card">
                                <h3>
                                    <strong>Funçao Motora Desenvolvimento e Capacidade Motora</strong>
                                </h3>
                                Considerar as potencialidades e dificuldades.

                                <hr style="border-top: 1px solid #AAA;">

                                <strong>Ao avaliar o estudante, considere os seguintes aspectos: postura, locomoção,
                                    manipulação de objetos e combinação de movimentos, lateralidade, equilíbrio,
                                    orientação espaço temporal, coordenação motora:</strong>
                                <br>
                                    {{$pdi->avaliacaoMotora}}
                                <br><br>

                                <strong>Ao avaliar o aluno, considere os seguintes aspectos: estado emocional, reação à
                                    frustração, isolamento, medos; interação grupal, cooperação, afetividade.
                                    Observações: FUNÇÃO PESSOAL/ SOCIAL ÁREA EMOCIONAL – AFETIVA – SOCIAL (considerar as
                                    potencialidades e dificuldades):</strong>
                                <br>
                                    {{$pdi->avaliacaoEmocional}}
                                <br><br>

                                <strong>Com base nas potencialidades e considerando as dificuldades apresentadas pelo
                                    estudante, indicar quais são as especificidades que constituem os objetivos do
                                    planejamento pedagógico no AEE:</strong>
                                <br>
                                    {{$pdi->especificidadesObjetivo}}
                                <br><br>
                            </div>

                        </div>
                    </div>

                    <div class="panel-footer" style="background-color:white" id="login-card">
                        <div class="text-center" id="login-card">
                            <a class="btn btn-secondary" href="{{route('pdi.listar', $pdi->aluno_id)}}" id="menu-a">
                                Voltar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        strong {
            padding-top: 20px;
        }
    </style>
@endsection
