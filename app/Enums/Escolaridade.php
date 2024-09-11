<?php

namespace App\Enums;

class Escolaridade
{
    public const ANO_PRIMEIRO_EF = '1º ano EF';
    public const ANO_SEGUNDO_EF = '2º ano EF';
    public const ANO_TERCEIRO_EF = '3º ano EF';
    public const ANO_QUARTO_EF = '4º ano EF';
    public const ANO_QUINTO_EF = '5º ano EF';
    public const ANO_SEXTO_EF = '6º ano EF';
    public const ANO_SETIMO_EF = '7º ano EF';
    public const ANO_OITAVO_EF = '8º ano EF';
    public const ANO_NONO_EF = '9º ano EF';
    public const ANO_PRIMEIRO_EM = '1º ano EM';
    public const ANO_SEGUNDO_EM = '2º ano EM';
    public const ANO_TERCEIRO_EM = '3º ano EM';
    public const EJA_INICIAIS_MODULO_I = 'EJA - Ensino Fundamental Anos Iniciais Módulo I';
    public const EJA_INICIAIS_MODULO_II = 'EJA - Ensino Fundamental Anos Iniciais Módulo II';
    public const EJA_INICIAIS_MODULO_III = 'EJA - Ensino Fundamental Anos Iniciais Módulo III';
    public const EJA_INICIAIS_MODULO_IV = 'EJA - Ensino Fundamental Anos Iniciais Módulo IV';
    public const EJA_FINAIS_MODULO_V = 'EJA - Ensino Fundamental Anos Finais Módulo V';
    public const EJA_FINAIS_MODULO_VI = 'EJA - Ensino Fundamental Anos Finais Módulo VI';
    public const EJA_FINAIS_MODULO_VII = 'EJA - Ensino Fundamental Anos Finais Módulo VII';
    public const EJA_FINAIS_MODULO_VIII = 'EJA - Ensino Fundamental Anos Finais Módulo VIII';
    public const EJA_MEDIO_MODULO_1 = 'EJA - Ensino Médio Módulo 1';
    public const EJA_MEDIO_MODULO_2 = 'EJA - Ensino Médio Módulo 2';
    public const EJA_MEDIO_MODULO_3 = 'EJA - Ensino Médio Módulo 3';
    public const EDUCACAO_INFANTIL = 'Educação Infantil - Anos Iniciais';
    public const TRAVESSIA = 'Travessia';
    public const TECNICO_ETE_ANO_1 = 'Curso Técnico ETE - 1º Ano';
    public const TECNICO_ETE_ANO_2 = 'Curso Técnico ETE - 2º Ano';
    public const TECNICO_ETE_ANO_3 = 'Curso Técnico ETE - 3º Ano';
    public const ANO_OUTRO = 'Outro';


    public const NAO_ALFABETIZADO = 'Não-alfabetizado';
    public const FUNDAMENTAL_INCOMPLETO = 'Ensino Fundamental Incompleto';
    public const FUNDAMENTAL_COMPLETO = 'Ensino Fundamental Completo';
    public const MEDIO_INCOMPLETO = 'Ensino Médio Incompleto';
    public const MEDIO_COMPLETO = 'Ensino Médio Completo';
    public const SUPERIOR_INCOMPLETO = 'Ensino Superior Incompleto';
    public const SUPERIOR_COMPLETO = 'Ensino Superior Completo';
    public const POS_GRADUACAO_INCOMPLETA = 'Pós Graduação Incompleta';
    public const POS_GRADUACAO_COMPLETA = 'Pós Graduação Completa';

    // Método para obter todos os anos escolares
    public static function anosEscolaridade(): array
    {
        return [
            self::ANO_PRIMEIRO_EF,
            self::ANO_SEGUNDO_EF,
            self::ANO_TERCEIRO_EF,
            self::ANO_QUARTO_EF,
            self::ANO_QUINTO_EF,
            self::ANO_SEXTO_EF,
            self::ANO_SETIMO_EF,
            self::ANO_OITAVO_EF,
            self::ANO_NONO_EF,
            self::ANO_PRIMEIRO_EM,
            self::ANO_SEGUNDO_EM,
            self::ANO_TERCEIRO_EM,
            self::EJA_INICIAIS_MODULO_I,
            self::EJA_INICIAIS_MODULO_II,
            self::EJA_INICIAIS_MODULO_III,
            self::EJA_INICIAIS_MODULO_IV,
            self::EJA_FINAIS_MODULO_V,
            self::EJA_FINAIS_MODULO_VI,
            self::EJA_FINAIS_MODULO_VII,
            self::EJA_FINAIS_MODULO_VIII,
            self::EJA_MEDIO_MODULO_1,
            self::EJA_MEDIO_MODULO_2,
            self::EJA_MEDIO_MODULO_3,
            self::EDUCACAO_INFANTIL,
            self::TRAVESSIA,
            self::TECNICO_ETE_ANO_1,
            self::TECNICO_ETE_ANO_2,
            self::TECNICO_ETE_ANO_3,
            self::ANO_OUTRO,
        ];
    }

    // Método para obter todos os níveis de escolaridade do pai
    public static function escolaridadeAdulto(): array
    {
        return [
            self::NAO_ALFABETIZADO,
            self::FUNDAMENTAL_INCOMPLETO,
            self::FUNDAMENTAL_COMPLETO,
            self::MEDIO_INCOMPLETO,
            self::MEDIO_COMPLETO,
            self::SUPERIOR_INCOMPLETO,
            self::SUPERIOR_COMPLETO,
            self::POS_GRADUACAO_INCOMPLETA,
            self::POS_GRADUACAO_COMPLETA,
        ];
    }
}
