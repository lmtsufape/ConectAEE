@extends('layouts.app')
@section('title','Listar autorizações')

@section('content')

@php($atual = App\Gerenciar::where('user_id','=',Auth::user()->id)->where('aluno_id','=',$aluno->id)->first())

<div class="container" style="color: #12583C">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default" style="margin-top: -20px; padding: 10px 20px;" id="login-card">
        <div class="panel-heading" id="login-card">
          <div class="row" id="login-card">
            <div class="col-md-12" id="login-card">
              <div style="width: 100%; margin-left: 0%;" class="row" id="login-card">
                <div style="width: 50%; float: left; margin-left:-20px;" class="col-md-6" id="login-card">
                  <h2>
                    <strong style="color: #12583C">Autorizações</strong>
                  </h2>
                  <div style="font-size: 14px" id="login-card">
                    <a href="{{route('aluno.listar')}}">Início</a>
                    > <a href="{{route('aluno.gerenciar',$aluno->id)}}">Perfil de <strong>{{ explode(" ", $aluno->nome)[0]}}</strong></a>
                    > Autorizações
                  </div>
                </div>
                <div style="width:50%; float:right; margin-right:-25px;margin-top:20px" class="col-md-6 text-right" id="login-card">
                  <a class="btn btn-primary" style="float:right; margin-left: -50px; background-color: #0398fc; color: white; font-weight: bold; font-size: 13px; padding: 7px; border-radius: 5px; border-color: #0398fc; box-shadow: 4px 4px 4px #CCC" id="signup" href="{{ route("aluno.permissoes.cadastrar",['id_aluno' => $aluno->id])}}">
                    Nova Autorização
                  </a>
                </div>
              </div>
            </div>
          </div>

          <hr style="border-top: 1px solid black;">
        </div>

        <div class="panel-body" id="login-card">
          @if (\Session::has('Success'))
            <br>
            <div class="alert alert-success" id="login-card">
              <strong>Sucesso!</strong>
              {!! \Session::get('Success') !!}
            </div>
          @endif
          @if (\Session::has('Removed'))
            <br>
            <div class="alert alert-success" id="login-card">
              <strong>Removido!</strong>
              {!! \Session::get('Removed') !!}
            </div>
          @endif

          <div id="tabela" class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th style="width:22.5%">Nome</th>
                  <th style="width:22.5%">Contato</th>
                  <th style="width:22.5%">Perfil</th>
                  <th style="width:22.5%">Administrador</th>
                  <th style="width:10%">Ações</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($gerenciars as $gerenciar)
                  <tr>
                    <td data-title="Nome">{{ $gerenciar->user->name }} </td>

                    <td data-title="Contato">
                      @if($gerenciar->user->email != null)
                        <strong>Email:</strong> {{ $gerenciar->user->email }}
                      @endif
                      <strong>Telefone:</strong> {{ $gerenciar->user->telefone }}
                    </td>

                    @if($gerenciar->perfil->especializacao == NULL)
                      <td data-title="Perfil/Especialização">{{ $gerenciar->perfil->nome }} </td>
                    @else
                      <td data-title="Perfil/Especialização">{{ $gerenciar->perfil->especializacao }} </td>
                    @endif

                    <td data-title="Administrador">{{ ($gerenciar->isAdministrador) ? 'Sim' : 'Não' }}</td>

                    @if($atual->isAdministrador)
                      @if(!($gerenciar->user->id == Auth::user()->id))
                        @if(!($gerenciar->isAdministrador))
                          <td data-title="Ações">
                            <a class="btn btn-primary" href='{{route('aluno.permissoes.editar',[$gerenciar->id])}}'>
                              Editar
                            </a>
                          </td>
                          <td data-title="">
                            <a class="btn btn-danger" href='{{route('aluno.permissoes.remover',[$gerenciar->id])}}' onclick="return confirm('Essa ação removerá as permissões de {{$gerenciar->user->name}}. Deseja prosseguir?')">
                              Excluir
                            </a>
                          </td>
                        @else
                          <td></td>
                          <td></td>
                        @endif
                      @else
                        <td></td>
                        <td></td>
                      @endif
                    @endif
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

        <div class="panel-footer" style="background-color:white" id="login-card">
          <div class="text-center" id="login-card">
            <a class="btn btn-secondary" href="{{route('aluno.gerenciar',$aluno->id)}}#perfil" id="menu-a">
              Voltar
            </a>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

@endsection
