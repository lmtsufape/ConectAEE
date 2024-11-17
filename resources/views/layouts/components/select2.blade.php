

<div class="form-group">
    <label for="{{$id}}" class="form-label">{{$label}}</label>
    <select id="{{$id}}" name="{{$name}}" class="form-control" multiple>
        @foreach ($values as $value)
            <option value="{{$value->id}}">{{$value->nome}}</option>
        @endforeach
    
        @error($name)
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
        @enderror
    </select>
</div>

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#{{$id}}').select2({
            placeholder: 'Selecione uma opção...',
            allowClear: true,
            minimumResultsForSearch: Infinity // Desabilita a pesquisa
        }).on('select2:select', function (e) {
            // Desmarcar todas as outras opções se uma opção for selecionada
            const selected = $(this).val();
            if (selected.length > 1) {
                $(this).val([selected[selected.length - 1]]).trigger('change'); // Mantém apenas a última seleção
            }
        });
    });
</script>
@endpush