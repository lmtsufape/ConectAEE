@extends('layouts.app')
@section('title','Listar PDIs')
@section('navbar')
@endsection
@section('content')
    
    <div style="float: left;" class="col-md-6" >
        <h2>
            <strong style="color: #12583C">
                PDIs
            </strong>
        </h2>
        <div style="font-size: 14px" >
            <a href="{{route('aluno.index')}}">Início</a>>
            <a href="{{route('aluno.gerenciar',$aluno->id)}}">Perfil de
                <strong>{{ explode(" ", $aluno->nome)[0]}}</strong></a>
            > Pdis
        </div>
    </div>

        

    <hr style="border-top: 1px solid #AAA;">
    

    <div>
        <ul class="nav nav-tabs">
            <li class="active"><a href="#cadastrados" data-toggle="tab">Formularios</a></li>
            <li><a href="#documentos" data-toggle="tab">Arquivos</a></li>
        </ul>

        <div>
            <div>
                    
                <a class="btn btn-primary"
                    style="float:right; margin-top:20px; background-color: #0398fc; color: white; font-weight: bold; font-size: 14px; padding: 7px; border-radius: 5px; border-color: #0398fc; box-shadow: 4px 4px 4px #CCC"
                    href="{{ route('pdi.cadastrar', $aluno->id)}}">
                    Novo PDI
                </a>
            
                <a class="btn btn-primary"
                    style="float:right; margin-top:20px; background-color: #0398fc; color: white; font-weight: bold; font-size: 14px; padding: 7px; border-radius: 5px; border-color: #0398fc; box-shadow: 4px 4px 4px #CCC"
                    href="{{ route('pdi.cadastrar', $aluno->id)}}">
                    Atualizar PDI
                </a>

                    
                <table class="table table-hover">
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
                                <td data-title="Autor">{{\App\Models\User::find($pdi->user_id)->name}}</td>
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
                    href="{{ route('pdi.cadastrarArquivo', $aluno->id)}}">
                    Novo Arquivo
                </a>
                <table class="table table-hover">
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
                                <td data-title="Autor">{{\App\Models\User::find($pdi->user_id)->name}}</td>
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

    <div style="background-color:white" >
        <div class="text-center" >
            <a class="btn btn-secondary" href="{{route('aluno.gerenciar',$aluno->id)}}">
                Voltar
            </a>
        </div>
    </div>


    {{-- <script type="text/javascript">
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
    </script> --}}

@endsection
