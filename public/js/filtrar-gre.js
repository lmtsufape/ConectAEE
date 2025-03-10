$(document).ready(function () {
    // Evento de mudança no select de GRE
    $('#gre_id').on('change', function () {
        filtrarMunicipios($(this).val()); // Passa o valor selecionado (ID da GRE)
    });

    // Evento de mudança no select de Município
    $('#municipio_id').on('change', function () {
        filtrarEscolas($(this).val()); // Passa o valor selecionado (ID do Município)
    });

    filtrarMunicipios();
});

function filtrarMunicipios(greId) {
    var municipiosOptions = '<option value="">Selecione o Município</option>';
    var escolasOptions = '<option value="">Selecione a Escola</option>';

    // Reseta os selects de município e escola
    $('#municipio_id').html(municipiosOptions).prop('disabled', true);
    $('#escola_id').html(escolasOptions).prop('disabled', true);

    if (greId) {
        // Busca a GRE selecionada nos dados
        var gre = dados.find(g => g.id == greId);
        if (gre) {
            let municipiosUnicos = [...new Map(gre.municipios.map(m => [m.id, m])).values()];
            
            $.each(municipiosUnicos, function (index, municipio) {
                municipiosOptions += '<option value="' + municipio.id + '">' + municipio.nome + '</option>';
            });
            $('#municipio_id').html(municipiosOptions).prop('disabled', false);
        }
    }
}

function filtrarEscolas(municipioId) {
    var escolasOptions = '<option value="">Selecione a Escola</option>';

    // Reseta o select de escola
    $('#escola_id').html(escolasOptions).prop('disabled', true);

    if (municipioId) {
        // Busca o município selecionado dentro da GRE selecionada
        var greId = $('#gre_id').val(); // Obtém a GRE selecionada
        var gre = dados.find(g => g.id == greId);
        if (gre) {
            var municipio = gre.municipios.find(m => m.id == municipioId);
            if (municipio) {
                // Adiciona as escolas do município ao select
                $.each(municipio.escolas, function (index, escola) {
                    escolasOptions += `<option value="${escola.id}">${escola.nome}</option>`;
                });
                $('#escola_id').html(escolasOptions).prop('disabled', false);
            }
        }
    }
}