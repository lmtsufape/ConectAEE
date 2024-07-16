<nav class="navbar navbar-expand-md bg-white" role="navigation"
    id="barra-menu">
    <a class="btn" href="{{ route('home') }}" style="list-style:none;">
        <span style="color: #12583C; font-weight: 800; font-size: 20px; margin-top: 20px">
            ConectAEE
        </span>
    </a>
    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="sr-only">Toggle navigation</span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <!-- logo -->
        <ul class="nav navbar-nav mr-auto">
            <li class="dropdown">
                <a onclick="contraste()" id="altocontraste" data-toggle="tooltip" title="Contraste"
                    style="height: 50px;">
                    <img class="on-contrast-force-white" src="{{ asset('images/contrasteBlack.png') }}"
                        style="height:30px; margin-top: -5px">
                </a>
            </li>
            <li class="dropdown">
                <a onclick="fonte('a')" id="aumentarfonte" data-toggle="tooltip" title="Aumentar fonte"
                    style="height: 50px;">
                    <img class="on-contrast-force-white" src="{{ asset('images/increase-font-size.png') }}"
                        style="height: 30px; margin-top: -5px">
                </a>
            </li>
            <li class="dropdown" style="margin-right:0px">
                <a onclick="fonte('d')" id="diminuirfonte" data-toggle="tooltip" title="Reduzir fonte"
                    style="height: 50px;">
                    <img class="on-contrast-force-white" src="{{ asset('images/reduce-font-size.png') }}"
                        style="height: 30px; margin-top: -5px;">
                </a>
            </li>
        </ul>

        <!-- botões -->
        <ul class="nav navbar-nav ml-auto">
            @if (Auth::check() && Auth::user()->cadastrado)
                @php
                    $notificacoes = Auth::user()->notificacoes;
                    $lidos = array_column($notificacoes->toArray(), 'lido');
                    $qtd_naolidos = count(array_keys($lidos, false));
                @endphp


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" 
                        style="color: black">
                        Alunos
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('aluno.listar') }}">
                                Listar
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('aluno.buscar') }}">
                                Cadastrar
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li class="nav-item dropdown">
                    <a  class="nav-link dropdown-toggle" id="navbarDropdown" data-bs-toggle="dropdown" role="button" aria-expanded="false"
                        style="color: black">
                        Instituições
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('instituicao.listar') }}">
                                Listar
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('instituicao.cadastrar') }}">
                                Cadastrar
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" data-bs-toggle="dropdown" role="button" aria-expanded="false" style="color: black">
                        @if ($lidos == null)
                            Notificações
                            <!-- <i class="material-icons">notifications_none</i> -->
                        @elseif(gettype(array_search(false, $lidos)) == 'integer')
                            Notificacões
                            <!-- <i class="material-icons">notifications</i> -->
                            <span class="badge badge-pill"
                                style="position: absolute; top:2px; right:1px; background:red">{{ $qtd_naolidos }}</span>
                        @else
                            Notificações
                            <!-- <i class="material-icons">notifications_none</i> -->
                        @endif
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @if (count($notificacoes) != 0)
                            <table class="table table-hover table-bordered">
                                @php($i = 0)
                                @foreach ($notificacoes as $notificacao)
                                    @if ($notificacao->aluno != null)
                                        <tr>
                                            @if ($notificacao->lido)
                                                <td data-title="Notificacao">
                                            @else
                                                <td class="bg-info" data-title="Notificacao">
                                            @endif

                                            @if ($notificacao->tipo == 1)
                                                <a class="dropdown-item text-center"
                                                    href="{{ route('notificacao.ler', ['id_notificacao' => $notificacao->id]) }}">
                                                    {{ $notificacao->remetente->name }} pediu para acessar os dados
                                                    do(a) aluno(a)
                                                    {{ explode(' ', $notificacao->aluno->nome)[0] }}</br>
                                                </a>
                                            @elseif($notificacao->tipo == 2)
                                                <a class="dropdown-item text-center"
                                                    href="{{ route('notificacao.ler', ['id_notificacao' => $notificacao->id]) }}">
                                                    {{ $notificacao->remetente->name }} lhe concedeu acesso aos dados
                                                    do(a) aluno(a)
                                                    {{ explode(' ', $notificacao->aluno->nome)[0] }}</br>
                                                </a>
                                            @elseif($notificacao->tipo == 3)
                                                <a class="dropdown-item text-center"
                                                    href="{{ route('notificacao.ler', ['id_notificacao' => $notificacao->id]) }}">
                                                    {{ $notificacao->remetente->name }} criou um novo objetivo para
                                                    o(a) aluno(a) {{ explode(' ', $notificacao->aluno->nome)[0] }}</br>
                                                </a>
                                            @elseif($notificacao->tipo == 4)
                                                <a class="dropdown-item text-center"
                                                    href="{{ route('notificacao.ler', ['id_notificacao' => $notificacao->id]) }}">
                                                    {{ $notificacao->remetente->name }} criou uma nova atividade para
                                                    o(a) aluno(a) {{ explode(' ', $notificacao->aluno->nome)[0] }}</br>
                                                </a>
                                            @elseif($notificacao->tipo == 5)
                                                <a class="dropdown item text-center"
                                                    href="{{ route('notificacao.ler', ['id_notificacao' => $notificacao->id]) }}">
                                                    {{ $notificacao->remetente->name }} criou uma nova sugestão de
                                                    atividade para o(a) aluno(a)
                                                    {{ explode(' ', $notificacao->aluno->nome)[0] }}</br>
                                                </a>
                                            @endif

                                            </td>
                                        </tr>
                                        @break(++$i == 5)
                                    @endif
                                @endforeach
                            </table>

                            <li>
                                <a class="dropdown-item text-center" href="{{ route('notificacao.listar') }}" id="menu-a">
                                    Ver todas
                                </a>
                            </li>
                        @else
                            <li>
                                <a class=" dropdown-item text-center bg-info">
                                    Sem notificações
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle"id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: black">
                        Olá, <strong style="color: gray ">{{ \Auth::user()->name }}</strong> <span
                            class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('usuario.editar') }}">
                                Meu Perfil
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                >
                                Sair
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            @elseif(Auth::check() && !Auth::user()->cadastrado)
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ \Auth::user()->username }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Sair
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </div>
</nav>
