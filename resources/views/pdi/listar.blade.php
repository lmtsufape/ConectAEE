@extends('layouts.principal')
@section('title','Listar PDIs')
@section('navbar')
@endsection
@section('content')
    <div class="container" style="color: #12583C">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default" style="padding: 10px 20px;" id="login-card">

                    <div class="panel-heading" id="login-card">
                        <div class="row" style="margin-bottom: -20px">
                            <div class="col-md-12" id="login-card">
                                <div style="width: 100%; margin-left: 0%;" class="row" id="login-card">
                                    <div style="float: left;" class="col-md-6" id="login-card">
                                        <h2>
                                            <strong style="color: #12583C">
                                                PDIs
                                            </strong>
                                        </h2>
                                        <div style="font-size: 14px" id="login-card">
                                            <a href="{{route('aluno.listar')}}">Início</a>>
                                            <a href="{{route('aluno.gerenciar',$aluno->id)}}">Perfil de
                                                <strong>{{ explode(" ", $aluno->nome)[0]}}</strong></a>
                                            > Pdis
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <hr style="border-top: 1px solid #AAA;">
                    </div>

                    <div class="panel-body" id="login-card">

                        @if (\Session::has('success'))
                            <br>
                            <div class="alert alert-success" id="login-card">
                                <strong>Sucesso!</strong>
                                {!! \Session::get('success') !!}
                            </div>
                        @elseif (session('denied'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('denied') }}
                            </div>
                        @endif

                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#cadastrados" data-toggle="tab">Formularios</a></li>
                                <li><a href="#documentos" data-toggle="tab">Arquivos</a></li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane fade in active"  id="cadastrados">
                                        @if($pdi == null)
                                            <a class="btn btn-primary"
                                               style="float:right; margin-top:20px; background-color: #0398fc; color: white; font-weight: bold; font-size: 14px; padding: 7px; border-radius: 5px; border-color: #0398fc; box-shadow: 4px 4px 4px #CCC"
                                               id="signup" href="{{ route('pdi.cadastrar', $aluno->id)}}">
                                                Novo PDI
                                            </a>
                                        @else
                                            <a class="btn btn-primary"
                                               style="float:right; margin-top:20px; background-color: #0398fc; color: white; font-weight: bold; font-size: 14px; padding: 7px; border-radius: 5px; border-color: #0398fc; box-shadow: 4px 4px 4px #CCC"
                                               id="signup" href="{{ route('pdi.cadastrar', $aluno->id)}}">
                                                Atualizar PDI
                                            </a>

                                        @endif
                                    <table id="tabela_dados" class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>Data de Criação</th>
                                            <th>Autor</th>
                                            <th>Ações</th>
                                            <th></th>
                                            <th></th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                        @foreach ($pdis as $pdi)
                                            <tr>
                                                <td data-title="Data">{{ $pdi->created_at }}</td>
                                                <td data-title="Autor">{{\App\User::find($pdi->user_id)->name}}</td>
                                                <td data-title="Ações">
                                                    <a class="btn btn-primary" href="{{route('pdi.ver', $pdi->id)}}">
                                                        Visualizar
                                                    </a>
                                                </td>
                                                <td data-title="">
                                                    <a class="btn btn-primary" target="_blank" href="{{route('pdi.pdf', $pdi->id)}}">
                                                        Download
                                                    </a>
                                                </td>
                                                <td data-title="">
                                                    <a class="btn btn-primary" href="{{route('pdi.editar', $pdi->id)}}">
                                                        Editar
                                                    </a>
                                                </td>
                                                <td data-title="">
                                                    <a class="btn btn-danger"
                                                       onclick="return confirm('\A Tem certeza que deseja excluir esse PDI ?')"
                                                       href="{{route('pdi.excluir', $pdi->id)}}">
                                                        Excluir
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade"  id="documentos">
                                    <a class="btn btn-primary"
                                       style="float:right; margin-top:20px; background-color: #0398fc; color: white; font-weight: bold; font-size: 14px; padding: 7px; border-radius: 5px; border-color: #0398fc; box-shadow: 4px 4px 4px #CCC"
                                       id="signup" href="{{ route('pdi.cadastrarArquivo', $aluno->id)}}">
                                        Novo Arquivo
                                    </a>
                                    <table id="tabela_arquivos" class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>Data de Criação</th>
                                            <th>Autor</th>
                                            <th>Ações</th>
                                            <th></th>
                                            <th></th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                        @foreach ($pdiArquivos as $pdi)
                                            <tr>
                                                <td data-title="Data">{{ $pdi->created_at }}</td>
                                                <td data-title="Autor">{{\App\User::find($pdi->user_id)->name}}</td>
                                                <td data-title="Ações">
                                                    <a class="btn btn-primary" href="{{route('pdi.download', $pdi->id)}}">
                                                        Download
                                                    </a>
                                                </td>
                                                <td data-title="">
                                                    <a class="btn btn-danger"
                                                       onclick="return confirm('\A Tem certeza que deseja excluir esse PDI ?')"
                                                       href="{{route('pdi.excluirArquivo', $pdi->id)}}">
                                                        Excluir
                                                    </a>
                                                </td>
                                                <td hidden data-title="">
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                    </div>

                    <div class="panel-footer" style="background-color:white" id="login-card">
                        <div class="text-center" id="login-card">
                            <a class="btn btn-secondary" href="{{route('aluno.gerenciar',$aluno->id)}}" id="menu-a">
                                Voltar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {

            $('#tabela_dados').dataTable({
                "order": [0, "desc"],
                "columnDefs": [
                    {"orderable": false, "targets": [2, 3, 4, 5]},
                ],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json",
                },
                "searching": true
            });

        });

        $(document).ready(function () {

            $('#tabela_arquivos').dataTable({
                "order": [0, "desc"],
                "columnDefs": [
                    {"orderable": false, "targets": [2, 3, 4]},
                ],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json",
                },
                "searching": true
            });

        });
    </script>

@endsection
