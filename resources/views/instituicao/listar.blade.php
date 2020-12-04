@extends('layouts.principal')
@section('title','Listar Instituições')
@section('navbar')
@endsection
@section('content')
<div class="container" style="color: #12583C">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default" style="padding: 10px 20px;" id="login-card">

        <div class="panel-heading" id="login-card">
          <div class="row" style="margin-bottom: -20px">
            <div class="col-md-12" id="login-card">
              <div style="width: 100%; margin-left: 0%;" class="row" id="login-card">
                <div style="float: left;" class="col-md-6" id="login-card">
                  <h2>
                    <strong style="color: #12583C">
                      Instituições
                    </strong>
                  </h2>
                  <div style="font-size: 14px" id="login-card">
                    <a href="{{route('aluno.listar')}}">Início</a>
                    > Instituições
                  </div>
                </div>
                <div style="float:right;" class="col-md-3" id="login-card">
                  <a class="btn btn-primary" style="float:right; margin-top:20px; background-color: #0398fc; color: white; font-weight: bold; font-size: 14px; padding: 7px; border-radius: 5px; border-color: #0398fc; box-shadow: 4px 4px 4px #CCC"  id="signup" href="{{ route('instituicao.cadastrar')}}">
                    Nova Instituição
                  </a>
                </div>
                <div class="row col-md-3" style="float:right; " id="login-card">
                  @if(count($instituicoes) != 0 || $termo != null)
                    <form class="form-horizontal" method="GET" action="{{ route("instituicao.buscar") }}">

                      <div id="divBusca" style="margin-top:20px;" id="login-card">

                      <i class="material-icons" style="margin-top:5px;">search</i>

                      @if ($termo == null)
                        <input id="termo" type="text" autocomplete="off" name="termo" autofocus placeholder="Nome ou endereço">
                      @else
                        <input id="termo" type="text" autocomplete="off" name="termo" autofocus placeholder="Nome ou endereço" value="{{$termo}}">
                      @endif

                      <button id="btnBusca" type="submit">
                        Buscar
                      </button>
                      </div>
                    </form>
                  @endif
                </div>
              </div>
            </div>

          </div>

          <hr style="border-top: 1px solid #AAA;">
        </div>

        <div class="panel-body" id="login-card">

          @if (\Session::has('success'))
            <br>
            <div class="alert alert-success" id="login-card">
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
                        Visualizar
                      </a>
                    </td>
                    <td data-title="">
                      <a class="btn btn-primary" href="{{ route("instituicao.editar" , ['id_instituicao' => $instituicao->id]) }}">
                        Editar
                      </a>
                    </td>
                    <td data-title="">
                      <a class="btn btn-danger" onclick="return confirm('\A instituicao será desvinculada de qualquer aluno cadastrado com ela. Confirmar exclusão da instituicao {{$instituicao->nome}}? ')" href="{{ route("instituicao.excluir" , ['id_instituicao' => $instituicao->id]) }}">
                        Excluir
                      </a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

        <div class="panel-footer" style="background-color:white" id="login-card">
          <div class="text-center" id="login-card">
            <a class="btn btn-secondary" href="{{route('aluno.listar')}}" id="menu-a">
              Voltar
            </a>
          </div>
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
