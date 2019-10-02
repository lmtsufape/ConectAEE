@extends('layouts.principal')
@section('title','Gerenciar aluno')

@section('navbar')
<a href="{{route('aluno.listar')}}">Início</a>
> Gerenciar: <strong>{{$aluno->nome}}</strong>
@endsection

@section('content')
<div class="container">
	<div class="row">

		<div id="painel" class="flex col-md-12">
			<div class="col-md-6">
				<div class="panel panel-default" style="width:100%">
					<div class="panel-heading">Gerenciamento de <strong>{{$aluno->nome}}</strong></div>

					<div class="panel-body">
						@if (\Session::has('success'))
	            <br>
	            <div class="alert alert-success">
	              <strong>Sucesso!</strong>
	              {!! \Session::get('success') !!}
	            </div>
	          @endif

						@php
							$gerenciars = $aluno->gerenciars;
						@endphp

						<div class="row-md-6">
							<div class="text-center">
								@if($aluno->imagem != null)
									<img src="{{asset('storage/avatars/'.$aluno->imagem)}}" style="border-radius: 60%; height:256px; width:256px; object-fit: cover;">
									<br/>
								@else
									<img src="{{asset('images/avatar.png')}}" style="border-radius: 60%; width:256px; height: 256px; object-fit: cover;">
									<br/>
								@endif
							</div>

							<br>

							@if(App\Gerenciar::where('user_id','=',\Auth::user()->id)->where('aluno_id','=',$aluno->id)->first()->isAdministrador)
								<div class="row text-right">
									<a class="btn btn-primary" href={{route("aluno.editar", ["id_aluno"=>$aluno->id]) }}>
										<i class="material-icons">edit</i>
									</a>
									<a class="btn btn-danger" onclick="return confirm('\Confirmar exclusão do aluno {{$aluno->nome}}?')" href={{route("aluno.excluir", ["id_aluno"=>$aluno->id]) }}>
										<i class="material-icons">delete</i>
									</a>
									&nbsp;&nbsp;
								</div>
							@endif

							<hr>
							<?php
							foreach($gerenciars as $gerenciar){
								if($gerenciar->user->id == \Auth::user()->id && $gerenciar->isAdministrador){
									?>
									<strong>Matrícula:</strong> {{$aluno->matricula}}
									<br/>
									<?php
									break;
								}
							}
							?>

							<strong>Nome:</strong> {{$aluno->nome}}
							<br/>

							@if($aluno->sexo == 'M')
								<strong>Sexo:</strong> Masculino
							@else
								<strong>Sexo:</strong> Feminino
							@endif

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
							<br>

							@foreach ($aluno->instituicoes as $instituicao)
								<a href="{{ route("instituicao.ver", ["id_instituiçao"=>$instituicao->id]) }}">{{$instituicao->nome}}</a>
								<br>
							@endforeach
							<hr>

							@if($aluno->cid != null)
								<strong>CID:</strong> {{$aluno->cid}}
								<br/>
								<strong>Descrição CID:</strong> {{$aluno->descricao_cid}}
								<br/>
							@endif

							<hr>

							@if($aluno->observacao != null)
								<strong>Observações:</strong> {!! $aluno->observacao !!}
								<br/>
							@endif
						</div>

					</div>

					<div class="panel-footer" style="background-color: white;">
						<div class="row" style="padding:2%">
							<div class="col-md-3">
								<a class="btn btn-danger" style="width:100%; height:6.6rem;" href="{{ route("aluno.listar")}}">
									<i class="material-icons">keyboard_backspace</i>
									<br>
									Voltar
								</a>
							</div>

							<div class="col-md-3">
								<a class="btn btn-primary" style="width:100%" href={{route("objetivo.listar", ["id_aluno"=>$aluno->id]) }}>
									<i class="material-icons">track_changes</i>
									<br>
									Objetivos
								</a>
							</div>

							<div class="col-md-3">
								<a class="btn btn-primary" style="width:100%" href={{route("album.listar", ["id_aluno"=>$aluno->id]) }}>
									<i class="large material-icons">wallpaper</i>
									<br>
									Álbuns
								</a>
							</div>

							<div class="col-md-3">
								@if(App\Gerenciar::where('user_id','=',\Auth::user()->id)->where('aluno_id','=',$aluno->id)->first()->isAdministrador == true)
									<a class="btn btn-primary text-center" style="width:100%" href={{route('aluno.permissoes',['id_aluno'=>$aluno->id])}}>
										<i class="material-icons">lock</i>
										<br>
										Acesso
									</a>
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-6">
				<div class="panel panel-default" style="width:100%">
					<div class="panel-heading" id="forum" >
							Fórum
					</div>

					<div class="panel-body">


						<form class="form-horizontal" method="POST" action="{{route('aluno.forum.mensagem.enviar')}}">
							@csrf
							<input name="forum_id" type="text" value={{$aluno->forum->id}} hidden>

							<div style="margin: 1%" class="form-group">
	              <textarea name="mensagem" style="width:75%; display: inline" id="summer" type="text" class="form-control summernote"></textarea>
	              <br>

								@if ($errors->has('mensagem'))
									<div style="margin-left: 1%; margin-right: 1%" class="alert alert-danger">
										<strong>Erro!</strong>
										{{ $errors->first('mensagem') }}
									</div>
								@endif

	              <button type="submit" class="btn btn-primary">Enviar</button>
	            </div>
						</form>

						<div class="form-group">
							@foreach($mensagens as $mensagem)
								@if($mensagem->user_id == \Auth::user()->id)
									<div style="text-align: right; width: 80%; margin-left: 20%" id='user-message'>

										<div class="panel panel-default">
											<div style="background-color: #bbffad;" class="panel-body">
												<div class="hifen">
													{!! $mensagem->texto !!}<br>
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
													{!! $mensagem->texto !!}<br>
													{{$mensagem->created_at->format('d/m/y h:i')}}<br>
												</div>
											</div>
										</div>
									</div>
								@endif
							@endforeach
						</div>
					</div>

					<div class="panel-footer" style="background-color: white;">
						@if(count($mensagens) > 5)
	           <a style="width:100%" href="{{route('aluno.forum',['id_aluno'=>$aluno->id]).'#forum'}}" class="btn btn-primary">Ver todas as mensagens</a>
					  @endif
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

  $('#summer').summernote({
    placeholder: 'Escreva sua mensagem aqui...',
    lang: 'pt-BR',
    tabsize: 2,
    height: 100
  });

</script>

@endsection
