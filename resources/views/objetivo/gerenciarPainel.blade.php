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

    @if (\Session::has('success'))
      <br>
      <div class="alert alert-success">
        <strong>Sucesso!</strong>
        {!! \Session::get('success') !!}
      </div>
    @endif

    <div id="painel" class="flex">
      <div class="col-md-8">
        <div class="row" style="width:100%">

          <div class="panel panel-default">

            <div class="panel-heading">
              Atividades do objetivo: <strong>{{$objetivo->titulo}}</strong>
            </div>

            <div class="panel-body">

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
                                <a class="btn btn-success" href={{ route("atividades.listar", ["id_objetivo" => $objetivo->id]) }}>Ver</a>
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
                <div class="col-md-6" style="max-width:50%">
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
                <div class="col-md-6" style="max-width:50%">
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
            </div>

          </div>

          <div class="panel panel-default">

            <div class="panel-heading">
              Sugestões do objetivo: <strong>{{$objetivo->titulo}}</strong>
            </div>

            <div class="panel-body">

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
                                  </font>
                                </div>
                              </div>
                              <div class="card-footer text-center">
                                <a class="btn btn-success" href={{ route("sugestoes.listar", ["id_objetivo" => $objetivo->id]) }}>Ver</a>
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

              @if($objetivo->user->id == \Auth::user()->id)
              <div class="row text-right">
                <a class="btn btn-primary" href={{ route("objetivo.editar" , ['id_objetivo' => $objetivo->id]) }}>
                  <i class="material-icons">edit</i>
                </a>
                <a class="btn btn-danger" onclick="return confirm('\Confirmar exclusão do objetivo {{$objetivo->titulo}}?')" href={{ route("objetivo.excluir" , ['id_objetivo' => $objetivo->id]) }}>
                  <i class="material-icons">delete</i>
                </a>
                &nbsp;&nbsp;
              </div>
              @endif

            </div>

            <div class="panel-footer" style="background-color: white;">
              <br>
            </div>
          </div>
        </div>

      </div>

      <div class="col-md-4">
        <div class="panel panel-default" style="width:100%">

          <div class="panel-heading">
            Fórum <a class="btn btn-primary btn-xs" style="margin-left: 40%" href="{{route('objetivo.forum',['aluno' => $objetivo->aluno->id, 'objetivo' => $objetivo->id])."#forum"}}">Ver todas as mensagens</a>
          </div>

          <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{route('objetivo.forum.mensagem.enviar')}}">
              @csrf
              <input name="forum_id" type="text" value="{{$objetivo->forum->id}}" hidden>
              <div style="margin: 1%" class="form-group">
                <input name="mensagem" style="width:75%; display: inline" class="form-control" type="text">
                <button style="width:23%" type="submit" class="btn btn-success">Enviar</button>
              </div>
            </form>
          </div>

          <div class="panel-footer" style="background-color: white;">
            <div class="form-group">
              @foreach($mensagens as $mensagem)
                @if($mensagem->user_id == \Auth::user()->id)
                  <div style="text-align: right; width: 80%; margin-left: 20%" id='user-message'>
                    <div class="panel panel-default">
                      <div class="panel-body" style="background-color: #bbffad">
                        <div class="hifen">
                          {{$mensagem->texto}}<br>
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
                          {{$mensagem->texto}}<br>
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
  </div>
</div>

<script type="text/javascript">

var width = screen.width;

if (width <= 1000){
  document.getElementById("painel").className = "col-md-offset-1";
}

</script>

<style>
  .output span { display:inline-block; width:20px; height:20px;  border-radius:50%; }
</style>

@endsection
