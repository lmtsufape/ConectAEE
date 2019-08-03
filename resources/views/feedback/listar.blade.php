@extends('layouts.principal')
@section('title','Listar feedbacks')
@php($aluno = $sugestao->objetivo->aluno)
@php($objetivo = $sugestao->objetivo)
@section('navbar')
<a href="{{route('aluno.listar')}}">Início</a>
> <a href="{{route('aluno.gerenciar',$aluno->id)}}">Gerenciar: <strong>{{$aluno->nome}}</strong></a>
> <a href="{{route('objetivo.listar',$aluno->id)}}">Objetivos</a>
> <a href="{{route('objetivo.gerenciar',[$objetivo->id])}}"><strong>{{$objetivo->titulo}}</strong></a>
> <a href="{{route('sugestoes.listar',[$objetivo->id])}}">Sugestões</a>
> Feedbacks de <strong>{{$sugestao->titulo}}</strong>
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Feedbacks de <strong>{{$sugestao->titulo}}</strong></div>

        <div class="panel-body">
          @if (\Session::has('success'))
          <br>
          <div class="alert alert-success">
            <strong>Sucesso!</strong>
            {!! \Session::get('success') !!}
          </div>
          @endif

          <div id="tabela" class="table-responsive">
            <table id="tabela_dados" class="table table-hover">
              <thead>
                <tr>
                  <th>Usuário</th>
                  <th>Feedback</th>
                  <th>Horário</th>
                  <th>Ações</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($feedbacks as $feedback)
                <tr>
                  <td data-title="Usuário">{{ $feedback->user->name }}</td>
                  <td data-title="Feedback">{{ $feedback->texto }}</td>
                  <td data-title="Horário">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$feedback->updated_at)->format('d-m-Y (H:i)') }}</td>

                  @if($feedback->user->id == \Auth::user()->id)
                    <td data-title="Ações">
                      <a class="btn btn-primary" href={{ route("feedback.editar" , ['id_feedback' => $feedback->id]) }}>Editar</a>
                    </td>
                  @else
                    <td></td>
                  @endif

                  @if($objetivo->user->id == \Auth::user()->id)
                    <td data-title="">
                      <a class="btn btn-danger" onclick="return confirm('\Confirmar exclusão deste feedback?')" href={{ route("feedback.excluir" , ['id_feedback' => $feedback->id]) }}>Excluir</a>
                    </td>
                  @else
                    <td></td>
                  @endif

                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

        <div class="panel-footer">
          <a class="btn btn-danger" href="{{route('sugestoes.listar',['id_objetivo' => $sugestao->objetivo->id] )}}">
            Voltar
          </a>
          <a class="btn btn-success" href="{{route('feedbacks.cadastrar',['id_sugestao' => $sugestao->id] )}}">
            Enviar novo feedback
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready( function () {
  $('#tabela_dados').DataTable( {
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
    },
    "columnDefs": [
      { "orderable": false, "targets": 3 },
    ]
  });
});
</script>
@endsection
