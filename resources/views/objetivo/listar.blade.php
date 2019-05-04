@extends('layouts.principal')
@section('title','Início')
@section('path','Início')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Objetivos</div>

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
                  @foreach ($objetivos as $objetivo)
                    <tr>
                      <td data-title="Título">{{ $objetivo->titulo }}</td>
                      <td data-title="Descrição">{{ $objetivo->descricao }}</td>
                      <td data-title="Prioridade">{{ $objetivo->prioridade }}</td>
                      <td data-title="Tipo">{{ $objetivo->tipo }}</td>
                      <td data-title="Data">{{ $objetivo->data }}</td>
                      <td>
                        <a class="btn btn-success" href="{{ route("objetivo.atividades.listar" , ['id_objetivo' => $objetivo->id, 'id_aluno' => $aluno->id])}}">Atividades</a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>

          <div class="panel-footer">
            <a class="btn btn-danger" href="{{URL::previous()}}">Voltar</a>
            <a class="btn btn-success" href="{{ route("objetivo.cadastrar" , ['id_aluno'=>$aluno->id])}}">Novo</a>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection
