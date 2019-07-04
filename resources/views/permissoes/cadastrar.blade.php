@extends('layouts.principal')
@section('title','Início')
@section('navbar')
<a href="{{route('aluno.listar')}}">Alunos</a>
 > <a href="{{route('aluno.gerenciar',$aluno->id)}}">Gerenciar: <strong>{{$aluno->nome}}</strong></a>
 > <a href="{{route('aluno.permissoes',$aluno->id)}}">Permissões</a>
 > Nova
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
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

                              <input type="hidden" name="id_aluno" value="{{$aluno->id}}">

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

                             <div class="form-group{{ $errors->has('perfil') ? ' has-error' : '' }}">
                                <label for="perfil" class="col-md-4 control-label">Perfil</label>

                                <div class="col-md-6">
                                        <select name="perfil" class="form-control" onchange="showEspecializacao(this)">
                                                <option value="" selected disabled hidden>Escolha o Perfil</option>
                                                @foreach($perfis as $perfil)
                                                    @if($perfil->nome == old('perfil'))
                                                        <option value="{{$perfil->nome}}" selected>{{$perfil->nome}}</option>
                                                    @else
                                                        <option value="{{$perfil->nome}}">{{$perfil->nome}}</option>
                                                    @endif
                                                @endforeach
                                            </select>

                                    @if ($errors->has('perfil'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('perfil') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            @if(old('perfil') == "Profissional Externo")
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
            </div>
        </div>
    </div>
@endsection
