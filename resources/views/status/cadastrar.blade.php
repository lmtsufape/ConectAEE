@extends('layouts.principal')
@section('title','Início')
@section('navbar')
<a href="{{route('aluno.listar')}}">Alunos</a>
 > <a href="{{route('aluno.gerenciar',$aluno->id)}}">Gerenciar: <strong>{{$aluno->nome}}</strong></a>
 > <a href="{{route('objetivo.listar',$aluno->id)}}">Objetivos</a>
 > <a href="{{route('objetivo.gerenciar',[$aluno->id,$objetivo->id])}}"><strong>{{$objetivo->titulo}}</strong></a>
 > Novo status
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Alterar Status</div>

          <div class="panel-body">
              <form class="form-horizontal" method="POST" action="{{ route("objetivo.status.criar") }}">
                  {{ csrf_field() }}

                  <input id="id_aluno" type="hidden" class="form-control" name="id_aluno" value="{{ $aluno->id }}">
                  <input id="id_objetivo" type="hidden" class="form-control" name="id_objetivo" value="{{ $objetivo->id }}">


                  <div class="form-group{{ $errors->has('tipo') ? ' has-error' : '' }}">
                      <label for="status" class="col-md-4 control-label">Status</label>

                      <div class="col-md-6">
                        <select id="status" class="form-control" name="status" autofocus>

                          @if (old('status') == null)
                              <option value="" selected disabled hidden>Escolha o status</option>
                          @endif

                          @foreach($statuses as $status)
                              @if(old('status') == $status)
                                  <option value={{$status->id}} selected>{{$status->status}}</option>
                              @else
                                  <option value={{$status->id}}>{{$status->status}}</option>
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
</div>
@endsection
