<script type="text/javascript">

function showEspecializacao(val){
    especializacao = document.getElementById('div-especializacao');
    especializacao_text = document.getElementById('especializacao');
    if(val.value == "Profissional Externo de Saúde"){
        especializacao.style.display = 'block';
    }else{
        especializacao.style.display = 'none';
        especializacao_text.value = '';
    }
}

</script>