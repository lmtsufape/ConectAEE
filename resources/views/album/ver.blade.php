@extends('layouts.principal')
@section('title','Início')
@section('path','Início')

@section('navbar')
<a href="{{route('aluno.listar')}}">Início</a>
> <a href="{{route('aluno.gerenciar',$aluno->id)}}">Gerenciar: <strong>{{$aluno->nome}}</strong></a>
> <a href="{{route('album.listar', $aluno->id) }}"> Álbuns</a>
> Fotos de <strong>{{$album->nome}}</strong>
@endsection

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Álbum: {{$album->nome}}</div>

        <div class="panel-body">

          @if (\Session::has('success'))
          <br>
          <div class="alert alert-success">
            <strong>Sucesso!</strong>
            {!! \Session::get('success') !!}
          </div>
          @endif

          <h2>{{ucfirst($album->nome)}}</h2>
          <h3>{{ucfirst($album->descricao)}}</h3>

          <div class="row" align="center">

            <table id="tabela_albuns">
              <thead>
                <tr>
                  <th></th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @php
                  $colunas = 0;
                  $tresFotos = array();
                @endphp

                @foreach ($fotos as $foto)
                  <tr>
                    @php
                      $colunas += 1;
                      array_push($tresFotos, $foto);
                    @endphp

                    @if($colunas % 3 == 0)
                      @for($i = 1; $i <= 3; $i++ )
                        @php($foto = array_pop($tresFotos))
                        <td>
                          <button class="btn btn-info" type="button" onclick="show('{{$foto->id}}')" data-toggle="modal" data-target="#ModalCarousel">
                            <img src="{{$foto->imagem}}" style="width:200px; height: 200px; object-fit: cover;">
                          </button>
                          &nbsp; &nbsp;
                          <br>
                          &nbsp; &nbsp;
                        </td>
                      @endfor
                    @endif

                  </tr>
                @endforeach

                @for($i = 1; $i <= 3; $i++ )
                  @php($foto = array_pop($tresFotos))
                  @if($foto != null)
                    <td>
                      <button class="btn btn-info" type="button" onclick="show('{{$foto->id}}')" data-toggle="modal" data-target="#ModalCarousel">
                        <img src="{{$foto->imagem}}" style="width:200px; height: 200px; object-fit: cover;">
                      </button>
                      &nbsp;
                    </td>
                  @endif
                @endfor
              </tbody>
            </table>

          </div>

          <!-- Modal -->
          <div class="modal fade" id="ModalCarousel" tabindex="-1" role="dialog" aria-labelledby="ModalCarouselLabel">
            <div class="modal-dialog"  role="document">
              <div class="modal-content">
                <!--The main div for carousel-->
                <div id="carousel-modal-demo" class="carousel slide" data-ride="carousel" data-interval="false">
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                    @foreach ($fotos as $i => $foto)
                      @if($i == 0)
                        <li data-target="#carousel-modal-demo" data-slide-to="{{$i}}" class="active"></li>
                      @else
                        <li data-target="#carousel-modal-demo" data-slide-to="{{$i}}"></li>
                      @endif
                    @endforeach
                  </ol>

                  <!-- Sliding images starting here -->
                  <div class="carousel-inner" align="center">
                    @foreach ($fotos as $i => $foto)
                    <div id="{{$foto->id}}" class="item">
                      <img src="{{$foto->imagem}}">
                    </div>
                    @endforeach
                  </div>

                  <!-- Next / Previous controls here -->
                  <a class="left carousel-control" href="#carousel-modal-demo" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                  </a>
                  <a class="right carousel-control" href="#carousel-modal-demo" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="panel-footer">
          <a class="btn btn-danger" href="{{route("album.listar" , ['id_aluno'=>$aluno->id])}}">Voltar</a>
          <a class="btn btn-primary" href="{{route("album.editar" , ['id_aluno'=>$aluno->id, 'id_album'=>$album->id,]) }}">Editar</a>
          <a class="btn btn-danger" onclick="return confirm('\Confirmar exclusão do album {{$album->nome}}?')" href="{{route("album.excluir" , ['id_aluno'=>$aluno->id, 'id_album'=>$album->id,]) }}">Excluir</a>
        </div>
      </div>
    </div>
  </div>
</div>

<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">

@endsection

<script>
function show(id) {

  var fotos = <?php echo json_encode($fotos) ?>;

  for(var i in fotos){
    document.getElementById(fotos[i].id).className = "item";
  }
  document.getElementById(id).className = "item active";
}
</script>
