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

    <div id="painel" class="flex col-md-offset-1">
      <div class="col-md-5">
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

            <div class="col">
              <strong>Título: </strong>{{$objetivo->titulo}}
              |
              <strong>Autor: </strong>{{$objetivo->user->name}}
              |
              <strong>Prioridade: </strong>{{$objetivo->prioridade}}
              |
              <strong>Tipo: </strong>{{$objetivo->tipoObjetivo->tipo}}
              |
              <strong>Concluído: </strong>
              @if($objetivo->concluido)
                Sim
              @else
                Não
              @endif
              <br>
              <strong>Descrição: </strong>{{$objetivo->descricao}}
              <br>
              <strong>Histórico de Status: </strong>
              @foreach ($objetivo->statusObjetivo as $statusObjetivo)
                | {{ $statusObjetivo->status->status }} {{ $statusObjetivo->data}}
              @endforeach

              <br><br>
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

          </div>

          <div class="panel-footer" style="background-color: white;">
            <a class="btn btn-danger" href="{{route('objetivo.listar',$aluno->id)}}">Voltar</a>

            <a class="btn btn-primary" href={{ route("atividades.listar", ["id_objetivo" => $objetivo->id]) }}>Atividades</a>
            <a class="btn btn-primary" href={{ route("sugestoes.listar", ["id_objetivo" => $objetivo->id]) }}>Sugestões</a>

            @if($objetivo->user->id == \Auth::user()->id)
              <a class="btn btn-primary" href={{ route("objetivo.status.cadastrar" , ['id_objetivo' => $objetivo->id]) }}>Status</a>

              @if($objetivo->concluido == false)
                <a class="btn btn-success" href={{ route("objetivo.concluir" , ['id_objetivo' => $objetivo->id]) }}>Concluir</a>
              @elseif($objetivo->concluido == true)
                <a class="btn btn-danger" href={{ route("objetivo.desconcluir" , ['id_objetivo' => $objetivo->id]) }}>Desconcluir</a>
              @endif

            @endif

          </div>
        </div>
      </div>

      <div class="col-md-5">
        <div class="panel panel-default" style="width:100%">

          <div class="panel-heading">
            Fórum <a class="btn btn-primary btn-xs" style="margin-left: 50%" href="{{route('objetivo.forum',['aluno' => $objetivo->aluno->id, 'objetivo' => $objetivo->id])."#forum"}}">Ver todas as mensagens</a>
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
  document.getElementById("painel").className = " col-md-offset-1";
}

</script>

@endsection
