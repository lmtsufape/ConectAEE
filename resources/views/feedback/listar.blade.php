@extends('layouts.principal')
@section('title','Início')
@php($aluno = $sugestao->objetivo->aluno)
@php($objetivo = $sugestao->objetivo)
@section('navbar')
<a href="{{route('aluno.listar')}}">Alunos</a>
 > <a href="{{route('aluno.gerenciar',$aluno->id)}}">Gerenciar: <strong>{{$aluno->nome}}</strong></a>
 > <a href="{{route('objetivo.listar',$aluno->id)}}">Objetivos</a>
 > <a href="{{route('objetivo.gerenciar',[$aluno->id,$objetivo->id])}}"><strong>{{$objetivo->titulo}}</strong></a>
 > <a href="{{route('objetivo.sugestoes.listar',[$aluno->id,$objetivo->id])}}">Sugestões</a>
 > Feedbacks de <strong>{{$sugestao->titulo}}</strong>
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Feedbacks de <strong>{{$sugestao->titulo}}</strong></div>

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
                      <th>Usuário</th>
                      <th>Feedback</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($feedbacks as $feedback)
                    <tr>
                      <td data-title="Usuário">{{ $feedback->user->name }}</td>
                      <td data-title="Feedback">{{ $feedback->texto }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>

          <div class="panel-footer">
            <a class="btn btn-danger" href="{{route('objetivo.sugestoes.listar',[
              'id_aluno' => $sugestao->objetivo->aluno->id,
              'id_objetivo' => $sugestao->objetivo->id,
              'id_sugestao' => $sugestao->id,
            ])}}">Voltar</a>
            <a class="btn btn-success" href="{{route('objetivo.sugestoes.feedbacks.cadastrar',[
              $sugestao->objetivo->aluno->id,$sugestao->objetivo->id,$sugestao->id,
            ])}}">Novo</a>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection
