@extends('layouts.principal')
@section('title','Início')
@section('navbar')
<a href="{{route('aluno.listar')}}">Alunos</a>
 > <a href="{{route('aluno.gerenciar',$aluno->id)}}">Gerenciar: <strong>{{$aluno->nome}}</strong></a>
 > <a href="{{route('objetivo.listar',$aluno->id)}}">Objetivos</a>
 > <a href="{{route('objetivo.gerenciar',[$aluno->id,$objetivo->id])}}"><strong>{{$objetivo->titulo}}</strong></a>
 > Sugestões
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Sugestões</div>

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
                      <th>Data</th>
                      <th>Feedbacks</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($sugestoes as $sugestao)
                    <tr>
                      <td data-title="Título">{{ $sugestao->titulo }}</td>
                      <td data-title="Descrição">{{ $sugestao->descricao }}</td>
                      <td data-title="Data">{{ $sugestao->data }}</td>
                      <td data-title="Feedbacks">
                        <a class="btn btn-success" href="{{ route("objetivo.sugestoes.feedbacks.listar" , ['id_sugestao' => $sugestao->id, 'id_aluno'=>$sugestao->objetivo->aluno->id, 'id_objetivo' => $sugestao->objetivo->id])}}">Ver</a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>

          <div class="panel-footer">
            <a class="btn btn-danger" href="{{ route("objetivo.listar" , ['id_aluno'=>$aluno->id]) }}">Voltar</a>
            <a class="btn btn-success" href="{{ route("objetivo.sugestoes.cadastrar" , ['id_objetivo' => $objetivo->id, 'id_aluno'=>$aluno->id])}}">Novo</a>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection
