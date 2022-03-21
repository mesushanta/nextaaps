<?php

namespace Tests\Feature;

use Tests\TestCase;

class CountryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_countries_with_business_response_structure()
    {
        $response = $this->get('/api/countries-with-business');

        $response->assertJsonStructure([
            'data' => [
                'countries' => [
                    '*' => [
                        'id',
                        'name',
                        ]
                    ],
                'countryCount',
            ]
        ]);
    }
}
