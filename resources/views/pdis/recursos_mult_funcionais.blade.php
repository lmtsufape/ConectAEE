@extends('layouts.app')

@push('nav-form')
    @include('layouts.form', ['pdi_id' => $pdi->id])
@endpush

@section('content')

<form class="m-2" action="{{route('pdi.recursos_mult_funcionais', ['pdi_id' => $pdi->id])}}" method="POST">
    @csrf
    <h4>Sala de Recursos Multifuncionais</h1>
    <div class="form-group">
        <label for="trabalho_area_cognitiva" class="form-label">Descreva sobre o trabalho a ser realizado na sala de recursos multifuncionais na Área Cognitiva</label>
        <textarea class="form-control @error('trabalho_area_cognitiva') is-invalid @enderror" name="trabalho_area_cognitiva" id="trabalho_area_cognitiva"
            cols="30" rows="7">{{old('trabalho_area_cognitiva') ?? $pdi->recursosMultifuncionais->trabalho_area_cognitiva ?? ''}}</textarea>
    
        @error('trabalho_area_cognitiva')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="objetivo_area_cognitiva" class="form-label">Descreva sobre o objetivo a ser atingido na Área Cognitiva</label>
        <textarea class="form-control @error('objetivo_area_cognitiva') is-invalid @enderror" name="objetivo_area_cognitiva" id="objetivo_area_cognitiva"
            cols="30" rows="7">{{old('objetivo_area_cognitiva') ?? $pdi->recursosMultifuncionais->objetivo_area_cognitiva ?? ''}}</textarea>
    
        @error('objetivo_area_cognitiva')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="trabalho_area_social" class="form-label">Descreva sobre o trabalho a ser realizado na sala de recursos multifuncionais na Área Social</label>
        <textarea class="form-control @error('trabalho_area_social') is-invalid @enderror" name="trabalho_area_social" id="trabalho_area_social"
            cols="30" rows="7">{{old('trabalho_area_social') ?? $pdi->recursosMultifuncionais->trabalho_area_social ?? ''}}</textarea>
    
        @error('trabalho_area_social')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="objetivo_area_social" class="form-label">Descreva sobre o objetivo a ser atingido na Área Social</label>
        <textarea class="form-control @error('objetivo_area_social') is-invalid @enderror" name="objetivo_area_social" id="objetivo_area_social"
            cols="30" rows="7">{{old('objetivo_area_social') ?? $pdi->recursosMultifuncionais->objetivo_area_social ?? ''}}</textarea>
    
        @error('objetivo_area_social')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="trabalho_area_motora" class="form-label">Descreva sobre o trabalho a ser realizado na sala de recursos multifuncionais na Área Motora</label>
        <textarea class="form-control @error('trabalho_area_motora') is-invalid @enderror" name="trabalho_area_motora" id="trabalho_area_motora"
            cols="30" rows="7">{{old('trabalho_area_motora') ?? $pdi->recursosMultifuncionais->trabalho_area_motora ?? ''}}</textarea>
    
        @error('trabalho_area_motora')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="objetivo_area_motora" class="form-label">Descreva sobre o objetivo a ser atingido na Área Motora</label>
        <textarea class="form-control @error('objetivo_area_motora') is-invalid @enderror" name="objetivo_area_motora" id="objetivo_area_motora"
            cols="30" rows="7">{{old('objetivo_area_motora') ?? $pdi->recursosMultifuncionais->objetivo_area_motora ?? ''}}</textarea>
    
        @error('objetivo_area_motora')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="trabalho_altas_habilidade_superdotacao" class="form-label">Descreva sobre o trabalho a ser realizado na sala de recursos multifuncionais em Altas Habilidades e Superdotação</label>
        <textarea class="form-control @error('trabalho_altas_habilidade_superdotacao') is-invalid @enderror" name="trabalho_altas_habilidade_superdotacao" id="trabalho_altas_habilidade_superdotacao"
            cols="30" rows="7">{{old('trabalho_altas_habilidade_superdotacao') ?? $pdi->recursosMultifuncionais->trabalho_altas_habilidade_superdotacao ?? ''}}</textarea>
    
        @error('trabalho_altas_habilidade_superdotacao')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="" class="form-label">Descreva sobre o objetivo a ser atingido em Altas Habilidades e Superdotação</label>
        <textarea class="form-control @error('objetivo_altas_habilidade_superdotacao') is-invalid @enderror" name="objetivo_altas_habilidade_superdotacao" id="objetivo_altas_habilidade_superdotacao"
            cols="30" rows="7">{{old('objetivo_altas_habilidade_superdotacao') ?? $pdi->recursosMultifuncionais->objetivo_altas_habilidade_superdotacao ?? ''}}</textarea>
    
        @error('objetivo_altas_habilidade_superdotacao')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="atividades_para_desenvolver_aluno_aee" class="form-label">Descreva as atividades que pretende desenvolver com o estudante no AEE</label>
        <textarea class="form-control @error('atividades_para_desenvolver_aluno_aee') is-invalid @enderror" name="atividades_para_desenvolver_aluno_aee" id="atividades_para_desenvolver_aluno_aee"
            cols="30" rows="7">{{old('atividades_para_desenvolver_aluno_aee') ?? $pdi->recursosMultifuncionais->atividades_para_desenvolver_aluno_aee ?? ''}}</textarea>
    
        @error('atividades_para_desenvolver_aluno_aee')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="recursos_materias_equipamentos" class="form-label">Descreva os recursos materiais e equipamentos a utilizar na sala de recursos multifuncionais</label>
        <textarea class="form-control @error('recursos_materias_equipamentos') is-invalid @enderror" name="recursos_materias_equipamentos" id="recursos_materias_equipamentos" 
            cols="30" rows="7">{{old('recursos_materias_equipamentos') ?? $pdi->recursosMultifuncionais->recursos_materias_equipamentos ?? ''}}</textarea>
    
        @error('recursos_materias_equipamentos')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </div>

    <div class="d-flex justify-content-between pt-5 pb-3">
        <a class="btn btn-danger" href="{{}}">Salvar e Voltar</a>
        <button class="btn btn-success" type="submit">Salvar e Continuar</button>
    </div>
</form>

@endsection