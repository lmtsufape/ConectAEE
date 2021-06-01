@extends('layouts.principal')
@section('title','Cadastrar PDI')
@section('path','Início')

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
                                Cadastrar PDI
                            </strong>
                            <div style="font-size: 14px" id="login-card">
                                <a href="{{route('aluno.listar')}}">Início</a>> <a
                                        href="{{route('aluno.gerenciar',$aluno->id)}}">Perfil de
                                    <strong>{{ explode(" ", $aluno->nome)[0]}}</strong></a>>
                                <a href="{{route('pdi.listar', $aluno->id)}}">Listar PDI's</a>
                                >Cadastrar PDI
                            </div>
                        </h2>

                        <hr style="border-top: 1px solid #AAA;">
                    </div>

                    <div class="panel-body panel-body-cadastro" id="login-card">
                        <div class="col-md-8 col-md-offset-2" id="login-card">
                            <form method="POST" action="{{ route("pdi.criar") }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="aluno_id" id="aluno_id" value="{{$aluno->id}}">

                                <h3>
                                    <strong>
                                        Dados Familiares do Aluno
                                    </strong>
                                </h3>

                                <hr style="border-top: 1px solid #AAA;">

                                <div class="form-group{{ $errors->has('nomeMae') ? ' has-error' : '' }}"
                                     id="login-card">
                                    <label for="nomeMae" class="col-md-12 control-label"> Nome da mãe<font
                                                color="red">*</font></label>

                                    <div class="col-md-12" id="login-card">
                                        <input id="nomeMae" type="text" class="form-control" name="nomeMae"
                                               value="@if($pdi != null) {{$pdi->nomeMae}} @else {{old('nomeMae')}} @endif">

                                        @if ($errors->has('nomeMae'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('nomeMae') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('nomePai') ? ' has-error' : '' }}"
                                     id="login-card">
                                    <label for="nomePai" class="col-md-12 control-label"> Nome do pai</label>

                                    <div class="col-md-12" id="login-card">
                                        <input id="nomePai" type="text" class="form-control" name="nomePai"
                                               value="@if($pdi != null) {{$pdi->nomePai}} @else {{old('nomePai')}} @endif">

                                        @if ($errors->has('nomePai'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('nomePai') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('nomeResponsavel') ? ' has-error' : '' }}"
                                     id="login-card">
                                    <label for="nomeResponsavel" class="col-md-12 control-label"> Nome do(a)
                                        responsável<font
                                                color="red">*</font></label>

                                    <div class="col-md-12" id="login-card" style="padding-bottom: 20px">
                                        <input id="nomeResponsavel" type="text" class="form-control"
                                               name="nomeResponsavel"
                                               value="@if($pdi != null) {{$pdi->nomeResponsavel}} @else {{ old('nomeResponsavel') }} @endif">

                                        @if ($errors->has('nomeResponsavel'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('nomeResponsavel') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('numeroIrmaos') ? ' has-error' : '' }}"
                                     id="login-card">
                                    <label for="numeroIrmaos" class="col-md-12 control-label"> Número de
                                        irmãos<font color="red">*</font></label>
                                    <div class="col-md-12" style="padding:0px" id="login-card">
                                        <div class="col-md-2" id="login-card" style="padding-bottom: 20px">
                                            <input id="numeroIrmaos" type="number" class="form-control"
                                                   name="numeroIrmaos"
                                                   @if($pdi != null)
                                                   value="{{$pdi->numeroIrmaos}}"
                                                   @else
                                                   value="{{old('numeroIrmaos')}}"
                                                   @endif
                                                   min="0" step="1" max="69">

                                            @if ($errors->has('numeroIrmaos'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('numeroIrmaos') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <h3>
                                    <strong>Informação Escolar</strong>
                                </h3>

                                <hr style="border-top: 1px solid #AAA;">

                                <div class="form-group{{ $errors->has('nomeEscola') ? ' has-error' : '' }}"
                                     id="login-card">
                                    <label for="nomeEscola" class="col-md-12 control-label"> Nome da Escola <font
                                                color="red">*</font></label>

                                    <div class="col-md-12" id="login-card">
                                        <input id="nomeEscola" type="text" class="form-control" name="nomeEscola"
                                               value="@if($pdi != null) {{$pdi->nomeEscola}} @else {{old('nomeEscola')}} @endif">

                                        @if ($errors->has('nomeEscola'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('nomeEscola') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('professorRegular') ? ' has-error' : '' }}"
                                     id="login-card">
                                    <label for="professorRegular" class="col-md-12 control-label"> Nome do Professor da
                                        sala regular <font
                                                color="red">*</font></label>

                                    <div class="col-md-12" id="login-card">
                                        <input id="professorRegular" type="text" class="form-control"
                                               name="professorRegular"
                                               value="@if($pdi != null) {{$pdi->professorRegular}} @else {{old('professorRegular')}} @endif">

                                        @if ($errors->has('professorRegular'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('professorRegular') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('modalidadeEscolar') ? ' has-error' : '' }}"
                                     id="login-card">
                                    <label for="modalidadeEscolar" class="col-md-12 control-label">Modalidade de Inicio
                                        da Vida Escolar <font
                                                color="red">*</font> </label>

                                    <div class="col-md-12" id="login-card">
                                        <select id="modalidadeEscolar" class="form-control" name="modalidadeEscolar">
                                            <option value="" selected hidden style="text-align: center">-- Modalidade
                                                --
                                            </option>
                                            @if($pdi != null)
                                                <option @if(old('modalidadeEscolar') == 'EducInfantil' or $pdi->modalidadeEscolar == 'EducInfantil') selected
                                                        @endif value="EducInfantil">
                                                    Educação Infantil
                                                </option>

                                                <option @if(old('modalidadeEscolar') == 'InicioFundamental' or $pdi->modalidadeEscolar == 'InicioFundamental') selected
                                                        @endif value="InicioFundamental">
                                                    Anos Iniciais do Ensino Fundamental
                                                </option>
                                            @else
                                                <option @if(old('modalidadeEscolar') == 'EducInfantil') selected
                                                        @endif value="EducInfantil">
                                                    Educação Infantil
                                                </option>

                                                <option @if(old('modalidadeEscolar') == 'InicioFundamental') selected
                                                        @endif value="InicioFundamental">
                                                    Anos Iniciais do Ensino Fundamental
                                                </option>
                                            @endif

                                        </select>
                                    </div>
                                </div>
                                <div class="row" style="padding:0px" id="login-card">
                                    <div class="col-md-12" id="login-card">
                                        <div class="form-group{{ $errors->has('anoEscolaridade') ? ' has-error' : '' }}"
                                             id="login-card">
                                            <label for="anoEscolaridade" class="col-md-12 control-label"> Ano de
                                                Escolaridade Atual <font
                                                        color="red">*</font></label>

                                            <div class="col-md-12" id="login-card" style="width: 15%">
                                                <input id="anoEscolaridade" type="number" class="form-control"
                                                       name="anoEscolaridade"
                                                       @if($pdi != null)
                                                       value="{{$pdi->anoEscolaridade}}"
                                                       @else
                                                       value="{{old('anoEscolaridade')}}"
                                                        @endif>
                                            </div>
                                            <div class="col-md-12" style="padding-left: 2%" id="login-card">
                                                @if ($errors->has('anoEscolaridade'))
                                                    <span class="help-block">
                        <strong>{{ $errors->first('anoEscolaridade') }}</strong>
                      </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h3>
                                    <strong>Autonomia do Estudante</strong>
                                </h3>

                                <hr style="border-top: 1px solid #AAA;">

                                <div class="row" style="padding:0px" id="login-card">
                                    <div class="col-md-12" style="padding:0px" id="login-card">
                                        <div class="col-md-6" id="login-card">
                                            <div class="form-group{{ $errors->has('banhoSozinho') ? ' has-error' : '' }}"
                                                 id="login-card">

                                                <label for="banhoSozinho" class="col-md-12 control-label">Toma banho
                                                    sozinho ? <font
                                                            color="red">*</font> </label>

                                                <div class="col-md-12" id="login-card">
                                                    @if($pdi != null)
                                                        @if(old('banhoSozinho') == "true" or $pdi->banhoSozinho == true)
                                                            <input type="radio" id="banhoSozinho1" name="banhoSozinho"
                                                                   value="true"
                                                                   checked="checked">
                                                        @else
                                                            <input type="radio" id="banhoSozinho1" name="banhoSozinho"
                                                                   value="true">
                                                        @endif
                                                    @else
                                                        @if(old('banhoSozinho') == "true")
                                                            <input type="radio" id="banhoSozinho1" name="banhoSozinho"
                                                                   value="true"
                                                                   checked="checked">
                                                        @else
                                                            <input type="radio" id="banhoSozinho1" name="banhoSozinho"
                                                                   value="true">
                                                        @endif
                                                    @endif

                                                    <label class="custom-control-label"
                                                           for="banhoSozinho1">Sim</label>
                                                    @if($pdi != null)

                                                        @if(old('banhoSozinho') == "false" or $pdi->banhoSozinho == false)
                                                            <input type="radio" id="banhoSozinho2" name="banhoSozinho"
                                                                   value="false"
                                                                   checked="checked">
                                                        @else
                                                            <input type="radio" id="banhoSozinho2" name="banhoSozinho"
                                                                   value="false">
                                                        @endif
                                                    @else
                                                        @if(old('banhoSozinho') == "false")
                                                            <input type="radio" id="banhoSozinho2" name="banhoSozinho"
                                                                   value="false"
                                                                   checked="checked">
                                                        @else
                                                            <input type="radio" id="banhoSozinho2" name="banhoSozinho"
                                                                   value="false">
                                                        @endif
                                                    @endif

                                                    <label class="custom-control-label" for="banhoSozinho2">Não</label>

                                                    @if ($errors->has('banhoSozinho'))
                                                        <span class="help-block">
                              <strong>{{ $errors->first('banhoSozinho') }}</strong>
                            </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" id="login-card">
                                            <div class="form-group{{ $errors->has('banheiroSozinho') ? ' has-error' : '' }}"
                                                 id="login-card">

                                                <label for="banheiroSozinho" class="col-md-12 control-label">Usa o
                                                    banheiro sozinho ? <font
                                                            color="red">*</font> </label>

                                                <div class="col-md-12" id="login-card">
                                                    @if($pdi != null)
                                                        @if(old('banheiroSozinho') == "true" or $pdi->banheiroSozinho == true)
                                                            <input type="radio" id="banheiroSozinho1"
                                                                   name="banheiroSozinho"
                                                                   value="true"
                                                                   checked="checked">
                                                        @else
                                                            <input type="radio" id="banheiroSozinho1"
                                                                   name="banheiroSozinho"
                                                                   value="true">
                                                        @endif
                                                    @else
                                                        @if(old('banheiroSozinho') == "true")
                                                            <input type="radio" id="banheiroSozinho1"
                                                                   name="banheiroSozinho"
                                                                   value="true"
                                                                   checked="checked">
                                                        @else
                                                            <input type="radio" id="banheiroSozinho1"
                                                                   name="banheiroSozinho"
                                                                   value="true">
                                                        @endif
                                                    @endif

                                                    <label class="custom-control-label"
                                                           for="banheiroSozinho1">Sim</label>
                                                    @if($pdi != null)
                                                        @if(old('banheiroSozinho') == "false" or $pdi->banheiroSozinho == false)
                                                            <input type="radio" id="banheiroSozinho2"
                                                                   name="banheiroSozinho"
                                                                   value="false"
                                                                   checked="checked">
                                                        @else
                                                            <input type="radio" id="banheiroSozinho2"
                                                                   name="banheiroSozinho"
                                                                   value="false">
                                                        @endif
                                                    @else
                                                        @if(old('banheiroSozinho') == "false")
                                                            <input type="radio" id="banheiroSozinho2"
                                                                   name="banheiroSozinho"
                                                                   value="false"
                                                                   checked="checked">
                                                        @else
                                                            <input type="radio" id="banheiroSozinho2"
                                                                   name="banheiroSozinho"
                                                                   value="false">
                                                        @endif
                                                    @endif

                                                    <label class="custom-control-label"
                                                           for="banheiroSozinho2">Não</label>

                                                    @if ($errors->has('banheiroSozinho'))
                                                        <span class="help-block">
                              <strong>{{ $errors->first('banheiroSozinho') }}</strong>
                            </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="padding:0px; padding-top: 3%" id="login-card">
                                    <div class="col-md-12" style="padding:0px" id="login-card">
                                        <div class="col-md-6" id="login-card">
                                            <div class="form-group{{ $errors->has('escovaDentesSozinho') ? ' has-error' : '' }}"
                                                 id="login-card">

                                                <label for="escovaDentesSozinho" class="col-md-12 control-label">Escova
                                                    os dentes sozinho ? <font
                                                            color="red">*</font> </label>

                                                <div class="col-md-12" id="login-card">
                                                    @if($pdi != null)
                                                        @if(old('escovaDentesSozinho') == "true" or $pdi->escovaDentesSozinho == true)
                                                            <input type="radio" id="escovaDentesSozinho1"
                                                                   name="escovaDentesSozinho" value="true"
                                                                   checked="checked">
                                                        @else
                                                            <input type="radio" id="escovaDentesSozinho1"
                                                                   name="escovaDentesSozinho" value="true">
                                                        @endif
                                                    @else
                                                        @if(old('escovaDentesSozinho') == "true")
                                                            <input type="radio" id="escovaDentesSozinho1"
                                                                   name="escovaDentesSozinho" value="true"
                                                                   checked="checked">
                                                        @else
                                                            <input type="radio" id="escovaDentesSozinho1"
                                                                   name="escovaDentesSozinho" value="true">
                                                        @endif
                                                    @endif

                                                    <label class="custom-control-label"
                                                           for="escovaDentesSozinho1">Sim</label>
                                                    @if($pdi != null)
                                                        @if(old('escovaDentesSozinho') == "false" or $pdi->escovaDentesSozinho == false)
                                                            <input type="radio" id="escovaDentesSozinho2"
                                                                   name="escovaDentesSozinho" value="false"
                                                                   checked="checked">
                                                        @else
                                                            <input type="radio" id="escovaDentesSozinho2"
                                                                   name="escovaDentesSozinho" value="false">
                                                        @endif
                                                    @else
                                                        @if(old('escovaDentesSozinho') == "false")
                                                            <input type="radio" id="escovaDentesSozinho2"
                                                                   name="escovaDentesSozinho" value="false"
                                                                   checked="checked">
                                                        @else
                                                            <input type="radio" id="escovaDentesSozinho2"
                                                                   name="escovaDentesSozinho" value="false">
                                                        @endif
                                                    @endif

                                                    <label class="custom-control-label"
                                                           for="escovaDentesSozinho2">Não</label>

                                                    @if ($errors->has('escovaDentesSozinho'))
                                                        <span class="help-block">
                              <strong>{{ $errors->first('escovaDentesSozinho') }}</strong>
                            </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" id="login-card">
                                            <div class="form-group{{ $errors->has('comeSozinho') ? ' has-error' : '' }}"
                                                 id="login-card">

                                                <label for="comeSozinho" class="col-md-12 control-label">Come sozinho ?
                                                    <font
                                                            color="red">*</font> </label>

                                                <div class="col-md-12" id="login-card">
                                                    @if($pdi != null)
                                                        @if(old('comeSozinho') == "true" or $pdi->comeSozinho == true)
                                                            <input type="radio" id="comeSozinho1" name="comeSozinho"
                                                                   value="true"
                                                                   checked="checked">
                                                        @else
                                                            <input type="radio" id="comeSozinho1" name="comeSozinho"
                                                                   value="true">
                                                        @endif
                                                    @else
                                                        @if(old('comeSozinho') == "true")
                                                            <input type="radio" id="comeSozinho1" name="comeSozinho"
                                                                   value="true"
                                                                   checked="checked">
                                                        @else
                                                            <input type="radio" id="comeSozinho1" name="comeSozinho"
                                                                   value="true">
                                                        @endif
                                                    @endif

                                                    <label class="custom-control-label"
                                                           for="comeSozinho1">Sim</label>

                                                    @if($pdi != null)
                                                        @if(old('comeSozinho') == "false" or $pdi->comeSozinho == false)
                                                            <input type="radio" id="comeSozinho2" name="comeSozinho"
                                                                   value="false"
                                                                   checked="checked">
                                                        @else
                                                            <input type="radio" id="comeSozinho2" name="comeSozinho"
                                                                   value="false">
                                                        @endif
                                                    @else
                                                        @if(old('comeSozinho') == "false")
                                                            <input type="radio" id="comeSozinho2" name="comeSozinho"
                                                                   value="false"
                                                                   checked="checked">
                                                        @else
                                                            <input type="radio" id="comeSozinho2" name="comeSozinho"
                                                                   value="false">
                                                        @endif
                                                    @endif

                                                    <label class="custom-control-label" for="comeSozinho2">Não</label>

                                                    @if ($errors->has('comeSozinho'))
                                                        <span class="help-block">
                              <strong>{{ $errors->first('comeSozinho') }}</strong>
                            </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding:0px; padding-top: 3%" id="login-card">
                                    <div class="col-md-12" style="padding:0px" id="login-card">
                                        <div class="col-md-6" id="login-card">
                                            <div class="form-group{{ $errors->has('bebeAguaSozinho') ? ' has-error' : '' }}"
                                                 id="login-card">

                                                <label for="bebeAguaSozinho" class="col-md-12 control-label">Bebe agua
                                                    sozinho ? <font
                                                            color="red">*</font> </label>

                                                <div class="col-md-12" id="login-card">
                                                    @if($pdi != null)
                                                        @if(old('bebeAguaSozinho') == "true" or $pdi->bebeAguaSozinho == true)
                                                            <input type="radio" id="bebeAguaSozinho1"
                                                                   name="bebeAguaSozinho"
                                                                   value="true"
                                                                   checked="checked">
                                                        @else
                                                            <input type="radio" id="bebeAguaSozinho1"
                                                                   name="bebeAguaSozinho"
                                                                   value="true">
                                                        @endif
                                                    @else
                                                        @if(old('bebeAguaSozinho') == "true")
                                                            <input type="radio" id="bebeAguaSozinho1"
                                                                   name="bebeAguaSozinho"
                                                                   value="true"
                                                                   checked="checked">
                                                        @else
                                                            <input type="radio" id="bebeAguaSozinho1"
                                                                   name="bebeAguaSozinho"
                                                                   value="true">
                                                        @endif
                                                    @endif

                                                    <label class="custom-control-label"
                                                           for="bebeAguaSozinho1">Sim</label>
                                                    @if($pdi != null)
                                                        @if(old('bebeAguaSozinho') == "false" or $pdi->bebeAguaSozinho == false)
                                                            <input type="radio" id="bebeAguaSozinho2"
                                                                   name="bebeAguaSozinho"
                                                                   value="false"
                                                                   checked="checked">
                                                        @else
                                                            <input type="radio" id="bebeAguaSozinho2"
                                                                   name="bebeAguaSozinho"
                                                                   value="false">
                                                        @endif
                                                    @else
                                                        @if(old('bebeAguaSozinho') == "false")
                                                            <input type="radio" id="bebeAguaSozinho2"
                                                                   name="bebeAguaSozinho"
                                                                   value="false"
                                                                   checked="checked">
                                                        @else
                                                            <input type="radio" id="bebeAguaSozinho2"
                                                                   name="bebeAguaSozinho"
                                                                   value="false">
                                                        @endif
                                                    @endif

                                                    <label class="custom-control-label"
                                                           for="bebeAguaSozinho2">Não</label>

                                                    @if ($errors->has('bebeAguaSozinho'))
                                                        <span class="help-block">
                              <strong>{{ $errors->first('bebeAguaSozinho') }}</strong>
                            </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h3>
                                    <strong>Ambito Familiar</strong>
                                </h3>
                                Apontar de forma descritiva as condições familiares do estudante.

                                <hr style="border-top: 1px solid #AAA;">

                                <div class="form-group{{ $errors->has('problemaGestacao') ? ' has-error' : '' }}"
                                     id="login-card">
                                    <label for="problemaGestacao" class="col-md-12 control-label"> Houve algum problema
                                        durante a gestação da mãe?<font
                                                color="red">*</font></label>

                                    <div class="col-md-12" id="login-card">
                                        <input id="problemaGestacao" type="text" class="form-control"
                                               name="problemaGestacao"
                                               value="@if($pdi != null) {{$pdi->problemaGestacao}} @else {{old('problemaGestacao')}} @endif">

                                        @if ($errors->has('problemaGestacao'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('problemaGestacao') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('descProbGestacao') ? ' has-error' : '' }}"
                                     id="login-card">
                                    <label for="descProbGestacao" class="col-md-12 control-label">Quais os problemas?
                                        (Uso de medicamentos, drogas ou doenças)</label>

                                    <div class="col-md-12" id="login-card">
                    <textarea name="descProbGestacao"
                              style="width:100%; min-width: 100%; max-width: 100%;min-height: 50px;"
                              id="descProbGestacao" type="text"
                              class="form-control">@if($pdi != null) {{$pdi->descProbGestacao}} @else {{old('descProbGestacao')}} @endif</textarea>

                                        @if ($errors->has('descProbGestacao'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('descProbGestacao') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('ambienteFamiliar') ? ' has-error' : '' }}"
                                     id="login-card">
                                    <label for="ambienteFamiliar" class="col-md-12 control-label">Características do
                                        ambiente familiar <font
                                                color="red">*</font></label>

                                    <div class="col-md-12" id="login-card">
                    <textarea name="ambienteFamiliar"
                              style="width:100%; min-width: 100%; max-width: 100%;min-height: 50px;"
                              id="ambienteFamiliar" type="text"
                              class="form-control">@if($pdi != null) {{$pdi->ambienteFamiliar}} @else {{old('ambienteFamiliar')}} @endif</textarea>

                                        @if ($errors->has('ambienteFamiliar'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('ambienteFamiliar') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('aprendizagemEscolar') ? ' has-error' : '' }}"
                                     id="login-card">
                                    <label for="aprendizagemEscolar" class="col-md-12 control-label">Condições do
                                        ambiente familiar para a aprendizagem escolar <font
                                                color="red">*</font></label>

                                    <div class="col-md-12" id="login-card">
                    <textarea name="aprendizagemEscolar"
                              style="width:100%; min-width: 100%; max-width: 100%;min-height: 50px;"
                              id="aprendizagemEscolar" type="text"
                              class="form-control">@if($pdi != null) {{$pdi->aprendizagemEscolar}} @else {{old('aprendizagemEscolar')}} @endif</textarea>
                                        <br>
                                        @if ($errors->has('aprendizagemEscolar'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('aprendizagemEscolar') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>
                                <h3>
                                    <strong>Condições de Saúde Geral</strong>
                                </h3>
                                Caso o estudante apresente alguma deficiência, problemas de comportamento e/ou problemas
                                de
                                saúde, descreva:

                                <hr style="border-top: 1px solid #AAA;">

                                <div class="form-group{{ $errors->has('recomendacoesSaude') ? ' has-error' : '' }}"
                                     id="login-card">
                                    <label for="recomendacoesSaude" class="col-md-12 control-label">Existem
                                        recomendações da área da saúde? Se sim, quais? <font
                                                color="red">*</font></label>

                                    <div class="col-md-12" id="login-card">
                    <textarea name="recomendacoesSaude"
                              style="width:100%; min-width: 100%; max-width: 100%;min-height: 50px;"
                              id="recomendacoesSaude" type="text"
                              class="form-control">@if($pdi != null) {{$pdi->recomendacoesSaude}} @else {{old('recomendacoesSaude')}} @endif</textarea>

                                        @if ($errors->has('recomendacoesSaude'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('recomendacoesSaude') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('diagnosticoSaude') ? ' has-error' : '' }}"
                                     id="login-card">
                                    <label for="diagnosticoSaude" class="col-md-12 control-label">Tem diagnóstico da
                                        área da saúde que indica surdez, deficiência visual, física ou intelectual ou
                                        transtorno global de desenvolvimento? Se sim, qual a data e o resultado do
                                        diagnóstico? Se não,
                                        qual é a situação do estudante quanto ao diagnóstico? <font
                                                color="red">*</font></label>

                                    <div class="col-md-12" id="login-card">
                    <textarea name="diagnosticoSaude"
                              style="width:100%; min-width: 100%; max-width: 100%;min-height: 50px;"
                              id="diagnosticoSaude" type="text"
                              class="form-control">@if($pdi != null) {{$pdi->diagnosticoSaude}} @else {{old('diagnosticoSaude')}} @endif</textarea>

                                        @if ($errors->has('diagnosticoSaude'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('diagnosticoSaude') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('problemasSaude') ? ' has-error' : '' }}"
                                     id="login-card">
                                    <label for="problemasSaude" class="col-md-12 control-label">Tem outros problemas
                                        de
                                        saúde? Se sim, quais? Faz uso de medicamentos controlados? <font
                                                color="red">*</font></label>

                                    <div class="col-md-12" id="login-card">
                    <textarea name="problemasSaude"
                              style="width:100%; min-width: 100%; max-width: 100%;min-height: 50px;"
                              id="problemasSaude" type="text"
                              class="form-control">@if($pdi != null) {{$pdi->problemasSaude}} @else {{old('problemasSaude')}} @endif</textarea>

                                        @if ($errors->has('problemasSaude'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('problemasSaude') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('descricaoMedicamentos') ? ' has-error' : '' }}"
                                     id="login-card">
                                    <label for="descricaoMedicamentos" class="col-md-12 control-label">Se sim, quais? O
                                        medicamento interfere no processo de aprendizagem? Explique</label>

                                    <div class="col-md-12" id="login-card">
                    <textarea name="descricaoMedicamentos"
                              style="width:100%; min-width: 100%; max-width: 100%;min-height: 50px;"
                              id="descricaoMedicamentos" type="text"
                              class="form-control">@if($pdi != null) {{$pdi->descricaoMedicamentos}} @else {{old('descricaoMedicamentos')}} @endif</textarea>
                                        <br>
                                        @if ($errors->has('descricaoMedicamentos'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('descricaoMedicamentos') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>

                                <h3>
                                    <strong>Especificidades Educacionais do Estudante</strong>
                                </h3>
                                Caso o estudante apresente alguma especificidade, descreva:

                                <hr style="border-top: 1px solid #AAA;">

                                <div class="form-group{{ $errors->has('sistemaLinguistico') ? ' has-error' : '' }}"
                                     id="login-card">
                                    <label for="sistemaLinguistico" class="col-md-12 control-label">Sistema linguístico
                                        utilizado pelo estudante na sua comunicação <font
                                                color="red">*</font></label>

                                    <div class="col-md-12" id="login-card">
                                        <input name="sistemaLinguistico"
                                               id="sistemaLinguistico" type="text"
                                               class="form-control"
                                               value="@if($pdi != null) {{$pdi->sistemaLinguistico}} @else {{old('sistemaLinguistico')}} @endif"> </input>

                                        @if ($errors->has('sistemaLinguistico'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('sistemaLinguistico') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('tipoRecursoUsado') ? ' has-error' : '' }}"
                                     id="login-card">
                                    <label for="tipoRecursoUsado" class="col-md-12 control-label">Tipo de recurso e/ou
                                        equipamento já utilizado pelo estudante <font
                                                color="red">*</font></label>

                                    <div class="col-md-12" id="login-card">
                                        <input name="tipoRecursoUsado"
                                               id="tipoRecursoUsado" type="text"
                                               class="form-control"
                                               value="@if($pdi != null) {{$pdi->tipoRecursoUsado}} @else {{old('tipoRecursoUsado')}} @endif"></input>

                                        @if ($errors->has('tipoRecursoUsado'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('tipoRecursoUsado') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('tipoRecursoProvidenciado') ? ' has-error' : '' }}"
                                     id="login-card">
                                    <label for="tipoRecursoProvidenciado" class="col-md-12 control-label">Tipo de
                                        recurso e/ou equipamento que precisa ser providenciado para o estudante <font
                                                color="red">*</font></label>

                                    <div class="col-md-12" id="login-card">
                                        <input name="tipoRecursoProvidenciado"
                                               id="tipoRecursoProvidenciado" type="text"
                                               class="form-control"
                                               value="@if($pdi != null) {{$pdi->tipoRecursoProvidenciado}} @else {{old('tipoRecursoProvidenciado')}} @endif"></input>

                                        @if ($errors->has('tipoRecursoProvidenciado'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('tipoRecursoProvidenciado') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('implicacoesEspecificidades') ? ' has-error' : '' }}"
                                     id="login-card">
                                    <label for="implicacoesEspecificidades" class="col-md-12 control-label">Implicações
                                        das especificidades do estudante para a acessibilidade curricular <font
                                                color="red">*</font></label>

                                    <div class="col-md-12" id="login-card">
                    <textarea name="implicacoesEspecificidades"
                              style="width:100%; min-width: 100%; max-width: 100%;min-height: 50px;"
                              id="implicacoesEspecificidades" type="text"
                              class="form-control">@if($pdi != null) {{$pdi->implicacoesEspecificidades}} @else {{old('implicacoesEspecificidades')}} @endif</textarea>

                                        @if ($errors->has('implicacoesEspecificidades'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('implicacoesEspecificidades') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('informacoesRelevantes') ? ' has-error' : '' }}"
                                     id="login-card">
                                    <label for="informacoesRelevantes" class="col-md-12 control-label">Outras
                                        informações relevantes</label>

                                    <div class="col-md-12" id="login-card">
                    <textarea name="informacoesRelevantes"
                              style="width:100%; min-width: 100%; max-width: 100%;min-height: 50px;"
                              id="informacoesRelevantes" type="text"
                              class="form-control">@if($pdi != null) {{$pdi->informacoesRelevantes}} @else {{old('informacoesRelevantes')}} @endif</textarea>

                                        <br>
                                        @if ($errors->has('informacoesRelevantes'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('informacoesRelevantes') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>

                                <h3>
                                    <strong>Funçao Motora Desenvolvimento e Capacidade Motora</strong>
                                </h3>
                                Considerar as potencialidades e dificuldades.

                                <hr style="border-top: 1px solid #AAA;">

                                <div class="form-group{{ $errors->has('avaliacaoMotora') ? ' has-error' : '' }}"
                                     id="login-card">
                                    <label for="avaliacaoMotora" class="col-md-12 control-label">Ao avaliar o estudante,
                                        considere os seguintes aspectos: postura, locomoção, manipulação de
                                        objetos e combinação de movimentos, lateralidade, equilíbrio, orientação espaço
                                        temporal,
                                        coordenação motora <font
                                                color="red">*</font></label>

                                    <div class="col-md-12" id="login-card">
                    <textarea name="avaliacaoMotora"
                              style="width:100%; min-width: 100%; max-width: 100%;min-height: 50px;"
                              id="avaliacaoMotora" type="text"
                              class="form-control">@if($pdi != null) {{$pdi->avaliacaoMotora}} @else {{old('avaliacaoMotora')}} @endif</textarea>

                                        @if ($errors->has('avaliacaoMotora'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('avaliacaoMotora') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('avaliacaoEmocional') ? ' has-error' : '' }}"
                                     id="login-card">
                                    <label for="avaliacaoEmocional" class="col-md-12 control-label">Ao avaliar o aluno,
                                        considere os seguintes aspectos: estado emocional, reação à frustração,
                                        isolamento, medos; interação grupal, cooperação, afetividade. Observações:
                                        FUNÇÃO PESSOAL/
                                        SOCIAL ÁREA EMOCIONAL – AFETIVA – SOCIAL (considerar as potencialidades e
                                        dificuldades) <font
                                                color="red">*</font></label>

                                    <div class="col-md-12" id="login-card">
                    <textarea name="avaliacaoEmocional"
                              style="width:100%; min-width: 100%; max-width: 100%;min-height: 50px;"
                              id="avaliacaoEmocional" type="text"
                              class="form-control">@if($pdi != null) {{$pdi->avaliacaoEmocional}} @else{{old('avaliacaoEmocional')}} @endif</textarea>

                                        @if ($errors->has('avaliacaoEmocional'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('avaliacaoEmocional') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('especificidadesObjetivo') ? ' has-error' : '' }}"
                                     id="login-card">
                                    <label for="especificidadesObjetivo" class="col-md-12 control-label">Com base nas
                                        potencialidades e considerando as dificuldades apresentadas pelo estudante,
                                        indicar
                                        quais são as especificidades que constituem os objetivos do planejamento
                                        pedagógico no AEE <font
                                                color="red">*</font></label>

                                    <div class="col-md-12" id="login-card">
                    <textarea name="especificidadesObjetivo"
                              style="width:100%; min-width: 100%; max-width: 100%;min-height: 50px;"
                              id="especificidadesObjetivo" type="text"
                              class="form-control">@if($pdi != null) {{$pdi->especificidadesObjetivo}} @else{{old('especificidadesObjetivo')}} @endif</textarea>

                                        <br>
                                        @if ($errors->has('especificidadesObjetivo'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('especificidadesObjetivo') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group" id="login-card">
                                    <div class="row col-md-12 text-center" id="login-card">
                                        <br>
                                        <a class="btn btn-secondary"
                                           href="{{route('pdi.listar', ['id_aluno'=>$aluno->id])}}"
                                           id="menu-a">
                                            Voltar
                                        </a>
                                        <button type="submit" class="btn btn-primary">
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

    <script type="text/javascript">
        $('#summer').summernote({
            lang: 'pt-BR',
            tabsize: 2,
            height: 100
        });
    </script>

    <script src="{{ asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-filestyle.min.js')}}"></script>

@endsection
