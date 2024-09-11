@extends('layouts.form')

@section('form')

    <div>
        <h2>
            <strong style="color: #12583C">
                Cadastrar PDI
            </strong>
            <div style="font-size: 14px" id="login-card">
                <a href="{{route('aluno.index')}}">Início</a>> <a
                        href="{{route('aluno.show',$aluno->id)}}">Perfil de
                    <strong>{{ explode(" ", $aluno->nome)[0]}}</strong></a>>
                <a href="{{route('pdi.index', $aluno->id)}}">Listar PDI's</a>
                >Cadastrar PDI
            </div>
        </h2>

        <hr style="border-top: 1px solid #AAA;">
    </div>

    <form class="m-3" method="POST" action="{{ route("pdi.store", ['aluno_id' => $aluno->id]) }}" enctype="multipart/form-data">
        @csrf
        <h3>Condições de saúde</h3>
        <div class="form-group">
            <label for="diagnostico">Tem diagnóstico da área da saúde que indica surdez, deficiência visual, física ou intelectual, TEA transtorno global de desenvolvimento?</label>
            <fieldset>
                <label for="**-sim">
                    <input type="radio" id="**-sim" name="**" value="sim" required>
                    Sim
                </label>
                
                <label for="**-nao">
                    <input type="radio" id="**-nao" name="**" value="nao">
                    Não
                </label>
            </fieldset>
        </div>
        <div>
            <label for="">Tem outras condições de saúde?</label>
            <fieldset>
                <label for="**-sim">
                    <input type="radio" id="**-sim" name="**" value="sim" required>
                    Sim
                </label>
                
                <label for="**-nao">
                    <input type="radio" id="**-nao" name="**" value="nao">
                    Não
                </label>
            </fieldset>
        </div>
        <div>
            <label for="">Faz uso de alguma medicação?</label>
            <fieldset>
                <label for="**-sim">
                    <input type="radio" id="**-sim" name="**" value="sim" required>
                    Sim
                </label>
                
                <label for="**-nao">
                    <input type="radio" id="**-nao" name="**" value="nao">
                    Não
                </label>
            </fieldset>
        </div>
        <div>
            <label for="">Existem recomendações da área de saúde?</label>
            <fieldset>
                <label for="**-sim">
                    <input type="radio" id="**-sim" name="**" value="sim" required>
                    Sim
                </label>
                
                <label for="**-nao">
                    <input type="radio" id="**-nao" name="**" value="nao">
                    Não
                </label>
            </fieldset>
        </div>
        <div>
            <label for="">Faz algum tipo de acompanhamento ou tratamento com profissionais?</label>
            <fieldset>
                <label for="**-sim">
                    <input type="radio" id="**-sim" name="**" value="sim" required>
                    Sim
                </label>
                
                <label for="**-nao">
                    <input type="radio" id="**-nao" name="**" value="nao">
                    Não
                </label>
            </fieldset>
        </div>
        <div class="form-group">
            <label for="">Sistema linguístico utilizado pelo estudante na sua comunicação</label>
            <select class="form-control" name="" id="">
                <option value="" disabled></option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Quais as ferramentas de Tecnologia Assistiva (TA) já utilizadas pelo estudante</label>
            <input class="form-control" type="text" name="" id="">
        </div>
        <div class="form-group">
            <label for="">Tipo de recurso e/ou equipamento que precisa ser providenciado para o estudante</label>
            <input class="form-control" type="text" name="" id="">

        </div>
        <div class="form-group">
            <label for="">Implicações da especificidade educacional do estudante para a acessibilidade curricular</label>
            <input class="form-control" type="text" name="" id="">

        </div>
        <div class="form-group">
            <label for="">Outras informações relevantes</label>
            <input class="form-control" type="text" name="" id="">

        </div>
        <div>
            <label for="">PERCEPÇÃO</label>
            <input class="form-control" type="text" name="" id="">

        </div>
        <div>
            <label for="">ATENÇÃO</label>
            <input class="form-control" type="text" name="" id="">

        </div>
        <div>
            <label for="">MEMÓRIA</label>
            <input class="form-control" type="text" name="" id="">

        </div>
        <div>
            <label for="">LINGUAGEM</label>
            <input class="form-control" type="text" name="" id="">

        </div>
        <div>
            <label for="">RACIOCÍNIO LÓGICO</label>
            <input class="form-control" type="text" name="" id="">

        </div>
        <div>
            <label for="">DESENVOLVIMENTO E CAPACIDADE MOTORA</label>
            <input class="form-control" type="text" name="" id="">

        </div>
        <div>
            <label for="">ÁREA EMOCIONAL – AFETIVA – SOCIAL</label>
            <input class="form-control" type="text" name="" id="">

        </div>
        <div>
            <label for="">ATIVIDADES DA VIDA AUTÔNOMA</label>
            <input class="form-control" type="text" name="" id="">

        </div>
        <div>
            <label for="">Descreva as ações necessárias já existentes</label>
            <input class="form-control" type="text" name="" id="">

        </div>
        <div>
            <label for="">Descreva as ações necessárias a serem desenvolvidas</label>
            <input class="form-control" type="text" name="" id="">

        </div>
        <div>
            <label for="">Descreva os responsáveis pelas ações nas escolas</label>
            <input class="form-control" type="text" name="" id="">

        </div>
        <div>
            <label for="">Descreva as ações necessárias já existentes</label>
            <input class="form-control" type="text" name="" id="">

        </div>
        <div>
            <label for="">Descreva as ações necessárias a serem desenvolvidas</label>
            <input class="form-control" type="text" name="" id="">

        </div>
        <div>
            <label for="">Descreva os responsáveis pelas ações na sala de aula</label>
            <input class="form-control" type="text" name="" id="">

        </div>
        <div>
            <label for="">Descreva as ações necessárias já existentes</label>
            <input class="form-control" type="text" name="" id="">

        </div>
        <div>
            <label for="">Descreva as ações necessárias a serem desenvolvidas</label>
            <input class="form-control" type="text" name="" id="">

        </div>
        <div>
            <label for="">Descreva os responsáveis pelas ações na sala do AEE</label>
            <input class="form-control" type="text" name="" id="">

        </div>
        <div>
            <label for="">Descreva as ações necessárias já existentes</label>
            <input class="form-control" type="text" name="" id="">

        </div>
        <div>
            <label for="">Descreva as ações necessárias a serem desenvolvidas</label>
            <input class="form-control" type="text" name="" id="">

        </div>
        <div>
            <label for="">Descreva os responsáveis pelas ações em Família</label>
            <input class="form-control" type="text" name="" id="">

        </div>
        <div>
            <label for="">Descreva as ações necessárias já existentes</label>
            <input class="form-control" type="text" name="" id="">

        </div>
        <div>
            <label for="">Descreva as ações necessárias a serem desenvolvidas</label>
            <input class="form-control" type="text" name="" id="">

        </div>
        <div>
            <label for="">Descreva os responsáveis pelas ações relativas à saúde</label>
            <input class="form-control" type="text" name="" id="">

        </div>
        <div>
            <label for="">TIPO DE AEE</label>
            <select class="form-control" name="" id="">
                <option value="" disabled></option>
            </select>
        </div>
        <div>
            <label for="">O ATENDIMENTO É REALIZADO NAS SALAS DE RECURSOS MULTIFUNCIONAIS</label>
            <fieldset>
                <label for="**-sim">
                    <input type="radio" id="**-sim" name="**" value="sim" required>
                    Sim
                </label>
                
                <label for="**-nao">
                    <input type="radio" id="**-nao" name="**" value="nao">
                    Não
                </label>
            </fieldset>
        </div>
        <div>
            <label for="">Se o atendimento não for realizado nas salas de recursos multifuncionais, é realizado em qual espaço</label>
        </div>
        <div>
            <label for="">FREQUÊNCIA DE ATENDIMENTOS SEMANAIS</label>
            <select class="form-control" name="" id="">
                <option value="" disabled></option>
            </select>
        </div>
        <div>
            <label for="">QUAIS PROFISSIONAIS DA EDUCAÇÃO ESPECÍFICA SERÃO NECESSÁRIOS PARA ESTE ESTUDANTE</label>
            <select class="form-control" name="" id="">
                <option value="" disabled></option>
            </select>
        </div>
        <div>
            <label for="">Descreva sobre o trabalho a ser realizado na sala de recursos multifuncionais na Área Cognitiva</label>
            <input class="form-control" type="text" name="" id="">

        </div>
        <div>
            <label for="">Descreva sobre o objetivo a ser atingido na Área Cognitiva</label>
            <input class="form-control" type="text" name="" id="">

        </div>
        <div>
            <label for="">Descreva sobre o trabalho a ser realizado na sala de recursos multifuncionais na Área Social</label>
            <input class="form-control" type="text" name="" id="">

        </div>
        <div>
            <label for="">Descreva sobre o objetivo a ser atingido na Área Social</label>
            <input class="form-control" type="text" name="" id="">

        </div>
        <div>
            <label for="">Descreva sobre o trabalho a ser realizado na sala de recursos multifuncionais na Área Motora</label>
            <input class="form-control" type="text" name="" id="">

        </div>
        <div>
            <label for="">Descreva sobre o objetivo a ser atingido na Área Motora</label>
            <input class="form-control" type="text" name="" id="">

        </div>
        <div>
            <label for="">Descreva sobre o trabalho a ser realizado na sala de recursos multifuncionais em Altas Habilidades e Superdotação</label>
            <input class="form-control" type="text" name="" id="">

        </div>
        <div>
            <label for="">Descreva sobre o objetivo a ser atingido em Altas Habilidades e Superdotação</label>
            <input class="form-control" type="text" name="" id="">

        </div>
        <div>
            <label for="">Descreva as atividades que pretende desenvolver com o estudante no AEE</label>
            <input class="form-control" type="text" name="" id="">

        </div>
        <div>
            <label for="">Descreva os recursos materiais e equipamentos a utilizar na sala de recursos multifuncionais</label>
            <input class="form-control" type="text" name="" id="">

        </div>
        <div>
            <label for="">Síntese da Avaliação Trimestral do estudante</label>
            <input class="form-control" type="text" name="" id="">

        </div>

        <div class="text-center p-3">
            <a class="btn btn-secondary"
                href="{{route('pdi.index', ['aluno_id'=>$aluno->id])}}">
                Voltar
            </a>
            <button type="submit" class="btn btn-primary">
                Cadastrar
            </button>
        </div>
    </form>

    <script type="text/javascript">
        $('#summer').summernote({
            lang: 'pt-BR',
            tabsize: 2,
            height: 100
        });
    </script>

    <script src="{{ asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-filestyle.min.js')}}"></script>

@endsection
