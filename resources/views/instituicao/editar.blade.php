@extends('layouts.principal')
@section('title','Editar instituição')
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
              Editar Instituição
            </strong>
            <div style="font-size: 14px" id="login-card">
              <a href="{{route('aluno.listar')}}">Início</a>
              > <a href="{{route('instituicao.listar')}}">Instituições</a>
              > Nova Instituição
            </div>
          </h2>

          <hr style="border-top: 1px solid #AAA;">
        </div>

        <div class="panel-body panel-body-cadastro" id="login-card">
          <div class="col-md-8 col-md-offset-2" id="login-card">
            <form method="POST" action="{{ route("instituicao.atualizar") }}">
              {{ csrf_field() }}

              <input type="hidden" name="id_instituicao" value="{{ $instituicao->id }}">
              <input type="hidden" name="id_endereco" value="{{ $endereco->id }}">

              <h3>
                <strong>
                  Dados Instituicionais:
                </strong>
              </h3>

              <hr style="border-top: 1px solid #AAA;">

              <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}" id="login-card">
                <label for="nome" class="col-md-12 control-label"> Nome <font color="red">*</font>
                </label>

                <div class="col-md-12" id="login-card">

                  @if(old('nome',NULL) != NULL)
                    <input id="nome" type="text" class="form-control" name="nome" value="{{ old('nome') }}" autofocus>
                  @else
                    <input id="nome" type="text" class="form-control" name="nome" value="{{ $instituicao->nome }}" autofocus>
                  @endif

                  @if ($errors->has('nome'))
                    <span class="help-block">
                      <strong>{{ $errors->first('nome') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="row" style="padding:0px" id="login-card">
                <div class="col-md-12" style="padding:0px" id="login-card">
                  <div class="col-md-6" id="login-card">
                    <div class="form-group{{ $errors->has('telefone') ? ' has-error' : '' }}" id="login-card">
                      <label for="telefone" class="col-md-12 control-label">Telefone <font color="red">*</font> </label>

                      <div class="col-md-12" id="login-card">

                        @if(old('telefone',NULL) != NULL)
                          <input id="telefone" type="digit" class="form-control" name="telefone" minlength="10" placeholder="DDD+Telefone" maxlength="11" value="{{ old('telefone') }}">
                        @else
                          <input id="telefone" type="digit" class="form-control" name="telefone" minlength="10" placeholder="DDD+Telefone" maxlength="11" value="{{ $instituicao->telefone }}">
                        @endif

                        @if ($errors->has('telefone'))
                          <span class="help-block">
                            <strong>{{ $errors->first('telefone') }}</strong>
                          </span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6" id="login-card">
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" id="login-card">
                      <label for="email" class="col-md-12 control-label">E-Mail</label>

                      <div class="col-md-12" id="login-card">

                        @if(old('email',NULL) != NULL)
                          <input id="email" class="form-control" name="email" value="{{ old('email') }}">
                        @else
                          <input id="email" class="form-control" name="email" value="{{ $instituicao->email }}">
                        @endif

                        @if ($errors->has('email'))
                          <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                          </span>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <h3>
                <strong>
                  Endereço
                </strong>
              </h3>

              <hr style="border-top: 1px solid #AAA;">

              <div class="row" style="padding:0px" id="login-card">
                <div class="col-md-12" style="padding:0px" id="login-card">
                  <div class="col-md-3" id="login-card">
                    <div class="form-group{{ $errors->has('cep') ? ' has-error' : '' }}" id="login-card">
                      <label for="cep" class="col-md-12 control-label">Cep <font color="red">*</font></label>

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
                  <div class="col-md-5" id="login-card">
                    <div class="form-group{{ $errors->has('rua') ? ' has-error' : '' }}" id="login-card">
                      <label for="rua" class="col-md-12 control-label">Rua <font color="red">*</font></label>

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
                      <label for="numero" class="col-md-12 control-label">Número <font color="red">*</font> </label>

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
                      <label for="bairro" class="col-md-12 control-label">Bairro <font color="red">*</font></label>

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
                      <label for="estado" class="col-md-12 control-label">Estado <font color="red">*</font> </label>

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
                      <label for="cidade" class="col-md-12 control-label">Cidade <font color="red">*</font> </label>

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

              <div class="form-group" id="login-card">
                <div class="row col-md-12 text-center" id="login-card">
                  <br>
                  <a class="btn btn-secondary" href="{{route('instituicao.listar')}}" id="menu-a">
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
      </div>
    </div>
  </div>
</div>

<script src="{{ asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{ asset('js/select2.min.js') }}"></script>
<script type="text/javascript">
$(document).ready(function() {
  $('.js-example-basic-multiple').select2();
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
@endsection
