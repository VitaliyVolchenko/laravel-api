<?php

namespace App\Services;

use App\Contracts\ExchangeRateServiceInterface;
use Illuminate\Support\Facades\Http;

class ExchangeRateService implements ExchangeRateServiceInterface
{
    protected string $apiUrl;

    public function __construct()
    {
        $this->apiUrl = config('services.exchange_rate.url');
    }

    /**
     * Get exchange rates from the API.
     *
     * @return array
     * @throws \Exception
     */
    public function getRates(): array
    {
        $response = Http::get($this->apiUrl);

        if ($response->failed()) {
            throw new \Exception('Failed to fetch exchange rates.');
        }

        return $response->json();
    }
}
