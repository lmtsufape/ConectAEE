@extends('layouts.app')

@section('content')


    <div class="row p-5">
        <div class="col-md-4 ">
            <a class="text-decoration-none ratio ratio-1x1" href="{{ route('escolas.index') }}">
                <div class="d-flex justify-content-center align-items-center p-5 shadow rounded-5 clickable" style="background-color: #133318">
                    <span class="text-white fs-2">Escolas</span>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a class="text-decoration-none ratio ratio-1x1" href="{{ route('users.index') }}">
                <div class="d-flex justify-content-center align-items-center p-5 shadow rounded-5 clickable" style="background-color: #2B6B44;">
                    <span class="text-white fs-2">Usuários</span>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a class="text-decoration-none ratio ratio-1x1" href="{{ route('alunos.index') }}">
                <div class="d-flex justify-content-center align-items-center p-5 shadow rounded-5 clickable" style="background-color: #538970;">
                    <span class="text-white fs-2">Alunos</span>
                </div>
            </a>
        </div>
    </div>

@endsection
