@extends('layouts.principal')
@section('title','Cadastrar aluno')
@section('path','Início')

@section('navbar')
<a href="{{route('aluno.listar')}}">Início</a> > Novo Aluno
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h2>
            <strong>
              Novo Aluno
            </strong>
          </h2>

          <hr style="border-top: 1px solid black;">
        </div>

        <div class="panel-body panel-body-cadastro">
          <div class="col-md-8 col-md-offset-2">
            <form method="POST" action="{{ route("aluno.criar") }}" enctype="multipart/form-data">

              {{ csrf_field() }}

              @if(\Session::has('cpf'))

                <h3>
                  <strong>
                    Instituição
                  </strong>
                </h3>

                <hr style="border-top: 1px solid black;">

                <div class="form-group{{ $errors->has('instituicoes') ? ' has-error' : '' }}">
                  <label for="instituicoes" class="col-md-12 control-label">Instituição(ões) <font color="red">*</font> </label>

                  <div class="col-md-12">
                    <select class="form-control js-example-basic-multiple" name="instituicoes[]" multiple="multiple" autofocus>
                      @foreach ($instituicoes as $instituicao)
                        @php($selected = false)
                        @if(old("instituicoes.0") != null )

                          @for ($i=0; $i < count($instituicoes) ; $i++) {
                            @if(old("instituicoes.".$i) == $instituicao->id)
                              @php($selected = true)
                              @break
                            @endif
                          @endfor

                          @if($selected)
                            <option value="{{$instituicao->id}}" selected> {{$instituicao->nome}}, {{ $instituicao->endereco->logradouro }}, {{ $instituicao->endereco->cidade }} - {{ $instituicao->endereco->estado }} </option>
                          @else
                            <option value="{{$instituicao->id}}">{{$instituicao->nome}}, {{ $instituicao->endereco->logradouro }}, {{ $instituicao->endereco->cidade }} - {{ $instituicao->endereco->estado }} </option>
                          @endif

                        @else
                          <option value="{{$instituicao->id}}">{{$instituicao->nome}}, {{ $instituicao->endereco->logradouro }}, {{ $instituicao->endereco->cidade }} - {{ $instituicao->endereco->estado }} </option>
                        @endif
                      @endforeach
                    </select>

                    @if ($errors->has("instituicoes"))
                      <span class="help-block">
                        <strong>{{ $errors->first("instituicoes") }}</strong>
                      </span>
                    @endif

                  </div>
                </div>

                <h3>
                  <strong>
                    Identificação
                  </strong>
                </h3>

                <hr style="border-top: 1px solid black;">
                <input type="hidden" name="cpf" value="{!! \Session::get('cpf') !!}">

                <div class="form-group{{ $errors->has('cpf') ? ' has-error' : '' }}">
                  <label for="cpf" class="col-md-12 control-label"> CPF <font color="red">*</font></label>

                  <div class="col-md-12">
                    <input id="cpf" type="text" class="form-control" name="cpf" readonly value="{!! \Session::get('cpf') !!}">

                    @if ($errors->has('cpf'))
                      <span class="help-block">
                        <strong>{{ $errors->first('cpf') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>

                <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                  <label for="nome" class="col-md-12 control-label"> Nome <font color="red">*</font></label>

                  <div class="col-md-12">
                    <input id="nome" type="text" class="form-control" name="nome" value="{{ old('nome') }}">

                    @if ($errors->has('nome'))
                      <span class="help-block">
                        <strong>{{ $errors->first('nome') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>

                <div class="form-group{{ $errors->has('imagem') ? ' has-error' : '' }}">
                  <label for="imagem" class="col-md-12 control-label" >Foto de perfil</label>

                  <div class="col-md-12">
                    <input id="imagem" type="file" class="filestyle" name="imagem" data-placeholder="Nenhum arquivo" data-text="Selecionar" data-btnClass="btn btn-primary">

                    @if ($errors->has('imagem'))
                      <span class="help-block">
                        <strong>{{ $errors->first('imagem') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>

                <div class="row" style="padding:0px">
                  <div class="col-md-12" style="padding:0px">
                    <div class="col-md-6">
                      <div class="form-group{{ $errors->has('data_nascimento') ? ' has-error' : '' }}">
                        <label for="data_nascimento" class="col-md-12 control-label">Data de Nascimento <font color="red">*</font> </label>

                        <div class="col-md-12">
                          <input id="data_nascimento" type="date" class="form-control" name="data_nascimento" value="{{ old('data_nascimento') }}">

                          @if ($errors->has('data_nascimento'))
                            <span class="help-block">
                              <strong>{{ $errors->first('data_nascimento') }}</strong>
                            </span>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group{{ $errors->has('sexo') ? ' has-error' : '' }}">

                        <label for="sexo" class="col-md-12 control-label">Sexo <font color="red">*</font> </label>

                        <div class="col-md-12">
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
                    </div>
                  </div>
                </div>

                <h3>
                  <strong>
                    Endereço
                  </strong>
                </h3>

                <hr style="border-top: 1px solid black;">

                <div class="row" style="padding:0px">
                  <div class="col-md-12" style="padding:0px">
                    <div class="col-md-8">
                      <div class="form-group{{ $errors->has('logradouro') ? ' has-error' : '' }}">
                        <label for="logradouro" class="col-md-12 control-label">Logradouro <font color="red">*</font></label>

                        <div class="col-md-12">
                          <input id="logradouro" type="text" class="form-control" name="logradouro" value="{{ old('logradouro') }}">

                          @if ($errors->has('logradouro'))
                          <span class="help-block">
                            <strong>{{ $errors->first('logradouro') }}</strong>
                          </span>
                          @endif
                        </div>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group{{ $errors->has('numero') ? ' has-error' : '' }}">
                        <label for="numero" class="col-md-12 control-label">Número <font color="red">*</font> </label>

                        <div class="col-md-12">
                          <input id="numero" type="text" class="form-control" name="numero" value="{{ old('numero') }}">

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

                <div class="row" style="padding:0px">
                  <div class="col-md-12" style="padding:0px">
                    <div class="col-md-4">
                      <div class="form-group{{ $errors->has('bairro') ? ' has-error' : '' }}">
                        <label for="bairro" class="col-md-12 control-label">Bairro <font color="red">*</font></label>

                        <div class="col-md-12">
                          <input id="bairro" type="text" class="form-control" name="bairro" value="{{ old('bairro') }}">

                          @if ($errors->has('bairro'))
                          <span class="help-block">
                            <strong>{{ $errors->first('bairro') }}</strong>
                          </span>
                          @endif
                        </div>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group{{ $errors->has('estado') ? ' has-error' : '' }}">
                        <label for="estado" class="col-md-12 control-label">Estado <font color="red">*</font> </label>

                        <div class="col-md-12">
                          <select id="estado" class="form-control" name="estado" data-target="#cidade">
                            <option value="">Estado</option>
                          </select>

                          @if ($errors->has('estado'))
                          <span class="help-block">
                            <strong>{{ $errors->first('estado') }}</strong>
                          </span>
                          @endif
                        </div>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group{{ $errors->has('cidade') ? ' has-error' : '' }}">
                        <label for="cidade" class="col-md-12 control-label">Cidade <font color="red">*</font> </label>

                        <div class="col-md-12">
                          <select id="cidade" class="form-control" name="cidade">
                            <option value=""> Cidade </option>
                          </select>

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
                    Dados Médicos
                  </strong>
                </h3>

                <hr style="border-top: 1px solid black;">

                <div class="form-group{{ $errors->has('cid') ? ' has-error' : '' }}">
                  <label for="cid" class="col-md-12 control-label">CID</label>

                  <div class="col-md-12">
                    <input id="cid" type="text" class="form-control" placeholder="X000" name="cid" value="{{ old('cid') }}" autofocus>

                    @if ($errors->has('cid'))
                      <span class="help-block">
                        <strong>{{ $errors->first('cid') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>

                <div class="form-group{{ $errors->has('descricaoCid') ? ' has-error' : '' }}">
                  <label for="descricaoCid" class="col-md-12 control-label">Descrição do CID</label>

                  <div class="col-md-12">
                    <input style="margin-bottom:15px;" id="descricaoCid" type="text" class="form-control" name="descricaoCid" value="{{ old('descricaoCid') }}">

                    @if ($errors->has('descricaoCid'))
                      <span class="help-block">
                        <strong>{{ $errors->first('descricaoCid') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>

                <h3>
                  <strong>
                    Outras Observacões
                  </strong>
                </h3>

                <hr style="border-top: 1px solid black;">

                <div class="form-group{{ $errors->has('observacao') ? ' has-error' : '' }}">
                  <label for="observacao" class="col-md-12 control-label">Observações</label>

                  <div class="col-md-12">
                    <textarea name="observacao" style="width:75%;" id="summer" type="text" class="form-control summernote">
                      {{old('observacao')}}
                    </textarea>

                    <br>

                    @if ($errors->has('observacao'))
                      <span class="help-block">
                        <strong>{{ $errors->first('observacao') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>

                <h3>
                  <strong>
                    Perfil do Cadastrante
                  </strong>
                </h3>

                <hr style="border-top: 1px solid black;">

                <div class="form-group{{ $errors->has('perfil') ? ' has-error' : '' }}">
                  <label for="perfil" class="col-md-12 control-label">Perfil</label>

                  <div class="col-md-12">
                    <select style="margin-bottom:15px;" id="perfil" class="form-control" name="perfil" onchange="showResponsavel(this)">
                      @if (old('perfil') == null)
                        <option id="perfil" selected disabled hidden>Escolha seu perfil</option>
                      @endif

                      @foreach($perfis as $perfil)
                        @if(old('perfil') == $perfil[0])
                          <option value={{$perfil[0]}} selected>{{$perfil[1]}}</option>
                        @else
                          <option value={{$perfil[0]}}>{{$perfil[1]}}</option>
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

                @if(old('perfil') == "2")
                  <div id="div-responsavel" style="display: block;">
                @else
                  <div id="div-responsavel" style="display: none;">
                @endif

                <h3>
                  <strong>
                    Responsável
                  </strong>
                </h3>

                <hr style="border-top: 1px solid black;">

                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                  <label for="username" class="col-md-12 control-label">Nome de Usuário <font color="red">*</font> </label>

                  <div class="col-md-12">
                    <input id="username" autocomplete="off" name="username" type="text" class="form-control" value="{{old('username')}}">

                    @if ($errors->has('username'))
                      <span class="help-block">
                        <strong>{{ $errors->first('username') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>

                <div class="form-group{{ $errors->has('cadastrado') ? ' has-error' : '' }}">
                  <label for="cadastrado" class="col-md-12 control-label">Usuário já cadastrado?</label>

                  <div class="col-md-12">
                    @if(old('cadastrado') == "true")
                      <input type="radio" name="cadastrado" id="sim" value="true" checked>
                    @else
                      <input type="radio" name="cadastrado" id="sim" value="true">
                    @endif

                    <label for="sim">Sim</label>

                    @if(old('cadastrado') == "false" || old('cadastrado') == null)
                      <input type="radio" name="cadastrado" id="nao" value="false" checked>
                    @else
                      <input type="radio" name="cadastrado" id="nao" value="false">
                    @endif

                    <label for="nao">Não</label>

                  </div>
                </div>

                </div>

                <div class="form-group">
                  <div class="row col-md-12 text-center">
                    <br>
                    <a class="btn btn-secondary" href="{{route('aluno.listar')}}">
                      Voltar
                    </a>
                    <button type="submit" class="btn btn-primary">
                      Cadastrar
                    </button>
                  </div>
                </div>
              @else
                <div class="alert alert-info">
                  <center>
                    <h3>
                      Informe o CPF do aluno nesta página primeiro:
                      <a class="btn btn-primary" style="width:160px" href="{{ route("aluno.buscar") }}">Novo Aluno</a>
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
  var estados = [];

  function loadEstados(element) {
    if (estados.length > 0) {
      putEstados(element);
      $(element).removeAttr('disabled');
    } else {
      $.ajax({
        url: 'https://api.myjson.com/bins/enzld',
        method: 'get',
        dataType: 'json',
        beforeSend: function() {
          $(element).html('<option>Carregando...</option>');
        }
      }).done(function(response) {
        estados = response.estados;
        putEstados(element);
        $(element).removeAttr('disabled');
      });
    }
  }

  function putEstados(element) {
    var oldEstado = "{{old('estado')}}";

    var label = $(element).data('label');
    label = label ? label : 'Estado';

    var options = '<option value="">' + label + '</option>';
    for (var i in estados) {
      var estado = estados[i];

      if(estado.sigla == oldEstado){
        options += '<option selected value="' + estado.sigla + '">' + estado.nome + '</option>';
      }else{
        options += '<option value="' + estado.sigla + '">' + estado.nome + '</option>';
      }
    }

    if(oldEstado != ""){
      var target = $(element).data('target');

      if (target) {
        loadCidades(target, oldEstado);
      }
    }

    $(element).html(options);
  }

  function loadCidades(element, estado_sigla) {

    if (estados.length > 0) {
      putCidades(element, estado_sigla);
      $(element).removeAttr('disabled');
    } else {
      $.ajax({
        url: theme_url + '/assets/json/estados.json',
        method: 'get',
        dataType: 'json',
      }).done(function(response) {
        estados = response.estados;
        putCidades(element, estado_sigla);
        $(element).removeAttr('disabled');
      });
      document.write(estados.length);
    }
  }

  function putCidades(element, estado_sigla) {
    var label = $(element).data('label');
    label = label ? label : 'Cidade';

    var oldCidade = "{{old('cidade')}}";

    var options = '<option value="">' + label + '</option>';
    for (var i in estados) {
      var estado = estados[i];
      if (estado.sigla != estado_sigla)
      continue;
      for (var j in estado.cidades) {
        var cidade = estado.cidades[j];

        if (cidade == oldCidade) {
          options += '<option selected value="' + cidade + '">' + cidade + '</option>';
        }else {
          options += '<option value="' + cidade + '">' + cidade + '</option>';
        }
      }
    }
    $(element).html(options);
  }

  document.addEventListener('DOMContentLoaded', function() {
    loadEstados('#estado');

    $(document).on('change', '#estado', function(e) {
      var target = $(this).data('target');
      if (target) {
        loadCidades(target, $(this).val());
      }
    });

  }, false);

</script>

<script src="{{ asset('js/bootstrap-filestyle.min.js')}}"> </script>

<script>
  function autocomplete(inp, arr) {
    /*the autocomplete function takes two arguments,
    the text field element and an array of possible autocompleted values:*/
    var currentFocus;
    /*execute a function when someone writes in the text field:*/
    inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
            /*insert the value for the autocomplete text field:*/
            inp.value = this.getElementsByTagName("input")[0].value;
            /*close the list of autocompleted values,
            (or any other open lists of autocompleted values:*/
            closeAllLists();
          });
          a.appendChild(b);
        }
      }
    });
    /*execute a function presses a key on the keyboard:*/
    inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
    });
    function addActive(x) {
      /*a function to classify an item as "active":*/
      if (!x) return false;
      /*start by removing the "active" class on all items:*/
      removeActive(x);
      if (currentFocus >= x.length) currentFocus = 0;
      if (currentFocus < 0) currentFocus = (x.length - 1);
      /*add class "autocomplete-active":*/
      x[currentFocus].classList.add("autocomplete-active");
    }
    function removeActive(x) {
      /*a function to remove the "active" class from all autocomplete items:*/
      for (var i = 0; i < x.length; i++) {
        x[i].classList.remove("autocomplete-active");
      }
    }
    function closeAllLists(elmnt) {
      /*close all autocomplete lists in the document,
      except the one passed as an argument:*/
      var x = document.getElementsByClassName("autocomplete-items");
      for (var i = 0; i < x.length; i++) {
        if (elmnt != x[i] && elmnt != inp) {
          x[i].parentNode.removeChild(x[i]);
        }
      }
    }
    /*execute a function when someone clicks in the document:*/
    document.addEventListener("click", function (e) {
      closeAllLists(e.target);
    });
  }

  var cids = [<?php echo '"'.implode('","', $cids).'"' ?>];
console.log(cids);
  /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
  autocomplete(document.getElementById("cid"), cids);
</script>

@endsection
