@extends('layouts.principal')
@section('title','Novo aluno')
@section('navbar')
@endsection

@section('content')
<div class="container" style="color: #12583C">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default" style="margin-top: -20px; padding: 10px 20px;" id="login-card">
        <div class="panel-heading" id="login-card">
          <h2>
            <strong style="color: #12583C">
              Novo Aluno
            </strong>
            <div style="font-size: 14px" id="login-card">
              <a href="{{route('aluno.listar')}}">Início</a>
              > Novo Aluno
            </div>
          </h2>

          <hr style="border-top: 1px solid #AAA;">
        </div>

        <div class="panel-body panel-body-cadastro" id="login-card">
          <div class="col-md-8 col-md-offset-2" id="login-card">
            <form method="GET" action="{{ route("aluno.buscarCPF") }}">

                <div class="form-group {{ $errors->has('cpf') ? ' has-error' : '' }}" id="login-card">
                    <label for="cpf" class="col-md-12 control-label"> Informe o CPF do aluno: <font color="red">*</font></label>

                    <div class="col-md-12" id="login-card">
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

              <div class="form-group" id="login-card">
                <div class="row col-md-12 text-center" id="login-card">
                  <br>
                  <a class="btn btn-secondary" href="{{route('aluno.listar')}}" id="menu-a">
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

        <div class="panel-body" id="login-card">
          @if($aluno != null)
            <div class="alert alert-info text-center" id="login-card">
              <strong>
                O aluno {{ $aluno->nome }} já está cadastrado no sistema.
                @if(!$botaoAtivo)
                  <a class="btn btn-primary" style="width:auto;" href="{{ route("aluno.permissoes.requisitar", ["cpf" => $cpf]) }}">
                    Pedir Permissão de Acesso
                  </a>
                @else
                  <a class="btn btn-primary" href="{{ route("aluno.gerenciar", ["id_aluno" => $aluno->id]) }}">
                    Ver Perfil
                  </a>
                @endif
              </strong>
            </div>
          @endif
        </div>

        <!-- <div class="panel-footer">
          <a class="btn btn-danger" href="{{ route("home") }}">
            <i class="material-icons">keyboard_backspace</i>
            <br>
            Voltar
          </a>
        </div> -->
      </div>
    </div>
  </div>
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
