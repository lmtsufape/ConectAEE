@extends('layouts.principal')
@section('title','Início')
@section('path','Início')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
            <div class="panel-heading">Notificações</div>
              <div class="panel-body">

                <div id="tabela" class="table-responsive">
                  <table class="table table-hover">
                    @foreach ($notificacoes as $notificacao)
                      <tr>
                        <td data-title="Nome">
                          <a class="text-center" href="{{ route('aluno.permissoes.conceder', ['id_aluno' => $notificacao->aluno->id, 'id_notificacao' => $notificacao->id]) }}">
                            Você tem um pedido de acesso de {{$notificacao->remetente->name}} ao aluno {{$notificacao->aluno->nome}}
                          </a>
                        </td>
                      </tr>
                    @endforeach
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

@endsection
