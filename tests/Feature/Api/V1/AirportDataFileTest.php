<?php

namespace Api\V1;

use Illuminate\Support\Facades\File;
use Tests\TestCase;

class AirportDataFileTest extends TestCase
{
    /**
     * Проверяет, что файл airports.json существует.
     *
     * @return void
     */
    public function test_airports_json_file_exists()
    {
        $filePath = storage_path('files/airports.json');

        $this->assertTrue(File::exists($filePath), 'Файл airports.json не найден в указанной директории.');
    }
}
