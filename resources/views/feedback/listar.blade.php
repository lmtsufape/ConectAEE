@extends('layouts.principal')
@section('title','Início')
@php($aluno = $sugestao->objetivo->aluno)
@php($objetivo = $sugestao->objetivo)
@section('navbar')
<a href="{{route('aluno.listar')}}">Alunos</a>
> <a href="{{route('aluno.gerenciar',$aluno->id)}}">Gerenciar: <strong>{{$aluno->nome}}</strong></a>
> <a href="{{route('objetivo.listar',$aluno->id)}}">Objetivos</a>
> <a href="{{route('objetivo.gerenciar',[$aluno->id,$objetivo->id])}}"><strong>{{$objetivo->titulo}}</strong></a>
> <a href="{{route('objetivo.sugestoes.listar',[$aluno->id,$objetivo->id])}}">Sugestões</a>
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
                </tr>
              </thead>
              <tbody>
                @foreach ($feedbacks as $feedback)
                <tr>
                  <td data-title="Usuário">{{ $feedback->user->name }}</td>
                  <td data-title="Feedback">{{ $feedback->texto }}</td>
                  <td data-title="Horário">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$feedback->updated_at)->format('d-m-Y (H:i)') }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

        <div class="panel-footer">
          <a class="btn btn-danger" href="{{route('objetivo.sugestoes.listar',[
          'id_aluno' => $sugestao->objetivo->aluno->id,
          'id_objetivo' => $sugestao->objetivo->id,
          'id_sugestao' => $sugestao->id,
          ])}}">
          Voltar
        </a>
        <a class="btn btn-success" href="{{route('objetivo.sugestoes.feedbacks.cadastrar',[
        $sugestao->objetivo->aluno->id,$sugestao->objetivo->id,$sugestao->id,
        ])}}">
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
    }
  });
});
</script>
@endsection
