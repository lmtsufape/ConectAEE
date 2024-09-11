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
            <a href="{{route('aluno.show', ['aluno_id' => $aluno->id])}}">Perfil de
                <strong>{{ explode(" ", $aluno->nome)[0]}}</strong></a>
            > Pdis
        </div>
    </div>

        

    <hr style="border-top: 1px solid #AAA;">
    

    <div>

        <div>
            <div>
                <a class="btn btn-primary"
                    style="float:right; margin-top:20px; background-color: #0398fc; color: white; font-weight: bold; font-size: 14px; padding: 7px; border-radius: 5px; border-color: #0398fc; box-shadow: 4px 4px 4px #CCC"
                    href="{{ route('pdi.create', $aluno->id)}}">
                    Novo PDI
                </a>
                    
                <table class="table table-hover shadow-lg">
                    <thead class="align-middle">
                        <tr>
                            <th>Data de Criação</th>
                            <th>Autor</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pdis as $pdi)
                            <tr>
                                <td>{{ $pdi->created_at }}</td>
                                <td>{{\App\Models\User::find($pdi->user_id)->name}}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{route('pdi.show', $pdi->id)}}">
                                        Visualizar
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="{{route('pdi.edit', $pdi->id)}}">
                                        Editar
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-danger"
                                        onclick="return confirm('\A Tem certeza que deseja excluir esse PDI ?')"
                                        href="{{route('pdi.delete', $pdi->id)}}">
                                        Excluir
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
           
        </div>
    </div>

    <div>
        <div class="text-center" >
            <a class="btn btn-secondary" href="{{route('aluno.show',$aluno->id)}}">
                Voltar
            </a>
        </div>
    </div>
@endsection
