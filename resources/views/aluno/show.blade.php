@extends('layouts.app')
@section('title','Perfil de aluno')


@section('content')

    <div class="row p-4">
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
            <a class="btn btn-info btn-lg" href="{{route('pdi.index', ['id_aluno'=>$aluno->id]) }}">
                Listar PDI's
            </a>
            <a class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalRelatorio">
                Relatório
            </a>
            <a class="btn btn-primary btn-lg" href="{{route('objetivo.listar', ['id_aluno'=>$aluno->id]) }}">
                Objetivos
            </a>

            <div class="btn-group">
                <button type="button" class="btn btn-secondary btn-lg dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Ações
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{route('aluno.edit', ['aluno_id'=>$aluno->id]) }}" data-toggle="tooltip" title="Editar aluno">Editar</a></li>
                    <li><a class="dropdown-item" href="{{route('aluno.permissoes',['aluno_id'=>$aluno->id])}}" data-toggle="tooltip" title="Autorizar acesso ao aluno">Autorização</a></li>
                    <li><a class="dropdown-item" href="#"data-toggle="modal" title="Excluir aluno" data-target="#modalConfirm">Excluir</a></li>
                    <li><hr class="dropdown-divider"></li>

                </ul>
            </div>
            
        </div>
        <h4>
            <a href="{{route('aluno.index')}}">Início</a> > Perfil de
            <strong>{{ explode(" ", $aluno->nome)[0]}}</strong>
        </h4>
        <hr style="border-top: 1px solid #AAA;">
    </div>

    <!-- Informações do Aluno -->
    <div class="row">
        <div class="col-md-12">
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

            <div class="col-md-6">
                <h4 style="color: #12583C">

                    @if($aluno->sexo == 'M')
                        <strong>Sexo:</strong> Masculino
                    @else
                        <strong>Sexo:</strong> Feminino
                    @endif
                    <br/>
                    <strong>Data de Nascimento:</strong> {{$aluno->data_de_nascimento}}
                </h4>

                <h4 style="color: #12583C">
                    <strong>Endereço:</strong>
                    <?php
                    echo $aluno->endereco->rua, ", nº ",
                    $aluno->endereco->numero, ", ",
                    $aluno->endereco->bairro, ", ",
                    $aluno->endereco->cidade, " - ",
                    $aluno->endereco->estado;
                    ?>
                </h4>

                @if($aluno->cid != null)
                    <h4 style="color: #b38a1d">
                        <strong style="color: #12583C">CID:</strong> {{$aluno->cid}}
                        <br/>
                        <strong style="color: #12583C">Descrição
                            CID:</strong> {{$aluno->descricao_cid}}
                        <br/>
                    </h4>
                @endif
            </div>

            <div class="col-md-3">
                <strong style="color: #12583C">Instituições:</strong>
                <br>

                {{-- <ul>
                    <li>
                        <a href="{{ route('instituicao.ver', ['id_instituicao'=>$instituicao->id]) }}"
                            style="color: #3097D1">{{$instituicao->nome}}</a>
                    </li>
                </ul> --}}

            </div>
        </div>

        <div class="col-md-12">
            <div class="col-md-9 col-md-offset-3 text-justify">
                @if($aluno->observacao != null)
                    <h4 style="color: #12583C">
                        <strong>Observações:</strong> {!! $aluno->observacao !!}
                    </h4>
                    <br/>
                @endif
            </div>
        </div>
    </div>
    <hr style="border-top: 1px solid #AAA;">

        <h2>
            <strong style="color: #12583C">
                Álbuns
            </strong>
        </h2>

        <div class="row">
            <div class="container col-md-12">
                <div style="margin-left: -35px">
                    <div class="col-md-3 mt-3" style="opacity: 0.7;">
                        <a href="{{route('album.cadastrar' , ['id_aluno'=>$aluno->id])}}"
                            data-toggle="tooltip" title="Ver objetivos">
                            <div class="card cartao text-center "
                                    style="border-radius: 20px;  width: 230px; height: 230px">
                                <div class="d-flex justify-content-center">
                                    <h2 style="margin-top:80px;">
                                        <img src="{{asset('images/album.png')}}"
                                                style="width:44px; height:44px;">
                                        <br>
                                        Novo Álbum
                                    </h2>
                                </div>
                            </div>
                        </a>
                    </div>
                    @foreach ($albuns as $album)
                        <div class="col-md-3 mt-3">
                            <div class="card cartao text-center"
                                    style="border-radius: 20px; background: #4e555b; width: 230px; height: 230px">
                                <div class="card-body d-flex justify-content-center"
                                        style="border-radius: 20px; background: #EEE; height: 100%">
                                    <a href="{{route('album.ver', ['id_album'=>$album->id])}}">
                                        <img style="border-radius: 20px; width: 224.2px; height: 224.2px;"
                                                src="{{asset('storage/albuns/'.$aluno->id.'/'.$album->fotos[0]->imagem)}}">
                                    </a>
                                    &nbsp; &nbsp;
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


                <button class="open-button" data-toggle="tooltip" title="Ver fórum" style="border-radius:15px;"
                        onclick="openForm()">Fórum
                </button>
            </div>

            @if (\Session::has('display'))
                <div class="chat-popup" id="myForm" style="display:block; background-color:white;">
            @else
                <div class="chat-popup" id="myForm" style="display:none;background-color:white; ">
            @endif
                        <div class="panel-heading" id="forum" style="display:absolute;">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>
                                        <a target="_blank"
                                            href="{{route('aluno.forum',['id_aluno'=>$aluno->id]).'#forum'}}">
                                            Fórum <i class="material-icons">open_in_new</i>
                                        </a>
                                    </h3>
                                </div>

                                <div class="col-md-6">
                                    <button type="button"
                                            style="float:right; width:50px; height:44px; background-color:red; color:white; margin-top:10px;"
                                            class="btn" onclick="closeForm()">
                                        <i class="material-icons">close</i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Modal Confirm-->
                <div class="modal fade" id="modalConfirm" tabindex="-1" role="dialog"
                     aria-labelledby="modalConfirmLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Fechar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title" id="modalConfirmLabel" align="center">
                                    Confirmar exclusão do aluno {{$aluno->nome}}?</h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                    Não
                                </button>
                                <a type="button"    href="{{route('aluno.delete', ['aluno_id'=>$aluno->id]) }}"  id="btnSubmit" class="btn btn-primary">
                                    Sim
                                </a>
                            </div>
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


                            <form method="GET" action="{{ route("relatorio.gerar", ['id_aluno'=>$aluno->id]) }}"
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

                <script type="text/javascript">

                    var width = screen.width;

                    if (width <= 1000) {
                        document.getElementById("painel").className = "col-md-offset-1";
                    }

                    $('#summer').summernote({
                        placeholder: 'Escreva sua mensagem aqui...',
                        lang: 'pt-BR',
                        tabsize: 2,
                        height: 100
                    });

                </script>

                <script>
                    function openForm() {
                        document.getElementById("myForm").style.display = "block";
                    }

                    function closeForm() {
                        document.getElementById("myForm").style.display = "none";
                    }
                </script>

@endsection
