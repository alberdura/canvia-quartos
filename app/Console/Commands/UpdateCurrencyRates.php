<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Currency;  // Asegúrate de tener un modelo Currency para la tabla de monedas
use Carbon\Carbon;

class UpdateCurrencyRates extends Command
{
    protected $signature = 'currencies:update';
    protected $description = 'Update currency rates from the external API';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $response = Http::get('URL_DE_TU_API');
        $data = $response->json();

        if (isset($data['data'])) {
            foreach ($data['data'] as $currencyCode => $currencyData) {
                $currency = Currency::updateOrCreate(
                    ['code' => $currencyCode],
                    [
                        'value' => $currencyData['value'],
                        'last_updated_at' => Carbon::parse($data['meta']['last_updated_at'])
                    ]
                );
            }

            $this->info('S\'han actualitzat les currencies');
        } else {
            $this->error('Hi ha hagut un problema rebent la info de l\'API');
        }
    }
}
