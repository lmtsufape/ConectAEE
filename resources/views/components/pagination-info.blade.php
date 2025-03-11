<div class="pagination-info">
    @if ($paginator->total() > 0)
        Exibindo {{ $paginator->firstItem() }} a {{ $paginator->lastItem() }} de {{ $paginator->total() }} resultados.
    @else
        Nenhum resultado encontrado.
    @endif
</div>

<style>
    .pagination-info {
        margin-top: 10px;
        color: #666;
        font-size: 0.9em;
        justify-self: right;
    }
</style>