<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FilterGroup extends Component
{
    public $filters;
    public $currentFilters;
    public $context;

    public function __construct(string $context, array $currentFilters = [])
    {
        $this->context = $context;
        $this->currentFilters = $currentFilters;
        $this->filters = $this->buildFilters();
    }

    private function buildFilters(): array
    {
        return match ($this->context) {
            'escolas' => [
                [
                    'name' => 'gre_id',
                    'label' => 'GRE',
                    'options' => \App\Models\Gre::orderBy('nome')->get(['id', 'nome']),
                    'placeholder' => 'Todas as GREs',
                ],
                [
                    'name' => 'municipio_id',
                    'label' => 'Município',
                    'options' => \App\Models\Municipio::orderBy('nome')->get(['id', 'nome']),
                    'placeholder' => 'Todos os Municípios',
                ],
            ],
            'users', 'alunos' => [
                [
                    'name' => 'gre_id',
                    'label' => 'GRE',
                    'options' => \App\Models\Gre::orderBy('nome')->get(['id', 'nome']),
                    'placeholder' => 'Todas as GREs',
                ],
                [
                    'name' => 'municipio_id',
                    'label' => 'Município',
                    'options' => \App\Models\Municipio::orderBy('nome')->get(['id', 'nome']),
                    'placeholder' => 'Todos os Municípios',
                ],
                [
                    'name' => 'escola_id',
                    'label' => 'Escola',
                    'options' => \App\Models\Escola::orderBy('nome')->get(['id', 'nome']),
                    'placeholder' => 'Todas a Escolas',
                ],
            ],
            // Outros contextos podem ser adicionados aqui
            default => [],
        };
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.filter-group');
    }
}
