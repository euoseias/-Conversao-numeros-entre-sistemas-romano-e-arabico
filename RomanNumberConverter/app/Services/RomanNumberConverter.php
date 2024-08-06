<?php

namespace App\Services;

class RomanNumberConverter
{
    //$romanNumerals: Um array associativo que mapeia símbolos romanos para seus valores arábicos correspondentes.
    protected static $romanNumerals = [
        'M' => 1000,
        'CM' => 900,
        'D' => 500,
        'CD' => 400,
        'C' => 100,
        'XC' => 90,
        'L' => 50,
        'XL' => 40,
        'X' => 10,
        'IX' => 9,
        'V' => 5,
        'IV' => 4,
        'I' => 1,
    ];

    // Conversão de números arábicos para romanos
    public static function toRoman($number) //  toRoman: Converte um número arábico em um número romano.
    {
        $result = '';
        foreach (self::$romanNumerals as $roman => $value) {
            while ($number >= $value) {
                $result .= $roman;
                $number -= $value;
            }
        }
        return $result;
    }

     // Conversão de números romanos para arábicos
    public static function toArabic($roman) //Método toArabic: Converte um número romano em um número arábico.
    {
        $result = 0;
        foreach (self::$romanNumerals as $key => $value) {
            while (strpos($roman, $key) === 0) {
                $result += $value;
                $roman = substr($roman, strlen($key));
            }
        }
        return $result;
    }

    public static function isValidRoman($roman) //Método isValidRoman: Verifica se a string fornecida é um número romano válido.
    {
        return preg_match('/^(M{0,4}(CM|CD|D?C{0,3})(XC|XL|L?X{0,3})(IX|IV|V?I{0,3})|)$/', $roman);
    }

    // Validação de números romanos
    public static function isValidArabic($number) // Método isValidArabic: Verifica se o número fornecido é um inteiro positivo válido.
    {
        return is_int($number) && $number > 0;
    }
}
