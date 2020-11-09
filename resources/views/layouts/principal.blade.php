<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link rel="shortcut icon" type="image/png" href="{{ asset('images/logo.png') }}">

    <!-- Styles -->
    <link href="{{ asset('css/lmts.css') }}" rel="stylesheet">
    <link href="{{ asset('css/lmts-app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/contrast.css') }}" rel="stylesheet">
    <link href="{{ asset('css/forum.css') }}" rel="stylesheet">
    <link href="{{ asset('css/lightbox.css') }}" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2-bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    @yield('style')

    <!-- JavaScripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/lightbox-plus-jquery.min.js') }}"></script>

    <!-- Scripts -->
    <script defer="defer" src="//barra.brasil.gov.br/barra.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <!-- Summernote -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/lang/summernote-pt-BR.js"></script>

  </head>

  <body class="acessibilidade">
    <div>
      <div id="barra-brasil" style="background:#7F7F7F; height: 20px; padding:0 0 0 10px;display:block;">
        <ul id="menu-barra-temp" style="list-style:none;">
          <li style="display:inline; float:left;padding-right:10px; margin-right:10px; border-right:1px solid #EDEDED">
            <a href="http://brasil.gov.br" style="font-family:sans,sans-serif; text-decoration:none; color:white;">Portal do Governo Brasileiro</a>
          </li>
          <li>
            <a style="font-family:sans,sans-serif; text-decoration:none; color:white;" href="http://epwg.governoeletronico.gov.br/barra/atualize.html">Atualize sua Barra de Governo</a>
          </li>
        </ul>
      </div>

      <!-- Barra de Logos -->
      <div id="barra-logos" class="container" style="background:#ffffff; margin-top: 1px; height: 80px; padding: 10px 10px 10px 10px">
          <ul id="logos" style="list-style:none;">
              <li style="margin-right:140px; margin-left:110px; border-right:1px">
                  @if(Auth::check() && (Auth::user()->username == 'adelino.lmts' || Auth::user()->username == 'alana.lmts' || Auth::user()->username == 'mateus.lmts' || Auth::user()->username == 'eberson.lmts'))
                      <a href="{{ route("home") }}"><img src="{{asset('images/pikachinho.png')}}" style = "margin-left: 8px; margin-top:5px " height="60px" align = "left" ></a>
                  @else
                      <a href="{{ route("home") }}"><img src="{{asset('images/logo.png')}}" style = "margin-left: 8px; margin-top:5px " height="50px" align = "left" ></a>
                  @endif


                  <a onclick="" id="altocontraste" data-toggle="tooltip" title="reduzir fonte">
                    <img class="on-contrast-force-white" src="{{asset('images/reduce-font-size.png')}}" style = "margin-left: 30px; margin-top:20px " height="30" align = "right">
                  </a>

                  <a onclick="" id="altocontraste" data-toggle="tooltip" title="aumentar fonte">
                    <img class="on-contrast-force-white" src="{{asset('images/increase-font-size.png')}}" style = "margin-left: 30px; margin-top:20px " height="30" align = "right">
                  </a>

                  <a onclick="contraste()" id="altocontraste" data-toggle="tooltip" title="Contraste">
                    <img class="on-contrast-force-white" src="{{asset('images/contrasteBlack.png')}}" style = "margin-left: 30px; margin-top:20px " height="30" align = "right">
                  </a>
              </li>
          </ul>
      </div>

      <!-- barra de menu -->
      @include('layouts.menu')

      @php($url = str_replace(URL::to('/'),'',URL::current()))

      @if($url != "/aluno/listar" && $url != "/usuario/completarCadastro")
        <div id="navigation" style="background-color:#ffffff">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <br>
                <h3>
                  &nbsp;
                  @yield('navbar')
                </h3>
              </div>
            </div>
          </div>
        </div>
      @endif
    </div>

    <div id="page-container" style="background-color:#FFFFFF">
      <div id="content-wrap">
        @yield('content')
        <br>
        <!-- <br><br><br> -->
      </div>

      <div id="footer-brasil"></div>

    </div>

    <!-- Scripts -->
    @include('layouts.scripts')
  </body>

</html>
