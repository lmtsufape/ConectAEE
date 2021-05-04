<nav class="navbar-default" style="background: #fff; border-color: #d3e0e9; margin-top: 10px;" role="navigation" id="barra-menu">
  <div class="navbar-header" id="barra-logos">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>
  <div class="collapse navbar-collapse" id="barra-menu">
    <!-- logo -->
    <ul class="nav navbar-nav navbar-left">
        <li class="dropdown">
            <a class="btn" href="{{ route('home') }}"><span style="color: #12583C; font-weight: 800; font-size: 20px;">ConectAEE</span></a>
        </li>

      <li class="dropdown">
        <a onclick="contraste()" id="altocontraste" data-toggle="tooltip" title="Contraste" style="height: 50px;">
          <img class="on-contrast-force-white" src="{{asset('images/contrasteBlack.png')}}" style="height:30px; margin-top: -5px">
        </a>
      </li>
      <li class="dropdown">
        <a onclick="fonte('a')" id="aumentarfonte" data-toggle="tooltip" title="Aumentar fonte" style="height: 50px;">
          <img class="on-contrast-force-white" src="{{asset('images/increase-font-size.png')}}" style="height: 30px; margin-top: -5px">
        </a>
      </li>
      <li class="dropdown" style="margin-right:0px">
        <a onclick="fonte('d')" id="diminuirfonte" data-toggle="tooltip" title="Reduzir fonte" style="height: 50px;">
          <img class="on-contrast-force-white" src="{{asset('images/reduce-font-size.png')}}" style="height: 30px; margin-top: -5px;">
        </a>
      </li>
    </ul>

    <!-- botões -->
    <ul class="nav navbar-nav navbar-right">
      @if(Auth::check() && Auth::user()->cadastrado)
        @php
          $notificacoes = Auth::user()->notificacoes;
          $lidos = (array_column($notificacoes->toArray(), 'lido'));
          $qtd_naolidos = count(array_keys($lidos, false));
        @endphp


      @if(Auth::check() && Auth::user()->cadastrado)
        <li class="dropdown">
          <a  data-toggle="dropdown" role="button" area-expanded="false" class="dropdown-toggle" style="color: black">
            Alunos
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu" role="menu">
            <li>
              <a href="{{ route('aluno.listar') }}" id="menu-a">
                Listar
              </a>
            </li>
            <li>
              <a href="{{ route('aluno.buscar') }}" id="menu-a">
                Cadastrar
              </a>
            </li>
          </ul>
        </li>
        <li class="dropdown">
          <a data-toggle="dropdown" role="button" area-expanded="false" class="dropdown-toggle" style="color: black">
            Instituições
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu" role="menu">
            <li>
              <a href="{{ route('instituicao.listar') }}" id="menu-a">
                Listar
              </a>
            </li>
            <li>
              <a href="{{ route('instituicao.cadastrar') }}" id="menu-a">
                Cadastrar
              </a>
            </li>
          </ul>
        </li>
      @endif
        <li class="dropdown">
          <a class="menu-principal dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="color: black">
            @if($lidos == null)
              Notificações
              <!-- <i class="material-icons">notifications_none</i> -->
            @elseif(gettype(array_search(false, $lidos)) == 'integer')
              Notificacões
              <span class="caret"></span>
              <!-- <i class="material-icons">notifications</i> -->
              <span class="badge badge-pill" style="position: absolute; top:2px; right:1px; background:red">{{$qtd_naolidos}}</span>
            @else
              Notificações
            <span class="caret"></span>
              <!-- <i class="material-icons">notifications_none</i> -->
            @endif
          </a>

          <ul class="dropdown-menu" role="menu">
            @if(count($notificacoes) != 0)
              <table class="table table-hover table-bordered">
                @php($i = 0)
                @foreach($notificacoes as $notificacao)
                  @if($notificacao->aluno != null)
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
                      @elseif($notificacao->tipo == 2)
                        <a class="btn text-center" href="{{ route('notificacao.ler', ['id_notificacao' => $notificacao->id]) }}">
                          {{$notificacao->remetente->name}} lhe concedeu acesso aos dados do(a) aluno(a) {{explode(" ", $notificacao->aluno->nome)[0]}}</br>
                        </a>
                      @elseif($notificacao->tipo == 3)
                        <a class="btn text-center" href="{{ route('notificacao.ler', ['id_notificacao' => $notificacao->id]) }}">
                          {{$notificacao->remetente->name}} criou um novo objetivo para o(a) aluno(a) {{explode(" ", $notificacao->aluno->nome)[0]}}</br>
                        </a>
                      @elseif($notificacao->tipo == 4)
                        <a class="btn text-center" href="{{ route('notificacao.ler', ['id_notificacao' => $notificacao->id]) }}">
                          {{$notificacao->remetente->name}} criou uma nova atividade para o(a) aluno(a) {{explode(" ", $notificacao->aluno->nome)[0]}}</br>
                        </a>
                      @elseif($notificacao->tipo == 5)
                        <a class="btn text-center" href="{{ route('notificacao.ler', ['id_notificacao' => $notificacao->id]) }}">
                          {{$notificacao->remetente->name}} criou uma nova sugestão de atividade para o(a) aluno(a) {{explode(" ", $notificacao->aluno->nome)[0]}}</br>
                        </a>
                      @endif

                      </td>
                    </tr>
                    @break(++$i == 5)
                  @endif
                @endforeach
              </table>

              <li>
                <a class="text-center" href="{{ route('notificacao.listar') }}"  id="menu-a">
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
          <a class="menu-principal dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="color: black">
            Olá, <strong style="color: gray !important">{{\Auth::user()->name}}</strong> <span class="caret"></span>
          </a>
          <ul class="dropdown-menu" role="menu">
            <li>
              <a href="{{ route('usuario.editar') }}" id="menu-a">
                Meu Perfil
              </a>
            </li>
            <li>
              <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" id="menu-a">
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
              <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Sair
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </li>
          </ul>
        </li>
      @else
        <li class="dropdown">
          <a onclick="contraste()" id="altocontraste" data-toggle="tooltip" title="Contraste">
            <img class="on-contrast-force-white" src="{{asset('images/contraste.png')}}" style="height:25px">
          </a>
        </li>
        <li><a class="menu-principal" href="{{ route('login') }}" style="color: black">Entrar</a></li>
        <li><a class="menu-principal" href="{{ route('register') }}" style="color: black">Cadastrar</a></li>
      @endif
    </ul>
  </div>
</nav>
