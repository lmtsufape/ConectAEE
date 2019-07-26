@extends('layouts.principal')
@section('title','Início')
@section('navbar')
 <a href="{{route('instituicao.listar')}}">Instituições</a>
 > Listar
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
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
                    <th>Telefone</th>
                    <th>Email</th>
                    <th>Endereço</th>
                    <th colspan="2">Ação</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($instituicoes as $instituicao)
                  <tr>
                    <td data-title="Nome">{{ $instituicao->nome }}</td>
                    <td data-title="Telefone">{{ $instituicao->telefone }}</td>
                    <td data-title="Email">{{ $instituicao->email }}</td>
                    <td data-title="Endereço">
                      <?php
        								echo $instituicao->endereco->logradouro, ", ",
        								$instituicao->endereco->numero, ", ",
        								$instituicao->endereco->bairro, ", ",
        								$instituicao->endereco->cidade, " - ",
        								$instituicao->endereco->estado;
        							?>
                    </td>
                    <td data-title="Ação">
                      <a class="btn btn-success" href="{{ route("instituicao.editar" , ['id_instituicao' => $instituicao->id]) }}">Editar</a>
                    </td>
                    <td data-title="Ação">
                      <a class="btn btn-danger" onclick="return confirm('\Confirmar exclusão da instituicao {{$instituicao->nome}}?')" href="{{ route("instituicao.excluir" , ['id_instituicao' => $instituicao->id]) }}">
                        Excluir
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
          <a class="btn btn-success" href="{{ route("instituicao.cadastrar") }}">Novo</a>
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
				{ "orderable": false, "targets": 4 }
			]
	   });

   });
</script>

@endsection
