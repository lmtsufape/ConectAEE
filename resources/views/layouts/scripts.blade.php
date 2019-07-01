<script type="text/javascript">

function showEspecializacao(val){
    especializacao = document.getElementById('div-especializacao');
    especializacao_text = document.getElementById('especializacao');
    if(val.value == "Profissional Externo"){
        especializacao.style.display = 'block';
    }else{
        especializacao.style.display = 'none';
        especializacao_text.value = '';
    }
}

</script>

<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/select2-bootstrap.min.css') }}" rel="stylesheet">
