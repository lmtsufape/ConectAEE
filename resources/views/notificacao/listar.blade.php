@extends('layouts.principal')
@section('title','Notificações')
@section('path','Início')

@section('navbar')
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default" style="margin-top: -20px; padding: 10px 20px;" id="login-card">
        <div class="panel-heading" id="login-card">
          <h2>
            <strong>
              Suas notificações
            </strong>
          </h2>
          <div style="font-size: 14px" id="login-card">
            <a href="{{route('notificacao.listar')}}">Notificações</a> > Listar
          </div>

          <hr style="border-top: 1px solid #AAA;">
        </div>

        <div class="panel-body" id="login-card">
          <div id="tabela" class="table-responsive" id="login-card">
            <table id="tabela_dados" class="table table-hover table-bordered">
              <a href="{{route('notificacao.lerTodas')}}">Ler Todas</a>
              <tbody>
                @foreach($notificacoes as $notificacao)
                  @if($notificacao->aluno != null)
                    <tr>
                      @if($notificacao->lido)
                        <td data-title="Notificacao">
                      @else
                        <td class="bg-info" data-title="Notificacao">
                      @endif
                          <a class="btn text-center" href="{{ route('aluno.permissoes.conceder', ['id_aluno' => $notificacao->aluno->id, 'id_notificacao' => $notificacao->id]) }}">
                            Você tem um pedido de acesso de {{$notificacao->remetente->name}} ao aluno {{$notificacao->aluno->nome}}
                          </a>



                        </td>
                    </tr>
                  @endif
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

        <div class="text-center" id="login-card">
          {{$notificacoes->links()}}
        </div>

        <div class="text-center" id="login-card">
          <a class="btn btn-secondary" href="{{route('aluno.listar')}}" id="menu-a">
            Voltar
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
