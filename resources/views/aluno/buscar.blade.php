@extends('layouts.principal')
@section('title','Início')
@section('navbar')
<a href="{{route('aluno.listar')}}">Alunos</a>
 > Buscar
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Buscar alunos</div>

        <div class="panel-body">
          <form class="form-horizontal" method="POST" action="{{ route("aluno.buscarCodigo") }}">

            {{ csrf_field() }}

            <div class="row input-field">
              <div class="col-sm-10">
                @if ($codigo == null)
                  <input id="codigo" type="text" class="form-control" name="codigo" autofocus required placeholder="Código do aluno">
                @else
                  <input id="codigo" type="text" class="form-control" name="codigo" autofocus value="{{$codigo}}" required placeholder="Código do aluno">
                @endif
              </div>

              <button type="submit" class="btn btn-primary">
                Buscar
              </button>
            </div>
          </form>

          <br>

          @if(gettype($aluno) == 'array')

          @elseif($aluno == null)
            <div class="alert alert-danger">
              <strong> Nenhum resultado encontrado. </strong>
            </div>
          @else
            <div id="tabela" class="table-responsive">
              <table class="max-width table table-hover">

                <thead>
                  <tr>
                    <th>Resultado:</th>
                  </tr>
                </thead>

                <tbody>
                  <tr>
                    <td data-title="Nome" >{{ $aluno->nome }}</td>
                    <td>
                      @if(!$botaoAtivo)
                      <a class="btn btn-primary" href="{{ route("aluno.permissoes.requisitar", ["cod_aluno" => $codigo]) }}">
                        Pedir permissão
                      </a>
                      @else
                      <a class="btn btn-success" href="{{ route("aluno.gerenciar", ["id_aluno" => $aluno->id]) }}">
                        Gerenciar
                      </a>
                      @endif
                    </td>
                  </tr>
                </tbody>

              </table>
            </div>

          @endif

        </div>

        <div class="panel-footer">
          <a class="btn btn-danger" href="{{ route("home") }}">Voltar</a>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
