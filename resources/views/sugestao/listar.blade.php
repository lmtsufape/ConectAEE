@extends('layouts.principal')
@section('title','Listar sugestões')
@section('navbar')
<a href="{{route('aluno.listar')}}">Início</a>
> <a href="{{route('aluno.gerenciar',$aluno->id)}}">Gerenciar: <strong>{{$aluno->nome}}</strong></a>
> <a href="{{route('objetivo.listar',$aluno->id)}}">Objetivos</a>
> <a href="{{route('objetivo.gerenciar',[$aluno->id,$objetivo->id])}}"><strong>{{$objetivo->titulo}}</strong></a>
> Sugestões
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Sugestões</div>

        <div class="panel-body">
          @if (\Session::has('success'))
          <br>
          <div class="alert alert-success">
            <strong>Sucesso!</strong>
            {!! \Session::get('success') !!}
          </div>
          @endif

          <div id="tabela" class="table-responsive">
            <table id="tabela_dados" class="table table-hover">
              <thead>
                <tr>
                  <th>Autor</th>
                  <th>Título</th>
                  <th>Descrição</th>
                  <th>Data</th>
                  <th>Ações</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($sugestoes as $sugestao)
                <tr>
                  <td data-title="Autor">{{ $sugestao->user->name }}</td>
                  <td data-title="Título">{{ $sugestao->titulo }}</td>
                  <td data-title="Descrição">{{ $sugestao->descricao }}</td>
                  <td data-title="Data">{{ $sugestao->data }}</td>

                  <td data-title="Ações">
                    <a class="btn btn-primary" href="{{ route("feedbacks.listar" , ['id_sugestao' => $sugestao->id, 'id_aluno'=>$sugestao->objetivo->aluno->id, 'id_objetivo' => $sugestao->objetivo->id])}}">Ver feedbacks</a>
                  </td>

                  @if($sugestao->user->id == \Auth::user()->id)
                    <td data-title="">
                      <a class="btn btn-primary" href={{ route("sugestao.editar" , ['id_objetivo' => $objetivo->id, 'id_sugestao' => $sugestao->id, 'id_aluno' => $aluno->id]) }}>Editar</a>
                    </td>
                  @else
                    <td></td>
                  @endif

                  @if($sugestao->user->id == \Auth::user()->id || $objetivo->user->id == \Auth::user()->id)
                    <td data-title="">
                      <a class="btn btn-danger" onclick="return confirm('\Confirmar exclusão da sugestao {{$sugestao->titulo}}?')" href={{ route("sugestao.excluir" , ['id_objetivo' => $objetivo->id, 'id_sugestao' => $sugestao->id, 'id_aluno' => $aluno->id]) }}>Excluir</a>
                    </td>
                  @else
                    <td></td>
                  @endif
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

        <div class="panel-footer">
          <a class="btn btn-danger" href="{{ route("objetivo.listar" , ['id_aluno'=>$aluno->id]) }}">Voltar</a>

          @if(App\Gerenciar::where('user_id','=',\Auth::user()->id)->where('aluno_id','=',$aluno->id)->first() != null && $objetivo->user->id != \Auth::user()->id)
            <a class="btn btn-success" href="{{ route("sugestoes.cadastrar" , ['id_objetivo' => $objetivo->id, 'id_aluno'=>$aluno->id])}}">Novo</a>
          @endif
        </div>

      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready( function () {
  var colunas = tabela.getElementsByTagName('td').length / 2;

  if(colunas == 5){
    $('#tabela_dados').DataTable( {
      "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
      },
      "columnDefs": [
        { "orderable": false, "targets": 4 },
      ]
    });
  }else{
    $('#tabela_dados').DataTable( {
      "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
      },
      "columnDefs": [
        { "orderable": false, "targets": 4 },
        { "orderable": false, "targets": 5 },
        { "orderable": false, "targets": 6 },
      ]
    });
  }
});
</script>
@endsection
