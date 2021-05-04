@extends('layouts.principal')
@section('title','Perfil de aluno')
<!-- 
<a href="{{route('aluno.listar')}}">Início</a>
> Perfil de <strong>{{ explode(" ", $aluno->nome)[0]}}</strong>
@section('navbar')
@endsection -->

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="margin-top: -20px;">
                <div id="login-card" class="panel panel-default" style="width:100%; padding: 10px 20px;">

                    <div class="panel-heading" id="login-card">
                        <div class="row" style="margin-bottom: -20px" id="login-card">
                            <div class="col-md-6" id="login-card">
                                <h2>
                                    <strong style="color: #12583C">
                                        {{$aluno->nome}}
                                    </strong>
                                </h2>
                                <div style="font-size: 14px" id="login-card">
                                    <a href="{{route('aluno.listar')}}">Início</a> > Perfil de
                                    <strong>{{ explode(" ", $aluno->nome)[0]}}</strong>
                                </div>
                            </div>

                            <div class="col-md-6 text-right" style="margin-top:20px" id="login-card">
                                @php
                                    $gerenciamento = App\Gerenciar::where('user_id','=',\Auth::user()->id)->where('aluno_id','=',$aluno->id)->first();
                                    $pdi = \App\Pdi::where('aluno_id', '=', $aluno->id)->first();
                                @endphp
                                @if($gerenciamento->tipoUsuario != 2 and $gerenciamento->perfil_id == 2)
                                    <a class="btn btn-primary"
                                       style="height: 50px; font-weight: bold; font-size: 20px; background: #bf5329; text-align: center; width: auto"
                                       href="{{route('pdi.listar', ['id_aluno'=>$aluno->id]) }}">
                                        Listar PDI's
                                    </a>
                                @endif
                                @if(App\Gerenciar::where('user_id','=',\Auth::user()->id)->where('aluno_id','=',$aluno->id)->first()->tipoUsuario == 3 and $gerenciamento->perfil_id != 1)
                                    <a class="btn btn-primary" class="btn btn-primary" data-toggle="modal"
                                       data-target="#modalRelatorio"
                                       style="height: 50px; font-weight: bold; font-size: 20px; background: #6574cd; justify: center">
                                        Relatorio
                                    </a>
                                @endif
                                <a class="btn btn-primary"
                                   style="height: 50px; font-weight: bold; font-size: 20px; background: #0398fc; justify: center"
                                   href="{{route('objetivo.listar', ['id_aluno'=>$aluno->id]) }}">
                                    Objetivos
                                </a>
                                @if(App\Gerenciar::where('user_id','=',\Auth::user()->id)->where('aluno_id','=',$aluno->id)->first()->tipoUsuario == 3)
                                    <li class="dropdown">
                                        <button type="button" class="btn btn-primary dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                                style="height: 50px; font-weight: bold; font-size: 20px; background: gray">
                                            Ações
                                            <span class="caret"
                                                  style="border-left: 11px solid transparent; border-right: 11px solid transparent; border-top: 11px solid;"></span>
                                        </button>

                                        <ul class="dropdown-menu" role="menu"
                                            style="background-color: rgba(255, 255, 255, 0); border-width: 0px">
                                            <li>
                                                <a class="btn btn-primary" data-toggle="tooltip" title="Editar aluno"
                                                   href="{{route('aluno.editar', ['id_aluno'=>$aluno->id]) }}"
                                                   style="width: 100%; height: 30px; background: #999; font-size: 16px; border-radius: 5px; color: white; margin-bottom: 5px">
                                                    Editar
                                                </a>
                                            </li>
                                            <li>
                                                <a class="btn btn-primary" data-toggle="tooltip"
                                                   title="Autorizar acesso ao aluno"
                                                   href="{{route('aluno.permissoes',['id_aluno'=>$aluno->id])}}"
                                                   style="width: 100%; height: 30px; background: #1c5; font-size: 16px; border-radius: 5px; color: white;  margin-bottom: 5px">
                                                    Autorização
                                                </a>
                                            </li>
                                            <li>
                                                <a class="btn btn-danger" data-toggle="tooltip" title="Excluir aluno"
                                                   onclick="return confirm('\Confirmar exclusão do aluno {{$aluno->nome}}?')"
                                                   href="{{route('aluno.excluir', ['id_aluno'=>$aluno->id]) }}"
                                                   style="width: 100%; height: 30px; background: #f44; font-size: 16px; border-radius: 5px; color: white">
                                                    Excluir
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                @endif
                            </div>

                        </div>

                        <hr style="border-top: 1px solid #AAA;">
                    </div>

                    <div class="panel-body" id="login-card">
                        @if (\Session::has('success'))
                            <div class="alert alert-success" id="login-card">
                                <strong>Sucesso!</strong>
                                {!! \Session::get('success') !!}
                            </div>
                        @endif

                        @php
                            $gerenciars = $aluno->gerenciars;
                        @endphp

                    <!-- Informações do Aluno -->
                        <div class="row" style="margin-top: -30px" id="login-card">
                            <div class="col-md-12" id="login-card">
                                <div class="col-md-3" id="login-card">
                                    <div class="text-center" id="login-card">
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

                                <div class="col-md-6" id="login-card">
                                    <h4 style="color: #12583C">
                                        <?php
                                        foreach($gerenciars as $gerenciar){
                                        if($gerenciar->user->id == \Auth::user()->id && $gerenciar->tipoUsuario == 3){
                                        ?>
                                        <strong>CPF:</strong> {{$aluno->cpf}}
                                        <br/>
                                        <?php
                                        break;
                                        }
                                        }
                                        ?>

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

                                <div class="col-md-3" id="login-card">
                                    <strong style="color: #12583C">Instituições:</strong>
                                    <br>

                                    <ul>
                                        @foreach ($aluno->instituicoes as $instituicao)
                                            <li>
                                                <a href="{{ route('instituicao.ver', ['id_instituiçao'=>$instituicao->id]) }}"
                                                   style="color: #3097D1">{{$instituicao->nome}}</a>
                                            </li>
                                        @endforeach
                                    </ul>

                                </div>
                            </div>

                            <div class="col-md-12" id="login-card">
                                <div class="col-md-9 col-md-offset-3 text-justify" id="login-card">
                                    @if($aluno->observacao != null)
                                        <h4 style="color: #12583C">
                                            <strong>Observações:</strong> {!! $aluno->observacao !!}
                                        </h4>
                                        <br/>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @if(App\Gerenciar::where('user_id','=',\Auth::user()->id)->where('aluno_id','=',$aluno->id)->first()->tipoUsuario != 2)
                            <hr style="border-top: 1px solid #AAA;">

                            <h2>
                                <strong style="color: #12583C">
                                    Álbuns
                                </strong>
                            </h2>

                            <div class="row" align="center" id="login-card">
                                <div class="container col-md-12" id="login-card">
                                    <div class="card-body" style="margin-left: -35px">
                                        <div class="col-md-3 mt-3" style="opacity: 0.7;" id="login-card">
                                            <a href="{{route('album.cadastrar' , ['id_aluno'=>$aluno->id])}}"
                                               data-toggle="tooltip" title="Ver objetivos">
                                                <div class="card cartao text-center "
                                                     style="border-radius: 20px;  width: 230px; height: 230px">
                                                    <div class="card-body d-flex justify-content-center">
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
                                        <?php
                                        foreach ($albuns as $album) {?>
                                        <div class="col-md-3 mt-3" id="login-card">
                                            <div class="card cartao text-center"
                                                 style="border-radius: 20px; background: #4e555b; width: 230px; height: 230px"
                                                 id="login-card">
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
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>

                <!-- <div class="panel-footer" style="background-color:white">
          <a class="btn btn-danger" href="{{URL::previous()}}">
            <i class="material-icons">keyboard_backspace</i>
            <br>
            Voltar
          </a>
        </div> -->
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

                            <div class="panel"
                                 style="max-height:400px; max-width: 450px; overflow:auto; background-color: #e5ddd5">
                                <div class="panel-body">

                                    <form class="form-horizontal" method="POST"
                                          action="{{route('aluno.forum.mensagem.enviar')}}">
                                        @csrf
                                        <input name="forum_id" type="text" value={{$aluno->forum->id}} hidden>

                                        <div style="margin: 1%" class="form-group">
                                            <textarea name="mensagem"
                                                      style="display: inline; width:100%; min-width: 100%; max-width: 100%;min-height: 80px;"
                                                      type="text" class="form-control summernote"></textarea>
                                            <br>

                                            @if ($errors->has('mensagem'))
                                                <div style="margin-left: 1%; margin-right: 1%"
                                                     class="alert alert-danger">
                                                    <strong>Erro!</strong>
                                                    {{ $errors->first('mensagem') }}
                                                </div>
                                            @endif

                                            <button type="submit" class="btn btn-primary">Enviar</button>

                                        </div>
                                    </form>

                                    <div class="form-group">
                                        @foreach($mensagens as $mensagem)
                                            @if($mensagem->user_id == \Auth::user()->id)
                                                <div style="text-align: right; width: 80%; margin-left: 20%"
                                                     id='user-message'>
                                                    <div class="panel panel-default">
                                                        <div style="background-color: #dbf6c5; color: #262626"
                                                             class="panel-body">
                                                            <div class="hifen">
                                                                {!! $mensagem->texto !!}<br>
                                                                {{$mensagem->created_at->format('d/m/y h:i')}}<br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <div style="text-align: left; width: 80%" id='others-message'>
                                                    <div class="panel panel-default">
                                                        <div style="background-color: white; color: #262626"
                                                             class="panel-body">
                                                            <div class="hifen">
                                                                <strong>{{$mensagem->user->name}}:</strong><br>
                                                                {!! $mensagem->texto !!}<br>
                                                                {{$mensagem->created_at->format('d/m/y h:i')}}<br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
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
                            <form method="GET" action="{{ route("relatorio.gerar", ['id_aluno'=>$aluno->id]) }}"
                                  target="_blank" onsubmit="setTimeout(function(){window.location.reload();},10);">
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label for="dataInicial" class="col-2 col-form-label">Selecione
                                                    a
                                                    data inicial</label>
                                                <input class="form-control" type="date"
                                                       id="dataInicial" name="dataInicial"
                                                       value="{{date('Y-m-d', strtotime('-1 months'))}}">
                                            </div>
                                            <div class="col-md-1">
                                                <span></span>
                                            </div>
                                            <div class="col-md-5 ml-auto">
                                                <label for="dataFinal" class="col-2 col-form-label">Selecione a
                                                    data
                                                    final</label>
                                                <input class="form-control" type="date"
                                                       id="dataFinal" name="dataFinal" value="{{date('Y-m-d')}}">
                                            </div>
                                        </div>
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
