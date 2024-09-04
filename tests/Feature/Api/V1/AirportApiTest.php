<?php

namespace Api\V1;

use Tests\TestCase;

class AirportApiTest extends TestCase
{
    /**
     * Тест поиска аэропорта, когда нет результатов.
     *
     * @return void
     */
    public function test_successfully_search_no_results()
    {
        $response = $this->getJson(
            route('api.airports.search', ['query' => 'TestAirport'])
        );

        $response->assertStatus(200)
            ->assertJson([
                'data' => []
            ]);
    }

    /**
     * Тестирование успешного поиска с пустым запросом
     *
     * @return void
     */
    public function test_successfully_search_with_empty_query()
    {
        $response = $this->getJson(
            route('api.airports.search', ['query' => ''])
        );

        $response->assertStatus(200)
            ->assertJson([
                'data' => []
            ]);
    }

    /**
     * Тестирование успешного поиска с запросом, который дает результаты
     *
     * @return void
     */
    public function test_successfully_get_airports()
    {
        $response = $this->getJson(
            route('api.airports.search', ['query' => 'Yamburg'])
        );

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'cityName' => [
                            'ru',
                            'en',
                        ],
                        'area',
                        'country',
                        'timezone',
                    ],
                ],
            ]);
    }
}
