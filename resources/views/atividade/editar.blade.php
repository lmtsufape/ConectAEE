@extends('layouts.principal')
@section('title','Editar atividade')
@section('navbar')
@endsection
@section('content')
<div class="container" style="color: #12583C">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default" style="margin-top: -20px; padding: 10px 20px;" id="login-card">
        <div class="panel-heading" id="login-card">
          <h2>
            <strong style="color: #12583C">
              Editar Atividade
            </strong>
            <div style="font-size: 14px" id="login-card">
              <a href="{{route('alunos.index')}}">Início</a>
              > <a href="{{route('alunos.gerenciar',$aluno->id)}}">Perfil de <strong>{{ explode(" ", $aluno->nome)[0]}}</strong></a>
              > <a href="{{route('objetivo.listar',$aluno->id)}}">Objetivos</a>
              > <a href="{{route('objetivo.gerenciar',[$objetivo->id])}}"><strong>{{$objetivo->titulo}}</strong></a>
              > Editar Atividade
            </div>
          </h2>

          <hr style="border-top: 1px solid #AAA;">
        </div>

        <div class="panel-body" id="login-card">
          <div class="col-md-8 col-md-offset-2" id="login-card">
            <form method="POST" action="{{ route("atividade.atualizar") }}">
              {{ csrf_field() }}

              <input type="hidden" name="aluno_id" value="{{ $aluno->id }}">
              <input type="hidden" name="id_objetivo" value="{{ $objetivo->id }}">
              <input type="hidden" name="id_atividade" value="{{ $atividade->id }}">

              <div class="form-group{{ $errors->has('titulo') ? ' has-error' : '' }}" id="login-card">
                <label for="titulo" class="col-md-12 control-label">Título <font color="red">*</font> </label>

                <div class="col-md-12" id="login-card">
                  @if(old('titulo',NULL) != NULL)
                    <input id="titulo" type="text" class="form-control" name="titulo" value="{{ old('titulo') }}" autofocus>
                  @else
                    <input id="titulo" type="text" class="form-control" name="titulo" value="{{ $atividade->titulo }}" autofocus>
                  @endif

                  @if ($errors->has('titulo'))
                    <span class="help-block">
                      <strong>{{ $errors->first('titulo') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('descricao') ? ' has-error' : '' }}" id="login-card">
                <label for="descricao" class="col-md-12 control-label">Descrição</label>

                <div class="col-md-12" id="login-card">

                  @if(old('descricao',NULL) != NULL)
                    <textarea id="descricao" rows = "5" cols = "50" class="form-control" name="descricao">{{ old('descricao') }}</textarea>
                  @else
                    <textarea id="descricao" rows = "5" cols = "50" class="form-control" name="descricao">{{ $atividade->descricao }}</textarea>
                  @endif

                  @if ($errors->has('descricao'))
                    <span class="help-block">
                      <strong>{{ $errors->first('descricao') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}" id="login-card">
                <label for="status" class="col-md-12 control-label">Status <font color="red">*</font> </label>

                <div class="col-md-12" id="login-card">
                  <select id="status" class="form-control" name="status" autofocus>
                    @if (old('status',NULL) != NULL)
                      @foreach($statuses as $key => $status)
                        @if(old('status') == $status)
                          <option value="{{$key}}" selected>{{$status}}</option>
                        @else
                          <option value="{{$key}}">{{$status}}</option>
                        @endif
                      @endforeach
                    @else
                      @foreach($statuses as $key => $status)
                        @if($atividade->status == $status)
                          <option value="{{$key}}" selected>{{$status}}</option>
                        @else
                          <option value="{{$key}}">{{$status}}</option>
                        @endif
                      @endforeach
                    @endif
                  </select>

                  @if ($errors->has('status'))
                  <span class="help-block">
                    <strong>{{ $errors->first('status') }}</strong>
                  </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('prioridade') ? ' has-error' : '' }}" id="login-card">
                <label for="prioridade" class="col-md-12 control-label">Prioridade <font color="red">*</font> </label>

                <div class="col-md-12" id="login-card">
                  <select id="prioridade" class="form-control" name="prioridade" autofocus>
                    @if (old('prioridade',NULL) != NULL)
                      @foreach($prioridades as $prioridade)
                        @if(old('prioridade') == $prioridade)
                          <option value={{$prioridade}} selected>{{$prioridade}}</option>
                        @else
                          <option value={{$prioridade}}>{{$prioridade}}</option>
                        @endif
                      @endforeach
                    @else
                      @foreach($prioridades as $prioridade)
                        @if($atividade->prioridade == $prioridade)
                          <option value={{$prioridade}} selected>{{$prioridade}}</option>
                        @else
                          <option value={{$prioridade}}>{{$prioridade}}</option>
                        @endif
                      @endforeach
                    @endif
                  </select>

                  @if ($errors->has('prioridade'))
                  <span class="help-block">
                    <strong>{{ $errors->first('prioridade') }}</strong>
                  </span>
                  @endif
                </div>
              </div>

              <div class="form-group" id="login-card">
                <div class="row col-md-12 text-center" id="login-card">
                  <br>
                  <a class="btn btn-secondary" href="{{route('objetivo.gerenciar',[$objetivo->id])}}">
                    Voltar
                  </a>
                  <button type="submit" class="btn btn-primary">
                    Atualizar
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>

        <!-- <div class="panel-footer">
          <a class="btn btn-danger" href="{{URL::previous()}}">
            <i class="material-icons">keyboard_backspace</i>
            <br>
            Voltar
          </a>
        </div> -->
      </div>
    </div>
  </div>
</div>
@endsection
