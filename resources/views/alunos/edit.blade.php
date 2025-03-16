@extends('layouts.app')
@section('title', 'Editar aluno')

@section('content')
    <form class="m-3" method="POST" action="{{ route('alunos.update', ['aluno_id' => $aluno->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <h3>
            <strong>
                Dados do estudante
            </strong>
        </h3>

        <div class="row mb-3">
            <div class="form-group col-md-6">
                <label for="nome" class="form-label">Nome Completo:</label>
                <input value="{{old('nome') ?? $aluno->nome}}" type="text" class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome" required>
                @error('nome')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <label for="matricula" class="form-label">Matrícula</label>
                <input value="{{old('matricula') ?? $aluno->matricula}}" type="text" class="form-control @error('matricula') is-invalid @enderror" id="matricula" name="matricula" required>
                @error('matricula')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <label for="cpf" class="form-label">CPF:</label>
                <input value="{{old('cpf') ?? $aluno->cpf}}" type="text" class="form-control @error('cpf') is-invalid @enderror" id="cpf" name="cpf" required>
                @error('cpf')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="form-group col-md-4">
                <label for="data_nascimento" class="form-label">Data de nascimento:</label>
                <input value="{{old('data_nascimento') ?? $aluno->data_nascimento}}" type="date" class="form-control @error('data_nascimento') is-invalid @enderror" id="data_nascimento" name="data_nascimento" required>
                @error('data_nascimento')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="idade_inicio_estudos" class="form-label">Idade de início dos estudos </label>
                <input value="{{old('idade_inicio_estudos') ?? $aluno->idade_inicio_estudos}}" type="number" min="0" class="form-control @error('idade_inicio_estudos') is-invalid @enderror" id="idade_inicio_estudos" name="idade_inicio_estudos" required>
                @error('idade_inicio_estudos')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="idade_escola_atual" class="form-label">Idade de início dos estudos na escola atual</label>
                <input value="{{old('idade_escola_atual') ?? $aluno->idade_escola_atual}}" type="number" min="0" class="form-control @error('idade_escola_atual') is-invalid @enderror" id="idade_escola_atual" name="idade_escola_atual" required>
                @error('idade_escola_atual')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <label for="cid" class="form-label"> Código CID</label>
                <input value="{{old('cid') ?? $aluno->cid}}" type="text" class="form-control @error('cid') is-invalid @enderror" id="cid" name="cid" required>
                @error('cid')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="descricao_cid" class="form-label">Descrição CID</label>
                <input value="{{old('descricao_cid') ?? $aluno->descricao_cid}}" type="text" class="form-control @error('descricao_cid') is-invalid @enderror" id="descricao_cid" name="descricao_cid" required>
                @error('descricao_cid')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="imagem" class="form-label">Foto do aluno</label>
                <input value="{{old('imagem')}}" type="file" class="form-control @error('imagem') is-invalid @enderror" id="imagem" name="imagem">
                @error('imagem')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="aluno_municipio_id" class="form-label">Município</label>
            <select class="form-control @error('aluno_municipio_id') is-invalid @enderror" name="aluno_municipio_id" id="aluno_municipio_id" required>
                <option value=""disabled selected>Selecione o Município</option>
                @foreach ($municipios as $municipio)
                    <option value="{{$municipio->id}}" @selected(old('aluno_municipio_id', $aluno->endereco->municipio_id) == $municipio->id)>{{$municipio->nome}}</option>
                @endforeach
            </select>

            @error('aluno_municipio_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="row mb-3">
            <div class="form-group col-md-5">
                <label for="logradouro" class="form-label">Logradouro</label>
                <input value="{{old('logradouro') ?? $aluno->endereco->logradouro ?? ''}}" type="text" class="form-control @error('logradouro') is-invalid @enderror" id="logradouro" name="logradouro" required>
                @error('logradouro')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            
            <div class="form-group col-md-2">
                <label for="numero" class="form-label">Número</label>
                <input value="{{old('numero') ?? $aluno->endereco->numero ?? ''}}" type="text" class="form-control @error('numero') is-invalid @enderror" id="numero" name="numero" required>
                @error('numero')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <label for="bairro" class="form-label">Bairro</label>
                <input value="{{old('bairro') ?? $aluno->endereco->bairro ?? ''}}" type="text" class="form-control @error('bairro') is-invalid @enderror" id="bairro" name="bairro" required>
                @error('bairro')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-2">
                <label for="cep" class="form-label">CEP</label>
                <input value="{{old('cep') ?? $aluno->endereco->cep ?? ''}}" type="text" class="form-control @error('cep') is-invalid @enderror" id="cep" name="cep" required>
                @error('cep')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <hr style="border-top: 1px solid #2E2E2E;">

        <h3>
            <strong>
                Dados da família do estudante
            </strong>
        </h3>
        
        <hr style="border-top: 1px solid #AAA;">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nome_pai" class="form-label">Nome do pai</label>
                    <input value="{{old('nome_pai') ?? $aluno->nome_pai}}" type="text" class="form-control @error('nome_pai') is-invalid @enderror" id="nome_pai" name="nome_pai" required>
                    @error('nome_pai')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="escolaridade_pai" class="form-label">Escolaridade do pai</label>
                    <select class="form-control @error('escolaridade_pai') is-invalid @enderror" name="escolaridade_pai" id="escolaridade_pai" required>
                        <option value="" disabled selected>Selecione a Escolaridade do Pai</option>
                        @foreach ($escolaridadeAdulto as $escolaridade)
                            <option value="{{$escolaridade}}" @selected((old('escolaridade_pai') || $aluno->escolaridade_pai) == $escolaridade)>{{$escolaridade}}</option>
                        @endforeach
                    </select>
                    @error('escolaridade_pai')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="profissao_pai" class="form-label">Profissão do pai</label>
                    <input value="{{old('profissao_pai') ?? $aluno->profissao_pai}}" type="text" class="form-control @error('profissao_pai') is-invalid @enderror" id="profissao_pai" name="profissao_pai" required>
                    @error('profissao_pai')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nome_mae" class="form-label">Nome da mãe</label>
                    <input value="{{old('nome_mae') ?? $aluno->nome_mae}}" type="text" class="form-control @error('nome_mae') is-invalid @enderror" id="nome_mae" name="nome_mae" required>
                    @error('nome_mae')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="escolaridade_mae" class="form-label">Escolaridade da mãe</label>
                    <select class="form-control @error('escolaridade_mae') is-invalid @enderror" name="escolaridade_mae" id="escolaridade_mae" required>
                        <option value="" disabled selected>Selecione a Escolaridade da Mãe</option>
                        @foreach ($escolaridadeAdulto as $escolaridade)
                            <option value="{{$escolaridade}}" @selected((old('escolaridade_mae') || $aluno->escolaridade_mae) == $escolaridade)>{{$escolaridade}}</option>
                        @endforeach
                    </select>
                    @error('escolaridade_mae')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="profissao_mae" class="form-label">Profissão da mãe</label>
                    <input value="{{old('profissao_mae') ?? $aluno->profissao_mae}}" type="text" class="form-control @error('profissao_mae') is-invalid @enderror" id="profissao_mae" name="profissao_mae" required>
                    @error('profissao_mae')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <label for="num_irmaos" class="form-label">Números de irmãos</label>
                <input value="{{old('num_irmaos') ?? $aluno->num_irmaos}}" type="number" min="0" class="form-control @error('num_irmaos') is-invalid @enderror" id="num_irmaos" name="num_irmaos" required>
                @error('num_irmaos')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="contato_responsavel" class="form-label">Contato do responsável</label>
                <input value="{{old('contato_responsavel') ?? $aluno->contato_responsavel}}" type="text" class="form-control @error('contato_responsavel') is-invalid @enderror" id="contato_responsavel" name="contato_responsavel" required>
                @error('contato_responsavel')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="mora_com" class="form-label">Com quem mora</label>
                <input value="{{old('mora_com') ?? $aluno->mora_com}}" type="text" class="form-control @error('mora_com') is-invalid @enderror" id="mora_com" name="mora_com" required>
                @error('mora_com')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <hr style="border-top: 1px solid #2E2E2E;">

        <h3>
            <strong>
                Dados da escolaridade do Estudante
            </strong>
        </h3>
        <div class="row mb-3">
            <div class="form-group col-md-6">
                <label for="gre_id" class="form-label">GRE</label>
                <select class="form-control @error('gre_id') is-invalid @enderror" name="gre_id" id="gre_id" required>
                    <option value="" disabled selected>Selecione a GRE</option>
                    @foreach ($gres as $gre)
                        <option value="{{$gre->id}}" @selected(old('gre_id', $aluno->escola->gre->first()->id) == $gre->id)>{{$gre->nome}}</option>
                    @endforeach
                </select>
                @error('gre_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="municipio_id" class="form-label">Municípios</label>
                <select class="form-control @error('municipio_id') is-invalid @enderror" name="municipio_id" id="municipio_id" required>
                    <option value="" disabled selected>Selecione o Município</option>
                    @foreach ($municipios as $municipio)
                        <option value="{{$municipio->id}}" @selected(old('municipio_id') ?? $aluno->municipio_id == $municipio->id)>{{$municipio->nome}}</option>
                    @endforeach
                </select>
                @error('municipio_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="escola_id" class="form-label">Escolas</label>
            <select class="form-control @error('escola_id') is-invalid @enderror" name="escola_id" id="escola_id" required>
                <option value="" disabled selected>Selecione a Escola</option>
                @foreach ($escolas as $escola)
                <option value="{{$escola->id}}" @selected(old('escola_id') ?? $aluno->escola_id == $escola->id)>{{$escola->nome}}</option>
                    
                @endforeach
            </select>

            @error('escola_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="escolaridade_atual_aluno" class="form-label">Escolaridade</label>
            <select class="form-control @error('escolaridade_atual_aluno') is-invalid @enderror" name="escolaridade_atual_aluno" id="escolaridade_atual_aluno" required>
                <option value="" disabled selected>Selecione a Escolaridade</option>
                @foreach ($escolaridadeAluno as $escolaridade)
                    <option value="{{$escolaridade}}" @selected(old('escolaridade_atual_aluno') ?? $aluno->escolaridade_atual_aluno == $escolaridade)>{{$escolaridade}}</option>
                    
                @endforeach
            </select>

            @error('escolaridade_aluno')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="historico_comum" class="form-label">Histórico escolar (comum) e antecedentes relevantes</label>
            <input value="{{old('historico_comum') ?? $aluno->historico_comum}}" type="text" class="form-control @error('historico_comum') is-invalid @enderror" id="historico_comum" name="historico_comum" required>

            @error('historico_comum')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="historico_especifico" class="form-label">Histórico escolar (específico) e antecedentes relevantes</label>
            <input value="{{old('historico_especifico') ?? $aluno->historico_especifico}}" type="text" class="form-control @error('historico_especifico') is-invalid @enderror" id="historico_especifico" name="historico_especifico" required>

            @error('historico_especifico')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="motivo_encaminhamento_aee" class="form-label">Motivo do encaminhamento para o Atendimento Educacional Especializado (dificuldades apresentadas pelo estudante):</label>
            <input value="{{old('motivo_encaminhamento_aee') ?? $aluno->motivo_encaminhamento_aee}}" type="text" class="form-control @error('motivo_encaminhamento_aee') is-invalid @enderror" id="motivo_encaminhamento_aee" name="motivo_encaminhamento_aee" required>

            @error('motivo_encaminhamento_aee')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="avaliacao_geral_familiar" class="form-label">Avaliação geral: âmbito familiar</label>
            <input value="{{old('avaliacao_geral_familiar') ?? $aluno->avaliacao_geral_familiar}}" type="text" class="form-control @error('avaliacao_geral_familiar') is-invalid @enderror" id="avaliacao_geral_familiar" name="avaliacao_geral_familiar" required>

            @error('avaliacao_geral_familiar')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="avaliacao_geral_escolar" class="form-label">Avaliação geral: âmbito escolar</label>
            <input value="{{old('avaliacao_geral_escolar') ?? $aluno->avaliacao_geral_escolar}}" type="text" class="form-control @error('avaliacao_geral_escolar') is-invalid @enderror" id="avaliacao_geral_escolar" name="avaliacao_geral_escolar" required>

            @error('avaliacao_geral_escolar')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div>
            <label class="form-label">O estudante tem laudo?</label>
            <fieldset>
                <label for="tem_anexos_laudos_sim" class="form-check-label form-check-inline">
                    <input type="radio" id="tem_anexos_laudos_sim" name="tem_anexos_laudos" value="true" class="form-check-input">
                    Sim
                </label>
                <label for="tem_anexos_laudos_nao" class="form-check-label form-check-inline">
                    <input type="radio" id="tem_anexos_laudos_nao" name="tem_anexos_laudos" value="false" class="form-check-input">
                    Não
                </label>
            </fieldset>
        </div>

        <div id="tem_anexos_laudos" class="d-none">
            <div class="form-group">
                <label for="anexos_laudos" class="form-label">Anexar outros documentos e informações relevantes, se tiver (ex. Laudo, Documentos)</label>
                <input value="{{old('anexos_laudos')}}" type="file" class="form-control @error('anexos_laudos') is-invalid @enderror" id="anexos_laudos" name="anexos_laudos">
                @error('anexos_laudos')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="d-flex justify-content-center gap-4 m-3">
            <a class="btn btn-secondary w-25" href="{{ route('alunos.index') }}">
                Voltar
            </a>
            <button type="submit" class="btn btn-success w-25">
                Cadastrar
            </button>
        </div>

    </form>
@endsection

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

            marcarRadio('tem_anexos_laudos', @json(old('tem_anexos_laudos') ?? false));

        });


        ocultarDiv('tem_anexos_laudos');

        function ocultarDiv(nomeInput) {
            $(`input[name="${nomeInput}"]`).on('change', function() {
                if ($(`#${nomeInput}_sim`).is(':checked')) {
                    $(`#${nomeInput}`).removeClass('d-none');
                } else {
                    $(`#${nomeInput}`).addClass('d-none');
                }
            });
        }
    </script>
    <script>
        var dados = @json([$aluno->escola->gre->first()->id, $aluno->escola->municipio[0]->id]);
        var routeMunicipios = `{{ route('alunos.municipios', ':gre_id') }}`;
        var routeEscolas = `{{ route('alunos.escolas', ':municipio_id') }}`;
        var municipio = @json(old('municipio_id') ?? $aluno->escola->municipio[0]->id);
        var escola = @json(old('escola_id') ?? $aluno->escola_id);

    </script>
    <script src="{{ asset('js/filtrar-gre.js') }}"></script>
@endpush