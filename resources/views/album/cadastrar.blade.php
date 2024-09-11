@extends('layouts.app')
@section('title','Cadastrar álbum')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default" style="margin-top: -20px; padding: 10px 20px;" id="login-card">
        <div class="panel-heading" id="login-card">
          <h2>
            <strong>
              Novo Álbum
            </strong>
            <div style="font-size: 14px" id="login-card">
              <a href="{{route('aluno.index')}}">Início</a>
              > <a href="{{route('aluno.gerenciar',$aluno->id)}}">Perfil de <strong>{{ explode(" ", $aluno->nome)[0]}}</strong></a>
              > Novo Álbum
            </div>
          </h2>

          <hr style="border-top: 1px solid #AAA;">
        </div>

        <div class="panel-body panel-body-cadastro" id="login-card">
          <div class="col-md-8 col-md-offset-2" id="login-card">
            <form method="POST" action="{{ route("album.criar") }}" enctype="multipart/form-data">
              {{ csrf_field() }}

              <input id="aluno_id" type="hidden" class="form-control" name="aluno_id" value="{{ $aluno->id }}">

              <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}" id="login-card">
                <label for="nome" class="col-md-12 control-label"> Nome <font color="red">*</font>
                </label>

                <div class="col-md-12" id="login-card">
                  <input id="nome" type="text" class="form-control" name="nome" value="{{ old('nome') }}" autofocus>

                  @if ($errors->has('nome'))
                  <span class="help-block">
                    <strong>{{ $errors->first('nome') }}</strong>
                  </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('descricao') ? ' has-error' : '' }}" id="login-card">
                <label for="descricao" class="col-md-12 control-label">Descrição</label>

                <div class="col-md-12" id="login-card">
                  <textarea id="descricao" rows = "5" cols = "50" class="form-control" name="descricao" >{{old('descricao')}}</textarea>

                  @if ($errors->has('descricao'))
                  <span class="help-block">
                    <strong>{{ $errors->first('descricao') }}</strong>
                  </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('imagens.*') || $errors->has('imagens')? ' has-error' : '' }}" id="login-card">
                <label for="imagens" class="col-md-12 control-label" >
                  Fotos <font color="red">*</font>
                </label>

                <div class="col-md-12" id="login-card">

                  <input id="imagens" type="file" multiple class="filestyle" name="imagens[]" data-placeholder="Nenhum arquivo" data-text="Selecionar" data-btnClass="btn btn-primary">

                  @if ($errors->has('imagens') || $errors->has('imagens.*'))
                    <span class="help-block">
                      <strong>{{ $errors->first('imagens') }}</strong>
                      <strong>{{ $errors->first('imagens.*') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <!-- <i class="material-icons tiny" style="font-size:100px">add_box</i> -->

              <div class="form-group" id="login-card">
                <div class="row col-md-12 text-center" id="login-card">
                  <br>
                  <a class="btn btn-secondary" href="{{route('aluno.gerenciar',$aluno->id)}}" id="menu-a">
                    Voltar
                  </a>
                  <button type="submit" class="btn btn-primary">
                    Cadastrar
                  </button>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="{{ asset('js/bootstrap-filestyle.min.js')}}"> </script>

@endsection
