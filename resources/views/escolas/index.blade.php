@extends('layouts.app')
@section('title','Listar Instituições')

@section('content')

  <div class="row m-2">
    <div class="col-md-6">
      <h2>
        <strong style="color: #12583C">
          Escolas
        </strong>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#filterModal">
          Filtrar

          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel" viewBox="0 0 16 16">
            <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2z"/>
          </svg>
      </button>
      </h2>
    </div>
    
    <div class="col-md-6">
      <div class="text-end">
        <a class="btn btn-primary" href="{{ route('escolas.create')}}">
          Nova Escola
        </a>
      </div>
    </div>
  </div>

  <hr style="border-top: 1px solid #AAA;">
    
  <div class="m-4">
    <table class="table shadow table-hover">
      <thead class="table-primary">
        <tr>
          <th>Nome</th>
          <th>GRE</th>
          <th>Município</th>
          <th>Ações</th>
        </tr>

      </thead>
      <tbody>
        @foreach ($escolas as $escola)
          <tr>
            <td>{{ $escola->nome }}</td>
            <td>{{ $escola->municipio->gre->nome }}</td>
            <td>{{ $escola->municipio->nome }}</td>

            <td data-title="Ações">
              <a class="btn btn-primary" href="{{ route("escolas.show" , ['escola_id' => $escola->id]) }}">
                Visualizar
              </a>
            
              <a class="btn btn-primary" href="{{ route("escolas.edit" , ['escola_id' => $escola->id]) }}">
                Editar
              </a>
            
              <a class="btn btn-danger" data-toggle="modal" data-target="#modalConfirm" onclick="setDadosModal('{{ route('escolas.destroy' , ['escola_id' => $escola->id]) }}','{{$escola->nome}}')" >
                Excluir
              </a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <div class="d-flex justify-content-center">
      {{$escolas->links()}}
    </div>

    <a class="btn btn-secondary" href="{{route('home')}}">
      Voltar
    </a>
  </div>

  @include('escolas.filter-modal', compact('gres', 'municipios'))
  <!--Modal Confirm-->
  <div class="modal fade" id="modalConfirm" tabindex="-1" role="dialog"
      aria-labelledby="modalConfirmLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"
                  aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="modalConfirmLabel" align="center"></h4>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Não
          </button>
          <a type="button" href=""  id="btnSubmit" class="btn btn-primary">
            Sim
          </a>
        </div>
      </div>
    </div>
  </div>

@endsection
