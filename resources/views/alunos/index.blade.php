@extends('layouts.app')

@section('title','Listar alunos')

@section('content')
                    
    <div class="d-flex justify-content-between align-items-baseline m-3">
        <div class="d-flex">
            <h1 style="color: #12583C">
                Alunos
            </h1>
        </div>
                            
        <div class="d-flex">
            <div>
                <form method="GET" action="{{ route("alunos.buscarAluno") }}">
                    <input class="form-control" id="termo" type="text" name="termo" autofocus placeholder="Pesquise aqui...">
                </form>
            </div>

            <p class="d-inline-flex gap-1">
                <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <i class="material-icons">search</i>
                </a>
                <a class="btn btn-success" href="{{ route('alunos.create')}}">Adicionar novo aluno</a>
            </p>
        </div>
        
   
    </div>
    <hr style="border-top: 2px solid">
                                    
                            
    <!-- Cards Alunos -->
    <div class="d-flex flex-wrap gap-3 justify-content-center">
        
        @foreach($alunos as $aluno)
            <a class="text-decoration-none text-body" href="{{ route('alunos.show', ['aluno_id'=>$aluno->id]) }}">
                <div class="m-2 p-3 rounded-5 shadow-lg d-flex flex-column justify-content-center align-items-center" style="width: 187px">
                    @if($aluno->imagem != null)
                        <img src="{{asset('storage/avatars/'.$aluno->imagem)}}"
                            class="img-fluid w-75 rounded-circle">
                    @else
                        <img src="{{asset('images/avatar.png')}}"
                            class="img-fluid w-75 rounded-circle">
                    @endif

                    <h2 class="fs-5 pt-3" style="max-width: 132px; white-space: nowrap;overflow: hidden; text-overflow: ellipsis;">{{$aluno->nome}}</h2>
                    <span class="fs-5">{{$aluno->data_de_nascimento}}</span>
                    <span class="fs-5">{{$aluno->endereco->cidade}} - {{$aluno->endereco->estado}}</span>
                    <span class="fs-5">{{$aluno->cid}}</span>
                </div>
            </a>
        @endforeach 

    </div>
    <div class="d-flex justify-content-center pt-5">
        {{$alunos->links()}}
    </div>
@endsection
