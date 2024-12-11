<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Realizar una solicitud HTTP a la API para obtener las monedas
        $response = Http::get('https://api.currencyapi.com/v3/currencies', [
            'apikey' => env('CURRENCY_API'),
        ]);

        // Verificamos si la respuesta es exitosa
        if ($response->successful()) {
            $data = $response->json()['data']; // Obtenemos el array de 'data'

            // Iterar sobre las monedas y guardarlas en la base de datos
            foreach ($data as $currencyCode => $currency) {
                DB::table('currencies')->insert([
                    'symbol' => $currency['symbol'],
                    'name' => $currency['name'],
                    'symbol_native' => $currency['symbol_native'],
                    'decimal_digits' => $currency['decimal_digits'],
                    'rounding' => $currency['rounding'],
                    'code' => $currency['code'],
                    'name_plural' => $currency['name_plural'],
                    'type' => $currency['type'],
                    'countries' => json_encode($currency['countries']),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        } else {
            // Si la solicitud falla, podemos loguear un mensaje o lanzar un error
            \Log::error('Error al obtener las monedas desde la API: ' . $response->body());
        }
    }
}
