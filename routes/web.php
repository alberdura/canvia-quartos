<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CurrencyController;

Route::get('/', function () {
    return view('pages.convert');
})->name('home');

Route::get('/convert', function () {
    return view('pages.convert');
})->name('convert.index');
Route::get('/convert/{amount}/{from_currency}/{to_currency}', [CurrencyController::class, 'convertCurrency'])->name('convert.result');
Route::post('/convert', [CurrencyController::class, 'convert'])->name('convert');
