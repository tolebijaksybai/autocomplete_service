<?php

namespace App\Services\Api\V1;

use Illuminate\Support\Facades\File;

class AirportDataService
{
    private string $filePath;

    public function __construct(string $filePath = null)
    {
        $this->filePath = $filePath ?? storage_path('files/airports.json');
    }

    public function getAllAirports(): array
    {
        $jsonData = json_decode(File::get($this->filePath), true);

        if ($jsonData === null && json_last_error() !== JSON_ERROR_NONE) {
            return [];
        }

        return $jsonData;
    }
}