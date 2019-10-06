@extends('layouts.principal')
@section('title','Gerenciar atividade')
@section('navbar')
<a href="{{route('aluno.listar')}}">Início</a>
> <a href="{{route('aluno.gerenciar',$aluno->id)}}">Perfil de <strong>{{ explode(" ", $aluno->nome)[0]}}</strong></a>
> <a href="{{route('objetivo.listar',$aluno->id)}}">Objetivos</a>
> <a href="{{route('objetivo.gerenciar',[$objetivo->id])}}"><strong>{{$objetivo->titulo}}</strong></a>
> <strong>Atividade: {{$atividade->titulo}}</strong>
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-heading">
          Atividade: <strong>{{$atividade->titulo}}</strong>
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
              <strong>Título: </strong>{{$atividade->titulo}}
              <br><br>
              <strong>Prioridade: </strong>{{$atividade->prioridade}}
              <br><br>
              <strong>Status: </strong>{{$atividade->status}}
              <br><br>
              <strong>Data: </strong> {{$atividade->data}}
            </div>

            <div class="col-md-6" align="justify">
              <strong>Descrição: </strong>{{$atividade->descricao}}
            </div>
          </div>

        </div>

        <div class="panel-footer">
          <div class="row text-right" style="padding:1rem;">
            @if($objetivo->user->id == \Auth::user()->id)
              @if($atividade->concluido == false)
                <a class="btn btn-primary" href={{ route("atividade.editar" , ['id_atividade' => $atividade->id]) }}>
                  <i class="material-icons">edit</i>
                  <br>
                  Editar
                </a>

                <a class="btn btn-danger" onclick="return confirm('\Confirmar exclusão da atividade {{$atividade->titulo}}?')" href={{ route("atividade.excluir" , ['id_atividade' => $atividade->id]) }}>
                  <i class="material-icons">delete</i>
                  <br>
                  Excluir
                </a>

                <a class="btn btn-success" href={{ route("atividade.concluir" , ['id_atividade' => $atividade->id]) }}>
                  <i class="material-icons">folder</i>
                  <br>
                  Finalizar
                </a>
              @elseif($atividade->concluido == true)
                <a class="btn btn-danger" href={{ route("atividade.desconcluir" , ['id_atividade' => $atividade->id]) }}>
                  <i class="material-icons">folder_open</i>
                  <br>
                  Reabrir
                </a>
              @endif

            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
