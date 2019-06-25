@extends('layouts.principal')
@section('title','Início')
@section('path','Início')

@section('navbar')
<a href="{{route('aluno.listar')}}">Alunos</a> > Novo
@endsection

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
                                Dados Pessoais:
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

                                  @if(old('sexo') == "M")
                                    <input type="radio" id="sexo1" name="sexo" value="M" checked="checked">
                                  @else
                                    <input type="radio" id="sexo1" name="sexo" value="M">
                                  @endif
                                  <label class="custom-control-label" for="sexo1">Masculino</label>

                                  @if(old('sexo') == "F")
                                    <input type="radio" id="sexo2" name="sexo" value="F" checked="checked">
                                  @else
                                    <input type="radio" id="sexo2" name="sexo" value="F">
                                  @endif
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
                                Endereço:
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

                                      @if (old('estado') == null)
                                        <option selected disabled hidden>Escolha o estado</option>
                                      @endif

                                      @foreach($estados as $estado)
                                        @if(old('estado') == $estado)
                                          <option value={{$estado}} selected> {{ $estado }} </option>
                                        @else
                                          <option value={{$estado}}> {{ $estado }} </option>
                                        @endif
                                      @endforeach

                                    </select>

                                    @if ($errors->has('estado'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('estado') }}</strong>
                                        </span>
                                    @endif
                                  </div>
                              </div>

                              <font size="4" class="row">
                                Dados Médicos:
                              </font>

                              <div class="form-group{{ $errors->has('cid') ? ' has-error' : '' }}">
                                  <label for="cid" class="col-md-4 control-label">CID</label>

                                  <div class="col-md-6">

                                      <input id="cid" type="text" class="form-control" placeholder="X000" name="cid" value="{{ old('cid') }}">

                                      @if ($errors->has('cid'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('cid') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>

                              <div class="form-group{{ $errors->has('descricaoCid') ? ' has-error' : '' }}">
                                  <label for="descricaoCid" class="col-md-4 control-label">Descrição do CID</label>

                                  <div class="col-md-6">

                                      <input id="descricaoCid" type="text" class="form-control" name="descricaoCid" value="{{ old('descricaoCid') }}">

                                      @if ($errors->has('descricaoCid'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('descricaoCid') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>

                              <font size="4" class="row">
                                Outras Observacões:
                              </font>

                              <div class="form-group{{ $errors->has('observacao') ? ' has-error' : '' }}">
                                  <label for="observacao" class="col-md-4 control-label">Observações</label>

                                  <div class="col-md-6">
                                      <textarea id="observacao" rows = "5" cols = "50" class="form-control" name="observacao" value="{{ old('observacao') }}" ></textarea>

                                      @if ($errors->has('observacao'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('observacao') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>

                              <font size="4" class="row">
                                Perfil do Cadastrante:
                              </font>

                              <div class="form-group{{ $errors->has('perfil') ? ' has-error' : '' }}">
                                  <label for="perfil" class="col-md-4 control-label">Perfil</label>

                                  <div class="col-md-6">
                                    <select id="perfil" class="form-control" name="perfil" onchange="showResponsavel(this)">

                                      @if (old('perfil') == null)
                                          <option id="perfil" selected disabled hidden>Escolha seu perfil</option>
                                      @endif

                                      @if(old('perfil') == "1")
                                          <option id="perfil" value="1" selected>Responsável</option>
                                      @else
                                          <option id="perfil" value="1">Responsável</option>
                                      @endif

                                      @if(old('perfil') == "2")
                                          <option id="perfil" value="2" selected>Professor AEE</option>
                                      @else
                                          <option id="perfil" value=2>Professor AEE</option>
                                      @endif
                                    </select>

                                    @if ($errors->has('perfil'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('perfil') }}</strong>
                                        </span>
                                    @endif
                                  </div>
                              </div>

                                @if(old('perfil') == "2")
                                    <div id="div-responsavel" style="display: block">
                                @else
                                    <div id="div-responsavel" style="display: none">
                                @endif

                                <font size="4" class="row">
                                    Cadastro de Responsável:
                                </font>
                                
                                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                    <label for="username" class="col-md-4 control-label">Nome de Usuário</label>
                                    
                                    <div class="col-md-6">
                                        @if (old('username') == null)
                                        <input name="username" type="text" class="form-control" value="{{old('username')}}">
                                        @else
                                        <input name="username" type="text" class="form-control">
                                        @endif
                                        
                                        @if ($errors->has('username'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                        @endif
                                    </div>
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
