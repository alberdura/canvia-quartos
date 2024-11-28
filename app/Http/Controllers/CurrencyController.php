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

//        $result = $this->convertCurrency($amount, $from, $to);
//        return back()->with('result', $result);
        return to_route('convert.result', [
            'from_currency' => $from,
            'to_currency' => $to,
            'amount' => $amount
        ]);
    }

    public function convertCurrency(float $amount, string $sourceCurrency, string $targetCurrency)
    {
        $tasa = 1;
        $result = round($amount * $tasa, 2);

        return view('pages.convert', [
            'result' => $result,
            'from_currency' => $sourceCurrency,
            'to_currency' => $targetCurrency,
            'amount' => $amount,
        ]);
    }
}
