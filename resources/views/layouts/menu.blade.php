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
                <li><a class="menu-principal" href="/">Início</a></li>
            @endif
        </ul>
        <ul class="nav navbar-nav navbar-right" style="margin-right: 5%">
            @if(Auth::check())
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
            @else
                <li><a class="menu-principal" href="{{ route('login') }}">Entrar</a></li>
                <li><a class="menu-principal" href="{{ route('register') }}">Cadastrar</a></li>
            @endif
        </ul>
    </div>
</nav>