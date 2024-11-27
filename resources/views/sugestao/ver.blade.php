@extends('layouts.app')
@section('title','Ver sugestão')
@section('navbar')
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default" style="margin-top: -20px; padding: 10px 20px;" id="login-card">

        <div class="panel-heading" id="login-card">
          <div class="row" id="login-card">

            <div class="col-md-6" id="login-card">
              <h2>
                <strong>
                  Gerenciar sugestão
                </strong>
                <div style="font-size: 14px" id="login-card">
                  <a href="{{route('alunos.index')}}">Início</a>
                  > <a href="{{route('alunos.gerenciar',$aluno->id)}}">Perfil de <strong>{{ explode(" ", $aluno->nome)[0]}}</strong></a>
                  > <a href="{{route('objetivo.listar',$aluno->id)}}">Objetivos</a>
                  > <a href="{{route('objetivo.gerenciar',[$objetivo->id])}}"><strong>{{$objetivo->titulo}}</strong></a>
                  > <strong>Sugestão</strong>
                </div>
              </h2>
            </div>

            <div class="col-md-6 text-right" style="margin-top:20px" id="login-card">
              @if($sugestao->user->id == \Auth::user()->id)
                <a class="btn btn-primary" href={{ route("sugestao.editar" , ['id_sugestao' => $sugestao->id]) }}>
                  Editar
                </a>

                <a class="btn btn-danger" data-toggle="modal" title="Excluir Sugestão" data-target="#modalConfirm">
                  Excluir
                </a>
              @endif
            </div>

          </div>

          <hr style="border-top: 1px solid #AAA;">
        </div>

        <div class="panel-body" id="login-card">

          @if (\Session::has('success'))
            <br>
            <div class="alert alert-success" id="login-card">
              <strong>Sucesso!</strong>
              {!! \Session::get('success') !!}
            </div>
          @endif

          <div class="row col-md-12" style="margin-left:0px; margin-top:-20px;" id="login-card">
            <h3>
              <strong>Sugestão: </strong>{{$sugestao->titulo}}
            </h3>
            <hr style="border-top: 1px solid #AAA;">

            <strong>Data: </strong> {{$sugestao->data}}
            <br>
            <strong>Autor: </strong> {{$sugestao->user->name}}
            <br>
            <div class="text-justify" id="login-card">
              <strong>Descrição: </strong>{{$sugestao->descricao}}
            </div>
          </div>

          <div class="row col-md-12" style="margin-left:0px;" id="login-card">
            @if (\Session::has('feedback'))
              <br><br>
              <div class="alert alert-success" id="login-card">
                <strong>Sucesso!</strong>
                {!! \Session::get('feedback') !!}
              </div>
            @endif


            <div class="col-md-12" id="login-card">

              <hr style="border-top: 1px solid #AAA;">
            <h3>
              <strong>Comentários:</strong>
            </h3>

              <form class="form-horizontal" method="POST" action="{{ route("feedbacks.criar") }}">
                {{ csrf_field() }}

                <input hidden type="text" name="id_sugestao" value="{{$sugestao->id}}">

                <div class="form-group{{ $errors->has('feedback') ? ' has-error' : '' }}" id="login-card">
                  <textarea name="feedback" style="width:100%; min-width: 100%; max-width: 100%;min-height: 50px;" id="" type="text" class="form-control summernote"></textarea>

                  @if ($errors->has('feedback'))
                    <span class="help-block">
                      <strong>{{ $errors->first('feedback') }}</strong>
                    </span>
                  @endif
                </div>

                <button type="submit" class="btn btn-primary">
                  Enviar
                </button>
              </form>

              <br>

              <div align="center" id="login-card">
                <div class="card" id="login-card">
                  @foreach($feedbacks as $key => $feedback)
                    <div class="card-body" align="justify" style="background-color:#eeeeee; padding:1rem;">
                      <span class="">
                        <b>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$feedback->updated_at)->format('d-m-Y (H:i)') }} - {{$feedback->user->name}} {{$feedback->id}}:</b>
                      </span>
                      <br><br>
                      <form class="form-horizontal" method="POST" action="{{ route("feedback.atualizar") }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="id_feedback" value="{{$feedback->id}}">

                        <textarea style="display:none" name="feedbackEdit" readonly type="text" class="form-control summernote {{$key}}">
                          {!! $feedback->texto !!}
                        </textarea>

                        <div id="my{{$key}}" style="display:inline">
                          {!! $feedback->texto !!}
                        </div>

                        <div class="text-right">
                          @if($feedback->user->id == \Auth::user()->id)

                            <button id={{$key}} data-toggle="tooltip" title="Salvar" class="btn btn-primary" type="submit" style="display:none">
                              <i class="material-icons">save</i>
                            </button>

                            <a class="btn btn-primary" data-toggle="tooltip" title="Editar" id="edit" onclick="edit('{{$key}}')">
                              <i class="material-icons">edit</i>
                            </a>

                            <a class="btn btn-danger" data-toggle="tooltip" title="Excluir" onclick="return confirm('\Confirmar exclusão deste feedback?')" href={{ route("feedback.excluir" , ['id_feedback' => $feedback->id]) }}>
                              <i class="material-icons">delete</i>
                            </a>
                          @endif
                        </div>
                      </form>

                    </div>
                    <br>
                  @endforeach
                  <br>
                </div>
              </div>
            </div>

          </div>
        </div>

        <div class="panel-footer" style="background-color:white" id="login-card">
          <div class="text-center" id="login-card">
            <a class="btn btn-secondary" href="{{route('objetivo.gerenciar',[$objetivo->id])}}" id="menu-a">
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
          Confirmar exclusão da sugestão {{$sugestao->titulo}}?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          Não
        </button>
        <a type="button"  href={{ route("sugestao.excluir" , ['id_sugestao' => $sugestao->id]) }}  id="btnSubmit" class="btn btn-primary">
          Sim
        </a>
      </div>
    </div>
  </div>
</div>

<script>

  $('#summer').summernote({
    placeholder: 'Envie seu feedback aqui...',
    lang: 'pt-BR',
    tabsize: 2,
    height: 100,
  });

  var edit = function(key) {
    $('.'+key).summernote({
      focus: true,
    });

    document.getElementById(key).style.display = "inline";
    document.getElementById("my"+key).style.display = "none";

  };

</script>

@endsection
