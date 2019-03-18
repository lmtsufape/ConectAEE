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