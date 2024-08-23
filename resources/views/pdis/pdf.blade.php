<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pdi.pdf</title>
    <style>
        table, th, td {
            border: 1px solid;
            border-collapse: collapse;
        }
    </style>
</head>
<body style="border-style: solid; border-color: red; border-width: 5.5px; margin: -14px;">

<img align="right" src="{{public_path('images/secretariaEducacao.png')}}"
     width="292px" height="91" style="margin: 8px">

<div style="margin: 10px">

    <h3 align="center" style="margin-top: 130px; font-size: 16px; font-weight: bold; font-family: 'Arial Black'">PLANO
        DE
        DESENVOLVIMENTO INDIVIDUAL</h3>
    <table width="96%" align="center">
        <tr>
            <td colspan="2">
                &nbsp;
                <br>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td width="30%">
                <span style="margin-left: 5px">
                    NOME DA ESCOLA:
                </span>
                <br>
                &nbsp;
            </td>
            <td><div style="margin-left: 5px;color: #4169e1">{{$pdi->nomeEscola}}</div></td>
        </tr>

        <tr>
            <td colspan="2" style="text-align: center"><b>1. IDENTIFICAÇÃO DO ESTUDANTE</b>
                <br>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td width="30%">
                <span style="margin-left: 5px">
                    NOME COMPLETO:
                </span>
                <br>
                &nbsp;
            </td>
            <td><div style="margin-left: 5px;color: #4169e1">{{\App\Aluno::find($pdi->aluno_id)->nome}}</div></td>
        </tr>
        <tr>
            <td width="30%">
                <span style="margin-left: 5px">
                    DATA DE NASCIMENTO:
                </span>
                <br>
                &nbsp;
            </td>
            <td><div style="margin-left: 5px;color: #4169e1">{{\App\Aluno::find($pdi->aluno_id)->data_de_nascimento}}</div></td>
        </tr>
        <tr>
            <td width="30%"><span style="margin-left: 5px">
                    ENDEREÇO:
                </span>
                <br>
                &nbsp;
            </td>
            <td><div style="margin-left: 5px;color: #4169e1">Rua {{$endereco->rua}}, N° {{$endereco->numero}},
                    Bairro {{$endereco->bairro}}, {{$endereco->cidade}} - {{$endereco->estado}}</div></td>
        </tr>

        <tr>
            <td colspan="2" style="text-align: center"><b>2. DADOS FAMILIARES</b>
                <br>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td width="30%">
                <span style="margin-left: 5px">
                    NOME DA MÃE:
                </span>
                <br>
                &nbsp;
            </td>
            <td><div style="margin-left: 5px;color: #4169e1">{{$pdi->nomeMae}}</div></td>
        </tr>
        <tr>
            <td width="30%">
                <span style="margin-left: 5px">
                    NOME DO PAI:
                </span>
                <br>
                &nbsp;
            </td>
            <td><span style="margin-left: 5px;color: #4169e1">{{$pdi->nomePai}}</span></td>
        </tr>
        <tr>
            <td width="30%">
                <span style="margin-left: 5px">
                    NÚMERO DE IRMÃOS:
                </span>
                <br>
                &nbsp;
            </td>
            <td><span style="margin-left: 5px;color: #4169e1">{{$pdi->numeroIrmaos}}</span></td>
        </tr>
        <tr>
            <td width="30%">
                <span style="margin-left: 5px">
                    MORA COM:
                </span>
                <br>
                &nbsp;
            </td>
            <td><span style="margin-left: 5px;color: #4169e1">{{$pdi->nomeResponsavel}}</span></td>
        </tr>

        <tr>
            <td colspan="2" style="text-align: center"><b>2. DADOS FAMILIARES</b>
                <br>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td width="30%">
                <span style="margin-left: 5px">
                    PROFESSOR(A) DA SALA
                REGULAR:
                </span>
                <br>
                &nbsp;
            </td>
            <td><span style="margin-left: 5px;color: #4169e1">{{$pdi->professorRegular}}</span></td>
        </tr>
        <tr>
            <td width="30%">
                <span style="margin-left: 5px">
                    ANO DE ESCOLARIDADE ATUAL:
                </span>
                <br>
                &nbsp;
            </td>
            <td><span style="margin-left: 5px;color: #4169e1">{{$pdi->anoEscolaridade}}</span></td>
        </tr>
        <tr>
            <td width="30%" COLSPAN="2">
                <span style="margin-left: 5px">MODALIDADE DE INÍCIO DA VIDA ESCOLAR:
                </span>
                <br><br>
                <span style="margin-left: 5px">
                (@if($pdi->modalidadeEscolar == 'EducInfantil') <b style="color: #4169e1">X</b> @endif {{')'}} EDUCAÇÃO INFANTIL
                </span>
                <br>
                <span style="margin-left: 5px">
                (@if($pdi->modalidadeEscolar != 'EducInfantil') <b style="color: #4169e1">X</b> @endif {{')'}} ANOS INICIAIS DO ENSINO FUNDAMENTAL
                </span>
                <br>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td width="30%">
                <span style="margin-left: 5px">TIPO DE DEFICIÊNCIA:
                </span>
                <br>
                &nbsp;
            </td>
            <td><span style="margin-left: 5px;color: #4169e1">{{\App\Aluno::find($pdi->aluno_id)->descricao_cid}}</span></td>
        </tr>
        <tr>
            <td width="30%" colspan="2">
                <span style="margin-left: 5px">CID (Classificação Estatística Internacional de Doenças e Problemas Relacionados com a Saúde):
                </span>
                <br>
                <span style="margin-left: 5px;color: #4169e1">{{\App\Aluno::find($pdi->aluno_id)->cid}}</span>
                <br>
                &nbsp;
            </td>
        </tr>
    </table>
</div>
<div style="margin: 10px; margin-top: 40px">
    <table width="96%" align="center">
        <tr>
            <td colspan="2" style="text-align: center"><b>4. AUTONOMIA DO ESTUDANTE</b>
                <br>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td colspan="2"><b style="margin-left: 5px">4.1 Condições de higiene pessoal</b>
                <br>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td width="40%">
                <span style="margin-left: 5px">Toma banho sozinho:
                </span>
                <br>
                &nbsp;
            </td>
            <td><span style="margin-left: 10px;">(@if($pdi->banhoSozinho == 'true') <b style="color: #4169e1">X</b> @endif {{')'}} Sim (@if($pdi->banhoSozinho != 'true')
                        <b style="color: #4169e1">X</b> @endif {{')'}} Não</span></td>
        </tr>
        <tr>
            <td width="40%">
                <span style="margin-left: 5px">Usa o banheiro sozinho:
                </span>
                <br>
                &nbsp;
            </td>
            <td><span style="margin-left: 10px">(@if($pdi->banheiroSozinho == 'true') <b style="color: #4169e1">X</b> @endif {{')'}} Sim (@if($pdi->banheiroSozinho != 'true')
                        <b style="color: #4169e1">X</b> @endif {{')'}} Não</span></td>
        </tr>
        <tr>
            <td width="40%">
                <span style="margin-left: 5px">Escova os dentes sozinho:
                </span>
                <br>
                &nbsp;
            </td>
            <td><span style="margin-left: 10px">(@if($pdi->escovaDentesSozinho == 'true') <b style="color: #4169e1">X</b> @endif {{')'}} Sim (@if($pdi->escovaDentesSozinho != 'true')
                        <b style="color: #4169e1">X</b> @endif {{')'}} Não</span></td>
        </tr>

        <tr>
            <td colspan="2"><b style="margin-left: 5px">4.2 Alimentação</b>
                <br>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td width="40%">
                <span style="margin-left: 5px">Come sozinho:
                </span>
                <br>
                &nbsp;
            </td>
            <td><span style="margin-left: 10px">(@if($pdi->comeSozinho == 'true') <b style="color: #4169e1">X</b> @endif {{')'}} Sim (@if($pdi->comeSozinho != 'true')
                        <b style="color: #4169e1">X</b> @endif {{')'}} Não</span></td>
        </tr>
        <tr>
            <td width="40%">
                <span style="margin-left: 5px">Bebe água sozinho:
                </span>
                <br>
                &nbsp;
            </td>
            <td><span style="margin-left: 10px">(@if($pdi->bebeAguaSozinho == 'true') <b style="color: #4169e1">X</b> @endif {{')'}} Sim (@if($pdi->bebeAguaSozinho != 'true')
                        <b style="color: #4169e1">X</b> @endif {{')'}} Não</span></td>
        </tr>

        <tr>
            <td colspan="2" style="text-align: center"><b>5. AVALIAÇÃO GERAL</b>
                <br>
                &nbsp;
            </td>
        </tr>

        <tr>
            <td colspan="2"><b style="margin-left: 5px">5.1 Âmbito familiar</b>
                <br>
                <span style="margin-left: 5px">
                    Apontar de forma descritiva as condições familiares do estudante.
                </span>
                <br>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td colspan="2" height="80px" valign="baseline">
                <span style="margin-left: 5px; margin-top: 0px">
                    Houve algum problema durante a gestação da mãe?
                </span>
                <br>
                <div style="margin-left: 5px;color: #4169e1">
                    {{$pdi->problemaGestacao}}
                </div>
                <br>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td colspan="2" height="150px" valign="baseline">
                <span style="margin-left: 5px; margin-top: 0px">
                    Quais os problemas? (Uso de medicamentos, drogas ou doenças)
                </span>
                <br>
                <div style="margin-left: 5px;color: #4169e1">
                    {{$pdi->descProbGestacao}}
                </div>
                <br>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td colspan="2" height="150px" valign="baseline">
                <span style="margin-left: 5px; margin-top: 0px">
                    Características do ambiente familiar:
                </span>
                <br>
                <div style="margin-left: 5px;color: #4169e1">
                    {{$pdi->ambienteFamiliar}}
                </div>
                <br>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td colspan="2" height="150px" valign="baseline">
                <span style="margin-left: 5px; margin-top: 0px">
                    Condições do ambiente familiar para a aprendizagem escolar:
                </span>
                <br>
                <div style="margin-left: 5px;color: #4169e1">
                    {{$pdi->aprendizagemEscolar}}
                </div>
                <br>
                &nbsp;
            </td>
        </tr>
    </table>
</div>

<div style="margin: 10px; margin-top: 10px">
    <table width="83%" align="center" style="margin-top: 30px">
        <tr>
            <td colspan="2" style="text-align: center"><b>5. CONDIÇÕES DE SAÚDE GERAL</b>
                <br>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div style="margin-left: 5px">Caso o estudante apresente alguma deficiência, problemas de comportamento
                    e/ou problemas de
                    saúde, descreva:
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2" height="210px" valign="baseline">
                <span style="margin-left: 5px; margin-top: 0px">
                    Existem recomendações da área da saúde? Se sim, quais?
                </span>
                <br>
                <div style="margin-left: 5px;color: #4169e1">
                    {{$pdi->recomendacoesSaude}}
                </div>
                <br>
                &nbsp;
            </td>
        </tr>

        <tr>
            <td colspan="2" height="210px" valign="baseline">
                <div style="margin-left: 5px; margin-top: 0px">
                    Tem diagnóstico da área da saúde que indica surdez, deficiência visual, física ou intelectual ou
                    transtorno global de desenvolvimento? Se sim, qual a data e o resultado do diagnóstico? Se não,
                    qual é a situação do estudante quanto ao diagnóstico?

                </div>
                <div style="margin-left: 5px; color: #4169e1">
                    {{$pdi->diagnosticoSaude}}
                </div>
                <br>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td colspan="2" height="210px" valign="baseline">
                <div style="margin-left: 5px; margin-top: 0px">
                    Tem outros problemas de saúde? Se sim, quais? Faz uso de medicamentos controlados?
                </div>
                <div style="margin-left: 5px; color: #4169e1">
                    @if($pdi->problemaSaude != null)
                        {{$pdi->problemaSaude}}
                    @else
                        Nenhum
                    @endif
                </div>
                <br>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td colspan="2" height="210px" valign="baseline">
                <div style="margin-left: 5px; margin-top: 0px">
                    Se sim, quais? O medicamento interfere no processo de aprendizagem? Explique.
                </div>
                <div style="margin-left: 5px; color: #4169e1">
                    {{$pdi->descricaoMedicamentos}}
                </div>
                <br>
                &nbsp;
            </td>
        </tr>
    </table>
</div>

<div style="margin: 10px; margin-top: 10px">
    <table width="83%" align="center" style="margin-top: 30px">
        <tr>
            <td colspan="2" style="text-align: center"><b>6. ESPECIFICIDADES EDUCACIONAIS DO ESTUDANTE</b>
                <br>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div style="margin-left: 5px">Caso o estudante apresente alguma especificidade, descreva:
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2" height="160px" valign="baseline">
                <div style="margin-left: 5px; margin-top: 0px">
                    Sistema linguístico utilizado pelo estudante na sua comunicação:
                </div>
                <div style="margin-left: 5px; color: #4169e1">
                    {{$pdi->sistemaLinguistico}}
                </div>
                <br>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td colspan="2" height="160px" valign="baseline">
                <div style="margin-left: 5px; margin-top: 0px">
                    Tipo de recurso e/ou equipamento já utilizado pelo estudante:
                </div>
                <div style="margin-left: 5px; color: #4169e1">
                    {{$pdi->tipoRecursoUsado}}
                </div>
                <br>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td colspan="2" height="160px" valign="baseline">
                <div style="margin-left: 5px; margin-top: 0px">
                    Tipo de recurso e/ou equipamento que precisa ser providenciado para o estudante:
                </div>
                <div style="margin-left: 5px;color: #4169e1">
                    {{$pdi->tipoRecursoProvidenciado}}
                </div>
                <br>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td colspan="2" height="160px" valign="baseline">
                <div style="margin-left: 5px; margin-top: 0px">
                    Implicações das especificidades do estudante para a acessibilidade curricular:
                </div>
                <div style="margin-left: 5px;color: #4169e1">
                    {{$pdi->implicacoesEspecificidades}}
                </div>
                <br>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td colspan="2" height="250px" valign="baseline">
                <div style="margin-left: 5px; margin-top: 0px">
                    Outras informações relevantes:
                </div>
                <div style="margin-left: 5px;color: #4169e1">
                    @if($pdi->informacoesRelevantes != null)
                        {{$pdi->informacoesRelevantes}}
                    @else
                        Nenhuma
                    @endif

                </div>
                <br>
                &nbsp;
            </td>
        </tr>
    </table>
</div>

<div style="margin: 10px; margin-top: 10px">
    <table width="83%" align="center" style="margin-top: 30px">
        <tr>
            <td colspan="2" style="text-align: center"><b>7. FUNÇÃO MOTORA DESENVOLVIMENTO E CAPACIDADE MOTORA</b>
                <br>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div style="margin-left: 5px">
                    Considerar as potencialidades e dificuldades.
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2" height="300px" valign="baseline">
                <div style="margin-left: 5px; margin-top: 0px">
                    Ao avaliar o estudante, considere os seguintes aspectos: postura, locomoção, manipulação de
                    objetos e combinação de movimentos, lateralidade, equilíbrio, orientação espaço temporal,
                    coordenação motora.
                </div>
                <div style="margin-left: 5px;color: #4169e1">
                    {{$pdi->avaliacaoMotora}}
                </div>
                <br>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td colspan="2" height="300px" valign="baseline">
                <div style="margin-left: 5px; margin-top: 0px">
                    Ao avaliar o aluno, considere os seguintes aspectos: estado emocional, reação à frustração,
                    isolamento, medos; interação grupal, cooperação, afetividade. Observações: FUNÇÃO PESSOAL/
                    SOCIAL ÁREA EMOCIONAL – AFETIVA – SOCIAL (considerar as potencialidades e dificuldades):
                </div>
                <div style="margin-left: 5px;color: #4169e1">
                    {{$pdi->avaliacaoEmocional}}
                </div>
                <br>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td colspan="2" height="300px" valign="baseline">
                <div style="margin-left: 5px; margin-top: 0px">
                    Com base nas potencialidades e considerando as dificuldades apresentadas pelo estudante, indicar
                    quais são as especificidades que constituem os objetivos do planejamento pedagógico no AEE:
                </div>
                <div style="margin-left: 5px; color: #4169e1">
                    {{$pdi->especificidadesObjetivo}}
                </div>
                <br>
                &nbsp;
            </td>
        </tr>
    </table>
</div>

<div style="margin: 10px; margin-top: 10px">
    <table width="83%" align="center" style="margin-top: 30px">
        <tr>
            <td colspan="2" height="110px" valign="baseline">
                <span style="margin-left: 5px">
                    RESPONSÁVEIS PELA AVALIAÇÃO:
                </span>
                <div style="margin-left: 5px; color: #4169e1">{{\App\Models\User::find($pdi->user_id)->name}}</div>
                <br>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td colspan="2" height="110px" valign="baseline">
                <span style="margin-left: 5px">
                    NOME DA PROFESSORA DA SALA DE AULA REGULAR:
                </span>
                <div style="margin-left: 5px;color: #4169e1">{{$pdi->professorRegular}}</div>
                <br>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td colspan="2" height="110px" valign="baseline">
                <span style="margin-left: 5px">
                    DATA DA AVALIAÇÃO:
                </span>
                <?php
                $date = new DateTime($pdi->updated_at);
                ?>
                <div style="margin-left: 5px;color: #4169e1">{{$date->format('d/m/Y')}}</div>
                <br>
                &nbsp;
            </td>
        </tr>
    </table>
</div>

</body>
</html>