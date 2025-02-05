<nav class="navbar navbar-expand-lg bg-white">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}" style="list-style:none;">
            <span style="color: #12583C; font-weight: 800; font-size: 20px;">
                ConectAEE
            </span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" onclick="contraste()" id="altocontraste" data-toggle="tooltip" title="Contraste"
                        style="height: 50px;">
                        <img class="on-contrast-force-white" src="{{ asset('images/contrasteBlack.png') }}"
                            style="height:30px; margin-top: -5px">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" onclick="fonte('a')" id="aumentarfonte" data-toggle="tooltip"
                        title="Aumentar fonte" style="height: 50px;">
                        <img class="on-contrast-force-white" src="{{ asset('images/increase-font-size.png') }}"
                            style="height: 30px; margin-top: -5px">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" onclick="fonte('d')" id="diminuirfonte" data-toggle="tooltip"
                        title="Reduzir fonte" style="height: 50px;">
                        <img class="on-contrast-force-white" src="{{ asset('images/reduce-font-size.png') }}"
                            style="height: 30px; margin-top: -5px;">
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                @auth
                    @php
                        $notificacoes = Auth::user()->notificacoes;
                        $lidos = array_column($notificacoes->toArray(), 'lido');
                        $qtd_naolidos = count(array_keys($lidos, false));
                    @endphp
                    @can('professorSection', Auth()->user())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Alunos
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('alunos.index') }}">
                                        Listar
                                    </a></li>
                                <li><a class="dropdown-item" href="{{ route('alunos.create') }}">
                                        Cadastrar
                                    </a></li>
                            </ul>
                        </li>
                    @endcan
                    @can('adminSection', Auth()->user())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Escolas
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('escolas.index')}}">
                                        Listar
                                    </a></li>
                                <li><a class="dropdown-item" href="{{route('escolas.create')}}">
                                        Cadastrar
                                    </a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Usuários
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('users.index')}}">
                                        Listar
                                    </a></li>
                                <li><a class="dropdown-item" href="{{route('users.create')}}">
                                        Cadastrar
                                    </a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Alunos
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('alunos.index')}}">
                                        Listar
                                    </a></li>
                                @can('professorSection', Auth()->user())
                                    <li><a class="dropdown-item" href="{{route('alunos.create')}}">
                                            Cadastrar
                                        </a></li>
                                @endcan
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Relatórios
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="">
                                        Listar
                                    </a></li>
                                <li><a class="dropdown-item" href="">
                                        Cadastrar
                                    </a></li>
                            </ul>
                        </li>
                 
                    @endcan
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            @if ($lidos == null)
                                Notificações
                            @elseif(gettype(array_search(false, $lidos)) == 'integer')
                                Notificacões
                                <span class="badge badge-pill"
                                    style="position: absolute; top:2px; right:1px; background:red">{{ $qtd_naolidos }}</span>
                            @else
                                Notificações
                            @endif
                        </a>
                        <ul class="dropdown-menu">
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
                                                        {{ $notificacao->remetente->name }} lhe concedeu acesso aos
                                                        dados
                                                        do(a) aluno(a)
                                                        {{ explode(' ', $notificacao->aluno->nome)[0] }}</br>
                                                    </a>
                                                @elseif($notificacao->tipo == 3)
                                                    <a class="dropdown-item text-center"
                                                        href="{{ route('notificacao.ler', ['id_notificacao' => $notificacao->id]) }}">
                                                        {{ $notificacao->remetente->name }} criou um novo objetivo para
                                                        o(a) aluno(a)
                                                        {{ explode(' ', $notificacao->aluno->nome)[0] }}</br>
                                                    </a>
                                                @elseif($notificacao->tipo == 4)
                                                    <a class="dropdown-item text-center"
                                                        href="{{ route('notificacao.ler', ['id_notificacao' => $notificacao->id]) }}">
                                                        {{ $notificacao->remetente->name }} criou uma nova atividade
                                                        para
                                                        o(a) aluno(a)
                                                        {{ explode(' ', $notificacao->aluno->nome)[0] }}</br>
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
                                    <a class="dropdown-item text-center" href="{{ route('notificacao.listar') }}"
                                        id="menu-a">
                                        Ver todas
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a class="dropdown-item text-center bg-info">
                                        Sem notificações
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Olá, <strong style="color: gray ">{{ \Auth::user()->nome }}</strong>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('users.edit', ['user_id' => \Auth::user()->id]) }}">
                                    Meu Perfil
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
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
                @endauth
            </ul>
        </div>
    </div>
</nav>