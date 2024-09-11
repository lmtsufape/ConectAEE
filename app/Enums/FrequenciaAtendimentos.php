<?php

namespace App\Enums;

class FrequenciaAtendimentos
{
    const UMA_VEZ_POR_SEMANA = '1 vez por semana';
    const DUAS_VEZES_POR_SEMANA = '2 vezes por semana';
    const TRES_VEZES_POR_SEMANA = '3 vezes por semana';
    const QUATRO_VEZES_POR_SEMANA = '4 vezes por semana';
    const TODO_PERIODO_AULAS = 'Todo o período de aulas, na própria sala de aula';
    const OUTRO = 'Outro';

    public static function getValues()
    {
        return [
            self::UMA_VEZ_POR_SEMANA,
            self::DUAS_VEZES_POR_SEMANA,
            self::TRES_VEZES_POR_SEMANA,
            self::QUATRO_VEZES_POR_SEMANA,
            Self::TODO_PERIODO_AULAS,
            Self::OUTRO,

        ];
    }
}
