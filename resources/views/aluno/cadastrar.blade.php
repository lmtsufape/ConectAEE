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

                              <font size="4" class="row">
                                Seu Perfil:
                              </font>

                              <div class="form-group{{ $errors->has('perfil') ? ' has-error' : '' }}">
                                  <label for="perfil" class="col-md-4 control-label">Perfil</label>

                                  <div class="col-md-6">
                                    <select id="perfil" class="form-control" name="perfil">
                                      <option value="" selected disabled hidden>Escolha seu perfil</option>
                                      <option value="1" >Responsável</option>
                                      <option value="2" >Professor AEE</option>
                                    </select>

                                    @if ($errors->has('perfil'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('perfil') }}</strong>
                                        </span>
                                    @endif
                                  </div>
                              </div>

                              <font size="4" class="row">
                                Dados do Aluno:
                              </font>

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

                              <div class="form-group{{ $errors->has('sexo') ? ' has-error' : '' }}">

                                <label for="sexo" class="col-md-4 control-label">Sexo</label>

                                <div class="col-md-6">

                                  <input type="radio" id="sexo1" name="sexo" value="M" class="custom-control-inline">
                                  <label class="custom-control-label" for="sexo1">Masculino</label>

                                  <input type="radio" id="sexo2" name="sexo" value="F" class="custom-control-inline">
                                  <label class="custom-control-label" for="sexo2">Feminino</label>

                                  @if ($errors->has('sexo'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('sexo') }}</strong>
                                      </span>
                                  @endif
                                </div>
                              </div>

                              <div class="form-group{{ $errors->has('data_nascimento') ? ' has-error' : '' }}">
                                  <label for="data_nascimento" class="col-md-4 control-label">Data de Nascimento</label>
                                  <div class="col-md-6">

                                      <input id="data_nascimento" type="date" class="form-control" name="data_nascimento" value="{{ old('data_nascimento') }}">

                                      @if ($errors->has('data_nascimento'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('data_nascimento') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>

                              <font size="4" class="row">
                                Endereço do Aluno:
                              </font>

                              <div class="form-group{{ $errors->has('logradouro') ? ' has-error' : '' }}">
                                  <label for="logradouro" class="col-md-4 control-label">Logradouro</label>

                                  <div class="col-md-6">

                                      <input id="logradouro" type="text" class="form-control" name="logradouro" value="{{ old('logradouro') }}">

                                      @if ($errors->has('logradouro'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('logradouro') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>

                              <div class="form-group{{ $errors->has('numero') ? ' has-error' : '' }}">
                                  <label for="numero" class="col-md-4 control-label">Número</label>


                                  <div class="col-md-6">

                                      <input id="numero" type="text" class="form-control" name="numero" value="{{ old('numero') }}">

                                      @if ($errors->has('numero'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('numero') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>

                              <div class="form-group{{ $errors->has('bairro') ? ' has-error' : '' }}">
                                  <label for="bairro" class="col-md-4 control-label">Bairro</label>

                                  <div class="col-md-6">

                                      <input id="bairro" type="text" class="form-control" name="bairro" value="{{ old('bairro') }}">

                                      @if ($errors->has('bairro'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('bairro') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>

                              <div class="form-group{{ $errors->has('cidade') ? ' has-error' : '' }}">
                                  <label for="cidade" class="col-md-4 control-label">Cidade</label>

                                  <div class="col-md-6">

                                      <input id="cidade" type="text" class="form-control" name="cidade" value="{{ old('cidade') }}">

                                      @if ($errors->has('cidade'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('cidade') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>

                              <div class="form-group{{ $errors->has('estado') ? ' has-error' : '' }}">
                                  <label for="perfil" class="col-md-4 control-label">Estado</label>

                                  <div class="col-md-3">
                                    <select id="estado" class="form-control" name="estado">
                                      <option value="" selected disabled hidden>Escolha o estado</option>

                                      @foreach($estados as $estado)
                                        <option value={{$estado}}> {{ $estado }} </option>
                                      @endforeach

                                    </select>

                                    @if ($errors->has('estado'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('estado') }}</strong>
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
