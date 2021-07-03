@extends('layouts.principal')
@section('title','Cadastrar PDI')
@section('path','Início')

@section('navbar')
@endsection

@section('content')
    <div class="container" style="color: #12583C">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default" style="margin-top: -20px; padding: 10px 20px;" id="login-card">
                    <div class="panel-heading" id="login-card">
                        <h2>
                            <strong style="color: #12583C">
                                Cadastrar Arquivo PDI
                            </strong>
                            <div style="font-size: 14px" id="login-card">
                                <a href="{{route('aluno.listar')}}">Início</a>> <a
                                        href="{{route('aluno.gerenciar',$aluno->id)}}">Perfil de
                                    <strong>{{ explode(" ", $aluno->nome)[0]}}</strong></a>>
                                <a href="{{route('pdi.listar', $aluno->id)}}">Listar PDI's</a>>
                                Cadastrar Arquivo PDI
                            </div>
                        </h2>

                        <hr style="border-top: 1px solid #AAA;">
                    </div>
                    <div class="panel-body panel-body-cadastro" id="login-card">
                        <div class="col-md-8 col-md-offset-2" id="login-card">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif


                            <h3>
                                <strong>
                                        Arquivo PDI
                                </strong>
                            </h3>

                            <hr style="border-top: 1px solid #AAA;">
                            <form method="post" action="{{route('pdi.criarArquivo')}}" enctype="multipart/form-data">
                                {{csrf_field()}}

                                <input type="hidden" name="aluno_id" id="aluno_id" value="{{$aluno->id}}">

                                <div class="row">
                                        <div class="col-md-6">
                                            <label for="filename">Arquivo<span style="color: red">*</span></label><br>
                                            <input class="form-control" type="file" name="filename"
                                                   class="myfrm form-control">
                                            @if ($errors->has('filename'))
                                                <span class="help-block alert-warning">
                                                <strong>{{ $errors->first('filename') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                </div>

                                <div class="form-group" id="login-card">
                                    <div class="row col-md-12 text-center" id="login-card">
                                        <br>
                                        <a class="btn btn-secondary" href="{{route('pdi.listar', $aluno->id)}}"
                                           id="menu-a">
                                            Voltar
                                        </a>
                                        <button type="submit" class="btn btn-primary">
                                            Cadastrar
                                        </button>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
