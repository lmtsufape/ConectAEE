@extends('layouts.app')
@section('title','Editar aluno')
@section('path','Início')

@section('navbar')
@endsection

@section('content')
<div class="container" style="color: #12583C">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default" style="margin-top: -20px; padding: 10px 20px;" id="login-card">
        <div class="panel panel-default">
          <div class="panel-heading" id="login-card">
            <h2>
              <strong style="color: #12583C">
                Editar Aluno
              </strong>
              <div style="font-size: 14px" id="login-card">
                <a href="{{route('aluno.listar')}}">Início</a>
                > <a href="{{route('aluno.gerenciar',$aluno->id)}}">Perfil de <strong>{{ explode(" ", $aluno->nome)[0]}}</strong></a>
              </div>
            </h2>

            <hr style="border-top: 1px solid #AAA;">
          </div>

          <div class="panel-body panel-body-cadastro" id="login-card">
            <div class="col-md-8 col-md-offset-2" id="login-card">
              <form method="POST" action="{{ route("aluno.atualizar") }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <input type="hidden" name="id_aluno" value="{{ $aluno->id }}">
                <input type="hidden" name="id_endereco" value="{{ $endereco->id }}">

                @if(count($instituicoes) != 0)
                  <h3>
                    <strong>
                      Instituição
                    </strong>
                  </h3>

                  <hr style="border-top: 1px solid #AAA;">

                  <div class="form-group{{ $errors->has('instituicoes') ? ' has-error' : '' }}" id="login-card">
                    <label for="instituicoes" class="col-md-12 control-label">Instituição(ões) vinculada(s) ao aluno<font color="red">*</font> </label>

                    <div class="col-md-12" id="login-card">
                      <select class="form-control js-example-basic-multiple" name="instituicoes[]" multiple="multiple" autofocus>
                        @if(old("instituicoes.0") != null )
                          @foreach ($instituicoes as $instituicao)
                            @php($selected = false)

                            @for ($i=0; $i < count($instituicoes) ; $i++) {
                              @if(old("instituicoes.".$i) == $instituicao->id)
                                @php($selected = true)
                                @break
                              @endif
                            @endfor

                            @if($selected)
                              <option value="{{$instituicao->id}}" selected> {{$instituicao->nome}}, {{ $instituicao->endereco->cep }}, {{ $instituicao->endereco->rua }}, {{ $instituicao->endereco->cidade }} - {{ $instituicao->endereco->estado }} </option>
                            @else
                              <option value="{{$instituicao->id}}">{{$instituicao->nome}}, {{ $instituicao->endereco->cep }}, {{ $instituicao->endereco->rua }}, {{ $instituicao->endereco->cidade }} - {{ $instituicao->endereco->estado }} </option>
                            @endif
                          @endforeach
                        @else
                          @foreach ($instituicoes as $instituicao)
                            @php($selected = false)

                            @foreach ($aluno->instituicoes as $instituicaoAluno)
                              @if ($instituicaoAluno->id == $instituicao->id)
                                @php($selected = true)
                                @break
                              @endif
                            @endforeach

                            @if($selected)
                              <option value="{{$instituicao->id}}" selected> {{$instituicao->nome}}, {{ $instituicao->endereco->cep }}, {{ $instituicao->endereco->rua }}, {{ $instituicao->endereco->cidade }} - {{ $instituicao->endereco->estado }} </option>
                            @else
                              <option value="{{$instituicao->id}}">{{$instituicao->nome}}, {{ $instituicao->endereco->cep }}, {{ $instituicao->endereco->rua }}, {{ $instituicao->endereco->cidade }} - {{ $instituicao->endereco->estado }} </option>
                            @endif
                          @endforeach
                        @endif
                      </select>

                      @if ($errors->has("instituicoes"))
                        <span class="help-block">
                          <strong>{{ $errors->first("instituicoes") }}</strong>
                        </span>
                      @endif

                    </div>
                  </div>

                  <div class="form-group" id="login-card">
                    <div class="col-md-12 col-md-offset-5" id="login-card">
                      Instituição não encontrada? &nbsp;
                      <a class="btn btn-primary" href="{{ route("instituicao.cadastrar") }}">Cadastre</a>
                    </div>
                  </div>

                  <h3>
                    <strong>
                      Identificação do Aluno
                    </strong>
                  </h3>

                  <hr style="border-top: 1px solid #AAA;">

                  <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}" id="login-card">
                    <label for="nome" class="col-md-12 control-label"> Nome<font color="red">*</font></label>

                    <div class="col-md-12" id="login-card">

                      @if(old('nome',NULL) != NULL)
                        <input id="nome" type="text" class="form-control" name="nome" value="{{ old('nome') }}">
                      @else
                        <input id="nome" type="text" class="form-control" name="nome" value="{{ $aluno->nome }}">
                      @endif

                      @if ($errors->has('nome'))
                        <span class="help-block">
                          <strong>{{ $errors->first('nome') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group{{ $errors->has('imagem') ? ' has-error' : '' }}" id="login-card">

                    <label for="imagem" class="col-md-12 control-label" >Foto de perfil</label>

                    <div class="col-md-12" id="login-card">

                      <!-- @if($aluno->imagem != null)
                        <img style="object-fit: cover;" src="{{asset('storage/avatars/'.$aluno->imagem)}}" height="64" width="64" >
                      @endif -->

                      <input id="imagem" type="file" class="filestyle" name="imagem" data-placeholder="Nenhum arquivo" data-text="Selecionar" data-btnClass="btn btn-primary">

                      @if ($errors->has('imagem'))
                        <span class="help-block">
                          <strong>{{ $errors->first('imagem') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>

                  <div class="row" style="padding:0px" id="login-card">
                    <div class="col-md-12" style="padding:0px" id="login-card">
                      <div class="col-md-6" id="login-card">
                        <div class="form-group{{ $errors->has('data_nascimento') ? ' has-error' : '' }}" id="login-card">
                          <label for="data_nascimento" class="col-md-12 control-label">Data de nascimento<font color="red">*</font> </label>
                          <div class="col-md-12" id="login-card">

                            @if(old('data_nascimento',NULL) != NULL)
                              <input id="data_nascimento" type="date" class="form-control" name="data_nascimento" value="{{ old('data_nascimento') }}">
                            @else
                              <input id="data_nascimento" type="date" class="form-control" name="data_nascimento" value="{{ $aluno->getData() }}">
                            @endif

                            @if ($errors->has('data_nascimento'))
                              <span class="help-block">
                                <strong>{{ $errors->first('data_nascimento') }}</strong>
                              </span>
                            @endif
                          </div>
                        </div>

                      </div>

                      <div class="col-md-6" id="login-card">
                        <div class="form-group{{ $errors->has('sexo') ? ' has-error' : '' }}" id="login-card">

                          <label for="sexo" class="col-md-12 control-label">Sexo<font color="red">*</font> </label>

                          <div class="col-md-12" id="login-card">

                            @if(old('sexo') == 'M' || (old('sexo', NULL) == NULL && $aluno->sexo == 'M'))
                              <input type="radio" id="sexo1" name="sexo" value="M" checked="checked">
                            @else
                              <input type="radio" id="sexo1" name="sexo" value="M">
                            @endif

                            <label class="custom-control-label" for="sexo1">Masculino</label>

                            @if(old('sexo') == 'F' || (old('sexo', NULL) == NULL && $aluno->sexo == 'F'))
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

                      </div>
                    </div>
                  </div>

                  <h3>
                    <strong>
                      Endereço da Moradia do Aluno
                    </strong>
                  </h3>

                  <hr style="border-top: 1px solid #AAA;">

                  <div class="row" style="padding:0px" id="login-card">
                    <div class="col-md-12" style="padding:0px" id="login-card">
                      <div class="col-md-4" id="login-card">
                        <div class="form-group{{ $errors->has('cep') ? ' has-error' : '' }}" id="login-card">
                          <label for="cep" class="col-md-12 control-label">CEP<font color="red">*</font></label>

                          <div class="col-md-12" id="login-card">

                            @if(old('cep',NULL) != NULL)
                              <input id="cep" onblur="pesquisacep(this.value);" type="text" class="form-control" name="cep" value="{{ old('cep') }}">
                            @else
                              <input id="cep" onblur="pesquisacep(this.value);" type="text" class="form-control" name="cep" value="{{ $endereco->cep }}">
                            @endif

                            @if ($errors->has('cep'))
                            <span class="help-block">
                              <strong>{{ $errors->first('cep') }}</strong>
                            </span>
                            @endif
                          </div>
                        </div>
                      </div>  
                      <div class="col-md-4" id="login-card">
                        <div class="form-group{{ $errors->has('rua') ? ' has-error' : '' }}" id="login-card">
                          <label for="rua" class="col-md-12 control-label">Rua<font color="red">*</font></label>

                          <div class="col-md-12" id="login-card">

                            @if(old('rua',NULL) != NULL)
                              <input id="rua" type="text" class="form-control" name="rua" value="{{ old('rua') }}">
                            @else
                              <input id="rua" type="text" class="form-control" name="rua" value="{{ $endereco->rua }}">
                            @endif

                            @if ($errors->has('rua'))
                              <span class="help-block">
                                <strong>{{ $errors->first('rua') }}</strong>
                              </span>
                            @endif
                          </div>
                        </div>
                      </div>

                      <div class="col-md-4" id="login-card">
                        <div class="form-group{{ $errors->has('numero') ? ' has-error' : '' }}" id="login-card">
                          <label for="numero" class="col-md-12 control-label">Número<font color="red">*</font> </label>

                          <div class="col-md-12" id="login-card">

                            @if(old('numero',NULL) != NULL)
                              <input id="numero" type="text" class="form-control" name="numero" value="{{ old('numero') }}">
                            @else
                              <input id="numero" type="text" class="form-control" name="numero" value="{{ $endereco->numero }}">
                            @endif

                            @if ($errors->has('numero'))
                              <span class="help-block">
                                <strong>{{ $errors->first('numero') }}</strong>
                              </span>
                            @endif
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row" style="padding:0px" id="login-card">
                    <div class="col-md-12" style="padding:0px" id="login-card">
                      <div class="col-md-4" id="login-card">
                        <div class="form-group{{ $errors->has('bairro') ? ' has-error' : '' }}" id="login-card">
                          <label for="bairro" class="col-md-12 control-label">Bairro<font color="red">*</font></label>

                          <div class="col-md-12" id="login-card">

                            @if(old('bairro',NULL) != NULL)
                              <input id="bairro" type="text" class="form-control" name="bairro" value="{{ old('bairro') }}">
                            @else
                              <input id="bairro" type="text" class="form-control" name="bairro" value="{{ $endereco->bairro }}">
                            @endif

                            @if ($errors->has('bairro'))
                              <span class="help-block">
                                <strong>{{ $errors->first('bairro') }}</strong>
                              </span>
                            @endif
                          </div>
                        </div>
                      </div>

                      <div class="col-md-4" id="login-card">
                        <div class="form-group{{ $errors->has('estado') ? ' has-error' : '' }}" id="login-card">
                          <label for="estado" class="col-md-12 control-label">Estado<font color="red">*</font> </label>

                          <div class="col-md-12" id="login-card">
                            <select id="estado" class="form-control" name="estado" data-target="#cidade">
                              <option value="" selected hidden>-- UF --</option>
                              <option @if($endereco->estado == 'AC') selected @endif value="AC">Acre</option>
                              <option @if($endereco->estado == 'AL') selected @endif value="AL">Alagoas</option>
                              <option @if($endereco->estado == 'AP') selected @endif value="AP">Amapá</option>
                              <option @if($endereco->estado == 'AM') selected @endif value="AM">Amazonas</option>
                              <option @if($endereco->estado == 'BA') selected @endif value="BA">Bahia</option>
                              <option @if($endereco->estado == 'CE') selected @endif value="CE">Ceará</option>
                              <option @if($endereco->estado == 'DF') selected @endif value="DF">Distrito Federal</option>
                              <option @if($endereco->estado == 'ES') selected @endif value="ES">Espírito Santo</option>
                              <option @if($endereco->estado == 'GO') selected @endif value="GO">Goiás</option>
                              <option @if($endereco->estado == 'MA') selected @endif value="MA">Maranhão</option>
                              <option @if($endereco->estado == 'MT') selected @endif value="MT">Mato Grosso</option>
                              <option @if($endereco->estado == 'MS') selected @endif value="MS">Mato Grosso do Sul</option>
                              <option @if($endereco->estado == 'MG') selected @endif value="MG">Minas Gerais</option>
                              <option @if($endereco->estado == 'PA') selected @endif value="PA">Pará</option>
                              <option @if($endereco->estado == 'PB') selected @endif value="PB">Paraíba</option>
                              <option @if($endereco->estado == 'PR') selected @endif value="PR">Paraná</option>
                              <option @if($endereco->estado == 'PE') selected @endif value="PE">Pernambuco</option>
                              <option @if($endereco->estado == 'PI') selected @endif value="PI">Piauí</option>
                              <option @if($endereco->estado == 'RJ') selected @endif value="RJ">Rio de Janeiro</option>
                              <option @if($endereco->estado == 'RN') selected @endif value="RN">Rio Grande do Norte</option>
                              <option @if($endereco->estado == 'RS') selected @endif value="RS">Rio Grande do Sul</option>
                              <option @if($endereco->estado == 'RO') selected @endif value="RO">Rondônia</option>
                              <option @if($endereco->estado == 'RR') selected @endif value="RR">Roraima</option>
                              <option @if($endereco->estado == 'SC') selected @endif value="SC">Santa Catarina</option>
                              <option @if($endereco->estado == 'SP') selected @endif value="SP">São Paulo</option>
                              <option @if($endereco->estado == 'SE') selected @endif value="SE">Sergipe</option>
                              <option @if($endereco->estado == 'TO') selected @endif value="TO">Tocantins</option>
                            </select>

                            @if ($errors->has('estado'))
                            <span class="help-block">
                              <strong>{{ $errors->first('estado') }}</strong>
                            </span>
                            @endif
                          </div>
                        </div>
                      </div>

                      <div class="col-md-4" id="login-card">
                        <div class="form-group{{ $errors->has('cidade') ? ' has-error' : '' }}" id="login-card">
                          <label for="cidade" class="col-md-12 control-label">Cidade<font color="red">*</font> </label>

                          <div class="col-md-12" id="login-card">

                            <input id="cidade" class="form-control" name="cidade" value="{{ $endereco->cidade }}">
                              
                            @if ($errors->has('cidade'))
                            <span class="help-block">
                              <strong>{{ $errors->first('cidade') }}</strong>
                            </span>
                            @endif
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <h3>
                    <strong>
                      Dados Médicos do Aluno
                    </strong>
                  </h3>

                  <hr style="border-top: 1px solid #AAA;">

                  <div class="form-group{{ $errors->has('cid') ? ' has-error' : '' }}" id="login-card">
                    <label for="cid" class="col-md-12 control-label">CID</label>

                    <div class="col-md-12" id="login-card">

                      @if(old('cid',NULL) != NULL)
                        <input id="cid" type="text" class="form-control" placeholder="X000" name="cid" value="{{ old('cid') }}">
                      @else
                        <input id="cid" type="text" class="form-control" placeholder="X000" name="cid" value="{{ $aluno->cid }}">
                      @endif

                      @if ($errors->has('cid'))
                        <span class="help-block">
                          <strong>{{ $errors->first('cid') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group{{ $errors->has('descricaoCid') ? ' has-error' : '' }}" id="login-card">
                    <label for="descricaoCid" class="col-md-12 control-label">Descrição do CID</label>

                    <div class="col-md-12" id="login-card">

                      @if(old('descricaoCid',NULL) != NULL)
                        <input id="descricaoCid" type="text" class="form-control" name="descricaoCid" value="{{ old('descricaoCid') }}">
                      @else
                        <input id="descricaoCid" type="text" class="form-control" name="descricaoCid" value="{{ $aluno->descricao_cid }}">
                      @endif

                      @if ($errors->has('descricaoCid'))
                        <span class="help-block">
                          <strong>{{ $errors->first('descricaoCid') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group{{ $errors->has('observacao') ? ' has-error' : '' }}" id="login-card">
                    <label for="observacao" class="col-md-12 control-label">Outras observações</label>

                    <div class="col-md-12" id="login-card">

                      @if(old('observacao',NULL) != NULL)
                        <textarea name="observacao" style="width:100%; min-width: 100%; max-width: 100%;min-height: 50px; display: inline" id="" type="text" class="form-control summernote">{{old('observacao')}}
                        </textarea>
                      @else
                        <textarea name="observacao" style="width:100%; min-width: 100%; max-width: 100%;min-height: 50px; display: inline" id="" type="text" class="form-control summernote">{{$aluno->observacao}}
                        </textarea>
                      @endif

                      <br>

                      @if ($errors->has('observacao'))
                        <span class="help-block">
                          <strong>{{ $errors->first('observacao') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group" id="login-card">
                    <div class="row col-md-12 text-center" id="login-card">
                      <br>
                      <a class="btn btn-secondary" href="{{route('aluno.gerenciar',$aluno->id)}}#perfil" id="menu-a">
                        Voltar
                      </a>
                      <button type="submit" class="btn btn-primary">
                        Atualizar
                      </button>
                    </div>
                  </div>
                @else
                  <div class="alert alert-info" id="login-card">
                    <center>
                      <h3>
                        Cadastre uma instituicão para seguir com o cadastro de aluno.
                        <br><br>
                        <a class="btn btn-primary" style="width:160px" href="{{ route("instituicao.cadastrar") }}">Cadastrar Instituição</a>
                      </h3>
                    </center>
                  </div>
                @endif
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
<script type="text/javascript">
$(document).ready(function() {
  $('.js-example-basic-multiple').select2();
});
</script>

  <script>
    $(function(){
      var dtToday = new Date();

      var month = dtToday.getMonth() + 1;
      var day = dtToday.getDate();
      var year = dtToday.getFullYear();

      if(month < 10)
        month = '0' + month.toString();
      if(day < 10)
        day = '0' + day.toString();

      var maxDate = year + '-' + month + '-' + day;
      $('#data_nascimento').attr('max', maxDate);
    });
  </script>

<script>
// var estados = [];

// function loadEstados(element) {
//   if (estados.length > 0) {
//     putEstados(element);
//     $(element).removeAttr('disabled');
//   } else {
//     $.ajax({
//       url: 'https://api.myjson.com/bins/enzld',
//       method: 'get',
//       dataType: 'json',
//       beforeSend: function() {
//         $(element).html('<option>Carregando...</option>');
//       }
//     }).done(function(response) {
//       estados = response.estados;
//       putEstados(element);
//       $(element).removeAttr('disabled');
//     });
//   }
// }

// function putEstados(element) {
//   var oldEstado = "{{old('estado')}}";
//   var instEstado = "{{$endereco->estado}}";

//   var label = $(element).data('label');
//   label = label ? label : 'Estado';

//   var estadoAtual;

//   var options = '<option value="">' + label + '</option>';
//   for (var i in estados) {
//     var estado = estados[i];

//     if((estado.sigla == instEstado && oldEstado == "") || estado.sigla == oldEstado){
//       estadoAtual = estado.sigla;
//       options += '<option selected value="' + estado.sigla + '">' + estado.nome + '</option>';
//     }else{
//       options += '<option value="' + estado.sigla + '">' + estado.nome + '</option>';
//     }
//   }

//   var target = $(element).data('target');

//   if (target) {
//     loadCidades(target, estadoAtual);
//   }

//   $(element).html(options);
// }

// function loadCidades(element, estado_sigla) {
//   if (estados.length > 0) {
//     putCidades(element, estado_sigla);
//     $(element).removeAttr('disabled');
//   } else {
//     $.ajax({
//       url: theme_url + '/assets/json/estados.json',
//       method: 'get',
//       dataType: 'json',
//       beforeSend: function() {
//         $(element).html('<option>Carregando...</option>');
//       }
//     }).done(function(response) {
//       estados = response.estados;
//       putCidades(element, estado_sigla);
//       $(element).removeAttr('disabled');
//     });
//   }
// }

// function putCidades(element, estado_sigla) {
//   var label = $(element).data('label');
//   label = label ? label : 'Cidade';

//   var oldCidade = "{{old('cidade')}}";
//   var instCidade = "{{$endereco->cidade}}"

//   var options = '<option value="">' + label + '</option>';
//   for (var i in estados) {
//     var estado = estados[i];
//     if (estado.sigla != estado_sigla)
//     continue;
//     for (var j in estado.cidades) {
//       var cidade = estado.cidades[j];

//       if((cidade == instCidade && oldCidade == "") || cidade == oldCidade){
//         options += '<option selected value="' + cidade + '">' + cidade + '</option>';
//       }else {
//         options += '<option value="' + cidade + '">' + cidade + '</option>';
//       }
//     }
//   }
//   $(element).html(options);
// }

// document.addEventListener('DOMContentLoaded', function() {
//   loadEstados('#estado');

//   $(document).on('change', '#estado', function(e) {
//     var target = $(this).data('target');
//     if (target) {
//       loadCidades(target, $(this).val());
//     }
//   });
// }, false);

 
function limpa_formulário_cep() {
        //Limpa valores do formulário de cep.
        document.getElementById('rua').value=("");
        document.getElementById('bairro').value=("");
        document.getElementById('cidade').value=("");
        document.getElementById('estado').value=("");
}

function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById('rua').value=(conteudo.logradouro);
        document.getElementById('bairro').value=(conteudo.bairro);
        document.getElementById('cidade').value=(conteudo.localidade);
        document.getElementById('estado').value=(conteudo.uf);

    } //end if.
    else {
        //CEP não Encontrado.
        limpa_formulário_cep();
        alert("CEP não encontrado.");
    }
}

function pesquisacep(valor) {

    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if(validacep.test(cep)) {

            //Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById('rua').value="...";
            document.getElementById('bairro').value="...";
            document.getElementById('cidade').value="...";
            document.getElementById('estado').value="...";

            //Cria um elemento javascript.
            var script = document.createElement('script');

            //Sincroniza com o callback.
            script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);

        } //end if.
        else {
            //cep é inválido.
            limpa_formulário_cep();
            alert("Formato de CEP inválido.");
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpa_formulário_cep();
    }
};


</script>

<script src="{{ asset('js/bootstrap-filestyle.min.js')}}"> </script>

@endsection
