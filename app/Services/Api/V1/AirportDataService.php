<?php

namespace App\Services\Api\V1;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;

class AirportDataService
{
    private string $filePath;
    const CACHE_TIME = 60 * 60 * 24;

    public function __construct(string $filePath = null)
    {
        $this->filePath = $filePath ?? storage_path('files/airports.json');
    }

    public function getAllAirports(): array
    {
        return Cache::remember('airports_data', self::CACHE_TIME, function () {
            $jsonData = json_decode(File::get($this->filePath), true);

            if ($jsonData === null && json_last_error() !== JSON_ERROR_NONE) {
                return [];
            }

            return $jsonData;
        });
    }
}