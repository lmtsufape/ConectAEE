@extends('layouts.principal')
@section('title','Cadastrar Arquivo')
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
                                @if($is_arquivo == 1)
                                    Novo Arquivo
                                @else
                                    Novo Link
                                @endif
                            </strong>
                            <div style="font-size: 14px" id="login-card">
                                <a href="{{route('aluno.index')}}">Início</a>
                                > <a href="{{route('aluno.gerenciar',$aluno->id)}}">Perfil de
                                    <strong>{{ explode(" ", $aluno->nome)[0]}}</strong></a>
                                > <a href="{{route('objetivo.listar',$aluno->id)}}">Objetivos</a>
                                > <a href="{{route('objetivo.gerenciar',[$objetivo->id])}}">{{$objetivo->titulo}}</a>
                                > {{$atividade->titulo}}
                                > <strong>Cadastro de
                                    @if($is_arquivo == 1)
                                        Arquivo
                                    @else
                                        Link
                                    @endif</strong>
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
                                    @if($is_arquivo == 1)
                                        Cadastrar Arquivo
                                    @else
                                        Cadastrar Link
                                    @endif
                                </strong>
                            </h3>

                            <hr style="border-top: 1px solid #AAA;">
                            <form method="post" action="{{route('arquivo.criar')}}" enctype="multipart/form-data">
                                {{csrf_field()}}

                                <input type="hidden" id="atividade_id" name="atividade_id" value="{{$atividade->id}}">

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="titulo">Titulo<font color="red">*</font></label><br>
                                        <input class="form-control" name="titulo" id="titulo" type="text"
                                               value="{{old('titulo')}}">
                                        @if ($errors->has('titulo'))
                                            <span class="help-block alert-warning">
                                                <strong>{{ $errors->first('titulo') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    @if($is_arquivo == 1)
                                        <div class="col-md-6">
                                            <label for="filenames">Arquivo</label><br>
                                            <input class="form-control" type="file" name="filenames"
                                                   class="myfrm form-control">
                                            @if ($errors->has('filenames'))
                                                <span class="help-block alert-warning">
                                                <strong>{{ $errors->first('filenames') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    @else
                                        <div class="col-md-6">
                                            <label for="link">Link</label><br>
                                            <input class="form-control" type="url" name="link"
                                                   class="myfrm form-control">
                                            @if ($errors->has('link'))
                                                <span class="help-block alert-warning">
                                                <strong>{{ $errors->first('link') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    @endif
                                </div>
                                {{--                                <div class="clone hide">--}}
                                {{--                                    <div class="hdtuto control-group lst input-group" style="margin-top:10px">--}}
                                {{--                                        <input type="file" name="filenames[]" class="myfrm form-control">--}}
                                {{--                                        <div class="input-group-btn">--}}
                                {{--                                            <button class="btn btn-danger" type="button"><i class="fas fa-trash-alt"></i> Remover--}}
                                {{--                                            </button>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}


                                <div class="form-group" id="login-card">
                                    <div class="row col-md-12 text-center" id="login-card">
                                        <br>
                                        <a class="btn btn-secondary" href="{{route('arquivo.listar', $atividade->id)}}"
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

    {{--    <script type="text/javascript">--}}
    {{--        $(document).ready(function () {--}}
    {{--            $(".btn-primary").click(function () {--}}
    {{--                var lsthmtl = $(".clone").html();--}}
    {{--                $(".increment").after(lsthmtl);--}}
    {{--            });--}}
    {{--            $(".btn-danger").click(function () {--}}
    {{--                $(this).parents(".hdtuto control-group lst").remove();--}}
    {{--            });--}}
    {{--        });--}}
    {{--    </script>--}}
@endsection