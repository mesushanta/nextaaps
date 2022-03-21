<?php

namespace Tests\Unit;

use Tests\TestCase;

class SearchTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_search_without_parameter_with_header()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->get('/api/search');
        $response->assertUnprocessable();
    }

    public function test_search_with_parameter_query()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->get('/api/search?term=a');
        $response->assertOk();
    }

    public function test_search_with_parameter_country()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->get('/api/search?country=122');
        $response->assertOk();
    }

    public function test_search_with_both_parameter_query_and_country()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->get('/api/search?term=a&country=1');
        $response->assertOk();
    }
}
