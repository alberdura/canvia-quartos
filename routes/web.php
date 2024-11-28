<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CurrencyController;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/convert', function () {
    return view('pages.convert');
})->name('convert');

Route::post('/convert', [CurrencyController::class, 'convert'])->name('convert');