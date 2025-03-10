@extends('layouts.app')
@section('title','Perfil de aluno')


@section('content')

    <div class="row p-3">
        <div class="col-md-6">
            <h1>
                <strong style="color: #12583C">
                    {{$aluno->nome}}
                </strong>
            </h1>
        </div>

        <div class="col-md-6">
            <a class="btn btn-info" href="{{route('pdis.index', ['aluno_id' => $aluno->id])}}">
                Listar PDI's
            </a>
            <a class="btn btn-info" data-toggle="modal" data-target="#modalRelatorio">
                Relatório
            </a>

            <div class="btn-group">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Ações
                </button>
                @include('layouts.components.delete_modal', ['route' => 'alunos.destroy', 'param' => 'aluno_id', 'entity_id' => $aluno->id])
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{route('alunos.edit', ['aluno_id'=>$aluno->id]) }}" data-toggle="tooltip" title="Editar aluno">Editar</a></li>
                    <li><hr class="dropdown-divider"></li>

                    <li><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#deleteModal{{$aluno->id}}">
                            Excluir
                        </button>
                    </li>

                </ul>
            </div>
            
        </div>
        <h4>
            <a href="{{route('alunos.index')}}">Início</a> > Perfil de
            <strong>{{ explode(" ", $aluno->nome)[0]}}</strong>
        </h4>
        <hr style="border-top: 1px solid #AAA;">
    </div>
    <!-- Informações do Aluno -->
    <div class="row">
        <div class="col-md-3">
            <div class="text-center">
                @if(!empty($aluno->imagem))
                    <img src="{{asset('storage/' . $aluno->imagem)}}"
                            style="border-radius: 60%; height:200px; width:200px; object-fit: cover;">
                    <br/>
                @else
                    <img src="{{asset('images/avatar.png')}}"
                            style="border-radius: 60%; width:200px; height: 200px; object-fit: cover;">
                    <br/>
                @endif
            </div>

            <br>
        </div>

        <div class="col-md-9">
            <div class="row">
                <div class="col-md-6">
                    <h4 style="color: #12583C">Dados Pessoais</h4>
                
                    <p>
                        <strong>Data de Nascimento:</strong> {{$aluno->data_nascimento}}
                    </p>
                    <p>
                        <strong>Endereço:</strong>
                        <?php
                            echo $aluno->endereco->logradouro, ", nº ",
                            $aluno->endereco->numero, ", ",
                            $aluno->endereco->bairro, ", ",
                            $aluno->endereco->municipio->nome;
                            ?>
                    </p>
                    @if($aluno->cid != null)
                        <p><strong>CID:</strong> {{$aluno->cid}}</p>
                        <p><strong>Descrição CID:</strong> {{$aluno->descricao_cid}}</p>
                    @endif
                </div>
                <div class="col-md-6">
                    <h4 style="color: #12583C">Escola</h4>
                    <p><strong>Nome:</strong> {{$aluno->escola->nome}}</p>
                    <p><strong>E-mail:</strong> {{$aluno->escola->email}}</p>
                    <p><strong>Telefone:</strong> {{$aluno->escola->telefone}}</p>
                    <p><strong>GRE:</strong> {{$aluno->escola->gre->first()->nome}}</p>


                </div>
            </div>
            <div class="text-justify">
                @if($aluno->observacao != null)
                    <p style="color: #12583C">
                        <strong>Observações:</strong> {!! $aluno->observacao !!}
                    </p>
                @endif
            </div>
        </div>
    </div>
@endsection
