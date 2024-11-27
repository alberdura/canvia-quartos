<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function convert(Request $request)
    {
        $from = $request->input('from_currency');
        $to = $request->input('to_currency');
        $amount = $request->input('amount');

        // Ejemplo de lógica de conversión (puedes mejorarlo)
        $rate = $from === 'USD' && $to === 'EUR' ? 0.85 : 1.18;
        $result = $amount * $rate;

        return back()->with('result', $result);
    }
}
