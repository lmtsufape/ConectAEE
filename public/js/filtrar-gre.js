$(document).ready(function() {
    $('#gre_id').on('change', function() {
        var greId = $(this).val();
        var municipiosOptions = '<option value="">Selecione o Município</option>';
        
        $('#municipio_id').html(municipiosOptions).prop('disabled', true);
        $('#escola_id').html('<option value="">Selecione a Escola</option>').prop('disabled', true);

        if (greId) {
            var gre = dados.find(g => g.id == greId);
            $.each(gre.municipios, function(index, municipio) {
                municipiosOptions += '<option value="' + municipio.id + '">' + municipio.nome + '</option>';
            });
            $('#municipio_id').html(municipiosOptions).prop('disabled', false);
        }
    });

    $('#municipio_id').on('change', function() {
        var municipioId = $(this).val();
        var escolasOptions = '<option value="">Selecione a Escola</option>';

        $('#escola_id').html(escolasOptions).prop('disabled', true);

        if (municipioId) {
            var greId = $('#gre_id').val();
            var gre = dados.find(g => g.id == greId);
            var municipio = gre.municipios.find(m => m.id == municipioId);

            $.each(municipio.escolas, function(index, escola) {
                escolasOptions += '<option value="' + escola.id + '">' + escola.nome + '</option>';
            });
            $('#escola_id').html(escolasOptions).prop('disabled', false);
        }
    });
});
