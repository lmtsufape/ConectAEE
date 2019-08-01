@extends('layouts.principal')
@section('title','Início')
@section('path','Início')

@section('navbar')
<a href="{{route('aluno.listar')}}">Início</a>
> <a href="{{route('aluno.gerenciar',$aluno->id)}}">Gerenciar: <strong>{{$aluno->nome}}</strong></a>
> <a href="{{route('album.listar', $aluno->id) }}"> Álbuns</strong></a>
> <a href="{{route('album.ver' , ['id_aluno'=>$aluno->id, 'id_album'=>$album->id,]) }}">Fotos de: <strong>{{$album->nome}}</a>
> Editar
@endsection

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">

      <div class="panel panel-default">
        <div class="panel-heading">Álbum: {{$album->nome}}</div>

        <div class="panel-body">
          <form class="form-horizontal" method="POST" action="{{ route("album.criar") }}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <input id="id_aluno" type="hidden" class="form-control" name="id_aluno" value="{{ $aluno->id }}">

            <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
              <label for="nome" class="col-md-4 control-label"> Nome <font color="red">*</font> </label>

              <div class="col-md-6">
                @if(old('nome',NULL) != NULL)
                  <input id="nome" type="text" class="form-control" name="nome" value="{{ old('nome') }}" autofocus>
                @else
                  <input id="nome" type="text" class="form-control" name="nome" value="{{ $album->nome }}">
                @endif

                @if ($errors->has('nome'))
                  <span class="help-block">
                    <strong>{{ $errors->first('nome') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('descricao') ? ' has-error' : '' }}">
              <label for="descricao" class="col-md-4 control-label">Descrição</label>

              <div class="col-md-6">
                @if(old('descricao',NULL) != NULL)
                  <textarea id="descricao" rows = "5" cols = "50" class="form-control" name="descricao">{{ old('descricao') }}</textarea>
                @else
                  <textarea id="descricao" rows = "5" cols = "50" class="form-control" name="descricao">{{ $album->descricao }}</textarea>
                @endif

                @if ($errors->has('descricao'))
                  <span class="help-block">
                    <strong>{{ $errors->first('descricao') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('imagens.*') || $errors->has('imagens')? ' has-error' : '' }}">
              <label for="imagens" class="col-md-4 control-label" >
                Adicionar mais fotos
              </label>

              <div class="col-md-6">

                <input id="imagens" type="file" multiple class="filestyle" name="imagens[]" data-placeholder="Nenhum arquivo" data-text="Selecionar" data-btnClass="btn btn-primary">

                @if ($errors->has('imagens') || $errors->has('imagens.*'))
                <span class="help-block">
                  <strong>{{ $errors->first('imagens') }}</strong>
                  <strong>{{ $errors->first('imagens.*') }}</strong>
                </span>
                @endif
              </div>
            </div>
          </form>
        </div>
      </div>

      <div class="panel panel-default">

        <div class="panel-body">

          @if (\Session::has('success'))
            <br>
            <div class="alert alert-success">
              <strong>Sucesso!</strong>
              {!! \Session::get('success') !!}
            </div>
          @endif

          <div class="row" align="center">

            <table id="tabela_albuns">
              <thead>
                <tr>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @php
                  $colunas = 0;
                  $size = 3;
                  $tresFotos = array();
                @endphp

                @foreach ($fotos as $foto)
                  <tr>
                    @php
                      $colunas += 1;
                      array_push($tresFotos, $foto);
                    @endphp

                    @if($colunas % $size == 0)
                      @for($i = 1; $i <= $size; $i++ )
                        @php($foto = array_pop($tresFotos))
                        <td class="text-center">
                          <button class="btn btn-info" type="button" onclick="show('{{$foto->id}}')" data-toggle="modal" data-target="#ModalCarousel">
                            <img src="{{$foto->imagem}}" style="width:128px; height: 128px; object-fit: cover;">
                          </button>
                          <br>
                          <a class="btn btn-danger" href="#">Excluir<a/>
                          &nbsp;
                        </td>
                      @endfor
                    @endif
                  </tr>
                @endforeach

                @php($count = 0)
                @for($i = 1; $i <= $size; $i++ )
                  @php($foto = array_pop($tresFotos))

                  @if($foto != null)
                    @php($count += 1)
                    <td class="text-center">
                      <button class="btn btn-info" type="button" onclick="show('{{$foto->id}}')" data-toggle="modal" data-target="#ModalCarousel">
                        <img src="{{$foto->imagem}}" style="width:128px; height: 128px; object-fit: cover;">
                      </button>
                      <br>
                      <a class="btn btn-danger" href="#">Excluir<a/>
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
          <a class="btn btn-danger" href="{{route("album.ver" , ['id_aluno'=>$aluno->id, 'id_album'=>$album->id,]) }}">Voltar</a>
          <a class="btn btn-primary" href="#">Atualizar</a>
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
