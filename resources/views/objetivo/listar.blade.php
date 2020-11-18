@extends('layouts.principal')
@section('title','Listar objetivos')
<!-- <a href="{{route('aluno.listar')}}">Início</a>
> <a href="{{route('aluno.gerenciar',$aluno->id)}}">Perfil de <strong>{{ explode(" ", $aluno->nome)[0]}}</strong></a>
> Objetivos
@section('navbar')
@endsection -->
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12" style="margin-top: -20px">
      <div class="panel panel-default" style="padding: 10px 20px;">

        <div class="panel-heading">
          <div class="row" style="margin-bottom: -20px">
            <div class="col-md-12">
              <div style="width: 100%; margin-left: 0%;" class="row">
                <div style="float: left;" class="col-md-6">
                  <h2>
                    <strong style="color: #12583C">
                      Objetivos para {{ explode(" ", $aluno->nome)[0]}}
                    </strong>
                  </h2>
                  <div style="font-size: 14px">
                    <a href="{{route('aluno.listar')}}">Início</a>> <a href="{{route('aluno.gerenciar',$aluno->id)}}">Perfil de <strong>{{ explode(" ", $aluno->nome)[0]}}</strong></a>> Objetivos
                  </div>
                </div>

                <div style="float:right;" class="col-md-2">
                  @if(App\Gerenciar::where('user_id','=',\Auth::user()->id)->where('aluno_id','=',$aluno->id)->first()->perfil_id != 1)
                    <a style="float:right; margin-top:20px; margin-left: -50px; background-color: #0398fc; color: white; font-weight: bold; font-size: 15px; padding: 7px; border-radius: 5px; border-color: #0398fc; box-shadow: 4px 4px 4px #CCC" href="{{ route('objetivo.cadastrar' , ['id_aluno'=>$aluno->id])}}">
                      Novo Objetivo
                    </a>
                  @endif
                </div>
                <div class="row col-md-4" style="float:right;">
                  @if(count($objetivosGroupByUser) != 0 || ($termo != "" && count($objetivosGroupByUser) == 0))
                    <form class="form-horizontal" method="GET" action="{{ route('objetivo.buscar', ['id-aluno' => $aluno->id]) }}">

                      <div id="divBusca" style="margin-top:20px;">

                      <i class="material-icons" style="margin-top:5px;">search</i>

                      @if ($termo == null)
                        <input id="termo" type="text" autocomplete="off" name="termo" autofocus placeholder="Título ou descrição">
                      @else
                        <input id="termo" type="text" autocomplete="off" name="termo" autofocus placeholder="Título ou descrição" value="{{$termo}}">
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

        <div class="panel-body">

          @if (\Session::has('success'))
            <br>
            <div class="alert alert-success">
              <strong>Sucesso!</strong>
              {!! \Session::get('success') !!}
            </div>
          @endif

          <div id="tabela_objetivos" class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr style="color: #12583C; font-size: 20px">
                  <th><strong>Usuário</strong></th>
                  <th><strong>Perfil</strong></th>
                  <th><strong>Objetivos</strong></th>
                </tr>
              </thead>
              <tbody>
                @php($user = 0)

                @foreach ($objetivosGroupByUser as $user_id => $objetivos)

                  <?php
                  //dd( $objetivos);
                    $perfil = "";

                    $gerenciar = App\Gerenciar::where('user_id','=',$user_id)->where('aluno_id','=',$aluno->id)->first();

                    if(isset($gerenciar->perfil) && $gerenciar->perfil->especializacao == NULL){
                      $perfil = $gerenciar->perfil->nome;
                    }else if(isset($gerenciar->perfil)){
                      $perfil = $gerenciar->perfil->especializacao;
                    }
                  ?>

                  <tr>
                    <td style="vertical-align:middle; color: #12583C" data-title="Usuario"><strong>{{ $objetivos[0]['user']['name']}}</strong></td>
                    <td style="vertical-align:middle; color: #12583C" data-title="Perfil"><strong>{{ $perfil }}</strong></td>

                    @php($temp = 0)

                    <td data-title="Objetivos" class="row col-md-8" style="margin-left:0px">
                      @foreach ($objetivos as $objetivo)
                        <a href="{{ route('objetivo.gerenciar', ['id_objetivo'=>$objetivo['id']]) }}">
                          <!-- $objetivo->cor->hexadecimal -->
                          <div class="card cartao" style="width: 20rem; height: 9rem; background-color:#12333C;  margin: 1% -5% 1% 5%;">
                            <div class="card-body" style="height:76%; margin-left: 5%; margin-right: 5%;margin-bottom: -5%; display: -webkit-flex; display: flex;-webkit-align-items: center;align-items: center;-webkit-justify-content: center;justify-content: center;">
                              <div class="hifen text-center" align="justify">
                                <font size="3" color="white">
                                  <strong> {{ ucfirst($objetivo['titulo']) }} </strong>
                                  <br>
                                </font>
                              </div>
                            </div>
                            <div style="margin-left: 5%; margin-right: 5%; display: -webkit-flex; display: flex;-webkit-align-items: center;align-items: center;-webkit-justify-content: center;justify-content: center;">
                              <div class="card-footer text-left">
                                <font size="3" color="white">
                                  {{ $objetivo['data'] }}
                                  <br>
                                </font>
                              </div>
                            </div>
                          </div>
                        </a>
                        @php($temp += 1)
                      @endforeach
                    </td>

                    @php($user += 1)

                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>

          @if($termo != "" && count($objetivosGroupByUser) == 0)
            <div class="alert alert-danger">
              <strong> Nenhum resultado encontrado!</strong>
            </div>
          @elseif(count($objetivosGroupByUser) == 0)
            <div class="alert alert-info">
              <strong> Nenhum objetivo cadastrado.</strong>
            </div>
          @endif
        </div>

        <div class="panel-footer" style="background-color:white">
          <div class="text-center">
            <a class="btn btn-secondary" href="{{route('aluno.gerenciar',$aluno->id)}}#perfil">
              Voltar
            </a>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

@endsection
