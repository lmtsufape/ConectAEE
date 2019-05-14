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
            <input type="text" id="termo" onkeyup="buscar()" placeholder="Busca">
            <div id="tabela" class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                      <th>Usuario</th>
                      <th>Título</th>
                      <th>Descrição</th>
                      <th>Concluído</th>
                      <th>Data</th>
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
                      <td>
                        <a class="btn btn-success" href="{{ route("objetivo.gerenciar" , ['id_objetivo' => $objetivo->id, 'id_aluno' => $aluno->id])}}">Gerenciar</a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>

          <div class="panel-footer">
            <a class="btn btn-danger" href="{{route("aluno.gerenciar" , ['id_aluno'=>$aluno->id])}}">Voltar</a>
            <a class="btn btn-success" href="{{ route("objetivo.cadastrar" , ['id_aluno'=>$aluno->id])}}">Novo</a>
          </div>
        </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  function buscar() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("termo");
    filter = input.value.toUpperCase();
    table = document.getElementById("tabela");
    tr = table.getElementsByTagName("tr");
    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[1];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }
</script>

@endsection
