@extends('layouts.app')

@section('title','Listar alunos')

@section('content')
                    
    <div class="d-flex p-5">
        <h1>
            <strong style="color: #12583C">
                Alunos
            </strong>
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
        <div>
            <a class="btn btn-success" href="{{ route('aluno.buscar')}}">Adicionar novo aluno</a>
        </div>
    </div>
    <hr style="border-top: 2px solid">
                                    
                            

    <!-- Cards Alunos -->
    <div class="d-flex flex-wrap justify-content-between">
        
        @foreach($alunos as $aluno)
            <a href="{{ route('aluno.gerenciar', ['id_aluno'=>$aluno->id]) }}#perfil">
                <div style="padding: 15px; margin: 10px; border-radius: 20px; max-height: 270px; max-width: 300px; min-width: 100px; box-shadow: 4px 4px 4px 4px #CCC;"
                        id="shadow-dark">
                    @if($aluno->imagem != null)
                        <img src="{{asset('storage/avatars/'.$aluno->imagem)}}"
                                style="border-radius: 60%; width:130px; height: 130px; object-fit: cover;"
                                class="card-img-top img-responsive">
                    @else
                        <img src="{{asset('images/avatar.png')}}"
                                style="border-radius: 60%; width:150px; height: 150px; object-fit: cover;"
                                class="card-img-top img-responsive">
                    @endif

                    <p class="card-title"
                        style="max-width: 150px; white-space: nowrap;overflow: hidden; text-overflow: ellipsis; font-weight: bold; color: #12583C">{{$aluno->nome}}</p>
                    <p class="" style="font-size: 13px; color: #12583C">
                        {{$aluno->data_de_nascimento}}<br>
                        {{$aluno->endereco->cidade}} - {{$aluno->endereco->estado}}<br>
                        {{$aluno->cid}}<br>
                    </p>
                </div>
            </a>
        @endforeach 

    </div>
    <div class="text-center">
        {{$alunos->links()}}
    </div>

    <script type="text/javascript">

        var width = screen.width;

        if (width <= 1000) {
            document.getElementById("painel").className = "col-md-offset-1";
        }

    </script>
@endsection
