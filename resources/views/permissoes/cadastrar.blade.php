@extends('layouts.principal')
@section('title','Cadastrar permissão')
@section('navbar')
@endsection
@section('style')
    <link href="{{ asset('css/buscausuario.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container" style="color: #12583C">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default" style="margin-top: -20px; padding: 10px 20px;" id="login-card">

                    <div class="panel-heading" id="login-card">
                        <h2>
                            <strong style="color: #12583C">
                                Nova Autorização
                            </strong>
                            <div style="font-size: 14px" id="login-card">
                                <a href="{{route('aluno.listar')}}">Início</a>
                                > <a href="{{route('aluno.gerenciar',$aluno->id)}}">Perfil de
                                    <strong>{{ explode(" ", $aluno->nome)[0]}}</strong></a>
                                > <a href="{{route('aluno.permissoes',$aluno->id)}}">Autorizações</a>
                                > Nova Autorização
                            </div>
                        </h2>

                        <hr style="border-top: 1px solid black;">
                    </div>

                    <div class="panel-body panel-body-cadastro" id="login-card">
                        @if (\Session::has('Fail'))
                            <div class="alert alert-danger" id="login-card">
                                <strong>Erro!</strong>
                                {!! \Session::get('Fail') !!}
                            </div>
                        @endif

                        <div class="col-md-8 col-md-offset-2" id="login-card">
                            <form autocomplete="off" method="POST" action="{{ route("aluno.permissoes.criar") }}">
                                {{ csrf_field() }}

                                <input type="hidden" name="id_aluno" value="{{$aluno->id}}">

                                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}"
                                     id="login-card">
                                    <label for="username" class="col-md-12 control-label">Nome do usuário que será autorizado<font color="red">*</font><font
                                                color="red">*</font></label>

                                    <div class="col-md-12" id="login-card">
                                        <input id="username" type="text" class="form-control" name="username"
                                               value="{{ old('username') }}" autofocus>

                                        @if ($errors->has('username'))
                                            <span class="help-block">
                      <strong>{{ $errors->first('username') }}</strong>
                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('perfil') ? ' has-error' : '' }}" id="login-card">
                                    <label for="perfil" class="col-md-12 control-label">Autorizar acesso com o perfil de<font
                                                color="red">*</font></label>

                                    <div class="col-md-12" id="login-card">
                                        <select id="perfil" name="perfil" class="form-control">
                                            <option value="" selected disabled hidden>Escolha o perfil do usuário que
                                                irá ser autorizado
                                            </option>
                                            @foreach($perfis as $perfil)
                                                @if($perfil->nome == old('perfil'))
                                                    <option value="{{$perfil->nome}}"
                                                            selected>{{$perfil->nome}}</option>
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
                                    <div id="div-especializacao"
                                         class="form-group{{ $errors->has('especializacao') ? ' has-error' : '' }}"
                                         id="login-card">
                                        @else
                                            <div id="div-especializacao"
                                                 class="form-group{{ $errors->has('especializacao') ? ' has-error' : '' }}"
                                                 style="display: none" id="login-card">
                                                @endif
                                                <label for="especializacao" class="col-md-12 control-label">Especialização</label>

                                                <div class="autocomplete col-md-12" id="login-card">
                                                    <input id="especializacao" type="text" class="form-control"
                                                           autocomplete="off" name="especializacao"
                                                           value="{{ old('especializacao') }}">

                                                    @if ($errors->has('especializacao'))
                                                        <span class="help-block">
                      <strong>{{ $errors->first('especializacao') }}</strong>
                    </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-check col-md-12" id="login-card">
                                                <div class="row">
                                                    <label for="tipoUsuario" class="col-md-12 control-label">Escolha o nivel de acesso do
                                                            usuário<font color="red">*</font></label>
                                                    <span style="margin-left: 3%;">
                                                    <input id="isAdministrador" type="radio" class="form-check-input"
                                                           name="tipoUsuario" value="3">
                                                    <label class="form-check-label"
                                                           for="isAdministrador">Administrador</label>
                                                    </span>
                                                    <span style="margin-left: 1%;">
                                                        <input id="isPadrao" type="radio" class="form-check-input"
                                                               name="tipoUsuario" value="1" checked>
                                                        <label id="isPadraoLabel" class="form-check-label" for="isPadrao">Padrão</label>
                                                        </span>
                                                    <span style="margin-left: 1%;">
                                                    <input id="isObservador" type="radio" class="form-check-input"
                                                           name="tipoUsuario" value="2">
                                                    <label id="isObservadorLabel" class="form-check-label"
                                                           for="isObservador">Observador</label>
                                                    </span>

                                                </div>
                                            </div>

                                            <div class="form-group" id="login-card">
                                                <div class="row col-md-12 text-center" id="login-card">
                                                    <br>
                                                    <a class="btn btn-secondary"
                                                       href="{{route('aluno.permissoes',$aluno->id)}}" id="menu-a">
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
        document.getElementById("perfil").onchange = function () {

            var perfil = document.getElementById("perfil");

            var adm = document.getElementById("isAdministrador");
            var obser = document.getElementById('isObservador');
            var obserLabel = document.getElementById('isObservadorLabel');
            var padrao = document.getElementById('isPadrao');
            var padraoLabel = document.getElementById('isPadraoLabel');

            if (perfil.selectedIndex == 1) {
                adm.checked = true;
                adm.readonly = true;
                obser.disabled = true;
                obser.hidden = true;
                obserLabel.hidden = true;
                padrao.disabled = true;
                padrao.hidden = true;
                padraoLabel.hidden = true;

                document.getElementById("div-especializacao").style.display = "none";

                adm.onchange = function () {
                    adm.checked = true;
                };
            } else if (perfil.selectedIndex == 2) {
                adm.checked = true;
                adm.readonly = true;
                obser.disabled = true;
                obser.hidden = true;
                obserLabel.hidden = true;
                padrao.disabled = true;
                padrao.hidden = true;
                padraoLabel.hidden = true;
                document.getElementById("div-especializacao").style.display = "none";

                adm.onchange = function () {
                    adm.checked = true;
                };
            } else if(perfil.selectedIndex == 4) {
                adm.checked = false;
                adm.readonly = false;
                obser.disabled = false;
                obser.hidden = false;
                obserLabel.hidden = false;
                padrao.disabled = false;
                padrao.hidden = false;
                padraoLabel.hidden = false;
                document.getElementById("div-especializacao").style.display = "block";
            } else {
                adm.checked = false;
                adm.readonly = false;
                obser.disabled = false;
                obser.hidden = false;
                obserLabel.hidden = false;
                padrao.checked = true;
                padrao.disabled = false;
                padrao.hidden = false;
                padraoLabel.hidden = false;
                document.getElementById("div-especializacao").style.display = "none";
                adm.onchange = function () {
                    adm.checked = true;
                };
            }

        };
    </script>

    <script>
        function autocomplete(inp, arr) {
            /*the autocomplete function takes two arguments,
            the text field element and an array of possible autocompleted values:*/
            var currentFocus;
            /*execute a function when someone writes in the text field:*/
            inp.addEventListener("input", function (e) {
                var a, b, i, val = this.value;
                /*close any already open lists of autocompleted values*/
                closeAllLists();
                if (!val) {
                    return false;
                }
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
                        b.addEventListener("click", function (e) {
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
            inp.addEventListener("keydown", function (e) {
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

        var especialializacoes = [<?php echo '"' . implode('","', $especializacoes) . '"' ?>];
        var usuarios = [<?php echo '"' . implode('","', $usuarios) . '"' ?>];

        /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
        autocomplete(document.getElementById("especializacao"), especialializacoes);
        autocomplete(document.getElementById("username"), usuarios);
    </script>

@endsection
