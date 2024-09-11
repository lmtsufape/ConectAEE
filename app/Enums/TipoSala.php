<?php

namespace App\Enums;

class TipoSala
{
    const TIPO_1 = 'tipo_1';
    const TIPO_2 = 'tipo_2';

    public static function getValues()
    {
        return [
            self::TIPO_1 => [
                'value' => self::TIPO_1,
                'descricao' => 'As SRMs tipo 1 disponibilizam ao professor de AEE equipamentos(ex. computador, lupa eletrônica, teclado colmeia), mobiliários (ex.mesa, cadeira, armário), materiais didáticos e pedagógicos (ex. material dourado, bandinha rítmica, tapete alfabético dentre outros destinados aos estudantes do AEE.'
            ],
            self::TIPO_2 => [
                'value' => self::TIPO_2,
                'descricao' => 'As SRMs tipo 2 contêm todos os recursos da sala tipo 1, adicionados os Recursos de Acessibilidade para pessoas com deficiência visual (ex. calculadora sonora, soroban, punção, impressora Braille, reglete de mesa)'
            ],
        ];
    }
}
