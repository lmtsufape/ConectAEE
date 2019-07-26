@extends('layouts.principal')
@section('title','Início')
@section('navbar')
<a href="{{route('aluno.listar')}}">Alunos</a>
 > <a href="{{route('aluno.buscar')}}">Buscar</a>
 > Requisitar permissão: <strong>{{$aluno->nome}}</strong></a>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                      <div class="panel-heading">Requisitar permissão: <strong>{{$aluno->nome}}</strong></div>

                      <div class="panel-body">
                          <form class="form-horizontal" method="POST" action="{{ route("aluno.permissoes.notificar") }}">
                              {{ csrf_field() }}

                              <input type="hidden" name="id_aluno" value="{{ $aluno->id }}">

                              <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                  <label for="username" class="col-md-4 control-label">Nome de Usuário</label>

                                  <div class="col-md-6">
                                      <input id="username" readonly type="text" class="form-control" name="username" value="{{ \Auth::user()->username }}" autofocus>
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

                              <div class="form-group">
                                  <div class="col-md-6 col-md-offset-4">
                                      <a class="btn btn-danger" href="{{URL::previous()}}">Voltar</a>
                                      <button type="submit" class="btn btn-success">
                                        Requisitar
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
