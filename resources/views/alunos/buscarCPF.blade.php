@extends('layouts.app')
@section('title','Novo aluno')

@section('content')

  <div class="row">
    <h2>
      <strong style="color: #12583C">
        Novo Aluno
      </strong>
      <div style="font-size: 14px" id="login-card">
        <a href="{{route('alunos.index')}}">Início</a>
        > Novo Aluno
      </div>
    </h2>

    <hr style="border-top: 1px solid #AAA;">
  </div>

  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <form method="GET" action="{{ route("alunos.buscarCPF") }}">

          <div class="form-group {{ $errors->has('cpf') ? ' has-error' : '' }}" id="login-card">
              <label for="cpf" class="col-md-12 control-label"> Informe o CPF do aluno: <font color="red">*</font></label>

              <div class="col-md-12">
                  @if ($cpf == null)
                      <input id="cpf" type="text" class="form-control" onkeydown="fMasc( this, mCPF );" placeholder="000.000.000-00" name="cpf">
                  @else
                      <input id="cpf" type="text" class="form-control @error('cpf') is-invalid @enderror" onkeydown="fMasc( this, mCPF );" placeholder="000.000.000-00" name="cpf" value="{{$cpf}}">
                  @endif

                  @error('cpf')
                      <span class="help-block">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
          </div>
        </div>

        <div class="form-group">
          <div class="row col-md-12 text-center">
            <br>
            <a class="btn btn-secondary" href="{{route('alunos.index')}}">
              Voltar
            </a>
            <button type="submit" class="btn btn-primary">
              Enviar
            </button>
          </div>
        </div>

      </form>
    </div>
  </div>

  <div class="panel-body">
    @if($aluno != null)
      <div class="alert alert-info text-center">
        <strong>
          O aluno {{ $aluno->nome }} já está cadastrado no sistema.
          @if(!$botaoAtivo)
            <a class="btn btn-primary" style="width:auto;" href="{{ route("alunos.permissoes.requisitar", ["cpf" => $cpf]) }}">
              Pedir Permissão de Acesso
            </a>
          @else
            <a class="btn btn-primary" href="{{ route("alunos.gerenciar", ["aluno_id" => $aluno->id]) }}">
              Ver Perfil
            </a>
          @endif
        </strong>
      </div>
    @endif
  </div>

<script type="text/javascript">
  function fMasc(objeto,mascara) {
		obj=objeto
		masc=mascara
		setTimeout("fMascEx()",1)
	}

	function fMascEx() {
		obj.value=masc(obj.value)
	}

	function mCPF(cpf){
		cpf=cpf.replace(/\D/g,"")
		cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
		cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
		cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
		return cpf
	}

  function mTel(tel) {
				tel=tel.replace(/\D/g,"")
				tel=tel.replace(/^(\d)/,"($1")
				tel=tel.replace(/(.{3})(\d)/,"$1)$2")
				if(tel.length == 9) {
					tel=tel.replace(/(.{1})$/,"-$1")
				} else if (tel.length == 10) {
					tel=tel.replace(/(.{2})$/,"-$1")
				} else if (tel.length == 11) {
					tel=tel.replace(/(.{3})$/,"-$1")
				} else if (tel.length == 12) {
					tel=tel.replace(/(.{4})$/,"-$1")
				} else if (tel.length > 12) {
					tel=tel.replace(/(.{4})$/,"-$1")
				}
				return tel;
			}
</script>
@endsection
