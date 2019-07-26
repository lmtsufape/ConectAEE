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
        <ul class="nav navbar-nav" style="margin-left: 5%">
            @if(Auth::check() && Auth::user()->cadastrado)
                <li class="dropdown">
                  <a class="menu-principal" href="/">Início</a>
                </li>
            @elseif(Auth::check() && !Auth::user()->cadastrado)
                <li class="dropdown">
                  <a class="menu-principal" href="{{ route('usuario.completarCadastro') }}">Início</a>
                </li>
            @endif
        </ul>
        <ul class="nav navbar-nav" >
            @if(Auth::check() && Auth::user()->cadastrado)
              <li class="dropdown">
                  <a class="menu-principal dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                      Aluno <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu" role="menu">
                      <li>
                        <a href="{{ route('aluno.listar') }}">
                            Listar
                        </a>
                      </li>
                      <li>
                        <a href="{{ route('aluno.buscar') }}">
                            Buscar por código
                        </a>
                      </li>
                  </ul>
              </li>
              <li class="dropdown">
                  <a class="menu-principal dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                      Instituição <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu" role="menu">
                      <li>
                          <a href="{{ route('instituicao.listar') }}">
                              Listar
                          </a>
                      </li>
                  </ul>
              </li>
            @endif
        </ul>
        <ul class="nav navbar-nav navbar-right" style="margin-right: 5%">
            @if(Auth::check() && Auth::user()->cadastrado)
                @php
                  $notificacoes = Auth::user()->notificacoes;
                  $lidos = (array_column($notificacoes->toArray(), 'lido'));
                @endphp

                <li class="dropdown">
                    <a class="menu-principal dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        @if($lidos == null)
                          <i class="material-icons">notifications_none</i>
                        @elseif(gettype(array_search(false, $lidos)) == 'integer')
                          <i class="material-icons">notifications</i>
                        @else
                          <i class="material-icons">notifications_none</i>
                        @endif
                    </a>

                    <ul class="dropdown-menu" role="menu">
                      @if(count($notificacoes) != 0)
                        <table class="table table-hover table-bordered">
                          @php($i = 0)
                          @foreach($notificacoes as $notificacao)
                            <tr>
                              @if($notificacao->lido)
                                <td data-title="Notificacao">
                              @else
                                <td class="bg-info" data-title="Notificacao">
                              @endif
                                @if($notificacao->tipo == 1)
                                  <a class="btn text-center" href="{{ route('notificacao.ler', ['id_notificacao' => $notificacao->id]) }}">
                                    {{$notificacao->remetente->name}} pediu para acessar os dados do(a) aluno(a) {{explode(" ", $notificacao->aluno->nome)[0]}}</br>
                                  </a>
                                @else
                                  <a class="btn text-center" href="{{ route('notificacao.ler', ['id_notificacao' => $notificacao->id]) }}">
                                    {{$notificacao->remetente->name}} lhe concedeu acesso aos dados do(a) aluno(a) {{explode(" ", $notificacao->aluno->nome)[0]}}</br>
                                  </a>
                                @endif
                              </td>
                            </tr>
                            @break(++$i == 3)
                          @endforeach
                        </table>
                        <li>
                          <a class="text-center" href="{{ route('notificacao.listar') }}">
                             Ver todas
                          </a>
                        </li>
                      @else
                        <li>
                          <a class="text-center bg-info">
                            Sem notificações
                          </a>
                        </li>
                      @endif
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
            @elseif(Auth::check() && !Auth::user()->cadastrado)
              <li class="dropdown">
                  <a class="menu-principal dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                      {{\Auth::user()->username}} <span class="caret"></span>
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
