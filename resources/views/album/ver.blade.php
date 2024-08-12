@extends('layouts.app')
@section('title','Ver álbum')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default" style="margin-top: -20px; padding: 10px 20px;" id="login-card">

        <div class="panel-heading" id="login-card">
          <div class="row" id="login-card">

            <div class="col-md-6" id="login-card">

              <div style="font-size: 14px" id="login-card">
                <a href="{{route('aluno.index')}}">Início</a>
                > <a href="{{route('aluno.gerenciar',$aluno->id)}}">Perfil de <strong>{{ explode(" ", $aluno->nome)[0]}}</strong></a>
                > <a href="{{route('album.listar', $aluno->id) }}"> Álbuns</a>
                > Fotos do Álbum: <strong>{{$album->nome}}</strong>
              </div>
              <h3>
                <strong>
                  Álbum:
                </strong>
                {{ucfirst($album->nome)}}
              </h3>

              <h3>
                <strong>
                  Autor:
                </strong>
                {{ucfirst($album->user->name)}}
              </h3>

              @if($album->descricao != null)
                <h3>
                  <strong>
                    Descricão:
                  </strong>
                  {{ucfirst($album->descricao)}}
                </h3>
              @endif
            </div>

            <div class="col-md-6 text-right" style="margin-top:20px" id="login-card">
              @if($album->user->id == \Auth::user()->id)
                <a class="btn btn-primary" href="{{route("album.editar" , ['id_album'=>$album->id,]) }}">
                  <!-- <i class="material-icons">edit</i> -->
                  Editar
                </a>
                <a class="btn btn-danger" data-toggle="modal" data-target="#modalConfirm">
                  <!-- <i class="material-icons">delete</i> -->
                  Excluir
                </a>
              @endif
            </div>
          </div>

          <hr style="border-top: 1px solid black;">

        </div>

        <div class="panel-body" id="login-card">

          @if (\Session::has('success'))
            <div class="alert alert-success" id="login-card">
              <strong>Sucesso!</strong>
              {!! \Session::get('success') !!}
            </div>
          @endif

          <div class="row" align="center" id="login-card">

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
                  $size = 4;
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
                        <td>
                          <a href="{{asset('storage/albuns/'.$aluno->id.'/'.$foto->imagem)}}" style="width:auto; height:auto;" data-lightbox="fotos">
                            <img src="{{asset('storage/albuns/'.$aluno->id.'/'.$foto->imagem)}}" style="width:200px; border:solid; height: 200px; object-fit: cover;">
                          </a>
                          &nbsp; &nbsp;
                          <br>
                          &nbsp; &nbsp;
                        </td>
                      @endfor
                    @endif

                  </tr>
                @endforeach

                @for($i = 1; $i <= $size; $i++ )
                  @php($foto = array_pop($tresFotos))
                  @if($foto != null)
                    <td>
                      <a href="{{asset('storage/albuns/'.$aluno->id.'/'.$foto->imagem)}}" style="width:auto; height:auto;" data-lightbox="fotos">
                        <img src="{{asset('storage/albuns/'.$aluno->id.'/'.$foto->imagem)}}" style="width:200px; border:solid; height:200px; object-fit: cover;">
                      </a>
                      &nbsp; &nbsp;
                      <br>
                      &nbsp; &nbsp;
                    </td>
                  @endif
                @endfor
              </tbody>
            </table>

          </div>

        </div>

        <div class="panel-footer" style="background-color:white" id="login-card">
          <div class="text-center" id="login-card">
            <a class="btn btn-secondary" href="{{route('aluno.gerenciar',$aluno->id) }}" id="menu-a">
              Voltar
            </a>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<!--Modal Confirm-->
<div class="modal fade" id="modalConfirm" tabindex="-1" role="dialog"
     aria-labelledby="modalConfirmLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"
                aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="modalConfirmLabel" align="center">
          Confirmar exclusão do album {{$album->nome}}?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          Não
        </button>
        <a type="button"    href="{{route("album.excluir" , ['id_album'=>$album->id]) }}"  id="btnSubmit" class="btn btn-primary">
          Sim
        </a>
      </div>
    </div>
  </div>
</div>
@endsection
