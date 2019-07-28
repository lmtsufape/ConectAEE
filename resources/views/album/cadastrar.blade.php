@extends('layouts.principal')
@section('title','Início')
@section('path','Início')

@section('navbar')
<a href="{{route('aluno.listar')}}">Alunos</a>
> <a href="{{route('aluno.gerenciar',$aluno->id)}}">Gerenciar: <strong>{{$aluno->nome}}</strong></a>
> <a href={{route("album.listar", ["id_aluno"=>$aluno->id]) }}>Álbuns</a>
> Novo
@endsection

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Novo Aluno</div>

        <div class="panel-body">
          <form class="form-horizontal" method="POST" action="{{ route("album.criar") }}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <input id="id_aluno" type="hidden" class="form-control" name="id_aluno" value="{{ $aluno->id }}">

            <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
              <label for="nome" class="col-md-4 control-label"> Nome <font color="red">*</font>
              </label>

              <div class="col-md-6">
                <input id="nome" type="text" class="form-control" name="nome" value="{{ old('nome') }}" autofocus>

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
                <textarea id="descricao" rows = "5" cols = "50" class="form-control" name="descricao" >{{old('descricao')}}</textarea>

                @if ($errors->has('descricao'))
                <span class="help-block">
                  <strong>{{ $errors->first('descricao') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('imagens.*') || $errors->has('imagens')? ' has-error' : '' }}">
              <label for="imagens" class="col-md-4 control-label" >
                Fotos:
              </label>

              <div class="col-md-6">
                <input id="imagens" type="file" multiple class="form-control-file" name="imagens[]">

                @if ($errors->has('imagens') || $errors->has('imagens.*'))
                <span class="help-block">
                  <strong>{{ $errors->first('imagens') }}</strong>
                  <strong>{{ $errors->first('imagens.*') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <!-- <i class="material-icons tiny" style="font-size:100px">add_box</i> -->

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-success">
                  Cadastrar
                </button>
              </div>
            </div>
          </form>
        </div>

        <div class="panel-footer">
          <a class="btn btn-danger" href="{{URL::previous()}}">Voltar</a>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
