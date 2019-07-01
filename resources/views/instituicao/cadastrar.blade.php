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
                      <div class="panel-heading">Nova Instituição</div>

                      <div class="panel-body">
                          <form class="form-horizontal" method="POST" action="{{ route("instituicao.criar") }}">
                              {{ csrf_field() }}

                              <font size="4" class="row" >
                                Instituição
                              </font>

                              <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                                  <label for="nome" class="col-md-4 control-label"> Nome <font color="red">*</font>
                                  </label>

                                  <div class="col-md-6">
                                      <input id="nome" type="text" class="form-control" name="nome" value="{{ old('nome') }}" autofocus>

                                      @if ($errors->has('nome'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('nome') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>

                              <div class="form-group{{ $errors->has('telefone') ? ' has-error' : '' }}">
                                  <label for="telefone" class="col-md-4 control-label">Telefone <font color="red">*</font> </label>

                                  <div class="col-md-6">
                                      <input  type="digit" class="form-control" name="telefone" id="telefone" minlength="10" placeholder="DDD+Telefone" maxlength="11" value="{{ old('telefone') }}">

                                      @if ($errors->has('telefone'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('telefone') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>

                              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                  <label for="email" class="col-md-4 control-label">E-Mail</label>

                                  <div class="col-md-6">
                                      <input id="email" class="form-control" name="email" value="{{ old('email') }}">

                                      @if ($errors->has('email'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('email') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>

                              <div class="form-group{{ $errors->has('logradouro') ? ' has-error' : '' }}">
                                  <label for="logradouro" class="col-md-4 control-label">Logradouro <font color="red">*</font></label>

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
                                  <label for="numero" class="col-md-4 control-label">Número <font color="red">*</font> </label>

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
                                  <label for="bairro" class="col-md-4 control-label">Bairro <font color="red">*</font></label>

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
                                  <label for="cidade" class="col-md-4 control-label">Cidade <font color="red">*</font> </label>

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
                                  <label for="estado" class="col-md-4 control-label">Estado <font color="red">*</font> </label>

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
