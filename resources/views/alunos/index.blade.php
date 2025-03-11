@extends('layouts.app')

@section('title','Listar alunos')

@section('content')
                    
    <div class="d-flex justify-content-between align-items-baseline m-3">
        <div class="d-flex">
            <h1 style="color: #12583C">
                Alunos
            </h1>
        </div>
                                       
        <div class="d-flex justify-content-center">
            <form method="GET" action="{{ route("alunos.index") }}">
                <div class="input-group">
                    <input class="form-control" id="search" type="text" name="search" autofocus placeholder="Pesquise aqui...">
                    <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                        </svg>
                    </a>
                </div>
            </form>
        </div>                 
        <div>
    
            <a class="btn btn-success" href="{{ route('alunos.create')}}">Adicionar novo aluno</a>
        </div>
        
   
    </div>
    <hr style="border-top: 2px solid">
                                    

    <!-- Cards Alunos -->
    <div class="d-flex flex-wrap gap-3 justify-content-center">
        @foreach($alunos as $aluno)
            <a class="text-decoration-none text-body" href="{{ route('alunos.show', ['aluno_id'=>$aluno->id]) }}">
                <div class="m-2 p-3 rounded-5 shadow-lg d-flex flex-column justify-content-center align-items-center" style="width: 187px">
                    @if($aluno->imagem != null)
                        <img src="{{asset('storage/'.$aluno->imagem)}}"
                        style="border-radius: 60%; height:116.25px; width:116.25px; object-fit: cover;">
                    @else
                        <img src="{{asset('images/avatar.png')}}"
                            class="img-fluid w-75 rounded-circle">
                    @endif

                    <h2 class="fs-5 pt-3" style="max-width: 132px; white-space: nowrap;overflow: hidden; text-overflow: ellipsis;">{{$aluno->nome}}</h2>
                    <span class="fs-5">{{$aluno->data_de_nascimento}}</span>
                    <span class="fs-5">{{$aluno->endereco->municipio->nome}}</span>
                    <span class="fs-5">{{$aluno->cid}}</span>
                </div>
            </a>
        @endforeach 
    </div>
    
    <div class="d-flex justify-content-center pt-5">
        {{$alunos->links()}}
    </div>
@endsection
