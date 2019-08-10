@extends('layouts.principal')
@section('title','Listar permissões')
@section('navbar')
<a href="{{route('aluno.listar')}}">Início</a>
> <a href="{{route('aluno.gerenciar',$aluno->id)}}">Gerenciar: <strong>{{$aluno->nome}}</strong></a>
> Permissões
@endsection
@section('content')

@php($atual = App\Gerenciar::where('user_id','=',Auth::user()->id)->where('aluno_id','=',$aluno->id)->first())

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Permissões de {{$aluno->nome}}</div>

        <div class="panel-body">
          @if (\Session::has('Success'))
            <br>
            <div class="alert alert-success">
              <strong>Sucesso!</strong>
              {!! \Session::get('Success') !!}
            </div>
          @endif
          @if (\Session::has('Removed'))
            <br>
            <div class="alert alert-success">
              <strong>Removido!</strong>
              {!! \Session::get('Removed') !!}
            </div>
          @endif

          <div id="tabela" class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>Perfil</th>
                  <th>Administrador</th>
                  @if($atual->isAdministrador)
                    <th>Remover</th>
                  @endif
                </tr>
              </thead>
              <tbody>
                @foreach ($gerenciars as $gerenciar)
                  <tr>
                    <td data-title="Nome">{{ $gerenciar->user->name }} </td>

                    @if($gerenciar->perfil->especializacao == NULL)
                      <td data-title="Perfil">{{ $gerenciar->perfil->nome }} </td>
                    @else
                      <td data-title="Perfil">{{ $gerenciar->perfil->especializacao }} </td>
                    @endif

                    <td data-title="Administrador">{{ ($gerenciar->isAdministrador) ? 'Sim' : 'Não' }}</td>

                    @if($atual->isAdministrador)
                      @if(!($gerenciar->user->id == Auth::user()->id))
                        @if(!($gerenciar->isAdministrador))
                          <td data-title="Excluir"><strong style="color: red">
                            <a href='{{route('aluno.permissoes.remover',[$aluno->id,$gerenciar->id])}}' style="color: red" onclick="return confirm('Essa ação removerá as permissões de {{$gerenciar->user->name}}. Deseja prosseguir?')">X</a>
                          </strong></td>
                        @else
                          <td>-</td>
                        @endif
                      @else
                        <td>-</td>
                      @endif
                    @endif
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

        <div class="panel-footer">
          <a class="btn btn-danger" href="{{URL::previous()}}">
            <i class="material-icons">keyboard_backspace</i>
            <br>
            Voltar
          </a>
          <a class="btn btn-success" href="{{ route("aluno.permissoes.cadastrar",['id_aluno' => $aluno->id])}}">
            <i class="material-icons">add</i>
            <br>
            Novo
          </a>
        </div>

      </div>
    </div>
  </div>
</div>

@endsection
