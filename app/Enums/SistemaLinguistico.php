<?php

namespace App\Enums;

class SistemaLinguistico
{
    const COMUNICACAO_VERBAL = 'Comunicação Verbal/Fala';
    const COMUNICACAO_ALTERNATIVA_SUPLEMENTAR = 'Comunicação Alternativa/Suplementar';
    const COMUNICACAO_ALTERNATIVA_VOZ = 'Comunicação Alternativa/Voz';
    const OUTRO = 'Outro';

    public static function getValues()
    {
        return [
            self::COMUNICACAO_VERBAL,
            self::COMUNICACAO_ALTERNATIVA_SUPLEMENTAR,
            self::COMUNICACAO_ALTERNATIVA_VOZ,
            self::OUTRO,
        ];
    }
}