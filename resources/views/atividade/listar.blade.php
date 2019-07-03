@extends('layouts.principal')
@section('title','Início')
@section('navbar')
<a href="{{route('aluno.listar')}}">Alunos</a>
 > <a href="{{route('aluno.gerenciar',$aluno->id)}}">Gerenciar: <strong>{{$aluno->nome}}</strong></a>
 > <a href="{{route('objetivo.listar',$aluno->id)}}">Objetivos</a>
 > <a href="{{route('objetivo.gerenciar',[$aluno->id,$objetivo->id])}}"><strong>{{$objetivo->titulo}}</strong></a>
 > Atividades
@endsection
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
                      <th>Status</th>
                      <th>Data</th>
                      @if($objetivo->user->id == \Auth::user()->id)
                        <th>Ação</th>
                      @endif
                  </tr>
                </thead>
                <tbody>
                  @foreach ($atividades as $atividade)
                    <tr>
                      <td data-title="Título">{{ $atividade->titulo }}</td>
                      <td data-title="Descrição">{{ $atividade->descricao }}</td>
                      <td data-title="Prioridade">{{ $atividade->prioridade }}</td>
                      <td data-title="Status">{{ $atividade->status }}</td>
                      <td data-title="Data">{{ $atividade->data }}</td>

                      <td data-title="Ação">
                        @if($atividade->objetivo->user->id == \Auth::user()->id && $atividade->concluido == false)
            						  <a class="btn btn-success" href={{ route("objetivo.atividades.concluir" , ['id_objetivo' => $objetivo->id, 'id_atividade' => $atividade->id, 'id_aluno' => $aluno->id]) }}>Concluir</a>
            						@elseif($atividade->objetivo->user->id == \Auth::user()->id && $atividade->concluido == true)
                          <a class="btn btn-danger" href={{ route("objetivo.atividades.desconcluir" , ['id_objetivo' => $objetivo->id, 'id_atividade' => $atividade->id, 'id_aluno' => $aluno->id]) }}>Desconcluir</a>
            						@endif
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>

          <div class="panel-footer">
            <a class="btn btn-danger" href="{{ route("objetivo.gerenciar" , ['id_aluno'=>$aluno->id, 'id_objetivo' => $objetivo->id]) }}">Voltar</a>

            @if(App\Gerenciar::where('user_id','=',\Auth::user()->id)->where('aluno_id','=',$aluno->id)->first()->isAdministrador == true)
              <a class="btn btn-success" href="{{ route("objetivo.atividades.cadastrar" , ['id_objetivo' => $objetivo->id, 'id_aluno'=>$aluno->id])}}">Novo</a>
            @endif
          </div>
        </div>
    </div>
  </div>
</div>
@endsection
