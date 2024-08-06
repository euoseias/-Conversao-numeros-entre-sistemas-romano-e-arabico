<?php

use App\Http\Controllers\RomanNumberController;

//Rota GET /: Exibe a página inicial com o formulário de conversão.
Route::get('/', [RomanNumberController::class, 'index']);


// Rota POST /convert: Processa a conversão do número inserido.
Route::post('/convert', [RomanNumberController::class, 'convert'])->name('convert');

