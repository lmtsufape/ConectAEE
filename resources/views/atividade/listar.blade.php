@extends('layouts.principal')
@section('title','Início')
@section('path','Início')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Atividades</div>

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
                      <th>Título</th>
                      <th>Descrição</th>
                      <th>Prioridade</th>
                      <th>Tipo</th>
                      <th>Data</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($atividades as $atividade)
                    <tr>
                      <td data-title="Título">{{ $atividade->titulo }}</td>
                      <td data-title="Descrição">{{ $atividade->descricao }}</td>
                      <td data-title="Prioridade">{{ $atividade->prioridade }}</td>
                      <td data-title="Tipo">{{ $atividade->tipo }}</td>
                      <td data-title="Data">{{ $atividade->data }}</td>
                      <td>
                        <a class="btn btn-success" href="{{ route("objetivo.atividades.listar" , ['id_objetivo' => $objetivo->id, 'id_aluno' => $aluno->id])}}">Ver</a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>

          <div class="panel-footer">
            <a class="btn btn-danger" href="{{URL::previous()}}">Voltar</a>
            <a class="btn btn-success" href="{{ route("objetivo.atividades.cadastrar" , ['id_objetivo' => $objetivo->id, 'id_aluno'=>$aluno->id])}}">Novo</a>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection
