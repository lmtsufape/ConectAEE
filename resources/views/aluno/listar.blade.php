@extends('layouts.principal')
@section('title','Início')
@section('path','Início')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
            <div class="panel-heading">Alunos</div>
              @if (\Session::has('success'))
                <br>
                <div class="alert alert-success">
                    <strong>Sucesso!</strong>
                    {!! \Session::get('success') !!}
                </div>
              @endif
              <div class="panel-body">
                <div id="tabela" class="table-responsive">
                  <table class="table table-hover">
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
                            <a class="btn btn-success" href="{{ route("aluno.gerenciar",['id'=>$aluno->id]) }}">
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

@endsection
