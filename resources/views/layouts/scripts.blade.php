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
