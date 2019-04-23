@extends('layouts.principal')
@section('title','Início')
@section('path','Início')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Início</div>
        <div class="panel-body">
          <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                  <a class="btn btn-danger" href="{{URL::previous()}}">Voltar</a>
              </div>
          </div>
        </div>
    </div>
@endsection
