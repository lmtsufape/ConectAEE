@extends('layouts.principal')
@section('title','Início')
@section('path','Início')

@section('navbar')
<a href="{{route('aluno.listar')}}">Início</a>
> <a href="{{route('aluno.gerenciar',$aluno->id)}}">Gerenciar: <strong>{{$aluno->nome}}</strong></a>
> Álbuns
@endsection

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Álbuns</div>

        <div class="panel-body">

          @if (\Session::has('success'))
          <br>
          <div class="alert alert-success">
            <strong>Sucesso!</strong>
            {!! \Session::get('success') !!}
          </div>
          @endif


          <div id="tabela_albuns" class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @php
                  $count = 1;
                @endphp

                @if($albuns != null)
                  @foreach($albuns as $album)
                    @php
                      $count++;
                    @endphp

                    @if($count % 2 == 0)
                      <tr align="center">
                    @endif
                    <td>
                      <a href="{{route('album.ver', ['id_aluno'=>$aluno->id, 'id_album'=>$album->id])}}" style="text-decoration:none">
                        <div class="card text-center" style="width:200px">
                          <div class="card-body">
                            <img class="card-img-top" src="{{$album->fotos[0]->imagem}}" style="width:200px; height:200px; object-fit: cover;">
                            <h2 class="card-title">{{$album->nome}}</h2>
                            <p class="card-text">{{$album->descricao}}</p>
                          </div>
                        </div>
                      </a>
                    </td>
                    @if($count % 2 != 0)
                      </tr>
                    @endif
                  @endforeach
                @endif
              </tbody>
            </table>
          </div>
        </div>

        <div class="panel-footer">
          <a class="btn btn-danger" href="{{route("aluno.gerenciar" , ['id_aluno'=>$aluno->id])}}">Voltar</a>
          <a class="btn btn-success" href="{{route("album.cadastrar" , ['id_aluno'=>$aluno->id])}}">Novo</a>
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
      { "orderable": false, "targets": 1 }
    ]
  });
});
</script>

@endsection
