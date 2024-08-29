@extends('layouts.app')

@push('nav-form')
    @include('layouts.form', ['pdi_id' => $pdi->id])
@endpush

@section('content')

<form action="{{route('pdi.recursos_mult_funcionais')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="trabalho_area_cognitiva" class="form-label">Descreva sobre o trabalho a ser realizado na sala de recursos multifuncionais na Área Cognitiva</label>
        <input class="form-control @error('trabalho_area_cognitiva') is-invalid @enderror" type="text" name="trabalho_area_cognitiva" id="trabalho_area_cognitiva">
    
        @error('trabalho_area_cognitiva')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="objetivo_area_cognitiva" class="form-label">Descreva sobre o objetivo a ser atingido na Área Cognitiva</label>
        <input class="form-control @error('objetivo_area_cognitiva') is-invalid @enderror" type="text" name="objetivo_area_cognitiva" id="objetivo_area_cognitiva">
    
        @error('objetivo_area_cognitiva')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="trabalho_area_social" class="form-label">Descreva sobre o trabalho a ser realizado na sala de recursos multifuncionais na Área Social</label>
        <input class="form-control @error('trabalho_area_social') is-invalid @enderror" type="text" name="trabalho_area_social" id="trabalho_area_social">
    
        @error('trabalho_area_social')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="objetivo_area_social" class="form-label">Descreva sobre o objetivo a ser atingido na Área Social</label>
        <input class="form-control @error('objetivo_area_social') is-invalid @enderror" type="text" name="objetivo_area_social" id="objetivo_area_social">
    
        @error('objetivo_area_social')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="trabalho_area_motora" class="form-label">Descreva sobre o trabalho a ser realizado na sala de recursos multifuncionais na Área Motora</label>
        <input class="form-control @error('trabalho_area_motora') is-invalid @enderror" type="text" name="trabalho_area_motora" id="trabalho_area_motora">
    
        @error('trabalho_area_motora')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="objetivo_area_motora" class="form-label">Descreva sobre o objetivo a ser atingido na Área Motora</label>
        <input class="form-control @error('objetivo_area_motora') is-invalid @enderror" type="text" name="objetivo_area_motora" id="objetivo_area_motora">
    
        @error('objetivo_area_motora')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="trabalho_altas_habilidade_superdotacao" class="form-label">Descreva sobre o trabalho a ser realizado na sala de recursos multifuncionais em Altas Habilidades e Superdotação</label>
        <input class="form-control @error('trabalho_altas_habilidade_superdotacao') is-invalid @enderror" type="text" name="trabalho_altas_habilidade_superdotacao" id="trabalho_altas_habilidade_superdotacao">
    
        @error('trabalho_altas_habilidade_superdotacao')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="" class="form-label">Descreva sobre o objetivo a ser atingido em Altas Habilidades e Superdotação</label>
        <input class="form-control @error('objetivo_altas_habilidade_superdotacao') is-invalid @enderror" type="text" name="objetivo_altas_habilidade_superdotacao" id="objetivo_altas_habilidade_superdotacao">
    
        @error('objetivo_altas_habilidade_superdotacao')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="atividades_para_desenvolver_aluno_aee" class="form-label">Descreva as atividades que pretende desenvolver com o estudante no AEE</label>
        <input class="form-control @error('atividades_para_desenvolver_aluno_aee') is-invalid @enderror" type="text" name="atividades_para_desenvolver_aluno_aee" id="atividades_para_desenvolver_aluno_aee">
    
        @error('atividades_para_desenvolver_aluno_aee')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="recursos_materias_equipamentos" class="form-label">Descreva os recursos materiais e equipamentos a utilizar na sala de recursos multifuncionais</label>
        <input class="form-control @error('recursos_materias_equipamentos') is-invalid @enderror" type="text" name="recursos_materias_equipamentos" id="recursos_materias_equipamentos">
    
        @error('recursos_materias_equipamentos')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="resumo_avaliacao_trimestral_aluno" class="form-label">Síntese da Avaliação Trimestral do estudante</label>
        <input class="form-control @error('resumo_avaliacao_trimestral_aluno') is-invalid @enderror" type="text" name="resumo_avaliacao_trimestral_aluno" id="resumo_avaliacao_trimestral_aluno">
    
        @error('resumo_avaliacao_trimestral_aluno')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </div>
</form>

@endsection