@extends('layouts.principal')
@section('title','Início')
@section('path','Início')
@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                      <div class="panel-heading">Novo Aluno</div>
            
                      <div class="panel-body">
                          <form class="form-horizontal" method="POST" action="{{ route("aluno.criar") }}">
                              {{ csrf_field() }}
            
                              <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                                  <label for="nome" class="col-md-4 control-label">Nome</label>
            
                                  <div class="col-md-6">
                                      <input id="nome" type="text" class="form-control" name="nome" value="{{ old('nome') }}" autofocus>
            
                                      @if ($errors->has('nome'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('nome') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>
            
                              <div class="form-group{{ $errors->has('cargo') ? ' has-error' : '' }}">
                                  <label for="perfil" class="col-md-4 control-label">Cargo</label>
            
                                  <div class="col-md-6">
                                    <select id="cargo" class="form-control" name="cargo" autofocus>
                                      <option value="" selected disabled hidden>Escolha o cargo</option>
                                      <option value="1" >Responsável</option>
                                      <option value="2" >Professor AEE</option>
                                    </select>
            
                                    @if ($errors->has('cargo'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('cargo') }}</strong>
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
