@extends('layouts.principal')
@section('title','Início')
@section('path','Início')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Alunos</div>

        <div class="panel-body">

          @if (\Session::has('success'))
          <br>
          <div class="alert alert-success">
            <strong>Sucesso!</strong>
            {!! \Session::get('success') !!}
          </div>
          @endif

          @if (\Session::has('password'))
          <div class="alert alert-success">
            <strong>Sucesso!</strong>
            {!! \Session::get('password') !!}
          </div>
          @endif

          @if (\Session::has('denied'))
          <div class="alert alert-warning">
            <strong>Não permitido!</strong>
            {!! \Session::get('denied') !!}
          </div>
          @endif

          <div id="tabela" class="table-responsive">
            <table id="tabela_dados" class="table table-hover">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>Ação</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($alunos as $aluno)
                <tr>
                  <td data-title="Nome">{{ $aluno->nome }}</td>
                  <td>
                    <a class="btn btn-success" href="{{ route("aluno.gerenciar",['id_aluno'=>$aluno->id]) }}">
                      Gerenciar
                    </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

        <div class="panel-footer">
          <a class="btn btn-danger" href="{{ route("home") }}">Voltar</a>
          <a class="btn btn-success" href="{{ route("aluno.cadastrar")}}">Novo</a>
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
      { "orderable": false, "targets": 1 }
    ]
  });
});
</script>

@endsection
