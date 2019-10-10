@extends('layouts.principal')
@section('title','Gerenciar objetivo')
@section('navbar')
<a href="{{route('aluno.listar')}}">Início</a>
> <a href="{{route('aluno.gerenciar',$aluno->id)}}">Perfil de <strong>{{ explode(" ", $aluno->nome)[0]}}</strong></a>
> <a href="{{route('objetivo.listar',$aluno->id)}}">Objetivos</a>
> <strong>{{$objetivo->titulo}}</strong>
@endsection

@section('content')
<div class="container">
  <div class="row">

    <div class="panel panel-default">

      <div class="panel-heading">
        <div class="row">

          <div class="col-md-6">
            <h2>
              <strong>
                Gerenciar Objetivo
              </strong>
            </h2>
          </div>

          <div class="col-md-6 text-right" style="margin-top:20px">
            @if($objetivo->user->id == \Auth::user()->id && $objetivo->concluido == false)
              <a class="btn btn-primary" href={{ route("objetivo.editar" , ['id_objetivo' => $objetivo->id]) }}>
                Editar
              </a>
              <a class="btn btn-primary" href={{ route("objetivo.concluir" , ['id_objetivo' => $objetivo->id]) }}>
                Finalizar
              </a>
              <a class="btn btn-danger" onclick="return confirm('\Confirmar exclusão do objetivo {{$objetivo->titulo}}?')" href={{ route("objetivo.excluir" , ['id_objetivo' => $objetivo->id]) }}>
                Excluir
              </a>
            @elseif($objetivo->user->id == \Auth::user()->id && $objetivo->concluido == true)
              <a class="btn btn-primary" href={{ route("objetivo.desconcluir" , ['id_objetivo' => $objetivo->id]) }}>
                Reabrir
              </a>
            @endif
          </div>

        </div>

        <hr style="border-top: 1px solid black;">
      </div>

      <div class="panel-body">
        @if (\Session::has('success'))
          <div class="alert alert-success">
            <strong>Sucesso!</strong>
            {!! \Session::get('success') !!}
          </div>
        @endif

        <div class="row col-md-12">
          <div class="row col-md-12" style="margin-left:0px; margin-top:-20px;">
            <h3>
              <strong>Objetivo: </strong>{{$objetivo->titulo}}
            </h3>
            <hr style="border-top: 1px solid black;">
          </div>

          <div class="col-md-6">
            <strong>Autor: </strong>{{$objetivo->user->name}}
            <br>
            <strong>Prioridade: </strong>{{$objetivo->prioridade}}
            <br>
            <strong>Tipo: </strong>{{$objetivo->tipoObjetivo->tipo}}
            <br>
            <strong>Concluído: </strong>
            <?php
              echo $objetivo->concluido ? "Sim" : "Não";
            ?>
            <br>

          </div>

          <div class="col-md-6">
            <strong>Histórico de Status: </strong> <br>
            <ul>
              @foreach ($objetivo->statusObjetivo as $statusObjetivo)
                <li>
                  {{ $statusObjetivo->status->status }} - {{ $statusObjetivo->data}} <br>
                </li>
              @endforeach
            </ul>

            <strong>Status atual:</strong>

            <form method="POST" action="{{ route("objetivo.status.atualizar") }}">
              {{ csrf_field() }}

              <input id="id_aluno" type="hidden" class="form-control" name="id_aluno" value="{{ $aluno->id }}">
              <input id="id_objetivo" type="hidden" class="form-control" name="id_objetivo" value="{{ $objetivo->id }}">

              <div class="col-md-12">

                <div class="col-md-6 text-center">
                  <select id="status" class="form-control" name="status" style="margin-bottom:10px">
                    @foreach($statusesObjetivo as $status)
                      @if($statusObjetivo->status == $status)
                        <option value={{$status->id}} selected>{{$status->status}}</option>
                      @else
                        <option value={{$status->id}}>{{$status->status}}</option>
                      @endif
                    @endforeach
                  </select>
                </div>

                <div class="col-md-6 text-center">
                  <button type="submit" class="btn btn-primary">
                    Atualizar
                  </button>
                </div>
              </div>
            </form>
          </div>

          <div class="row col-md-12" style="margin-left:0px;" align="justify">
            <br>
            <strong>Descrição: </strong>{{$objetivo->descricao}}
          </div>
        </div>

        <div class="row col-md-12">
          <div id="atividades">

            <div class="panel-heading">
              <div class="row">

                <div class="col-md-6">
                  <h3>
                    <strong>Atividades</strong>
                  </h3>
                </div>

                <div class="col-md-6 text-right" style="margin-top:20px">
                  @if(App\Gerenciar::where('user_id','=',\Auth::user()->id)->where('aluno_id','=',$aluno->id)->first()->perfil_id != 1 && $objetivo->user->id == \Auth::user()->id)
                    <a class="btn btn-primary" href="{{ route("atividades.cadastrar" , ['id_objetivo' => $objetivo->id])}}">
                      Cadastrar
                    </a>
                  @endif
                </div>
              </div>

              <hr style="border-top: 1px solid black;">
            </div>

            <div class="panel-body">

              @if (\Session::has('atividade'))
                <div class="alert alert-success">
                  <strong>Sucesso!</strong>
                  {!! \Session::get('atividade') !!}
                </div>
              @endif

              @if(count($atividades) != 0)
                <div id="tabela" class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th style="width:25%">Status</th>
                        <th style="width:25%">Atividade</th>
                        <th style="width:25%">Data</th>
                        <th style="width:25%">Ação</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($atividades as $atividade)
                        <tr>
                          <td data-title="Status" class="output">
                            @php($cor = \App\Http\Controllers\AtividadeController::corStatus($atividade->status))
                            <span style="background:{{$cor}}"></span>
                          </td>
                          <td data-title="Atividades">
                            {{ $atividade->titulo }}
                          </td>
                          <td data-title="Data">{{ $atividade->data }}</td>
                          <td data-title="Ação">
                            @if($atividade->objetivo->user->id == \Auth::user()->id)
                              <a class="btn btn-primary" href={{ route("atividade.ver", ["id_atividade" => $atividade->id]) }}>Gerenciar</a>
                            @else
                              <a class="btn btn-primary" href={{ route("atividade.ver", ["id_atividade" => $atividade->id]) }}>Ver</a>
                            @endif
                          </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              @else
                <div class="alert alert-info">
                  <strong>Não há nenhuma atividade cadastrada.</strong>
                </div>
              @endif
            </div>

            <div class="panel-footer" style="background-color: white;">
              <div class="row">
                <div class="row col-md-12 output">
                  <div class="col-md-3">
                    <strong>
                      Legenda:
                    </strong>
                  </div>
                  <?php
                  foreach ($statuses as $status){
                    $cor = \App\Http\Controllers\AtividadeController::corStatus($status);
                  ?>
                    <div class="col-md-3">
                      <span style="background:{{$cor}}"></span>
                      {{$status}}
                    </div>
                  <?php
                    }
                  ?>
                </div>
              </div>
              <br>
            </div>
          </div>
        </div>

        <div class="row col-md-12">
          <div id="sugestoes">

            <div class="panel-heading">
              <div class="row">
                <div class="col-md-6">
                  <h3>
                    <strong>Sugestões</strong>
                  </h3>
                </div>

                <div class="col-md-6 text-right" style="margin-top:20px">
                  @if(App\Gerenciar::where('user_id','=',\Auth::user()->id)->where('aluno_id','=',$aluno->id)->first() != null && $objetivo->user->id != \Auth::user()->id)
                    <a class="btn btn-primary" href="{{ route("sugestoes.cadastrar" , ['id_objetivo' => $objetivo->id])}}">
                      Cadastrar
                    </a>
                  @endif
                </div>
              </div>

              <hr style="border-top: 1px solid black;">
            </div>

            <div class="panel-body">

              @if (\Session::has('sugestao'))
                <div class="alert alert-success">
                  <strong>Sucesso!</strong>
                  {!! \Session::get('sugestao') !!}
                </div>
              @endif

              @if(count($sugestoes) != 0)
              <div id="tabela" class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width:25%">Sugestão</th>
                      <th style="width:25%">Autor</th>
                      <th style="width:25%">Data</th>
                      <th style="width:25%">Ação</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($sugestoes as $sugestao)
                      <tr>
                        <td data-title="Atividades">
                          {{ $sugestao->titulo }}
                        </td>
                        <td data-title="Autor">
                          {{ explode(" ", $sugestao->user->name)[0]}}
                        </td>
                        <td data-title="Data">{{ $sugestao->data }}</td>
                        <td data-title="Ação">
                          @if($sugestao->user->id == \Auth::user()->id)
                            <a class="btn btn-primary" href={{ route("sugestao.ver", ["id_sugestao" => $sugestao->id]) }}>Gerenciar</a>
                          @else
                            <a class="btn btn-primary" href={{ route("sugestao.ver", ["id_sugestao" => $sugestao->id]) }}>Ver</a>
                          @endif
                        </td>
                      </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
              @else
                <div class="alert alert-info">
                  <strong>Não há nenhuma atividade cadastrada.</strong>
                </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
  .output span { display:inline-block; width:20px; height:20px; border-radius:50%; }
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
