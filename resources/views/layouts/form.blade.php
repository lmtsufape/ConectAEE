<div class="mt-2 mb-5 justify-content-center">
    <ul class="nav justify-content-center gap-3">
        <li class="nav-item">
            <a class="nav-link border-bottom border-3 {{Route::is('pdis.create_condicoes_saude') ? 'text-success border-success' : 'text-secondary border-secondary'}}" aria-current="page"
                href="{{ route('pdis.create_condicoes_saude', ['pdi_id' => $pdi->id]) }}">1. Condições de Saúde</a>
        </li>
        <li class="nav-item">
            <a class="nav-link border-bottom border-3 {{Route::is('pdis.create_desenvolvimento_estudante') ? 'text-success border-success' : 'text-secondary border-secondary'}}" aria-current="page"
                href="{{route('pdis.create_desenvolvimento_estudante', ['pdi_id' => $pdi->id])}}">2. Desenvolvimento do Estudante</a>
        </li>
        <li class="nav-item">
            <a class="nav-link border-bottom border-3 {{Route::is('pdis.create_especificidade_educacional') ? 'text-success border-success' : 'text-secondary border-secondary'}}"
                href="{{route('pdis.create_especificidade_educacional', ['pdi_id' => $pdi->id])}}">3. Especificidades Educacionais</a>
        </li>
        <li class="nav-item">
            <a class="nav-link border-bottom border-3 {{Route::is('pdis.create_recursos_mult_funcionais') ? 'text-success border-success' : 'text-secondary border-secondary'}}"
                href="{{route('pdis.create_recursos_mult_funcionais', ['pdi_id' => $pdi->id])}}">4. Sala de Recursos Multifuncionais</a>
        </li>
        <li class="nav-item">
            <a class="nav-link border-bottom border-3 {{Route::is('pdis.create_finalizacao') ? 'text-success border-success' : 'text-secondary border-secondary'}}"
                href="{{route('pdis.create_finalizacao', ['pdi_id' => $pdi->id])}}">5. Finalização</a>
        </li>
    </ul>
</div>
