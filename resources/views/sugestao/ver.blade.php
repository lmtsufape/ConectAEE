@extends('layouts.principal')
@section('title','Gerenciar atividade')
@section('navbar')
<a href="{{route('aluno.listar')}}">Início</a>
> <a href="{{route('aluno.gerenciar',$aluno->id)}}">Perfil de <strong>{{ explode(" ", $aluno->nome)[0]}}</strong></a>
> <a href="{{route('objetivo.listar',$aluno->id)}}">Objetivos</a>
> <a href="{{route('objetivo.gerenciar',[$objetivo->id])}}"><strong>{{$objetivo->titulo}}</strong></a>
> <strong>Sugestão: {{$sugestao->titulo}}</strong>
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-heading">
          Sugestão: <strong>{{$sugestao->titulo}}</strong>
        </div>

        <div class="panel-body">

          @if (\Session::has('success'))
            <br>
            <div class="alert alert-success">
              <strong>Sucesso!</strong>
              {!! \Session::get('success') !!}
            </div>
          @endif

          <div class="row">
            <div class="col-md-6">
              <strong>Título: </strong> {{$sugestao->titulo}}
              <br><br>
              <strong>Data: </strong> {{$sugestao->data}}
              <br><br>
              <strong>Autor: </strong> {{$sugestao->user->name}}
            </div>

            <div class="col-md-6" align="justify">
              <strong>Descrição: </strong>{{$sugestao->descricao}}
            </div>
          </div>

          <br><br>
          <div class="row text-right" style="padding:1rem;">
            @if($sugestao->user->id == \Auth::user()->id)
              <a class="btn btn-primary" href={{ route("sugestao.editar" , ['id_sugestao' => $sugestao->id]) }}>
                <i class="material-icons">edit</i>
              </a>

              <a class="btn btn-danger" onclick="return confirm('\Confirmar exclusão da sugestao {{$sugestao->titulo}}?')" href={{ route("sugestao.excluir" , ['id_sugestao' => $sugestao->id]) }}>
                <i class="material-icons">delete</i>
              </a>
            @endif
          </div>

          <div class="row">

            <div class="col-md-12">
              <font id="feedbacks" size="4" style="padding:1.5rem; color: #12583c;">
                Feedback(s):
              </font>

              @if (\Session::has('feedback'))
                <br><br>
                <div class="alert alert-success">
                  <strong>Sucesso!</strong>
                  {!! \Session::get('feedback') !!}
                </div>
              @else
                <br><br>
              @endif

              <form style="padding:50px;" class="form-horizontal" method="POST" action="{{ route("feedbacks.criar") }}">
                {{ csrf_field() }}

                <input hidden type="text" name="id_sugestao" value="{{$sugestao->id}}">

                <div class="form-group{{ $errors->has('feedback') ? ' has-error' : '' }}">

                  <textarea name="feedback" id="summer" type="text" class="form-control summernote"></textarea>

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

              <div align="center">

                <div class="card" style="width:90%;">
                  @foreach($feedbacks as $key => $feedback)
                    <div class="card-body" align="justify" style="background-color:#eeeeee; padding:1rem;">
                      <span class="">
                        <b>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$feedback->updated_at)->format('d-m-Y (H:i)') }} - {{$feedback->user->name}}:</b>
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
      </div>
    </div>
  </div>
</div>

<script>

  $('#summer').summernote({
    placeholder: 'Envie seu feedback aqui...',
    lang: 'pt-BR',
    tabsize: 2,
    height: 100
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
