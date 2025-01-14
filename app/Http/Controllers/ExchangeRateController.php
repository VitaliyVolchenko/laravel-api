<?php

namespace App\Http\Controllers;

use App\Contracts\ExchangeRateServiceInterface;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Tag(
 *     name="Exchange Rates",
 *     description="API for managing currency exchange rates"
 * )
 */
class ExchangeRateController extends Controller
{
    protected ExchangeRateServiceInterface $exchangeRateService;

    public function __construct(ExchangeRateServiceInterface $exchangeRateService)
    {
        $this->exchangeRateService = $exchangeRateService;
    }

    /**
     * @OA\Get(
     *     path="/api/exchange-rates",
     *     summary="Get the latest exchange rates",
     *     tags={"Exchange Rates"},
     *     security={{"sanctum":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Successful response with exchange rates",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="rates", type="object",
     *                 @OA\AdditionalProperties(type="number")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Failed to fetch exchange rates",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=false),
     *             @OA\Property(property="message", type="string", example="Failed to fetch exchange rates.")
     *         )
     *     )
     * )
     */
    public function index(): JsonResponse
    {
        try {
            $rates = $this->exchangeRateService->getRates();
            return response()->json(['success' => true, 'rates' => $rates], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
