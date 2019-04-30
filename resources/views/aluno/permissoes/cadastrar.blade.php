@extends('layouts.principal')
@section('title','Início')
@section('path','Início')
@section('content')
    <div class="panel panel-default">
          <div class="panel-heading">Novo Gerenciador</div>
          @if (\Session::has('Fail'))
          <br>
          <div class="alert alert-danger">
              <strong>Erro!</strong>
              {!! \Session::get('Fail') !!}
          </div>
        @endif
          <div class="panel-body">
              <form class="form-horizontal" method="POST" action="{{ route("aluno.permissoes.criar") }}">
                  {{ csrf_field() }}

                    <input type="text" name="aluno" value="{{$aluno->id}}" hidden>

                  <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                      <label for="username" class="col-md-4 control-label">Nome de Usuário</label>

                      <div class="col-md-6">
                          <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" autofocus>

                          @if ($errors->has('username'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('username') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                 <div class="form-group{{ $errors->has('cargo') ? ' has-error' : '' }}">
                    <label for="cargo" class="col-md-4 control-label">Cargo</label>

                    <div class="col-md-6">
                            <select name="cargo" class="form-control" onchange="showEspecializacao(this)">
                                    <option value="" selected disabled hidden>Escolha o Cargo</option>
                                    @foreach($cargos as $cargo)
                                        @if($cargo->nome == old('cargo'))
                                            <option value="{{$cargo->nome}}" selected>{{$cargo->nome}}</option>
                                        @else 
                                            <option value="{{$cargo->nome}}">{{$cargo->nome}}</option>
                                        @endif
                                    @endforeach
                                </select>

                        @if ($errors->has('cargo'))
                            <span class="help-block">
                                <strong>{{ $errors->first('cargo') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                @if(old('cargo') == "Profissional Externo")
                    <div id="div-especializacao" class="form-group{{ $errors->has('especializacao') ? ' has-error' : '' }}">
                @else
                    <div id="div-especializacao" class="form-group{{ $errors->has('especializacao') ? ' has-error' : '' }}" style="display: none">
                @endif
                        <label for="especializacao" class="col-md-4 control-label">Especialização</label>
  
                        <div class="col-md-6">
                            <input id="especializacao" type="text" class="form-control" name="especializacao" value="{{ old('especializacao') }}" autofocus>
  
                            @if ($errors->has('especializacao'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('especializacao') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                <div class="form-group{{ $errors->has('isAdministrador') ? ' has-error' : '' }}">
                        <label for="isAdministrador" class="col-md-4 control-label">Usuário é Administrador?</label>
    
                        <div class="col-md-6">
                            <input style="margin-top: 10px" id="isAdministrador" type="checkbox" name="isAdministrador" value="true">
    
                            @if ($errors->has('isAdministrador'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('isAdministrador') }}</strong>
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
@endsection