
<div class="modal fade" id="redefinirModal" tabindex="-1" aria-labelledby="redefinirModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="redefinirModalLabel">Redefinição de senha</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('users.redefinir-senha')}}">
                    @csrf
      
                    <div class="form-group">
                      <label for="senha_atual" class="control-label">Senha atual</label>
      
                        <input id="senha_atual" type="password" class="form-control @error('senha_atual') is-invalid @enderror" name="senha_atual" value="{{ old('senha_atual') }}" required>
      
                        @error('senha_atual')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
      
                    <div class="form-group">
                        <label for="nova_senha" class="control-label">Nova senha</label>
      
                        <input id="nova_senha" type="password" class="form-control @error('nova_senha') is-invalid @enderror" name="nova_senha" value="{{ old('nova_senha') }}" required>
      
                        @error ('nova_senha')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
      
                    <div class="form-group">
                        <label for="nova_senha_confirm" class="control-label">Confirme nova senha</label>
      
                        <input id="nova_senha_confirm" type="password" class="form-control @error('nova_senha_confirm') is-invalid @enderror" name="nova_senha_confirm" value="{{ old('nova_senha_confirm') }}" required>
      
                        @error('nova_senha_confirm')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
      
                    <div class="d-flex justify-content-center pt-3">
                        <button type="submit" class="btn btn-success">
                          Atualizar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        @if ($errors->any())
            $('#redefinirModal').modal('show');
        @endif
        $('#redefinirModal').on('hidden.bs.modal', function () {
            $(this).find('input').each(function () {
                if ($(this).hasClass('is-invalid')) {
                    $(this).removeClass('is-invalid invalid-feedback');
                }
                $(this).val('');
            });
        });
    });
</script>
@endpush