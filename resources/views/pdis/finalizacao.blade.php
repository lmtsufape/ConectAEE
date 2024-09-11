@extends('layouts.app')

@push('nav-form')
    @include('layouts.form', ['pdi_id' => $pdi->id])
@endpush

@section('content')

<form class="m-2" action="{{route('pdi.finalizacao', ['pdi_id' => $pdi->id])}}" method="POST" >
    @csrf
    <h4>Finalização</h1>
        <div class="form-group">
            <label for="resumo_avaliacao_trimestral_aluno" class="form-label">Síntese da Avaliação Trimestral do estudante</label>
            <textarea class="form-control @error('resumo_avaliacao_trimestral_aluno') is-invalid @enderror" name="resumo_avaliacao_trimestral_aluno" id="resumo_avaliacao_trimestral_aluno" 
                cols="30" rows="10">{{old('situacao_diagnostico') ?? $pdi->condicaoSaude->situacao_diagnostico ?? ''}}</textarea>
                
            @error('resumo_avaliacao_trimestral_aluno')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
    <div class="d-flex justify-content-end pt-5 pb-3">
        <button class="btn btn-success" type="submit">Salvar e Enviar</button>
    </div>
</form>

@endsection