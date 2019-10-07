@extends('layouts.principal')
@section('title','Perfil de aluno')

@section('navbar')
<a href="{{route('aluno.listar')}}">Início</a>
> Perfil de <strong>{{ explode(" ", $aluno->nome)[0]}}</strong>
@endsection

@section('content')
<div class="container">
	<div class="row">

		<div class="col-md-12">
			<div class="panel panel-default" style="width:100%">

				<div class="panel-body">
					@if (\Session::has('success'))
	          <div class="alert alert-success">
	            <strong>Sucesso!</strong>
	            {!! \Session::get('success') !!}
	          </div>
	        @endif

					@php
						$gerenciars = $aluno->gerenciars;
					@endphp

					<div class="row">
						<div class="col-md-12">
							<div class="col-md-2">
								<div class="text-center">
									@if($aluno->imagem != null)
										<img src="{{asset('storage/avatars/'.$aluno->imagem)}}" style="border-radius: 60%; height:150px; width:150px; object-fit: cover;">
										<br/>
									@else
										<img src="{{asset('images/avatar.png')}}" style="border-radius: 60%; width:150px; height: 150px; object-fit: cover;">
										<br/>
									@endif
								</div>

								<br>

								@if(App\Gerenciar::where('user_id','=',\Auth::user()->id)->where('aluno_id','=',$aluno->id)->first()->isAdministrador)
									<div class="row">
										<div style="width: 100%; margin-left: 0%" class="row">
			                <div style="width: 50%; float:left;" class="col-md-6 text-center">
												<a class="btn btn-primary" style="width:80%" href={{route("aluno.editar", ["id_aluno"=>$aluno->id]) }}>
													<i class="material-icons">edit</i>
												</a>
			                </div>
			                <div style="width: 50%; float:right;" class="col-md-6 text-center">
												<a class="btn btn-danger" style="width:80%" onclick="return confirm('\Confirmar exclusão do aluno {{$aluno->nome}}?')" href={{route("aluno.excluir", ["id_aluno"=>$aluno->id]) }}>
													<i class="material-icons">delete</i>
												</a>
			                </div>
										</div>
		              </div>
								@endif

							</div>

							<div class="col-md-5">
								<strong>Nome:</strong> {{$aluno->nome}}

								<br>

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

								@if($aluno->sexo == 'M')
									<strong>Sexo:</strong> Masculino
								@else
									<strong>Sexo:</strong> Feminino
								@endif

								<br/>
								<strong>Data de Nascimento:</strong> {{$aluno->data_de_nascimento}}
								<br/>
								<strong>Endereço:</strong>
								<br>
								<?php
									echo $aluno->endereco->logradouro, ", n<code>&deg;</code>",
									$aluno->endereco->numero, ", ",
									$aluno->endereco->bairro, ", ",
									$aluno->endereco->cidade, " - ",
									$aluno->endereco->estado;
								?>
							</div>

							<div class="col-md-5">

								@if($aluno->cid != null)
									<strong>CID:</strong> {{$aluno->cid}}
									<br/>
									<strong>Descrição CID:</strong> {{$aluno->descricao_cid}}
									<br/>
								@endif

								<br>
								<strong>Instituições:</strong>
								<br>

								<ul>
									@foreach ($aluno->instituicoes as $instituicao)
										<li>
											<a href="{{ route("instituicao.ver", ["id_instituiçao"=>$instituicao->id]) }}">{{$instituicao->nome}}</a>
										</li>
									@endforeach
								</ul>

								<br>
							</div>
						</div>

						<div class="col-md-12">

							<div class="col-md-10 col-md-offset-2">
								@if($aluno->observacao != null)
									<strong>Observações:</strong> {!! $aluno->observacao !!}
									<br/>
								@endif
							</div>
						</div>
					</div>

					<hr style="border-top: 1px solid black;">

					<div class="row">
						<a href="{{route("objetivo.listar", ["id_aluno"=>$aluno->id]) }}">
							<div class="card cartao text-center " style="border-radius: 20px">
								<div class="card-body d-flex justify-content-center">
									<h2 style="margin-top:80px;">
										<img src="{{asset('images/objetivo.png')}}" style="width:44px; height:44px;">
										<br>
										Objetivos
									</h2>
								</div>
							</div>
						</a>

						<a href="{{route("album.listar", ["id_aluno"=>$aluno->id]) }}">
							<div class="card cartao text-center " style="border-radius: 20px">
								<div class="card-body d-flex justify-content-center">
									<h2 style="margin-top:80px;">
										<img src="{{asset('images/album.png')}}" style="width:44px; height:44px;">
										<br>
										Álbuns
									</h2>
								</div>
							</div>
						</a>

						@if(App\Gerenciar::where('user_id','=',\Auth::user()->id)->where('aluno_id','=',$aluno->id)->first()->isAdministrador == true)
							<a href="{{route('aluno.permissoes',['id_aluno'=>$aluno->id])}}">
								<div class="card cartao text-center " style="border-radius: 20px">
									<div class="card-body d-flex justify-content-center">
										<h2 style="margin-top:80px;">
											<img src="{{asset('images/acesso.png')}}" style="width:44px; height:44px;">
											<br>
											Acesso
										</h2>
									</div>
								</div>
							</a>
						@endif
					</div>
				</div>

				<!-- <div class="panel-footer" style="background-color:white">
          <a class="btn btn-danger" href="{{URL::previous()}}">
            <i class="material-icons">keyboard_backspace</i>
            <br>
            Voltar
          </a>
        </div> -->
		</div>
	</div>

  <!-- <a id="btn-mensagem" href="javascript:register_popup('mensagens', 'Mensagens');">
		Mensagens
  </a> -->

  </div>
</div>

<!-- <link href="{{ asset('css/mensagens.css') }}" rel="stylesheet"> -->

<!-- <script src="{{ asset('js/mensagens.js') }}"></script> -->

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
