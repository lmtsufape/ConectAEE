@extends('layouts.principal')
@section('title','Listar alunos')
@section('path','Início')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12" style="margin-top: 40px" >
      <div class="panel panel-default" style="padding: 10px 20px;" id="login-card">

        <div class="panel-heading" id="login-card">
          <div class="row">
            <div class="col-md-12" id="login-card">
              <div style="width: 100%; margin-left: 0%;" class="row" id="login-card">
                <div style="float: left; " class="col-md-6" id="login-card">
                  <h2>
                    <strong style="color: #12583C">
                      Alunos
                    </strong>
                  </h2>
                </div>
                <div style="float:right" class="col-md-3" id="login-card">
                  <a style="float:right; margin-top:20px; background-color: #0398fc; color: white; font-weight: bold; font-size: 15px; padding: 7px; border-radius: 5px; border-color: #0398fc; box-shadow: 4px 4px 4px #CCC" href="{{ route('aluno.buscar')}}" id="signup">
                    Adicionar novo aluno
                  </a>
                </div>
                <div class="row col-md-3" style="float:right; " id="login-card">
                  @if(count($alunos) != 0 || $termo != null)
                    <form class="form-horizontal" method="GET" action="{{ route("aluno.buscarAluno") }}">

                      <div id="divBusca" style="margin-top:20px;">

                      <i class="material-icons" style="margin-top:5px;">search</i>

                      @if ($termo == null)
                        <input id="termo" type="text" autocomplete="off" name="termo" autofocus placeholder="Pesquise aqui...">
                      @else
                        <input id="termo" type="text" autocomplete="off" name="termo" autofocus placeholder="Pesquise aqui..." value="{{$termo}}">
                      @endif

                      <button id="btnBusca" type="submit">
                        Buscar
                      </button>
                      </div>
                    </form>
                  @endif
                </div>
              </div>

              </div>
            </div>

          <hr style="border-top: 1px solid #AAA;">
        </div>

        <div class="panel-body" id="login-card">

          @if (\Session::has('success'))
            <div class="alert alert-success">
              <strong>Sucesso!</strong>
              {!! \Session::get('success') !!}
            </div>
          @endif

          @if (\Session::has('password'))
            <div class="alert alert-info">
              <strong>Atenção!</strong>
              {!! \Session::get('password') !!}
            </div>
          @endif

          @if (\Session::has('denied'))
            <div class="alert alert-warning">
              <strong>Não permitido!</strong>
              {!! \Session::get('denied') !!}
            </div>
          @endif

          <!-- Cards Alunos -->
          <div class="row" align="center">
            <div class="container col-md-12" id="login-card">
              <div class="card-body">
                <?php
                foreach ($alunos as $aluno) {?>
                  <div class="col-md-3 mt-3" id="login-card">
                    <a href="{{ route('aluno.gerenciar', ['id_aluno'=>$aluno->id]) }}#perfil" style="display: block;">
                      <div style="padding: 15px; margin: 10px; border-radius: 20px; max-height: 270px; box-shadow: 4px 4px 4px 4px #CCC;" id="shadow-dark">
                        @if($aluno->imagem != null)
                          <img src="{{asset('storage/avatars/'.$aluno->imagem)}}" style="border-radius: 60%; width:130px; height: 130px; object-fit: cover;" class="card-img-top img-responsive" >
                        @else
                          <img src="{{asset('images/avatar.png')}}" style="border-radius: 60%; width:150px; height: 150px; object-fit: cover;" class="card-img-top img-responsive" >
                        @endif

                        <p class="card-title" style="max-width: 150px; white-space: nowrap;overflow: hidden; text-overflow: ellipsis; font-weight: bold; color: #12583C">{{$aluno->nome}}</p>
                        <p class="" style="font-size: 13px; color: #12583C">
                          {{$aluno->data_de_nascimento}}<br>
                          {{$aluno->endereco->cidade}} - {{$aluno->endereco->estado}}<br>
                          {{$aluno->cid}}<br>
                        </p>
                      </div>
                    </a>
                  </div>
                <?php }?>
              </div>
            </div>

          </div>

          @if($termo != "" && sizeof($alunos) == 0)
            <div class="alert alert-danger" id="login-card">
              <strong> Nenhum aluno encontrado!</strong>
            </div>

            <div class="panel-footer" style="background-color:white"  id="login-card">
              <div class="text-center"  id="login-card">
                <a class="btn btn-secondary" href="{{route('aluno.listar')}}">
                  Voltar
                </a>
              </div>
            </div>
          @elseif(sizeof($alunos) == 0)
            <div class="alert alert-info"  id="login-card">
              <strong> Nenhum aluno cadastrado.</strong>
            </div>
          @endif

          <div class="text-center" id="login-card">
            {{$alunos->links()}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

var width = screen.width;

if (width <= 1000){
	document.getElementById("painel").className = "col-md-offset-1";
}

</script>
@endsection
