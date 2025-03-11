<div class="filter">
    <div class="filter-group col-md-11">
        <form method="GET" action="{{ request()->url() }}" class="row g-3 align-items-end" id="filterForm">
            @foreach ($filters as $filter)
                <div class="col-md-{{ 12 / count($filters) }} col-sm-6">
                    <div class="filter-item">
                        <label for="{{ $filter['name'] }}" class="form-label fw-bold">{{ $filter['label'] }}</label>
                        <select name="filter[{{ $filter['name'] }}]" id="{{ $filter['name'] }}" class="form-select">
                            <option value="">{{ $filter['placeholder'] ?? 'Todos' }}</option>
                            @foreach ($filter['options'] as $option)
                                <option value="{{ $option->id }}"
                                    {{ ($currentFilters['filter'][$filter['name']] ?? '') === (string) $option->id ? 'selected' : '' }}>
                                    {{ $option->nome }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            @endforeach
        </form>
    </div>

    <div class="col">
        <button type="submit" form="filterForm" class="btn filter-button">Filtrar</button>
    </div>
</div>

<style>
    .filter {
        color: white;
        display: flex;
        justify-content: center;
        margin-bottom: 3px;
    }
    .filter-group {
        background-color: #538970;
        padding: 1.5rem;
        border-radius: 18px 0px 0px 0px;
    }

    .filter-button {
        color: white;
        background-color: #538970;
        border-radius: 0px 18px 0px 0px;
        border-left-color: #43725c;
        width: 100%;
        height: 100%;
        font-weight: bold;
    }

    .filter-button:hover {
        background-color: #43725c;
    }

    .filter .form-select {
        background-color: #e8fff4;
    }

    .filter-item {
        transition: all 0.2s ease-in-out;
    }

    .filter-item:hover {
        transform: translateY(-2px);
    }
</style>
