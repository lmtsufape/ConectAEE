@extends('layouts.app')
@section('title','Listar PDIs')
@section('navbar')
@endsection
@section('content')
    
    <div class="d-flex">
        <div>
            <h2>
                <strong style="color: #12583C">
                    PDIs
                </strong>
            </h2>
            <div style="font-size: 14px" >
                <a href="{{route('alunos.index')}}">Início</a>>
                <a href="{{route('alunos.show', ['aluno_id' => $aluno->id])}}">Perfil de
                    <strong>{{ explode(" ", $aluno->nome)[0]}}</strong></a>
                > Pdis
            </div>
        </div>
        <div class="ms-auto">
            <a class="btn btn-primary" href="{{ route('pdis.create', $aluno->id)}}">
                Novo PDI
            </a>
        </div>
    </div>

    <hr style="border-top: 1px solid #AAA;">

            
    <table class="table table-hover shadow-lg">
        <thead style="background-color: #538970; color: white;">
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
                        <a class="btn btn-primary" href="{{route('pdis.show', $pdi->id)}}">
                            Visualizar
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{route('pdis.edit', $pdi->id)}}">
                            Editar
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-danger" onclick="return confirm('\A Tem certeza que deseja excluir esse PDI ?')"
                            href="{{route('pdis.delete', $pdi->id)}}">
                            Excluir
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div>
        <a class="btn btn-secondary" href="{{route('alunos.show',$aluno->id)}}">
            Voltar
        </a>
    </div>
@endsection
