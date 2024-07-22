@extends('layouts.app')
@section('title', 'Notificações')

@section('content')

  <h2>
      <strong>
          Suas notificações
      </strong>
  </h2>
  <div style="font-size: 14px">
      <a href="{{ route('notificacao.listar') }}">Notificações</a> > Listar
  </div>

  <hr style="border-top: 1px solid #AAA;">

        <div id="tabela" class="table-responsive">
            <table id="tabela_dados" class="table table-hover table-bordered">
                <a href="{{ route('notificacao.lerTodas') }}">Ler Todas</a>
                <tbody>
                    @foreach ($notificacoes as $notificacao)
                        @if ($notificacao->aluno != null)
                            <tr>
                                @if ($notificacao->lido)
                                    <td data-title="Notificacao">
                                    @else
                                    <td class="bg-info" data-title="Notificacao">
                                @endif

                                @if ($notificacao->tipo == 1)
                                    <a class="btn text-center"
                                        href="{{ route('notificacao.ler', ['id_notificacao' => $notificacao->id]) }}">
                                        {{ $notificacao->remetente->name }} pediu para acessar os dados do(a) aluno(a)
                                        {{ $notificacao->aluno->nome }}</br>
                                    </a>
                                @elseif($notificacao->tipo == 2)
                                    <a class="btn text-center"
                                        href="{{ route('notificacao.ler', ['id_notificacao' => $notificacao->id]) }}">
                                        {{ $notificacao->remetente->name }} lhe concedeu acesso aos dados do(a) aluno(a)
                                        {{ $notificacao->aluno->nome }}</br>
                                    </a>
                                @elseif($notificacao->tipo == 3)
                                    <a class="btn text-center"
                                        href="{{ route('notificacao.ler', ['id_notificacao' => $notificacao->id]) }}">
                                        {{ $notificacao->remetente->name }} criou um novo objetivo para o(a) aluno(a)
                                        {{ $notificacao->aluno->nome }}</br>
                                    </a>
                                @elseif($notificacao->tipo == 4)
                                    <a class="btn text-center"
                                        href="{{ route('notificacao.ler', ['id_notificacao' => $notificacao->id]) }}">
                                        {{ $notificacao->remetente->name }} criou uma nova atividade para o(a) aluno(a)
                                        {{ $notificacao->aluno->nome }}</br>
                                    </a>
                                @elseif($notificacao->tipo == 5)
                                    <a class="btn text-center"
                                        href="{{ route('notificacao.ler', ['id_notificacao' => $notificacao->id]) }}">
                                        {{ $notificacao->remetente->name }} criou uma nova sugestão de atividade para
                                        o(a)aluno(a) {{ $notificacao->aluno->nome }}</br>
                                    </a>
                                @endif

                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>

    <div class="text-center">
        {{ $notificacoes->links() }}
    </div>

    <div class="text-center">
        <a class="btn btn-secondary" href="{{ route('aluno.listar') }}">
            Voltar
        </a>
    </div>

    </div>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#tabela_dados').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
                }
            });
        });
    </script>


@endsection
