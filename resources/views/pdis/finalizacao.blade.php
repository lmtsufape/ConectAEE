@extends('layouts.app')

@push('nav-form')
    @include('layouts.form', ['pdi_id' => $pdi->id])
@endpush

@section('content')

<form class="m-2" action="{{route('pdi.condicoes_saude', ['pdi_id' => $pdi->id])}}" method="POST" >
    @csrf
    <h4>Condições de Saúde</h1>
    <div class="form-group">
        <label class="form-label">Tem diagnóstico da área da saúde que indica surdez, deficiência visual, física ou intelectual, TEA transtorno global de desenvolvimento?</label>
        <textarea name="" id="" cols="30" rows="10"></textarea>
    </div>
    <div class="d-flex justify-content-end pt-5 pb-3">
        <button class="btn btn-success" type="submit">Salvar e Enviar</button>
    </div>
</form>

@endsection