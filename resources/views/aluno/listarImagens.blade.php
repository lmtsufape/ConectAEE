@extends('layouts.principal')
@section('title','Listar alunos')
@section('path','Início')

@section('navbar')
<a href="{{route('aluno.listar')}}">Início</a>
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Alunos</div>

        <div class="panel-body">

          @if (\Session::has('success'))
            <br>
            <div class="alert alert-success">
              <strong>Sucesso!</strong>
              {!! \Session::get('success') !!}
            </div>
          @endif

          @if (\Session::has('password'))
            <div class="alert alert-success">
              <strong>Sucesso!</strong>
              {!! \Session::get('password') !!}
            </div>
          @endif

          @if (\Session::has('denied'))
            <div class="alert alert-warning">
              <strong>Não permitido!</strong>
              {!! \Session::get('denied') !!}
            </div>
          @endif

          <div class="row" align="center">
            <form class="form-horizontal" method="POST" action="{{ route("aluno.buscarAluno") }}">

              {{ csrf_field() }}

              <div class="row">
                <div class="col-md-12">
                  @if ($termo == null)
                    <input style="width:74%" id="termo" type="text" name="termo" autofocus required placeholder="Pesquise aqui...">
                  @else
                    <input style="width:74%" id="termo" type="text" name="termo" autofocus required placeholder="Pesquise aqui..." value="{{$termo}}">
                  @endif

                  <button type="submit" class="btn btn-primary btn-md">
                    Buscar
                  </button>
                </div>
              </div>
            </form>

            <br>

            <table id="tabela_albuns" class="table-responsive">
              <thead>
                <tr>
                  <th></th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @php
                  $colunas = 0;
                  $size = 4;
                  $tresAlunos = array();
                @endphp

                @foreach ($alunos as $aluno)
                  <tr>
                    @php
                      $colunas += 1;
                      array_push($tresAlunos, $aluno);
                    @endphp

                    @if($colunas % $size == 0)
                      @for($i = 1; $i <= $size; $i++ )
                        @php($aluno = array_pop($tresAlunos))
                        <td class="text-center">

                          <a class="btn btn-primary" href="{{ route("aluno.gerenciar",['id_aluno'=>$aluno->id]) }}">
                            @if($aluno->imagem != null)
                              <img src="{{$aluno->imagem}}" style="width:150px; height: 150px; object-fit: cover;">
                            @else
                              <img src="{{asset('images/avatar.png')}}" style="width:150px; height: 150px; object-fit: cover;">
                            @endif
                          </a>

                          &nbsp; &nbsp;
                          <br><br>
                          <?php
                            $pieces = explode(" ", $aluno->nome);
                            if(count($pieces) > 1){
                              echo $pieces[0],' ',$pieces[1];
                            }else{
                              echo $pieces[0];
                            }
                          ?>
                          {{$aluno->id}}
                          <br>
                          &nbsp; &nbsp;
                        </td>
                      @endfor
                    @endif

                  </tr>
                @endforeach

                @for($i = 1; $i <= $size; $i++ )
                  @php($aluno = array_pop($tresAlunos))
                  @if($aluno != null)
                    <td class="text-center">
                      <a class="btn btn-primary" href="{{ route("aluno.gerenciar",['id_aluno'=>$aluno->id]) }}">
                        @if($aluno->imagem != null)
                          <img src="{{$aluno->imagem}}" style="width:150px; height: 150px; object-fit: cover;">
                        @else
                          <img src="{{asset('images/avatar.png')}}" style="width:150px; height: 150px; object-fit: cover;">
                        @endif
                      </a>

                      &nbsp; &nbsp;
                      <br><br>
                      <?php
                        $pieces = explode(" ", $aluno->nome);
                        if(count($pieces) > 1){
                          echo $pieces[0],' ',$pieces[1];
                        }else{
                          echo $pieces[0];
                        }
                      ?>
                      {{$aluno->id}}

                      <br>
                      &nbsp; &nbsp;
                    </td>
                  @endif
                @endfor
              </tbody>
            </table>
          </div>

          @if($termo != "" && count($alunos) == 0)
            <div class="alert alert-danger">
              <strong> Nenhum resultado encontrado!</strong>
            </div>
          @elseif(count($alunos) == 0)
            <div class="alert alert-danger">
              <strong> Nenhum aluno cadastrado.</strong>
            </div>
          @endif

          <div class="text-center">
            {{$alunos->links()}}
          </div>
        </div>

        <div class="panel-footer">
          <a class="btn btn-danger" href="{{ route("home") }}">
            <i class="material-icons">home</i>
            <br>
            Início
          </a>

          <a class="btn btn-success" href="{{ route("aluno.cadastrar")}}">
            <i class="material-icons">add</i>
            <br>
            Novo
          </a>
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
