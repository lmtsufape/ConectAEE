@extends('layouts.principal')
@section('title','Fórum')
@section('navbar')
@endsection
@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default" style="margin-top: -20px; padding: 10px 20px;" id="login-card">
        <div class="panel-heading" id="login-card">
          <h3>
            Fórum - <strong>{{$aluno->nome}}</strong>
          </h3>
          <div style="font-size: 14px" id="login-card">
            <a href="{{route('alunos.index')}}">Início</a>
            > <a href="{{route('alunos.gerenciar',$aluno->id)}}">Perfil de <strong>{{ explode(" ", $aluno->nome)[0]}}</strong></a>
            > Fórum
          </div>
        </div>

        <div class="panel-body" style="background-color: #e5ddd5" id="login-card">
          @if ($errors->has('texto'))
          <div style="margin-left: 1%; margin-right: 1%" class="alert alert-danger" id="login-card">
            <strong>Erro!</strong>
            {{ $errors->first('texto') }}
          </div>
          @endif
          <form class="form-horizontal" method="POST" action="{{route('alunos.forum.mensagem.enviar')}}">
            @csrf
            <input name="forum_id" type="text" value={{$aluno->forum->id}} hidden>

            <div style="margin: 1%" class="form-group" id="login-card">
              <textarea name="mensagem" style="width:100%; min-width: 100%; max-width: 100%;min-height: 50px; display: inline" id="" type="text" class="form-control summernote"></textarea>
              <br>
              <button type="submit" class="btn btn-primary" style="width:100%">Enviar</button>
            </div>
          </form>
        </div>

        <div class="panel-footer" style="background-color: #e5ddd5;" id="login-card">
          <div class="form-group" id="login-card">
            @foreach($mensagens as $mensagem)
              @if($mensagem->user_id == \Auth::user()->id)
                <div style="text-align: right; width: 80%; margin-left: 20%" id='user-message'>
                  <div class="panel panel-default">
                    <div style="background-color: #dbf6c5; color: #262626" class="panel-body">
                      <div class="hifen">
                        {!! $mensagem->texto !!}<br>
                        {{$mensagem->created_at->format('d/m/y h:i')}}<br>
                      </div>
                    </div>
                  </div>
                </div>
              @else
                <div style="text-align: left; width: 80%" id='others-message'>
                  <div class="panel panel-default">
                    <div style="background-color: white; color: #262626" class="panel-body">
                      <div class="hifen">
                        <strong>{{$mensagem->user->name}}:</strong><br>
                        {!! $mensagem->texto !!}<br>
                        {{$mensagem->created_at->format('d/m/y h:i')}}<br>
                      </div>
                    </div>
                  </div>
                </div>
              @endif
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $('#summer').summernote({
    placeholder: 'Escreva sua mensagem aqui...',
    lang: 'pt-BR',
    tabsize: 2,
    height: 100
  });
</script>

@endsection
