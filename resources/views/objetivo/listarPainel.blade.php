@extends('layouts.principal')
@section('title','Listar objetivos')
@section('navbar')
<a href="{{route('aluno.listar')}}">Início</a>
> <a href="{{route('aluno.gerenciar',$aluno->id)}}">Gerenciar: <strong>{{$aluno->nome}}</strong></a>
> Objetivos
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Objetivos</div>

        <div class="panel-body">

          @if (\Session::has('success'))
            <br>
            <div class="alert alert-success">
              <strong>Sucesso!</strong>
              {!! \Session::get('success') !!}
            </div>
          @endif

          <div id="tabela" style="overflow-x:auto" class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Perfil</th>
                  <th>Usuário</th>
                  <th colspan="{{ $size }}">Objetivos</th>
                </tr>
              </thead>
              <tbody>
                @php($user = 0)

                @foreach ($objetivosGroupByUser as $user_id => $objetivos)

                  <?php
                    $perfil = "";

                    $gerenciar = App\Gerenciar::where('user_id','=',$user_id)->where('aluno_id','=',$aluno->id)->first();

                    if($gerenciar->perfil->especializacao == NULL){
                      $perfil = $gerenciar->perfil->nome;
                    }else{
                      $perfil = $gerenciar->perfil->especializacao;
                    }
                  ?>

                  <tr>
                    <td style="vertical-align:middle" data-title="Perfil">{{ $perfil }}</td>
                    <td style="vertical-align:middle" data-title="Usuario">{{ $objetivos[0]->user->name}}</td>

                    @php($temp = 0)

                    @foreach ($objetivos as $objetivo)
                      <td data-title="Objetivos">
                        <div class="card" style="width: 19rem; height: 19rem; background-color:{{$objetivo->cor->hexadecimal}}">
                          <div class="card-body" style="height:76%; margin-left: 5%; margin-right: 5%; display: -webkit-flex; display: flex;-webkit-align-items: center;align-items: center;-webkit-justify-content: center;justify-content: center;">
                            <div class="hifen text-center" align="justify">
                              <font size="3">
                                <strong> {{ ucfirst($objetivo->titulo) }} </strong>
                              </font>
                            </div>
                          </div>
                          <div class="card-footer text-center">
                            @if($objetivo->user->id == \Auth::user()->id)
                              <a href="{{ route("objetivo.gerenciar", ['id_objetivo'=>$objetivo->id]) }}" class="btn btn-primary">Gerenciar</a>
                            @else
                              <a href="{{ route("objetivo.gerenciar", ['id_objetivo'=>$objetivo->id]) }}" class="btn btn-success">Ver</a>
                            @endif
                          </div>
                        </div>
                      </td>
                      @php($temp += 1)
                    @endforeach

                    @php($user += 1)

                    @while($temp < $size)
                      <td></td>
                      @php($temp += 1)
                    @endwhile
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

        <div class="panel-footer">
          <a class="btn btn-danger" href="{{route("aluno.gerenciar" , ['id_aluno'=>$aluno->id])}}">
            <i class="material-icons">keyboard_backspace</i>
            <br>
            Voltar
          </a>

          @if(App\Gerenciar::where('user_id','=',\Auth::user()->id)->where('aluno_id','=',$aluno->id)->first()->perfil_id != 1)
            <a class="btn btn-success" href="{{ route("objetivo.cadastrar" , ['id_aluno'=>$aluno->id])}}">
              <i class="material-icons">add</i>
              <br>
              Novo
            </a>
          @endif

        </div>
      </div>
    </div>
  </div>
</div>

@endsection
