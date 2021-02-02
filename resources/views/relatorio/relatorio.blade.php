<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Relatorio</title>
</head>
<body>
@if($aluno->imagem != null)
    <img align="right" src="{{public_path('storage/avatars/'.$aluno->imagem)}}" width="169px" height="169px"
         style="border-radius: 20px; border: 5px solid #0b2e13">
@else
    <img align="right" src="{{ public_path('images/avatar.png') }}" width="169px" height="169px"
         style="border-radius: 20px; border: 5px solid #0b2e13">
@endif
<h2>{{$aluno->nome}}</h2>
<p><b>CPF:</b> {{$aluno->cpf}}<br>
    @if($aluno->sexo == 'M')
        <b>Sexo:</b> Masculino
    @else
        <b>Sexo:</b> Feminino
    @endif<br>
    <b>Data de Nascimento:</b> {{$aluno->data_de_nascimento}}<br>
    <b>CID:</b> {{$aluno->cid}} - {{$aluno->descricao_cid}}<br>
    <b>Instituições:</b>
    @for($i = 0; $i < count($aluno->instituicoes); $i++)
        @if($i < count($aluno->instituicoes)-1)
            {{$i+1}} - {{$aluno->instituicoes[$i]->nome}},
        @else
            {{$i+1}} - {{$aluno->instituicoes[$i]->nome}}
        @endif
    @endfor<br>
    <b>Endereço:</b>
    <?php
    echo $aluno->endereco->rua, ", nº ",
    $aluno->endereco->numero, ", ",
    $aluno->endereco->bairro, ", ",
    $aluno->endereco->cidade, " - ",
    $aluno->endereco->estado;
    ?>
</p>

<h2>Observações</h2>
{{$aluno->observacao}}<br>

@if(!empty($aluno->objetivos))
    <h2>Objetivos</h2>
    @foreach($aluno->objetivos as $objetivo)
        <p>
            <b>{{$objetivo->titulo}}</b><br>
            <b>Descrição: </b>{{$objetivo->descricao}}<br>
            <b>Objetivo: </b>{{$objetivo->tipoObjetivo->tipo}}<br>
            <b>Prioridade: </b>{{$objetivo->prioridade}}<br>
            <b>Status: </b>
            @if($objetivo->concluido == 'true')
                Concluido
            @else
                Não Concluido
            @endif<br>
            <b>Autor: </b>{{$objetivo->user->name}}

        </p>
    @endforeach
@endif

@if(!empty($aluno->albuns))
    <h2>Albuns</h2>
    @foreach($aluno->albuns as $album)
        <p>
            <b>{{$album->nome}}</b><br>
            <b>Descrição: </b>{{$album->descricao}}<br>
        <div class="row">
            @foreach($album->fotos as $foto)
                <div class="column" style="float: left; padding-right: 10px">
                    <img src="{{ public_path('storage/albuns/'.$aluno->id.'/'.$foto->imagem) }}"
                         width="250px" height="250px"
                         style="border-radius: 20px; border: 5px solid #1f648b;">
                </div>
            @endforeach
        </div>
        </p>
    @endforeach
@endif


</body>
</html>