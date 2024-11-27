<div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="filterModalLabel">Filtragem</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="GET" action="{{ route('escolas.index') }}">
                    <h5>Filtar por: </h5>
                    <div class="form-group">
                        <label for="filter_gre">GRE</label>
                        <select class="form-control" name="filter[gre_id]" id="filter_gre">
                            <option value="" disabled selected>Selecione a GRE para filtragem</option>
                            <option value="">Todas</option>
                            @foreach ($gres as $gre)
                                <option value="{{$gre->id}}" @selected(request()->input('filter.gre_id') == $gre->id)>{{$gre->nome}}</option>
                                
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="filter_municipio">Município</label>
                        <select class="form-control" name="filter[municipio_id]" id="filter_municipio">
                            <option value="" disabled selected>Selecione o município para filtragem</option>
                            <option value="">Todos</option>
                            @foreach ($municipios as $municipio)
                                <option value="{{$municipio->id}}" @selected(request()->input('filter.municipio_id') == $municipio->id)>{{$municipio->nome}}</option>
                                
                            @endforeach
                        </select>
                    </div>

                    <div class="pt-3">
                        <button type="submit" class="btn btn-primary">Aplicar Filtros</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>