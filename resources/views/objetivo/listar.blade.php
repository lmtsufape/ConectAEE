@extends('layouts.principal')
@section('title','Listar objetivos')
@section('navbar')
<a href="{{route('aluno.listar')}}">Início</a>
> <a href="{{route('aluno.gerenciar',$aluno->id)}}">Gerenciar: <strong>{{$aluno->nome}}</strong></a>
> Objetivos
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Objetivos</div>

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
                  <th>Usuario</th>
                  <th>Título</th>
                  <th>Descrição</th>
                  <th>Concluído</th>
                  <th>Data</th>
                  <th>Ação</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($objetivos as $objetivo)
                  <tr>
                    <td data-title="Usuário">{{ $objetivo->user->name}}</td>
                    <td data-title="Título">{{ $objetivo->titulo }}</td>
                    <td data-title="Descrição">{{ $objetivo->descricao }}</td>
                    @if($objetivo->concluido)
                      <td data-title="Concluído">Sim</td>
                    @else
                      <td data-title="Concluído">Não</td>
                    @endif
                    <td data-title="Data">{{ $objetivo->data }}</td>
                    <td data-title="Ação">
                      <a class="btn btn-success" href="{{ route("objetivo.gerenciar" , ['id_objetivo' => $objetivo->id, 'id_aluno' => $aluno->id])}}">Gerenciar</a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

        <div class="panel-footer">
          <a class="btn btn-danger" href="{{route("aluno.gerenciar" , ['id_aluno'=>$aluno->id])}}">
            <i class="material-icons">keyboard_backspace</i>
            <br>
            Voltar
          </a>

          @if(App\Gerenciar::where('user_id','=',\Auth::user()->id)->where('aluno_id','=',$aluno->id)->first()->perfil_id != 1)
            <a class="btn btn-success" href="{{ route("objetivo.cadastrar" , ['id_aluno'=>$aluno->id])}}">Novo</a>
          @endif

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
    },
    "columnDefs": [
      { "orderable": false, "targets": 5 }
    ]
  });
});

</script>

@endsection
