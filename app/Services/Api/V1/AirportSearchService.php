<?php

namespace App\Services\Api\V1;

class AirportSearchService
{
    private AirportDataService $dataService;

    public function __construct(AirportDataService $dataService)
    {
        $this->dataService = $dataService;
    }

    public function search(?string $query): array
    {
        if (empty($query)) {
            return [];
        }

        $lang = $this->detectLanguage($query);
        $airports = $this->dataService->getAllAirports();

        return $this->filterAirports($airports, $query, $lang);
    }

    private function detectLanguage(?string $query): string
    {
        return preg_match('/\p{Cyrillic}/u', $query) ? 'ru' : 'en';
    }

    private function filterAirports(array $airports, ?string $query, string $lang): array
    {
        return array_filter($airports, function ($airport) use ($query, $lang) {
            return isset($airport['cityName'][$lang]) && stripos($airport['cityName'][$lang], $query) !== false;
        });
    }
}