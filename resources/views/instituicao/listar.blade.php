@extends('layouts.principal')
@section('title','Listar instituições')
@section('navbar')
<a href="{{route('instituicao.listar')}}">Instituições</a>
> Listar
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Instituições</div>

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
                  <th>Nome</th>
                  <th>Ações</th>
                  <th></th>
                  <th></th>
                </tr>

              </thead>
              <tbody>
                @foreach ($instituicoes as $instituicao)
                  <tr>
                    <td data-title="Nome">{{ $instituicao->nome }}</td>
                    <td data-title="Ações">
                      <a class="btn btn-primary" href="{{ route("instituicao.ver" , ['id_instituicao' => $instituicao->id]) }}">
                        <i class="material-icons">remove_red_eye</i>
                      </a>
                    </td>
                    <td data-title="Ações">
                      <a class="btn btn-primary" href="{{ route("instituicao.editar" , ['id_instituicao' => $instituicao->id]) }}">
                        <i class="material-icons">edit</i>
                      </a>
                    </td>
                    <td data-title="">
                      <a class="btn btn-danger" onclick="return confirm('\Confirmar exclusão da instituicao {{$instituicao->nome}}?')" href="{{ route("instituicao.excluir" , ['id_instituicao' => $instituicao->id]) }}">
                        <i class="material-icons">delete</i>
                      </a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

        <div class="panel-footer">
          <a class="btn btn-danger" href="{{ route("home") }}">
            <i class="material-icons">keyboard_backspace</i>
            <br>
            Voltar
          </a>
          <a class="btn btn-success" href="{{ route("instituicao.cadastrar") }}">
            <i class="material-icons">add</i>
            <br>
            Novo
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
      { "orderable": false, "targets": 1 },
      { "orderable": false, "targets": 2 },
      { "orderable": false, "targets": 3 }
    ]
  });

});
</script>

@endsection
