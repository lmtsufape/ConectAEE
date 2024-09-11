<?php

namespace App\Enums;

class OrganizacaoTipoAEE
{
    const SALA_RECURSOS_MULTIFUNCIONAL = 'Sala de Recursos Multifuncional';
    const INTERPRETE_SALA_REGULAR = 'Intérprete na sala regular';
    const PROFESSOR_DE_LIBRAS = 'Professor de Libras';
    const DOMICILIAR = 'Domiciliar';
    const HOSPITALAR = 'Hospitalar';
    const OUTRO = 'Outro';

    public static function getValues()
    {
        return [
            self::SALA_RECURSOS_MULTIFUNCIONAL,
            self::INTERPRETE_SALA_REGULAR,
            self::PROFESSOR_DE_LIBRAS,
            self::DOMICILIAR,
            Self::HOSPITALAR,
            Self::OUTRO,

        ];
    }
}
