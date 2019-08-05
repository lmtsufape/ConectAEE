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

          <div id="tabela" class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Usuario</th>
                    <th colspan="{{ $size }}">Objetivos</th>
                  </tr>
                </thead>
                <tbody>
                  @php($user = 0)

                  @foreach ($objetivosGroupByUser as $objetivos)
                    <tr>
                      <td data-title="Usuario">{{ $objetivos[0]->user->name}}</td>

                      @php($temp = 0)

                      @foreach ($objetivos as $objetivo)
                        <td data-title="Objetivos">
                          <div style="background-color:{{$objetivo->cor}}">
                            <strong> {{ $objetivo->titulo }} </strong>
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
          <a class="btn btn-danger" href="{{route("aluno.gerenciar" , ['id_aluno'=>$aluno->id])}}">Voltar</a>

          @if(App\Gerenciar::where('user_id','=',\Auth::user()->id)->where('aluno_id','=',$aluno->id)->first()->perfil_id != 1)
            <a class="btn btn-success" href="{{ route("objetivo.cadastrar" , ['id_aluno'=>$aluno->id])}}">Novo</a>
          @endif

        </div>
      </div>
    </div>
  </div>
</div>

@endsection
