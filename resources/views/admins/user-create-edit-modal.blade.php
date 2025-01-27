<div class="modal fade" id="userModal{{$user->id ?? ''}}" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModalLabel">@if(!$user) Cadastrar Usuário @else Atualizar Usuário @endif</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{$route}}">
                    @csrf
                    @if($user)
                        @method('PUT')
                    @endif
                    <div class="form-group mb-2">
                        <label for="nome" class="form-label">Nome</label>
                        <input id="nome" type="text" class="form-control  @error('nome') is-invalid @enderror"
                            placeholder="Digite seu nome completo" name="nome" value="{{ old('nome') ?? $user->nome ?? ''}}" autofocus>

                        @error('nome')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="row">
                        <div class="form-group col-md-6 mb-2">
                            <label for="email" class="form-label">E-Mail</label>
                            <input id="email" type="email" class="form-control  @error('email') is-invalid @enderror"
                                name="email" placeholder="Digite seu email" value="{{ old('email') ?? $user->email ?? ''}}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 mb-2">
                            <label for="telefone" class="form-label">Telefone</label>
                            <input type="digit" name="telefone" id="telefone" minlength="10"
                                class="form-control @error('telefone') is-invalid @enderror" maxlength="14"
                                value="{{ old('telefone') ?? $user->telefone ?? ''}}">
                            @error('telefone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="form-group col-md-6">
                            <label for="cpf" class="form-label">CPF</label>
                            <input id="cpf" type="text" class="form-control @error('cpf') is-invalid @enderror"
                                name="cpf" value="{{ old('cpf') ?? $user->cpf ?? ''}}">

                            @error('cpf')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="matricula" class="form-label">Matrícula</label>
                            <input type="text" name="matricula" id="matricula" class="form-control @error('matricula') is-invalid @enderror"
                                value="{{ old('matricula') ?? $user->matricula ?? ''}}">

                            @error('matricula')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mb-2">
                        <label for="especialidade" class="form-label">Especialidade</label>
                        <select class="form-control @error('especialidade') is-invalid @enderror" name="especialidade" id="especialidade">
                            <option value="" disabled selected>Selecione a especialidade</option>
                            @foreach ($especialidades as $especialidade)
                                <option value="{{$especialidade->id}}" @selected($especialidade->nome == old('especialidade') ?? $user->especialidades->first()->nome ?? '')>{{$especialidade->nome}}</option>
                            @endforeach
                        </select>

                        @error('matricula')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="row mb-5">
                        <div class="form-group col-md-6">
                            <label for="password" class="form-label">Senha</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                placeholder="Digite sua senha" name="password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        @if(!$user)
                            <div class="form-group col-md-6">
                                <label for="password_confirmation" class="form-label">Confirme sua senha</label>
                                <input id="password_confirmation" type="password" placeholder="Confirme sua senha" class="form-control"
                                    name="password_confirmation">
                            </div>
                        @endif
                    </div>
                    <div class="pt-3">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


