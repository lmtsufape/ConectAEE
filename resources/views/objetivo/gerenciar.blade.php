@extends('layouts.principal')
@section('title','Início')
@section('path','Início')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
				  <div class="panel-heading">Objetivo: <strong>{{$objetivo->titulo}}</strong></div>
				  <div class="panel-body">
					<div class="form-group">
						<strong>Título: </strong>{{$objetivo->titulo}}
						|
						<strong>Autor: </strong>{{$objetivo->user->name}}
						|
						<strong>Prioridade: </strong>{{$objetivo->prioridade}}
						|
						<strong>Tipo: </strong>{{$objetivo->tipo}}
						<br>
						<strong>Descrição: </strong>{{$objetivo->descricao}}
					</div>
				  </div>
				  <div class="panel-footer">
					  <a class="btn btn-primary" href={{route("objetivo.atividades.listar", ["id_objetivos"=>$objetivo->id, "aluno_id" => $objetivo->aluno_id]) }}>Atividades</a>
					  <a class="btn btn-primary" href={{route("objetivo.sugestoes.listar", ["id_objetivos"=>$objetivo->id, "aluno_id" => $objetivo->aluno_id]) }}>Sugestões</a>
				  </div>
				</div>


				  <div class="panel panel-default">

					<div class="panel-heading">Fórum do objetivo: {{$objetivo->titulo}} | <a class="btn btn-primary" href="{{route('objetivo.forum',['aluno' => $objetivo->aluno->id, 'objetivo' => $objetivo->id])."#forum"}}">Todas as Mensagens</a></div>
					<div class="panel-body">
						<form class="form-horizontal" method="POST" action="{{route('objetivo.forum.mensagem.enviar')}}">
							@csrf
							<input name="forum_id" type="text" value="{{$objetivo->forum->id}}" hidden>
							<div style="margin: 1%" class="form-group">
								<input name="mensagem" style="width:80%; display: inline" class="form-control" type="text">
								<button style="width:18%" type="submit" class="btn btn-success">Enviar</button>
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
													{{$mensagem->texto}}<br>
													{{$mensagem->created_at->format('d/m/y h:i')}}<br>
												</div>
											</div>
										</div>
									@else
										<div style="text-align: left; width: 80%" id='others-message'>
											<div class="panel panel-default">
												<div style="background-color: #adbaff" class="panel-body">
													<strong>{{$mensagem->user->name}}:</strong><br>
													{{$mensagem->texto}}<br>
													{{$mensagem->created_at->format('d/m/y h:i')}}<br>
												</div>
											</div>
										</div>
									@endif
								@endforeach
							</div>
					</div>

				  </div>

				</div>
			</div>
		</div>
	</div>
@endsection
