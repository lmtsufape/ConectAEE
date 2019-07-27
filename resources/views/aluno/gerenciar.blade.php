@extends('layouts.principal')
@section('title','Início')

@section('navbar')
<a href="{{route('aluno.listar')}}">Alunos</a>
> Gerenciar: <strong>{{$aluno->nome}}</strong>
@endsection

@section('content')
<div class="container">
	<div class="row col-md-offset-1">
		<div class="col-md-6">
			<div class="panel panel-default">
			  <div class="panel-heading">Gerenciamento de <strong>{{$aluno->nome}}</strong></div>

				<div class="panel-body">
					@php
						$gerenciars = $aluno->gerenciars;
					@endphp

					<div class="row-md-6">
						<div class="text-center">
							@if($aluno->imagem != null)
								<img style="object-fit: cover;" src="{{$aluno->imagem}}" height="256" width="256" >
								<br/>
							@endif
						</div>

						<hr>
						<?php
							foreach($gerenciars as $gerenciar){
								if($gerenciar->user->id == \Auth::user()->id && $gerenciar->isAdministrador){
						?>
									<strong>Código:</strong> {{$aluno->codigo}}
									<br/>
						<?php
									break;
								}
							}
						?>

						<strong>Nome:</strong> {{$aluno->nome}}
						<br/>
						<strong>Sexo:</strong> {{$aluno->sexo}}
						<br/>
						<strong>Data de Nascimento:</strong> {{$aluno->data_de_nascimento}}
						<br/>
						<strong>Endereço:</strong>

						<?php
							echo $aluno->endereco->logradouro, ", ",
							$aluno->endereco->numero, ", ",
							$aluno->endereco->bairro, ", ",
							$aluno->endereco->cidade, " - ",
							$aluno->endereco->estado;
						?>

						<hr>
						<strong>Instituição(ões):</strong>
						<br/>

						<?php
							foreach ($aluno->instituicoes as $instituicao) {
							    echo ($instituicao->nome."<br/>");
							}
						?>
						<hr>

						@if($aluno->cid != null)
							<strong>CID:</strong> {{$aluno->cid}}
							<br/>
							<strong>Descrição CID:</strong> {{$aluno->descricao_cid}}
							<br/>
						@endif

						<hr>

						@if($aluno->observacao != null)
							<strong>Observações:</strong> {{$aluno->observacao}}
							<br/>
						@endif
					</div>

					<br/>

				</div>

				<div class="panel-footer">
					<a class="btn btn-danger" href="{{ route("aluno.listar")}}">Voltar</a>

					@if(App\Gerenciar::where('user_id','=',\Auth::user()->id)->where('aluno_id','=',$aluno->id)->first()->isAdministrador == true)
						<a class="btn btn-primary" href={{route('aluno.permissoes',['id_aluno'=>$aluno->id])}}>Gerenciar Permissões</a>
					@endif

					<a class="btn btn-primary" href={{route("objetivo.listar", ["id_aluno"=>$aluno->id]) }}>Objetivos</a>
					<a class="btn btn-primary" href={{route("album.listar", ["id_aluno"=>$aluno->id]) }}>Álbuns</a>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="panel panel-default">
				<div id="forum" class="panel-heading">
					<div class="card-title text-center">
						Fórum
					</div>
				</div>

				<div class="panel-body">
					@if ($errors->has('texto'))
						<div style="margin-left: 1%; margin-right: 1%" class="alert alert-danger">
							<strong>Erro!</strong>
							{{ $errors->first('texto') }}
						</div>
					@endif
					<form class="form-horizontal" method="POST" action="{{route('aluno.forum.mensagem.enviar')}}">
					  @csrf
					  <input name="forum_id" type="text" value={{$aluno->forum->id}} hidden>

            <div style="margin: 1%" class="form-group">
              <input name="mensagem" style="width:75%; display: inline" class="form-control" type="text">
              <button style="width:23%" type="submit" class="btn btn-success">Enviar</button>
            </div>
					</form>
				</div>

				<div class="panel-footer">
					<div class="form-group">
						@foreach($mensagens as $mensagem)
							@if($mensagem->user_id == \Auth::user()->id)
								<div style="text-align: right; width: 80%; margin-left: 20%" id='user-message'>
									<div class="panel panel-default">
										<div style="background-color: #bbffad" class="panel-body">
											<div class="hifen">
												{{$mensagem->texto}}<br>
												{{$mensagem->created_at->format('d/m/y h:i')}}<br>
											</div>
										</div>
									</div>
								</div>
							@else
								<div style="text-align: left; width: 80%" id='others-message'>
									<div class="panel panel-default">
										<div style="background-color: #adbaff" class="panel-body">
											<div class="hifen">
												<strong>{{$mensagem->user->name}}:</strong><br>
												{{$mensagem->texto}}<br>
												{{$mensagem->created_at->format('d/m/y h:i')}}<br>
											</div>
										</div>
									</div>
								</div>
							@endif
						@endforeach
					</div>

					<div class="text-center">
						<a style="text-align: center" href="{{route('aluno.forum',['id_aluno'=>$aluno->id]).'#forum'}}" class="btn btn-primary">Ver todas as mensagens</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
