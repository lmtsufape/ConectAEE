@extends('layouts.app')
@section('title', 'Cadastrar aluno')

@section('content')


    <form class="m-3" method="POST" action="{{ route('aluno.store') }}" enctype="multipart/form-data">
        @csrf

        <h3>
            <strong>
                Dados do estudante
            </strong>
        </h3>

        <hr style="border-top: 1px solid #AAA;">

        <div class="form-group">
            <label for="nome" class="form-label">Nome Completo</label>
            <input value="{{old('nome')}}" type="text" class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome">

            @error('nome')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="data_nascimento" class="form-label">Data de nascimento</label>
            <input value="{{old('data_nascimento')}}" type="date" class="form-control @error('data_nascimento') is-invalid @enderror" id="data_nascimento" name="data_nascimento">

            @error('data_nascimento')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="cpf" class="form-label">CPF</label>
            <input value="{{old('cpf')}}" type="text" class="form-control @error('cpf') is-invalid @enderror" id="cpf" name="cpf">

            @error('cpf')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div>
            <label for="cid" class="form-label"> Código CID</label>
            <input value="{{old('cid')}}" type="text" class="form-control @error('cid') is-invalid @enderror" id="cid" name="cid">

            @error('cid')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div>
            <label for="descricao_cid" class="form-label">Descrição CID</label>
            <input value="{{old('descricao_cid')}}" type="text" class="form-control @error('descricao_cid') is-invalid @enderror" id="descricao_cid" name="descricao_cid">

            @error('descricao_cid')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="imagem" class="form-label">Foto do aluno</label>
            <input value="{{old('imagem')}}" type="file" class="form-control @error('imagem') is-invalid @enderror" id="imagem" name="imagem">

            @error('imagem')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="matricula" class="form-label">Matrícula</label>
            <input value="{{old('matricula')}}" type="text" class="form-control @error('matricula') is-invalid @enderror" id="matricula" name="matricula">

            @error('matricula')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="idade_inicio_estudos" class="form-label">Idade de início dos estudos </label>
            <input value="{{old('idade_inicio_estudos')}}" type="number" class="form-control @error('idade_inicio_estudos') is-invalid @enderror" id="idade_inicio_estudos" name="idade_inicio_estudos">

            @error('idade_inicio_estudos')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="idade_escola_atual" class="form-label">Idade de início dos estudos na escola atual</label>
            <input value="{{old('idade_escola_atual')}}" type="number" class="form-control @error('idade_escola_atual') is-invalid @enderror" id="idade_escola_atual" name="idade_escola_atual">

            @error('idade_escola_atual')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <h5>ENDEREÇO</h5>
            <div>
                <label for="logradouro" class="form-label">Logradouro</label>
                <input value="{{old('logradouro')}}" type="text" class="form-control @error('logradouro') is-invalid @enderror" id="logradouro" name="logradouro">
                @error('logradouro')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            
            <div>
                <label for="numero" class="form-label">Número</label>
                <input value="{{old('numero')}}" type="text" class="form-control @error('numero') is-invalid @enderror" id="numero" name="numero">
                @error('numero')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <label for="bairro" class="form-label">Bairro</label>
                <input value="{{old('bairro')}}" type="text" class="form-control @error('bairro') is-invalid @enderror" id="bairro" name="bairro">
                @error('bairro')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <label for="cidade" class="form-label">Cidade</label>
                <input value="{{old('cidade')}}" type="text" class="form-control @error('cidade') is-invalid @enderror" id="cidade" name="cidade">
                @error('cidade')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <label for="cep" class="form-label">CEP</label>
                <input value="{{old('cep')}}" type="text" class="form-control @error('cep') is-invalid @enderror" id="cep" name="cep">
                @error('cep')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <h3>
            <strong>
                Dados da família do estudante
            </strong>
        </h3>
        
        <hr style="border-top: 1px solid #AAA;">

        <div class="form-group">
            <label for="nome_pai" class="form-label">Nome do pai</label>
            <input value="{{old('nome_pai')}}" type="text" class="form-control @error('nome_pai') is-invalid @enderror" id="nome_pai" name="nome_pai">

            @error('nome_pai')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="escolaridade_pai" class="form-label">Escolaridade do pai</label>
            <select value="{{old('escolaridade_pai')}}" class="form-control @error('escolaridade_pai') is-invalid @enderror" name="escolaridade_pai" id="escolaridade_pai">
                <option value=""></option>
                @foreach ($escolaridadeAdulto as $escolaridade)
                    <option value="{{$escolaridade}}">{{$escolaridade}}</option>
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
            <input value="{{old('profissao_pai')}}" type="text" class="form-control @error('profissao_pai') is-invalid @enderror" id="profissao_pai" name="profissao_pai">

            @error('profissao_pai')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="nome_mae" class="form-label">Nome da mãe</label>
            <input value="{{old('nome_mae')}}" type="text" class="form-control @error('nome_mae') is-invalid @enderror" id="nome_mae" name="nome_mae">

            @error('nome_mae')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="escolaridade_mae" class="form-label">Escolaridade da mãe</label>
            <select value="{{old('escolaridade_mae')}}" class="form-control @error('escolaridade_mae') is-invalid @enderror" name="escolaridade_mae" id="escolaridade_mae">
                <option value=""></option>
                @foreach ($escolaridadeAdulto as $escolaridade)
                    <option value="{{$escolaridade}}">{{$escolaridade}}</option>
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
            <input value="{{old('profissao_mae')}}" type="text" class="form-control @error('profissao_mae') is-invalid @enderror" id="profissao_mae" name="profissao_mae">

            @error('profissao_mae')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="num_irmaos" class="form-label">Números de irmãos</label>
            <input value="{{old('num_irmaos')}}" type="number" class="form-control @error('num_irmaos') is-invalid @enderror" id="num_irmaos" name="num_irmaos">

            @error('num_irmaos')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="contato_responsavel" class="form-label">Contato do responsável</label>
            <input value="{{old('contato_responsavel')}}" type="text" class="form-control @error('contato_responsavel') is-invalid @enderror" id="contato_responsavel" name="contato_responsavel">

            @error('contato_responsavel')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="mora_com" class="form-label">Com que mora</label>
            <input value="{{old('mora_com')}}" type="text" class="form-control @error('mora_com') is-invalid @enderror" id="mora_com" name="mora_com">

            @error('mora_com')
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
            <label for="gre_id" class="form-label">Gre</label>
            <select value="{{old('gre_id')}}" class="form-control @error('gre_id') is-invalid @enderror" name="gre_id" id="gre_id">
                <option value="" disabled>Listagem das Gres</option>
                @foreach ($gres as $gre)
                    <option value="{{$gre->id}}">{{$gre->nome}}</option>
                @endforeach
            </select>

            @error('gre_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="municipio_id" class="form-label">Municípios</label>
            <select value="{{old('municipio_id')}}" class="form-control @error('municipio_id') is-invalid @enderror" name="municipio_id" id="municipio_id">
                <option value="" disabled>Listagem dos municipios</option>
                @foreach ($municipios as $municipio)
                    <option value="{{$municipio->id}}">{{$municipio->nome}}</option>
                @endforeach
            </select>

            @error('municipio_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="escola_id" class="form-label">Escolas</label>
            <select value="{{old('escola_id')}}" class="form-control @error('escola_id') is-invalid @enderror" name="escola_id" id="escola_id">
                <option value="" disabled>Listagem das escolas</option>
                @foreach ($escolas as $escola)
                <option value="{{$escola->id}}">{{$escola->nome}}</option>
                    
                @endforeach
            </select>

            @error('escola_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="escolaridade_atual_aluno" class="form-label">Escolas</label>
            <select value="{{old('escolaridade_atual_aluno')}}" class="form-control @error('escolaridade_atual_aluno') is-invalid @enderror" name="escolaridade_atual_aluno" id="escolaridade_atual_aluno">
                <option value="" disabled>Listagem</option>
                @foreach ($escolaridadeAluno as $escolaridade)
                <option value="{{$escolaridade}}">{{$escolaridade}}</option>
                    
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
            <input value="{{old('historico_comum')}}" type="text" class="form-control @error('historico_comum') is-invalid @enderror" id="historico_comum" name="historico_comum">

            @error('historico_comum')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="historico_especifico" class="form-label">Histórico escolar (específico) e antecedentes relevantes</label>
            <input value="{{old('historico_especifico')}}" type="text" class="form-control @error('historico_especifico') is-invalid @enderror" id="historico_especifico" name="historico_especifico">

            @error('historico_especifico')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="motivo_encaminhamento_aee" class="form-label">Motivo do encaminhamento para o Atendimento Educacional Especializado (dificuldades apresentadas pelo estudante):</label>
            <input value="{{old('motivo_encaminhamento_aee')}}" type="text" class="form-control @error('motivo_encaminhamento_aee') is-invalid @enderror" id="motivo_encaminhamento_aee" name="motivo_encaminhamento_aee">

            @error('motivo_encaminhamento_aee')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="avaliacao_geral_familiar" class="form-label">Avaliação geral: âmbito familiar</label>
            <input value="{{old('avaliacao_geral_familiar')}}" type="text" class="form-control @error('avaliacao_geral_familiar') is-invalid @enderror" id="avaliacao_geral_familiar" name="avaliacao_geral_familiar">

            @error('avaliacao_geral_familiar')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="avaliacao_geral_escolar" class="form-label">Avaliação geral: âmbito escolar</label>
            <input value="{{old('avaliacao_geral_escolar')}}" type="text" class="form-control @error('avaliacao_geral_escolar') is-invalid @enderror" id="avaliacao_geral_escolar" name="avaliacao_geral_escolar">

            @error('avaliacao_geral_escolar')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div>
            <label class="form-label">O estudante tem laudo?</label>
            <fieldset>
                <label for="anexo_sim" class="form-check-label form-check-inline">
                    <input type="radio" id="anexo_sim" name="anexo" value="true" class="form-check-input">
                    Sim
                </label>
                <label for="anexo_nao" class="form-check-label form-check-inline">
                    <input type="radio" id="anexo_nao" name="anexo" value="false" class="form-check-input">
                    Não
                </label>
            </fieldset>
        </div>

        <div class="form-group">
            <label for="anexos_laudos" class="form-label">Anexar outros documentos e informações relevantes, se tiver (ex. Laudo, Documentos)</label>
            <input value="{{old('anexos_laudos')}}" type="file" class="form-control @error('anexos_laudos') is-invalid @enderror" id="anexos_laudos" name="anexos_laudos">

            @error('anexos_laudos')
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

@endsection
