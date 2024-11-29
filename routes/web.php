<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CurrencyController;

// Route::get('/', function () {
//     return view('pages.convert');
// })->name('home');

Route::get('/convert', function () {
    return view('pages.convert');
})->name('convert');

Route::get('/graphic', function () {
    return view('pages.graphic');
})->name('graphic');

Route::get('/conversionTable', function () {
    return view('pages.conversionTable');
})->name('conversionTable');

Route::post('/convert', [CurrencyController::class, 'convert'])->name('convert');
Route::post('/conversionTable', [CurrencyController::class, 'conversionTable'])->name('conversionTable');
Route::post('/graphic', [CurrencyController::class, 'graphic'])->name('graphic');