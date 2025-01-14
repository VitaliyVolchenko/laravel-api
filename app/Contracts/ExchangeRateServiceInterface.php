<?php

namespace App\Contracts;

interface ExchangeRateServiceInterface
{
    /**
     * Get exchange rates from the API.
     *
     * @return array
     */
    public function getRates(): array;
}
