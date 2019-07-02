{{--
<div id="menu">
    <div id="menu-left">
        @if(Auth::check())
            <a href="{{route('home')}}">Início</a>
        @endif
    </div>
    <div id="menu-right">
        @if(Auth::check())
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                Sair
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        @else
            <a href="{{route('login')}}">Entrar</a> | <a href="{{route('register')}}">Registrar</a>
        @endif
    </div>
</div>
--}}

<nav class="navbar navbar-default" style="background-color: #1B2E4F; border-color: #d3e0e9" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <div class="collapse navbar-collapse" >
        <ul class="nav navbar-nav">
            @if(Auth::check())
                <li class="dropdown">
                  <a class="menu-principal" href="/">Início</a>
                </li>
            @endif
        </ul>
        <ul class="nav navbar-nav">
            @if(Auth::check())
              <li class="dropdown">
                  <a class="menu-principal dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                      Aluno <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu" role="menu">
                      <li>
                          <a href="{{ route('aluno.buscar') }}">
                              Buscar
                          </a>
                      </li>
                  </ul>
              </li>
            @endif
        </ul>
        <ul class="nav navbar-nav navbar-right" style="margin-right: 5%">
            @if(Auth::check())
                @php
                  $notificacoes = Auth::user()->notificacoes;
                  $lidos = (array_column($notificacoes->toArray(), 'lido'));
                @endphp

                <li class="dropdown">
                    <a class="menu-principal dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        @if(array_search(true, $lidos) == null || array_search(false, $lidos) != null)
                          <i class="material-icons">notifications</i>
                        @else
                          <i class="material-icons">notifications_none</i>
                        @endif
                    </a>

                    <ul class="dropdown-menu" role="menu">
                      @foreach($notificacoes as $notificacao)
                        <li>
                          <a class="menu-principal border border-dark text-center bg-info" href="{{ route('aluno.listar') }}">
                            Você tem um pedido de acesso de {{$notificacao->remetente->name}}
                          </a>
                        </li>
                      @endforeach
                       <li>
                         <a class="menu-principal border border-dark text-center bg-info" href="{{ route('aluno.listar') }}">
                           Ver Todos
                         </a>
                       </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="menu-principal dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{\Auth::user()->name}} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                Sair
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            @else
                <li><a class="menu-principal" href="{{ route('login') }}">Entrar</a></li>
                <li><a class="menu-principal" href="{{ route('register') }}">Cadastrar</a></li>
            @endif
        </ul>
    </div>
</nav>
