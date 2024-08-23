@extends('layouts.app')
@section('title', 'Cadastrar aluno')

@section('content')


    <form method="POST" action="{{ route('aluno.store') }}" enctype="multipart/form-data">
        @csrf

        <h3>
            <strong>
                Dados do estudante
            </strong>
        </h3>

        <hr style="border-top: 1px solid #AAA;">

        <div class="form-group">
            <label for="nome">Nome Completo</label>
            <input type="text" class="form-control @error('nome') is-invalid @enderror">

            @error('nome')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="data_de_nascimento">Data de nascimento</label>
            <input type="date" class="form-control @error('data_de_nascimento') is-invalid @enderror">

            @error('data_de_nascimento')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="text" class="form-control @error('cpf') is-invalid @enderror">

            @error('cpf')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="matricula">Matrícula</label>
            <input type="text" class="form-control @error('matricula') is-invalid @enderror">

            @error('matricula')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="idade_inicio_estudos">Idade de início dos estudos </label>
            <input type="text" class="form-control @error('idade_inicio_estudos') is-invalid @enderror">

            @error('idade_inicio_estudos')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="idade_escola_atual">Idade de início dos estudos na escola atual</label>
            <input type="text" class="form-control @error('idade_escola_atual') is-invalid @enderror">

            @error('idade_escola_atual')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>


        <h3>
            <strong>
                Dados da família do estudante
            </strong>
        </h3>
        
        <hr style="border-top: 1px solid #AAA;">

        <div class="form-group">
            <label for="nome_pai">Nome do pai</label>
            <input type="text" class="form-control">

            @error('nome_pai')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="escolaridade_pai">Escolaridade do pai</label>
            <select class="form-control" name="escolaridade_pai" id="escolaridade_pai">

            </select>

            @error('escolaridade_pai')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="profissao_pai">Profissão do pai</label>
            <input type="text" class="form-control" id="profissao_pai" name="profissao_pai">

            @error('profissao_pai')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="nome_mae">Nome da mãe</label>
            <input type="text" class="form-control" id="nome_mae" name="nome_mae">

            @error('nome_mae')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="escolaridade_mae">Escolaridade da mãe</label>
            <select class="form-control" name="escolaridade_mae" id="escolaridade_mae">

            </select>

            @error('escolaridade_mae')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="profissao_mae">Profissão da mãe</label>
            <input type="text" class="form-control" id="profissao_mae" name="profissao_mae">

            @error('profissao_mae')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="num_irmaos">Profissão da mãe</label>
            <input type="text" class="form-control" id="num_irmaos" name="num_irmaos">

            @error('num_irmaos')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="contato_responsavel">Profissão da mãe</label>
            <input type="text" class="form-control" id="contato_responsavel" name="contato_responsavel">

            @error('contato_responsavel')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <h3>
            <strong>
                Dados da escolaridade do Estudante
            </strong>
        </h3>

        <hr style="border-top: 1px solid #AAA;">

        <div class="form-group">
            <label for="">Histórico escolar (comum) e antecedentes relevantes</label>
            <input type="text" class="form-control">

            @error('nome_mae')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="">Histórico escolar (específico) e antecedentes relevantes</label>
            <input type="text" class="form-control">

            @error('nome_mae')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="">Motivo do encaminhamento para o Atendimento Educacional Especializado (dificuldades apresentadas pelo estudante):</label>
            <input type="text" class="form-control">

            @error('nome_mae')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="">Avaliação geral: âmbito familiar</label>
            <input type="text" class="form-control">

            @error('nome_mae')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="">Avaliação geral: âmbito escolar</label>
            <input type="text" class="form-control">

            @error('nome_mae')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="">O estudante tem laudo?</label>
            <input type="" class="form-control">

            @error('nome_mae')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="">Anexar outros documentos e informações relevantes, se tiver (ex. Laudo, Documentos)</label>
            <input type="file" class="form-control">

            @error('nome_mae')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="row text-center m-3">
            <br>
            <a class="col-md-6 btn btn-secondary" href="{{ route('aluno.index') }}" id="menu-a">
                Voltar
            </a>
            <button type="submit" class="btn btn-primary col-md-6">
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

    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>

    <script>
        $(function() {
            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();

            if (month < 10)
                month = '0' + month.toString();
            if (day < 10)
                day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;
            $('#data_nascimento').attr('max', maxDate);
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });


        function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value = ("");
            document.getElementById('bairro').value = ("");
            document.getElementById('cidade').value = ("");
            document.getElementById('estado').value = ("");
        }

        function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
                //Atualiza os campos com os valores.
                document.getElementById('rua').value = (conteudo.logradouro);
                document.getElementById('bairro').value = (conteudo.bairro);
                document.getElementById('cidade').value = (conteudo.localidade);
                document.getElementById('estado').value = (conteudo.uf);

            } //end if.
            else {
                //CEP não Encontrado.
                limpa_formulário_cep();
                alert("CEP não encontrado.");
            }
        }

        function pesquisacep(valor) {

            //Nova variável "cep" somente com dígitos.
            var cep = valor.replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if (validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    document.getElementById('rua').value = "...";
                    document.getElementById('bairro').value = "...";
                    document.getElementById('cidade').value = "...";
                    document.getElementById('estado').value = "...";

                    //Cria um elemento javascript.
                    var script = document.createElement('script');

                    //Sincroniza com o callback.
                    script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

                    //Insere script no documento e carrega o conteúdo.
                    document.body.appendChild(script);

                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        };
    </script>

    <script src="{{ asset('js/bootstrap-filestyle.min.js') }}"></script>

@endsection
