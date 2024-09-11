<?php

namespace App\Enums;

class ProfissionaisEducacaoNecessarios
{
    const PROFESSOR_BRAILISTA = 'Professor Brailista';
    const PROFESSOR_INTERPRETE_LIBRAS = 'Professor Intérprete de Libras';
    const PROFESSOR_INSTRUTOR_LIBRAS = 'Professor Instrutor de Libras';
    const PROFISSIONAL_APOIO_ESCOLAR = 'Profissional de Apoio Escolar';
    const NAO_E_NECESSARIO = 'Não é necessário o apoio de outro profissional';
    const OUTRO = 'Outro';

    public static function getValues()
    {
        return [
            self::PROFESSOR_BRAILISTA,
            self::PROFESSOR_INTERPRETE_LIBRAS,
            self::PROFESSOR_INSTRUTOR_LIBRAS,
            self::PROFISSIONAL_APOIO_ESCOLAR,
            Self::OUTRO,
        ];
    }
}
