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

function showResponsavel(val){
    responsavel = document.getElementById('div-responsavel');
    login = document.getElementById('login');
    if(val.value == '2'){
        responsavel.style.display = 'block';
    }else{
        responsavel.style.display = 'none';
        login.value = '';
    }
}

</script>


<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/select2-bootstrap.min.css') }}" rel="stylesheet">
