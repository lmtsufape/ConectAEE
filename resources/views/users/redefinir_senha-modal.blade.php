
<div class="modal fade" id="redefinirModal" tabindex="-1" aria-labelledby="redefinirModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="redefinirModalLabel">Redefinição de senha</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('users.redefinir-senha', ['user_id' => auth()->user()->id]) }}">
                    @csrf
      
                    <div class="form-group{{ $errors->has('senha_atual') ? ' has-error' : '' }}" id="login-card">
                      <label for="senha_atual" class="col-md-12 control-label">Senha atual <font color="red">*</font> </label>
      
                      <div class="col-md-12" id="login-card">
                        <input id="senha_atual" type="password" class="form-control" name="senha_atual" value="{{ old('senha_atual') }}">
      
                        @if ($errors->has('senha_atual'))
                        <span class="help-block">
                          <strong>{{ $errors->first('senha_atual') }}</strong>
                        </span>
                        @endif
                      </div>
                    </div>
      
                    <div class="form-group{{ $errors->has('nova_senha') ? ' has-error' : '' }}" id="login-card">
                      <label for="nova_senha" class="col-md-12 control-label">Nova senha <font color="red">*</font> </label>
      
                      <div class="col-md-12" id="login-card">
                        <input id="nova_senha" type="password" class="form-control" name="nova_senha" value="{{ old('nova_senha') }}">
      
                        @if ($errors->has('nova_senha'))
                        <span class="help-block">
                          <strong>{{ $errors->first('nova_senha') }}</strong>
                        </span>
                        @endif
                      </div>
                    </div>
      
                    <div class="form-group{{ $errors->has('nova_senha_confirm') ? ' has-error' : '' }}" id="login-card">
                      <label for="nova_senha_confirm" class="col-md-12 control-label">Confirme nova senha <font color="red">*</font> </label>
      
                      <div class="col-md-12" id="login-card">
                        <input id="nova_senha_confirm" type="password" class="form-control" name="nova_senha_confirm" value="{{ old('nova_senha_confirm') }}">
      
                        @if ($errors->has('nova_senha_confirm'))
                        <span class="help-block">
                          <strong>{{ $errors->first('nova_senha_confirm') }}</strong>
                        </span>
                        @endif
                      </div>
                    </div>
      
                    <div class="form-group" id="login-card">
                      <div class="row col-md-12 text-center" id="login-card">
            
                        <button type="submit" class="btn btn-primary">
                          Atualizar
                        </button>
                      </div>
                    </div>
                  </form>
            </div>
        </div>
    </div>
</div>
