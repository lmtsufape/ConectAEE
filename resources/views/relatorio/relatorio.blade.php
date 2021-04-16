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

@if(!empty($objetivos))
    <h2>Objetivos</h2>
    @foreach($objetivos as $objetivo)
        <p>
            <b style="text-transform: uppercase;">{{$objetivo->titulo}}</b><br>
            <b>Status:</b>
            @if($objetivo->concluido == 'true')
                Concluido
            @else
                Não Concluido
            @endif<br>
            <b>Descrição: </b>{{$objetivo->descricao}}<br>
            <b>Tipo: </b>{{\App\TipoObjetivo::all()->where('id', '=', $objetivo->tipo_objetivo_id)->first()->tipo}}<br>
            <b>Prioridade: </b>{{$objetivo->prioridade}}<br>
            <b>Autor: </b>{{\App\User::all()->where('id', '=', $objetivo->user_id)->first()->name}}<br>
            <b>Data: </b>{{date_format(date_create($objetivo->data),'d/m/Y')}}
        </p>

        <h3 style="margin-left: 3%">Atividades</h3>
        <div style="border-style: groove; border-radius: 5px; margin-left: 2%;">
            @php
                $count = 1
            @endphp
            @foreach(\App\Atividade::all()->where('objetivo_id', '=', $objetivo->id) as $atividade)
                @if($count != 1)
                    <hr>
                @endif
                <p style="margin-left: 3%">
                    <b style="text-transform: uppercase">{{$atividade->titulo}}</b><br>
                    <b>Status: </b>{{$atividade->status}} -
                    @if($objetivo->concluido == 'true')
                        <b>Concluido</b>
                    @else
                        <b>Não Concluido</b>
                    @endif<br>
                    <b>Prioridade: </b>{{$atividade->prioridade}}<br>
                    <b>Descrição: </b><span style="text-align: left">{{$atividade->descricao}}</span><br>
                    <b>Data: </b>{{$atividade->data}}
                </p>
                @php
                    $count++
                @endphp
            @endforeach
        </div>
    @endforeach
@endif

@if(!empty($albuns))
    <h2>Albuns</h2>
    <table>
        @foreach($albuns as $album)
            <tr>
                <td>
                    <b>{{$album->nome}}</b><br>
                    <b>Descrição: </b>{{$album->descricao}}<br>
                    <b>Data: </b>{{date_format(date_create($album->created_at),'d/m/Y')}}<br>
                </td>
            </tr>
            <br>
            <tr>

                @foreach(\App\Foto::all()->where('album_id', '=', $album->id)->take(3)  as $foto)
                    <td style="float: left; padding-right: 10px; left: -10px">
                        <img src="{{ public_path('storage/albuns/'.$aluno->id.'/'.$foto->imagem) }}"
                             width="230px" height="230px"
                             style="border-radius: 20px; border: 5px solid #1f648b;">
                    </td>
                @endforeach
            </tr>
            <br>
        @endforeach
    </table>
@endif


</body>
</html>