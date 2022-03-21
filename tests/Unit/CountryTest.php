<?php

namespace Tests\Unit;

use Tests\TestCase;

class CountryTest extends TestCase
{

    public function test_get_countries_with_business()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->get('/api/countries-with-business');
        $response->assertOk();
    }

}
