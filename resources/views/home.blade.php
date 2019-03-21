@extends('layouts.principal')
@section('title','Início')
@section('path','Início')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Início</div>
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{route('login')}}">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                Logado!
        </div>
    </div>
@endsection
