@extends('layouts.app')

@section('title','Listar alunos')

@section('content')
                    
    <div class="d-flex p-5">
        <h1 style="color: #12583C">
            Alunos
        </h1>
        <div>
            @include('layouts.videoPopup', ['src' => asset('videos/gif-libras.mp4')])
        </div>
                            
        
        <div>
            @if(count($alunos) != 0 || $termo != null)
                <form class="form-horizontal border" method="GET" action="{{ route("aluno.buscarAluno") }}">
                    
                        <i class="material-icons">search</i>
                        @if ($termo == null)
                            <input id="termo" type="text" autocomplete="off" name="termo"
                                    autofocus placeholder="Pesquise aqui...">
                        @else
                            <input id="termo" type="text" autocomplete="off" name="termo"
                                    autofocus placeholder="Pesquise aqui..."
                                    value="{{$termo}}">
                        @endif
                        <button id="btnBusca" type="submit">
                            Buscar
                        </button>
                    
                </form>
            @endif
    
        </div>
        <div class="ms-auto">
            <a class="btn btn-success" href="{{ route('aluno.create')}}">Adicionar novo aluno</a>
        </div>
    </div>
    <hr style="border-top: 2px solid">
                                    
                            

    <!-- Cards Alunos -->
    <div class="d-flex flex-wrap gap-3">
        
        @foreach($alunos as $aluno)
            <a class="text-decoration-none text-body" href="{{ route('aluno.gerenciar', ['id_aluno'=>$aluno->id]) }}#perfil">
                <div class="m-3 rounded-5 shadow-lg d-flex flex-column justify-content-center align-items-center border" style="width: 11vw; height: 33vh;">
                    @if($aluno->imagem != null)
                        <img src="{{asset('storage/avatars/'.$aluno->imagem)}}"
                                style="width:130px; height: 130px; object-fit: cover;"
                                class="rounded-circle">
                    @else
                        <img src="{{asset('images/avatar.png')}}"
                                style="width:130px; height: 130px; object-fit: cover;"
                                class="rounded-circle">
                    @endif

                    <h2 class="fs-5" style="max-width: 160px; white-space: nowrap;overflow: hidden; text-overflow: ellipsis;">{{$aluno->nome}}</h2>
                    <span class="fs-5">{{$aluno->data_de_nascimento}}</span>
                    <span class="fs-5">{{$aluno->endereco->cidade}} - {{$aluno->endereco->estado}}</span>
                    <span class="fs-5">{{$aluno->cid}}</span>
                </div>
            </a>
        @endforeach 

    </div>
    <div class="text-center">
        {{$alunos->links()}}
    </div>
@endsection
