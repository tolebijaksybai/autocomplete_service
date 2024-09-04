<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\AirportSearchRequest;
use App\Services\Api\V1\AirportSearchService;
use Illuminate\Http\JsonResponse;

class AirportController extends Controller
{
    protected AirportSearchService $searchService;

    public function __construct(AirportSearchService $searchService)
    {
        $this->searchService = $searchService;
    }

    public function search(AirportSearchRequest $request): JsonResponse
    {
        $query = $request->validated('query');

        return response()->json([
            'data' => $this->searchService->search($query)
        ]);
    }
}
