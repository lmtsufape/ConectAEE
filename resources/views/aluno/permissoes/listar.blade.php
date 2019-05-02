@extends('layouts.principal')
@section('title','Início')
@section('path','Início')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
            <div class="panel-heading">Permissões de {{$aluno->nome}}</div>
              @if (\Session::has('Success'))
                <br>
                <div class="alert alert-success">
                    <strong>Sucesso!</strong>
                    {!! \Session::get('Success') !!}
                </div>
              @endif
              <div class="panel-body">
                <div id="tabela" class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                          <th>Nome</th>
                          <th>Cargo</th>
                          <th>Administrador</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($gerenciars as $gerenciar)
                        <tr>
                          <td data-title="Nome">{{ $gerenciar->gerenciador->name }} </td>
                          @if($gerenciar->cargo->especializacao == NULL)
                            <td data-title="Cargo">{{ $gerenciar->cargo->nome }} </td>
                          @else
                            <td data-title="Cargo">{{ $gerenciar->cargo->especializacao }} </td>
                          @endif
                          <td data-title="Administrador">{{ ($gerenciar->isAdministrador) ? 'Sim' : 'Não' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
        
              <div class="panel-footer">
                <a class="btn btn-danger" href="{{URL::previous()}}">Voltar</a>
                <a class="btn btn-success" href="{{ route("aluno.permissoes.cadastrar",['id' => $aluno->id])}}">Novo</a>
              </div>
            </div>
        </div>
      </div>
    </div>
@endsection
