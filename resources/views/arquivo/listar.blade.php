@extends('layouts.principal')
@section('title','Listar Arquivo')
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
                                Listar Arquivos e Links
                            </strong>
                            <div style="font-size: 14px" id="login-card">
                                <a href="{{route('aluno.listar')}}">Início</a>
                                > <a href="{{route('aluno.gerenciar',$aluno->id)}}">Perfil de
                                    <strong>{{ explode(" ", $aluno->nome)[0]}}</strong></a>
                                > <a href="{{route('objetivo.listar',$aluno->id)}}">Objetivos</a>
                                > <a href="{{route('objetivo.gerenciar',[$objetivo->id])}}">{{$objetivo->titulo}}</a>
                                > {{$atividade->titulo}}
                                > <strong>Listar Arquivos</strong>
                            </div>
                        </h2>

                        <hr style="border-top: 1px solid #AAA;">
                    </div>

                    <div class="container main-section pt-20" style="width: 100%">
                        @if (\Session::has('success'))
                            <br>
                            <div class="alert alert-success alert-dismissible" id="success-alert">
                                <strong>Sucesso!</strong>
                                {!! \Session::get('success') !!}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"
                                        style="color: darkred">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-3 tab-head">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link" id="home-tab" data-toggle="tab" href="#home"
                                                   role="tab"
                                                   aria-controls="home" aria-selected="true"><i class="fa fa-file"
                                                                                                aria-hidden="true"></i>
                                                    Arquivos</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"
                                                   role="tab"
                                                   aria-controls="profile" aria-selected="false"><i
                                                            class="fa fa-link"
                                                            aria-hidden="true"></i> Links</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-12 main-tab">
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="home" role="tabpanel"
                                                 aria-labelledby="home-tab">
                                                <div class="row m-0">
                                                    <div class="col-lg-3 document pt-3">
                                                        <a href="{{route('arquivo.cadastrar', ['id_atividade' => $atividade->id, 'is_arquivo' => true])}}"
                                                           class="btn btn-success btn-sm w-100 mt-2 mb-3"
                                                           style="width: 100%; margin-top: 10px"><i class="fa fa-plus"
                                                                                                    aria-hidden="true"></i>
                                                            Cadastrar Arquivo</a>
                                                        <div class="card"
                                                             style="width: 22rem; margin-left: 2%; margin-right: 50%; margin-top: 5%; margin-bottom: 10%">
                                                            <div class="card-body text-center"
                                                                 style="border-style: ridge; border-width: 3px; background-color: #dfe6e0">
                                                                <h5 class="card-title">Arquivos</h5>
                                                                <p class="card-text">Adicione arquivos referentes à
                                                                    atividade realizada com o aluno.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-9 document-left-list">
                                                        <div class="document-left-list-second p-3">
                                                            <button class="btn-primary text-white" id="pdfButton"
                                                                    style="background-color: #cbb956">
                                                                <span>PDF <i class="fa fa-file-pdf-o"
                                                                             aria-hidden="true"></i></span>
                                                            </button>
                                                            <button class="btn-primary text-white" id="excelButton"
                                                                    style="background-color: #1D6F42">
                                                                <span>Excel <i class="fa fa-file-excel-o"
                                                                               aria-hidden="true"></i></span>
                                                            </button>
                                                            <button class="btn-primary text-white" id="pptButton"
                                                                    style="background-color: #D04423">
                                                                <span>PowerPoint <i class="fa fa-file-powerpoint-o"
                                                                                    aria-hidden="true"></i></span>
                                                            </button>
                                                            <button class="btn-primary text-white" id="wordButton"
                                                                    style="background-color: #2b579a">
                                                                <span>Word <i class="fa fa-file-word-o"
                                                                              aria-hidden="true"></i></span>
                                                            </button>
                                                            <div class="pdf" id="pdf"
                                                                 style="background-color: #d7e9fa; padding: 20px;margin-top: 10px;">
                                                                <?php
                                                                $count = 0;
                                                                ?>
                                                                @foreach($arquivos as $arquivo)
                                                                    @if($arquivo->link == null and $arquivo->extensao == 'pdf')
                                                                        @if($count == 0)
                                                                            <div class="row mt-3">
                                                                                @endif
                                                                                <div class="col-lg-3">
                                                                                    <div>
                                                                                        <div class="square"
                                                                                             style="background-color: #cbb956">
                                                                                            <div class="vertical-center">
                                                                                                <span style="color: white">{{$arquivo->titulo.'.'.$arquivo->extensao}}</span>
                                                                                                <br>
                                                                                                <a href="{{route('arquivo.download', $arquivo->id)}}"
                                                                                                   style="color: gray"><i class="fa fa-download"></i></a> -
                                                                                                <a style="color: darkred"
                                                                                                   href="{{route('arquivo.excluir', $arquivo->id)}}"
                                                                                                   onclick="return confirm('Você tem certeza que deseja excluir o arquivo?')"><i
                                                                                                            class="far fa-trash-alt"></i></a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <?php $count += 1; ?>
                                                                                @if($count == 4)
                                                                            </div>
                                                                            <?php $count = 0 ?>
                                                                        @endif
                                                                    @endif
                                                                @endforeach
                                                                @if($count != 0)
                                                            </div>
                                                            @endif
                                                        </div>
                                                        <div class="excel" id="excel"
                                                             style="background-color: #d7e9fa; padding: 20px;margin-top: 10px;">
                                                            <?php
                                                            $count = 0;
                                                            ?>
                                                            @foreach($arquivos as $arquivo)
                                                                @if($arquivo->link == null and ($arquivo->extensao == 'xlsx' or $arquivo->extensao == 'xlsm'))
                                                                    @if($count == 0)
                                                                        <div class="row mt-3">
                                                                            @endif
                                                                            <div class="col-lg-3">
                                                                                <div>
                                                                                    <div class="square"
                                                                                         style="background-color: #1D6F42">
                                                                                        <div class="vertical-center">
                                                                                            <span style="color: white">{{$arquivo->titulo.'.'.$arquivo->extensao}}</span>
                                                                                            <br>
                                                                                            <a href="{{route('arquivo.download', $arquivo->id)}}"
                                                                                               style="color: gray"><i class="fa fa-download"></i></a> -
                                                                                            <a style="color: darkred"
                                                                                               href="{{route('arquivo.excluir', $arquivo->id)}}"
                                                                                               onclick="return confirm('Você tem certeza que deseja excluir o arquivo?')"><i
                                                                                                        class="far fa-trash-alt"></i></a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <?php $count += 1; ?>
                                                                            @if($count == 4)
                                                                        </div>
                                                                        <?php $count = 0 ?>
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                            @if($count != 0)
                                                        </div>
                                                        @endif

                                                    </div>
                                                    <div class="powerpoint" id="powerpoint"
                                                         style="background-color: #d7e9fa; padding: 20px;margin-top: 10px;">
                                                        <?php
                                                        $count = 0;
                                                        ?>
                                                        @foreach($arquivos as $arquivo)
                                                            @if($arquivo->link == null and ($arquivo->extensao == 'ppt' or $arquivo->extensao == 'pptx'))
                                                                @if($count == 0)
                                                                    <div class="row mt-3">
                                                                        @endif
                                                                        <div class="col-lg-3">
                                                                            <div>
                                                                                <div class="square"
                                                                                     style="background-color: #D04423">
                                                                                    <div class="vertical-center">
                                                                                        <span style="color: white">{{$arquivo->titulo.'.'.$arquivo->extensao}}</span>
                                                                                        <br>
                                                                                        <a href="{{route('arquivo.download', $arquivo->id)}}"
                                                                                           style="color: gray"><i class="fa fa-download"></i></a> -
                                                                                        <a style="color: darkred"
                                                                                           href="{{route('arquivo.excluir', $arquivo->id)}}"
                                                                                           onclick="return confirm('Você tem certeza que deseja excluir o arquivo?')"><i
                                                                                                    class="far fa-trash-alt"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <?php $count += 1; ?>
                                                                        @if($count == 4)
                                                                    </div>
                                                                    <?php $count = 0 ?>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        @if($count != 0)
                                                    </div>
                                                    @endif
                                                </div>

                                                <div class="word" id="word"
                                                     style="background-color: #d7e9fa; padding: 20px;margin-top: 10px;">
                                                    <?php
                                                    $count = 0;
                                                    ?>
                                                    @foreach($arquivos as $arquivo)
                                                        @if($arquivo->link == null and ($arquivo->extensao == 'doc' or $arquivo->extensao == 'docx'))
                                                            @if($count == 0)
                                                                <div class="row mt-3">
                                                                    @endif
                                                                    <div class="col-lg-3">
                                                                        <div>
                                                                            <div class="square"
                                                                                 style="background-color: #2b579a">
                                                                                <div class="vertical-center">
                                                                                    <span style="color: white">{{$arquivo->titulo.'.'.$arquivo->extensao}}</span>
                                                                                    <br>
                                                                                    <a href="{{route('arquivo.download', $arquivo->id)}}"
                                                                                       style="color: gray"><i class="fa fa-download"></i></a> -
                                                                                    <a style="color: darkred"
                                                                                       href="{{route('arquivo.excluir', $arquivo->id)}}"
                                                                                       onclick="return confirm('Você tem certeza que deseja excluir o arquivo?')"><i
                                                                                                class="far fa-trash-alt"></i></a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <?php $count += 1; ?>
                                                                    @if($count == 4)
                                                                </div>
                                                                <?php $count = 0 ?>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                    @if($count != 0)
                                                </div>
                                                @endif
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel"
                                 aria-labelledby="profile-tab">
                                <div class="row m-0">
                                    <div class="col-lg-3 pt-4">
                                        <a href="{{route('arquivo.cadastrar', ['id_atividade' => $atividade->id, 'is_arquivo' => 0])}}"
                                           class="btn btn-success btn-sm w-100 mt-2 mb-3"
                                           style="width: 100%; margin-top: 10px">
                                            <i class="fa fa-plus"
                                               aria-hidden="true"></i>
                                            Cadastrar Link</a>
                                        <div class="card"
                                             style="width: 22rem; margin-left: 5%; margin-right: 50%; margin-top: 5%;">
                                            <div class="card-body text-center"
                                                 style="border-style: ridge; border-width: 3px; background-color: #dfe6e0">
                                                <h5 class="card-title">Links</h5>
                                                <p class="card-text">Adicione links de videos ou de
                                                    outros
                                                    conteúdos relacionados com a atividade do aluno.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 images-part">
                                        <div class="p-3">
                                            <?php
                                            $count2 = 0;
                                            ?>
                                            @foreach($arquivos as $arquivo)
                                                @if($arquivo->link != null)
                                                    @if($count2 == 0)
                                                        <div class="row mt-3">
                                                            @endif
                                                            <div class="col-lg-4 text-center">
                                                                <div class="document-list border">
                                                                    @if($arquivo->extensao == 'link')
                                                                        <div style="border-style: solid; margin-bottom: 10px; background-color: #a4aaae; border-width: 1px; border-color: #1f648b">
                                                                            <b>{{$arquivo->titulo}}</b><br>

                                                                            <a href="{{$arquivo->link}}" target="_blank">
                                                                                <i class="fa fa-link"
                                                                                aria-hidden="true" style="color: #0000EE"></i>
                                                                            </a> -
                                                                            <a style="color: darkred"
                                                                               href="{{route('arquivo.excluir', $arquivo->id)}}"
                                                                               onclick="return confirm('Você tem certeza que deseja excluir o arquivo?')"><i
                                                                                        class="far fa-trash-alt"></i></a>
                                                                        </div>

                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <?php $count2 += 1; ?>
                                                            @if($count2 == 3)
                                                        </div>
                                                        <?php $count2 = 0 ?>
                                                    @endif
                                                @endif
                                            @endforeach
                                            @if($count2 != 0)
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>

    <script>
        $ppt = $('#powerpoint')
        $pdf = $('#pdf');
        $excel = $('#excel');
        $word = $('#word');
        $("#pdfButton").click(function () {
            if ($pdf.is(':visible')) {
                $pdf.slideUp(500);
            } else {
                $excel.slideUp(500);
                $ppt.slideUp(500);
                $word.slideUp(500);
                $pdf.slideDown(500);
            }
        });
        $("#excelButton").click(function () {
            if ($excel.is(':visible')) {
                $excel.slideUp(500);
            } else {
                $pdf.slideUp(500);
                $ppt.slideUp(500);
                $word.slideUp(500);
                $excel.slideDown(500);

            }

        });
        $("#pptButton").click(function () {
            if ($ppt.is(':visible')) {
                $ppt.slideUp(500);
            } else {
                $pdf.slideUp(500);
                $excel.slideUp(500);
                $word.slideUp(500);
                $ppt.slideDown(500);

            }

        });

        $("#wordButton").click(function () {
            if ($word.is(':visible')) {
                $word.slideUp(500);
            } else {
                $pdf.slideUp(500);
                $excel.slideUp(500);
                $ppt.slideUp(500);
                $word.slideDown(500);
            }
        });


    </script>

    <script>
        $(document).ready(function () {
            $("#success-alert").fadeTo(2000, 500).slideUp(500, function () {
                $("#success-alert").slideUp(500);
            });
        });
    </script>

    <style>
        .square {
            height: 100px;
            position: relative;
            border: 1px solid #335080;
            margin-bottom: 5%;
        }

        .vertical-center {
            margin: 0;
            position: absolute;
            padding-left: 20px;
            padding-right: 20px;
            top: 50%;
            text-align: center;
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
        }

        body {
            background-color: #eeeeee;
        }

        .pdf {
            display: none;
            padding: 5px;
        }

        .excel {
            display: none;
            padding: 5px;
        }

        .powerpoint {
            display: none;
            padding: 5px;
        }

        .word {
            display: none;
            padding: 5px;
        }

        .main-tab {
            padding: 0px;
            padding-right: 7%;
        }

        .main-section {
            font-family: 'Abel', sans-serif;
            padding: 15px 15px 15px 30px;
        }

        .document-left-list, .images-part {
            margin-top: -43px;
        }

        .document-left-list .document-list i {
            font-size: 45px;
            padding: 50px;
        }

        .document-left-list .document-list p {
            height: 60px;
        }

        .images-list img {
            width: 100%;
            height: 150px;
        }

        .nav-tabs, .nav-tabs:hover, .nav-tabs .nav-link {
            border: none;
        }

        .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
            border: none;
            border-bottom: 5px solid #5D4C46 !important;
        }

        @media only screen and (max-width: 600px) {
            .document-left-list, .images-part {
                padding-top: 45px;
                width: 100%;
            }

            .document-list, .images-list {
                margin-top: 10px;
            }
        }
    </style>

    <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
          href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>

@endsection