<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RomanNumberConverter;

class RomanNumberController extends Controller
{
    public function index() // Método index: Exibe a página inicial com o formulário de conversão
    {
        return view('converter');
    }

    public function convert(Request $request) //Método convert: Processa a solicitação de conversão. Verifica se o número é arábico ou romano.
    {
        $number = $request->input('number');

        if (is_numeric($number)) {
            $number = (int)$number;
            if (RomanNumberConverter::isValidArabic($number)) {
                $result = RomanNumberConverter::toRoman($number);
            } else {
                return redirect()->back()->with('error', 'Número arábico inválido.');
            }
        } else {
            $number = strtoupper($number);
            if (RomanNumberConverter::isValidRoman($number)) {
                $result = RomanNumberConverter::toArabic($number);
            } else {
                return redirect()->back()->with('error', 'Número romano inválido.');
            }
        }

        return redirect()->back()->with('result', "Resultado: $result");
    }
}
