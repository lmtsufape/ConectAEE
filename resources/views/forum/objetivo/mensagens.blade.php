@extends('layouts.principal')
@section('title','Início')
@section('navbar')
<a href="{{route('aluno.listar')}}">Alunos</a>
 > <a href="{{route('aluno.gerenciar',$objetivo->aluno->id)}}">Gerenciar: <strong>{{$objetivo->aluno->nome}}</strong></a>
 > <a href="{{route('objetivo.listar',$objetivo->aluno->id)}}">Objetivos</a>
 > <a href="{{route('objetivo.gerenciar',[$objetivo->aluno->id,$objetivo->id])}}"><strong>{{$objetivo->titulo}}</strong></a>
 > Fórum
@endsection
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div id="forum" class="panel-heading">Fórum de <strong>{{$objetivo->titulo}}</strong></div>
					<div class="panel-body">
						@if ($errors->has('texto'))
							<div style="margin-left: 1%; margin-right: 1%" class="alert alert-danger">
								<strong>Erro!</strong>
								{{ $errors->first('texto') }}
							</div>
						@endif
						<form class="form-horizontal" method="POST" action="{{route('objetivo.forum.mensagem.enviar')}}">
						@csrf
						<input name="forum_id" type="text" value={{$objetivo->forum->id}} hidden>

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
