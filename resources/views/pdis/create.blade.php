@extends('layouts.app')

@section('content')

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

    <form method="POST" action="{{ route("pdi.store", ['id_aluno' => $aluno->id]) }}" enctype="multipart/form-data">
        @csrf
        <h3>Condições de saúde</h3>
        <div>
            <label for="">Tem diagnóstico da área da saúde que indica surdez, deficiência visual, física ou intelectual, TEA transtorno global de desenvolvimento?</label>

        </div>
        <div>
            <label for="">Tem outras condições de saúde?</label>
        </div>
        <div>
            <label for="">Faz uso de alguma medicação?</label>
        </div>
        <div>
            <label for="">Existem recomendações da área de saúde?</label>
        </div>
        <div>
            <label for="">Faz algum tipo de acompanhamento ou tratamento com profissionais?</label>
        </div>
        <div>
            <label for="">Sistema linguístico utilizado pelo estudante na sua comunicação</label>
        </div>
        <div>
            <label for="">Quais as ferramentas de Tecnologia Assistiva (TA) já utilizadas pelo estudante</label>
        </div>
        <div>
            <label for="">Tipo de recurso e/ou equipamento que precisa ser providenciado para o estudante</label>
        </div>
        <div>
            <label for="">Implicações da especificidade educacional do estudante para a acessibilidade curricular</label>
        </div>
        <div>
            <label for="">Outras informações relevantes</label>
        </div>
        <div>
            <label for="">PERCEPÇÃO</label>
        </div>
        <div>
            <label for="">ATENÇÃO</label>
        </div>
        <div>
            <label for="">MEMÓRIA</label>
        </div>
        <div>
            <label for="">LINGUAGEM</label>
        </div>
        <div>
            <label for="">RACIOCÍNIO LÓGICO</label>
        </div>
        <div>
            <label for="">DESENVOLVIMENTO E CAPACIDADE MOTORA</label>
        </div>
        <div>
            <label for="">ÁREA EMOCIONAL – AFETIVA – SOCIAL</label>
        </div>
        <div>
            <label for="">ATIVIDADES DA VIDA AUTÔNOMA</label>
        </div>
        <div>
            <label for="">Descreva as ações necessárias já existentes</label>
        </div>
        <div>
            <label for="">Descreva as ações necessárias a serem desenvolvidas</label>
        </div>
        <div>
            <label for="">Descreva os responsáveis pelas ações nas escolas</label>
        </div>
        <div>
            <label for="">Descreva as ações necessárias já existentes</label>
        </div>
        <div>
            <label for="">Descreva as ações necessárias a serem desenvolvidas</label>
        </div>
        <div>
            <label for="">Descreva os responsáveis pelas ações na sala de aula</label>
        </div>
        <div>
            <label for="">Descreva as ações necessárias já existentes</label>
        </div>
        <div>
            <label for="">Descreva as ações necessárias a serem desenvolvidas</label>
        </div>
        <div>
            <label for="">Descreva os responsáveis pelas ações na sala do AEE</label>
        </div>
        <div>
            <label for="">Descreva as ações necessárias já existentes</label>
        </div>
        <div>
            <label for="">Descreva as ações necessárias a serem desenvolvidas</label>
        </div>
        <div>
            <label for="">Descreva os responsáveis pelas ações em Família</label>
        </div>
        <div>
            <label for="">Descreva as ações necessárias já existentes</label>
        </div>
        <div>
            <label for="">Descreva as ações necessárias a serem desenvolvidas</label>
        </div>
        <div>
            <label for="">Descreva os responsáveis pelas ações relativas à saúde</label>
        </div>
        <div>
            <label for="">TIPO DE AEE</label>
        </div>
        <div>
            <label for="">O ATENDIMENTO É REALIZADO NAS SALAS DE RECURSOS MULTIFUNCIONAIS</label>
        </div>
        <div>
            <label for="">Se o atendimento não for realizado nas salas de recursos multifuncionais, é realizado em qual espaço</label>
        </div>
        <div>
            <label for="">FREQUÊNCIA DE ATENDIMENTOS SEMANAIS</label>
        </div>
        <div>
            <label for="">QUAIS PROFISSIONAIS DA EDUCAÇÃO ESPECÍFICA SERÃO NECESSÁRIOS PARA ESTE ESTUDANTE</label>
        </div>
        <div>
            <label for="">Descreva sobre o trabalho a ser realizado na sala de recursos multifuncionais na Área Cognitiva</label>
        </div>
        <div>
            <label for="">Descreva sobre o objetivo a ser atingido na Área Cognitiva</label>
        </div>
        <div>
            <label for="">Descreva sobre o trabalho a ser realizado na sala de recursos multifuncionais na Área Social</label>
        </div>

        <div class="">
            <a class="btn btn-secondary"
                href="{{route('pdi.index', ['id_aluno'=>$aluno->id])}}">
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
