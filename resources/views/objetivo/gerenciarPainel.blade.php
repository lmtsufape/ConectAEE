@extends('layouts.principal')
@section('title','Gerenciar objetivo')
@section('navbar')
<a href="{{route('aluno.listar')}}">Início</a>
> <a href="{{route('aluno.gerenciar',$aluno->id)}}">Gerenciar: <strong>{{$aluno->nome}}</strong></a>
> <a href="{{route('objetivo.listar',$aluno->id)}}">Objetivos</a>
> <strong>{{$objetivo->titulo}}</strong>
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div id="painel0">
      <div class="panel panel-default">

        <div class="panel-heading">
          Objetivo: <strong>{{$objetivo->titulo}}</strong>
        </div>

        <div class="panel-body">
          @if (\Session::has('success'))
            <br>
            <div class="alert alert-success">
              <strong>Sucesso!</strong>
              {!! \Session::get('success') !!}
            </div>
          @endif

          <div class="row">
            <div class="col-md-6">
              <strong>Autor: </strong>{{$objetivo->user->name}}
              <br><br>
              <strong>Prioridade: </strong>{{$objetivo->prioridade}}
              <br><br>
              <strong>Tipo: </strong>{{$objetivo->tipoObjetivo->tipo}}
              <br><br>
              <strong>Concluído: </strong>
              <?php
                echo $objetivo->concluido ? "Sim" : "Não";
              ?>
              <br><br>
              <strong>Histórico de Status: </strong>
              @foreach ($objetivo->statusObjetivo as $statusObjetivo)
                | {{ $statusObjetivo->status->status }} {{ $statusObjetivo->data}}
              @endforeach
            </div>

            <div class="col-md-6" align="justify">
              <strong>Descrição: </strong>{{$objetivo->descricao}}
            </div>
          </div>

        </div>

        <div class="panel-footer">
          <div class="row text-right" id="acoes" style="padding:1rem;">
            @if($objetivo->user->id == \Auth::user()->id && $objetivo->concluido == false)
                <a class="btn btn-primary" href={{ route("objetivo.editar" , ['id_objetivo' => $objetivo->id]) }}>
                  <i class="material-icons">edit</i>
                  <br>
                  Editar
                </a>
                <a class="btn btn-danger" onclick="return confirm('\Confirmar exclusão do objetivo {{$objetivo->titulo}}?')" href={{ route("objetivo.excluir" , ['id_objetivo' => $objetivo->id]) }}>
                  <i class="material-icons">delete</i>
                  <br>
                  Excluir
                </a>
                <a class="btn btn-success" href={{ route("objetivo.concluir" , ['id_objetivo' => $objetivo->id]) }}>
                  <i class="material-icons">folder</i>
                  <br>
                  Finalizar
                </a>
            @elseif($objetivo->user->id == \Auth::user()->id && $objetivo->concluido == true)
              <a class="btn btn-danger" href={{ route("objetivo.desconcluir" , ['id_objetivo' => $objetivo->id]) }}>
                <i class="material-icons">folder_open</i>
                <br>
                Reabrir
              </a>
            @endif
          </div>
        </div>

      </div>
    </div>

    <div id="painel1" class="flex">
      <div id="painel2" class="col-md-8">
        <div id="painel3" class="row" style="width:100%">

          <div id="atividades" class="panel panel-default">

            <div class="panel-heading">
              Atividades
            </div>

            <div class="panel-body">

              @if (\Session::has('atividade'))
                <br>
                <div class="alert alert-success">
                  <strong>Sucesso!</strong>
                  {!! \Session::get('atividade') !!}
                </div>
              @endif

              <div id="tabela" style="overflow:auto" class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Data</th>
                      <th colspan="{{ $size1 }}">Atividades</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($atividadesGroupByData as $data => $atividades)

                      <tr>
                        <td style="vertical-align:middle;" data-title="Data">{{ $data }}</td>

                        @php($temp = 0)

                        @foreach ($atividades as $atividade)
                          <td data-title="Atividades">

                            @php($cor = \App\Http\Controllers\AtividadeController::corStatus($atividade->status))

                            <div class="card" style="width: 15rem; height: 15rem; background-color:{{$cor}}">
                              <div class="card-body" style="height:70%; margin-left: 5%; margin-right: 5%; display: -webkit-flex; display: flex;-webkit-align-items: center;align-items: center;-webkit-justify-content: center;justify-content: center;">
                                <div class="hifen text-center" >
                                  <font size="3">
                                    <strong> {{ $atividade->titulo }} </strong>
                                  </font>
                                </div>
                              </div>
                              <div class="card-footer text-center">
                                @if($atividade->objetivo->user->id == \Auth::user()->id)
                                  <a class="btn btn-primary" href={{ route("atividade.ver", ["id_atividade" => $atividade->id]) }}>Gerenciar</a>
                                @else
                                  <a class="btn btn-success" href={{ route("atividade.ver", ["id_atividade" => $atividade->id]) }}>Ver</a>
                                @endif
                              </div>
                            </div>
                          </td>
                          @php($temp += 1)
                        @endforeach

                        @while($temp < $size1)
                          <td></td>
                          @php($temp += 1)
                        @endwhile
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>

            <div class="panel-footer" style="background-color: white;">
              <div class="row">
                <div class="col-md-8" style="max-width:60%">
                  <div class="output">
                    <h4>Legenda:</h4>

                    <?php
                      foreach ($statuses as $status){
                        $cor = \App\Http\Controllers\AtividadeController::corStatus($status);
                    ?>
                      <span style="background:{{$cor}}"></span>
                      {{$status}}
                    <?php
                      }
                    ?>
                  </div>
                </div>

                <div class="col-md-4" style="max-width:40%">
                  <div class="text-right">
                    @if(App\Gerenciar::where('user_id','=',\Auth::user()->id)->where('aluno_id','=',$aluno->id)->first()->perfil_id != 1 && $objetivo->user->id == \Auth::user()->id)
                      <a class="btn btn-success" href="{{ route("atividades.cadastrar" , ['id_objetivo' => $objetivo->id])}}">
                        <i class="material-icons">add</i>
                        <br>
                        Novo
                      </a>
                    @endif
                  </div>
                </div>
              </div>
              <br>
            </div>

          </div>

          <div id="sugestoes" class="panel panel-default" >

            <div class="panel-heading" style="position:relative">
              Sugestões
            </div>

            <div class="panel-body" style="position:relative">

              @if (\Session::has('sugestao'))
                <br>
                <div class="alert alert-success">
                  <strong>Sucesso!</strong>
                  {!! \Session::get('sugestao') !!}
                </div>
              @endif

              <div id="tabela" style="overflow:auto" class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Data</th>
                      <th colspan="{{ $size2 }}">Sugestões</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($sugestoesGroupByData as $data => $sugestoes)

                      <tr>
                        <td style="vertical-align:middle;" data-title="Data">{{ $data }}</td>

                        @php($temp = 0)

                        @foreach ($sugestoes as $sugestao)
                          <td data-title="Sugestões">
                            <div class="card" style="width: 15rem; height: 15rem; background-color:#76b1e8">
                              <div class="card-body" style="height:70%; margin-left: 5%; margin-right: 5%; display: -webkit-flex; display: flex;-webkit-align-items: center;align-items: center;-webkit-justify-content: center;justify-content: center;">
                                <div class="hifen text-center" >
                                  <font size="3">
                                    <strong> {{ $sugestao->titulo }} </strong>
                                    <br>
                                    <strong> {{ $sugestao->user->name }} </strong>
                                  </font>
                                </div>
                              </div>
                              <div class="card-footer text-center">
                                @if($sugestao->user->id == \Auth::user()->id)
                                  <a class="btn btn-primary" href={{ route("sugestao.ver", ["id_sugestao" => $sugestao->id]) }}>Gerenciar</a>
                                @else
                                  <a class="btn btn-success" href={{ route("sugestao.ver", ["id_sugestao" => $sugestao->id]) }}>Ver</a>
                                @endif
                              </div>
                            </div>
                          </td>
                          @php($temp += 1)
                        @endforeach

                        @while($temp < $size2)
                          <td></td>
                          @php($temp += 1)
                        @endwhile
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>

              <div class="text-right">
                @if(App\Gerenciar::where('user_id','=',\Auth::user()->id)->where('aluno_id','=',$aluno->id)->first() != null && $objetivo->user->id != \Auth::user()->id)
                  <a class="btn btn-success" href="{{ route("sugestoes.cadastrar" , ['id_objetivo' => $objetivo->id])}}">
                    <i class="material-icons">add</i>
                    <br>
                    Novo
                  </a>
                @endif
              </div>

            </div>

            <div class="panel-footer" style="background-color: white;position:relative">
              <br><br>
            </div>
          </div>
        </div>
      </div>

      <div id="forum" class="col-md-4">
        <div class="panel panel-default" style="width:100%">

          <div class="panel-heading">
            Discussão sobre este objetivo:
          </div>

          <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{route('objetivo.forum.mensagem.enviar')}}">
              @csrf
              <input name="forum_id" type="text" value="{{$objetivo->forum->id}}" hidden>

              <div style="margin: 1%" class="form-group">
                <textarea name="mensagem" style="width:75%; display: inline" id="summer" type="text" class="form-control summernote"></textarea>
                <br>

                @if ($errors->has('mensagem'))
									<div style="margin-left: 1%; margin-right: 1%" class="alert alert-danger">
										<strong>Erro!</strong>
										{{ $errors->first('mensagem') }}
									</div>
								@endif

                <button type="submit" class="btn btn-primary">Enviar</button>
              </div>
              <br>
            </form>

            <div class="form-group">
              @foreach($mensagens as $mensagem)
                @if($mensagem->user_id == \Auth::user()->id)
                  <div style="text-align: right; width: 80%; margin-left: 20%" id='user-message'>
                    <div class="panel panel-default">
                      <div class="panel-body" style="background-color: #bbffad">
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
                      <div class="panel-body" style="background-color: #adbaff">
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

          <div class="panel-footer" style="background-color: white;">
            <a class="btn btn-primary" style="width:100%" href="{{route('objetivo.forum',['id_objetivo' => $objetivo->id])."#forum"}}">Ver todas as mensagens</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

var width = screen.width;

if (width <= 1000){
  document.getElementById("painel0").className = "col-md-12";
  document.getElementById("painel1").className = "col-md-offset-1";
  document.getElementById("painel2").className = "col-md-12";
  document.getElementById("painel3").className = "";
}

</script>

<style>
  .output span { display:inline-block; width:20px; height:20px;  border-radius:50%; }
</style>

<script type="text/javascript">
  $('#summer').summernote({
    placeholder: 'Escreva sua mensagem aqui...',
    lang: 'pt-BR',
    tabsize: 2,
    height: 100
  });
</script>

@endsection
