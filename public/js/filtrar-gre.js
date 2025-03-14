$(document).ready(function () {
    // Evento de mudança no select de GRE
    $('#gre_id').on('change', function () {
        filtrarMunicipios($(this).val()); // Passa o valor selecionado (ID da GRE)
    });

    // Evento de mudança no select de Município
    $('#municipio_id').on('change', function () {
        filtrarEscolas($(this).val()); // Passa o valor selecionado (ID do Município)
    });

    filtrarMunicipios(dados[0]);
    filtrarEscolas(dados[1])
});

function filtrarMunicipios(greId) {
    var municipiosOptions = '<option value="">Selecione o Município</option>';

    // Reseta o select de município
    $('#municipio_id').html(municipiosOptions).prop('disabled', true);

    if (greId) {
        // Busca a GRE selecionada nos dados
        
        axios.get(routeMunicipios.replace(':gre_id', greId))
            .then(response => {
                let municipiosUnicos = [...new Map(response.data.map(m => [m.id, m])).values()];
    
                $.each(municipiosUnicos, function (index, municipio) {
                    municipiosOptions += `<option value="${municipio.id}"> ${municipio.nome}</option>`;
                });
                $('#municipio_id').html(municipiosOptions).prop('disabled', false);

                if(municipio && $('#municipio_id').find(`option[value="${municipio}"]`).length > 0){
                    $('#municipio_id').val(municipio)
                }
            })
            .catch(error => {
                console.error("Erro na requisição:", error);
            });
            
       
    }
}

function filtrarEscolas(municipioId) {
    var escolasOptions = '<option value="">Selecione a Escola</option>';

    // Reseta o select de escola
    $('#escola_id').html(escolasOptions).prop('disabled', true);

    if (municipioId) {
        axios.get(routeEscolas.replace(':municipio_id', municipioId))
            .then(response => {
                
                $.each(response.data, function (index, escola) {
                    escolasOptions += `<option value="${escola.id}">${escola.nome}</option>`;
                });
                $('#escola_id').html(escolasOptions).prop('disabled', false);
                if(escola && $('#escola_id').find(`option[value="${escola}"]`).length > 0){
                    $('#escola_id').val(escola)
                }
            })
            .catch(error => {
                console.error("Erro na requisição:", error);
            });
            
 
    }
}