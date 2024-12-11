<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CurrencyController extends Controller
{
    public function convert(Request $request)
    {
        $from = $request->input('from_currency');
        $to = $request->input('to_currency');
        $amount = $request->input('amount');

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

    public function updateExchange()
    {
        // Realizar la solicitud a la API para obtener los valores de cambio
        $response = Http::get('https://api.currencyapi.com/v3/latest', [
            'apikey' => env('CURRENCY_API'),
        ]);
    
        // Verificamos si la respuesta es exitosa
        if ($response->successful()) {
            $data = $response->json()['data']; // Obtenemos los datos de la respuesta
    
            // Iterar sobre las monedas obtenidas y actualizar los valores
            foreach ($data as $currencyCode => $currency) {
                $currencyRecord = Currency::where('code', $currencyCode)->first();
    
                // Si la moneda existe, actualizamos el valor
                if ($currencyRecord) {
                    $currencyRecord->value = $currency['value'];
                    $currencyRecord->save();
                }
            }
    
            // Retornar una respuesta exitosa
            return response()->json([
                'status' => 'ok',
                'message' => 'Currency exchange rates updated successfully.',
            ]);
        } else {
            // Si la solicitud falla, se retorna un error
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to update currency exchange rates.',
            ], 500);
        }
    }
}
