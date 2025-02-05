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
            @php
                $pdi = \App\Models\Pdi::where('aluno_id', '=', $aluno->id)->first();
            @endphp
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
                @if($aluno->imagem != null)
                    <img src="{{asset('storage/avatars/'.$aluno->imagem)}}"
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
                
                    <p>
                        <strong>Data de Nascimento:</strong> {{$aluno->data_de_nascimento}}
                    </p>
                    <p style="color: #12583C">
                        <strong>Endereço:</strong>
                        <?php
                            echo $aluno->endereco->logradouro, ", nº ",
                            $aluno->endereco->numero, ", ",
                            $aluno->endereco->bairro, ", ",
                            $aluno->endereco->municipio->nome;
                            ?>
                    </p>
                    @if($aluno->cid != null)
                        <p style="color: #b38a1d">
                            <strong style="color: #12583C">CID:</strong> {{$aluno->cid}}
                            <br/>
                            <strong style="color: #12583C">Descrição
                                CID:</strong> {{$aluno->descricao_cid}}
                            <br/>
                        </p>
                    @endif
                </div>
                <div class="col-md-6">
                    <p><strong style="color: #12583C">Escola:</strong></p>
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

    <!-- Modal -->
    <div class="modal fade" id="modalRelatorio" tabindex="-1" role="dialog"
            aria-labelledby="modalRelatorioLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h2 class="modal-title" id="modalRelatorioLabel" align="center">
                        Selecione
                        um intervalo de tempo</h2>
                </div>

                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-5">
                                    <label for="dataInicialR" class="col-2 col-form-label">Selecione
                                        a
                                        data inicial</label>
                                    <input class="form-control" type="date"
                                            id="dataInicialR" name="dataInicialR"
                                            value="{{date('Y-m-d', strtotime('-1 months'))}}">
                                </div>
                                <div class="col-md-1">
                                    <span></span>
                                </div>
                                <div class="col-md-5 ml-auto">
                                    <label for="dataFinalR" class="col-2 col-form-label">Selecione a
                                        data
                                        final</label>
                                    <input class="form-control" type="date"
                                            id="dataFinalR" name="dataFinalR" value="{{date('Y-m-d')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Fechar
                        </button>
                        <button type="button" id="btnAvanc" class="btn btn-primary"
                        data-toggle="modal" data-target="#modalImg" data-dismiss="modal">
                            Próximo
                        </button>
                    </div>

            </div>
        </div>
    </div>


    <!--Modal Img-->
    <div class="modal fade" id="modalImg" tabindex="-1" role="dialog"
            aria-labelledby="modalImgLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h2 class="modal-title" id="modalImgLabel" align="center">
                        Marque as imagens desejadas</h2>
                </div>


                <form method="GET" action="{{ route("relatorio.gerar", ['aluno_id'=>$aluno->id]) }}"
                        target="_blank" onsubmit="setTimeout(function(){window.location.reload();},10);">
                    <div class="modal-body">
                        <div class="container-fluid">
                            <input class="form-control" type="hidden"
                                    id="dataInicial" name="dataInicial" readonly>
                            <input class="form-control" type="hidden"
                                    id="dataFinal" name="dataFinal" readonly>
                            <div class="container-fluid" style="padding-bottom: 15px; padding-left: 0px;">
                                <?php

                                foreach ($albuns as $album) {
                                foreach ($album->fotos as $foto){?>
                                <div class="col-md-3 mt-3" id="login-card">
                                    <div class="card cartao text-center"
                                            style="border-radius: 20px; background: transparent; width: 100px; height: 100px; border: transparent;"
                                            id="login-card">
                                        <div class="card-body d-flex justify-content-center"
                                                style="border-radius: 20px; background: transparent; height: 100%">
                                            <label><input type="checkbox"  name="img[]" value="{{$foto->imagem}}">
                                                <img style="border-radius: 20px; width: 100.2px; height: 100.2px;"
                                                        src="{{asset('storage/albuns/'.$aluno->id.'/'.$foto->imagem)}}">
                                            </label>

                                            &nbsp; &nbsp;
                                        </div>
                                    </div>
                                </div>
                                <?php }}?>
                            </div>
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                Fechar
                            </button>
                            <button type="submit" id="btnSubmit" class="btn btn-primary">
                                Enviar
                            </button>
                        </div>
                </form>
            </div>
        </div>
    </div>




                <script type="text/javascript">

                    function redirecionarValor() {
                        document.getElementById("dataInicial").value=document.getElementById("dataInicialR").value;
                        document.getElementById("dataFinal").value=document.getElementById("dataFinalR").value;
                    }

                    // Evento que é executado ao clicar no botão de enviar
                    document.getElementById("btnAvanc").onclick = function(e) {
                        redirecionarValor();

                    }

                </script>




@endsection
