@extends('layouts.principal')
@section('title','Início')
@section('navbar')
<a href="{{route('aluno.listar')}}">Alunos</a>
 > <a href="{{route('aluno.gerenciar',$aluno->id)}}">Gerenciar: <strong>{{$aluno->nome}}</strong></a>
 > <a href="{{route('objetivo.listar',$aluno->id)}}">Objetivos</a>
 > Novo
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Novo Objetivo</div>

        <div class="panel-body">
          <form class="form-horizontal" method="POST" action="{{ route("objetivo.criar") }}">
              {{ csrf_field() }}

              <input id="id_aluno" type="hidden" class="form-control" name="id_aluno" value="{{ $aluno->id }}">

              <div class="form-group{{ $errors->has('titulo') ? ' has-error' : '' }}">
                  <label for="titulo" class="col-md-4 control-label">Título</label>

                  <div class="col-md-6">
                      <input id="titulo" type="text" class="form-control" name="titulo" value="{{ old('titulo') }}" autofocus>

                      @if ($errors->has('titulo'))
                          <span class="help-block">
                              <strong>{{ $errors->first('titulo') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group{{ $errors->has('descricao') ? ' has-error' : '' }}">
                  <label for="descricao" class="col-md-4 control-label">Descrição</label>

                  <div class="col-md-6">
                    <textarea id="descricao" rows = "5" cols = "50" class="form-control" name="descricao">{{ old('descricao') }}</textarea>

                    @if ($errors->has('descricao'))
                        <span class="help-block">
                            <strong>{{ $errors->first('descricao') }}</strong>
                        </span>
                    @endif
                  </div>
              </div>

              <div class="form-group{{ $errors->has('tipo') ? ' has-error' : '' }}">
                  <label for="tipo" class="col-md-4 control-label">Tipo</label>

                  <div class="col-md-6">
                    <select id="tipo" class="form-control" name="tipo">

                      @if (old('tipo') == null)
                          <option value="" selected disabled hidden>Escolha o tipo</option>
                      @endif

                      @foreach($tipos as $tipo)
                          @if(old('tipo') == $tipo->id)
                              <option value={{$tipo->id}} selected>{{$tipo->tipo}}</option>
                          @else
                              <option value={{$tipo->id}}>{{$tipo->tipo}}</option>
                          @endif
                      @endforeach
                    </select>

                    @if ($errors->has('tipo'))
                        <span class="help-block">
                            <strong>{{ $errors->first('tipo') }}</strong>
                        </span>
                    @endif
                  </div>
              </div>

              <div class="form-group{{ $errors->has('prioridade') ? ' has-error' : '' }}">
                  <label for="perfil" class="col-md-4 control-label">Prioridade</label>

                  <div class="col-md-6">
                    <select id="prioridade" class="form-control" name="prioridade">
                      @if (old('prioridade') == null)
                          <option value="" selected disabled hidden>Escolha a prioridade</option>
                      @endif

                      @foreach($prioridades as $prioridade)
                          @if(old('prioridade') == $prioridade)
                              <option value={{$prioridade}} selected>{{$prioridade}}</option>
                          @else
                              <option value={{$prioridade}}>{{$prioridade}}</option>
                          @endif
                      @endforeach
                    </select>

                    @if ($errors->has('prioridade'))
                        <span class="help-block">
                            <strong>{{ $errors->first('prioridade') }}</strong>
                        </span>
                    @endif
                  </div>
              </div>

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
