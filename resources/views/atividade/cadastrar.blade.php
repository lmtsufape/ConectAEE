@extends('layouts.principal')
@section('title','Início')
@section('navbar')
<a href="{{route('aluno.listar')}}">Alunos</a>
 > <a href="{{route('aluno.gerenciar',$aluno->id)}}">Gerenciar: <strong>{{$aluno->nome}}</strong></a>
 > <a href="{{route('objetivo.listar',$aluno->id)}}">Objetivos</a>
 > <a href="{{route('objetivo.gerenciar',[$aluno->id,$objetivo->id])}}"><strong>{{$objetivo->titulo}}</strong></a>
 > <a href="{{route('objetivo.atividades.listar',[$aluno->id,$objetivo->id])}}">Atividades</a>
 > Nova
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Nova Atividade</div>

        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route("objetivo.atividades.criar") }}">
                {{ csrf_field() }}

                <input type="hidden" name="id_aluno" value="{{ $aluno->id }}">
                <input type="hidden" name="id_objetivo" value="{{ $objetivo->id }}">

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
                        <textarea id="descricao" rows = "5" cols = "50" class="form-control" name="descricao" value="{{ old('descricao') }}" autofocus></textarea>

                        @if ($errors->has('descricao'))
                            <span class="help-block">
                                <strong>{{ $errors->first('descricao') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>


                <div class="form-group{{ $errors->has('tipo') ? ' has-error' : '' }}">
                    <label for="status" class="col-md-4 control-label">Status</label>

                    <div class="col-md-6">
                      <select id="status" class="form-control" name="status" autofocus>

                        @if (old('status') == null)
                            <option value="" selected disabled hidden>Escolha o status</option>
                        @endif

                        @foreach($statuses as $status)
                            @if(old('status') == $status)
                                <option value={{$status}} selected>{{$status}}</option>
                            @else
                                <option value={{$status}}>{{$status}}</option>
                            @endif
                        @endforeach
                      </select>

                      @if ($errors->has('status'))
                          <span class="help-block">
                              <strong>{{ $errors->first('status') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('prioridade') ? ' has-error' : '' }}">
                    <label for="perfil" class="col-md-4 control-label">Prioridade</label>

                    <div class="col-md-6">
                      <select id="prioridade" class="form-control" name="prioridade" autofocus>
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
                        <a class="btn btn-danger" href="{{URL::previous()}}">Voltar</a>
                        <button type="submit" class="btn btn-success">
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
@endsection
