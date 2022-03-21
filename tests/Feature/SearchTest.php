<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SearchTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_search_result_response_structure()
    {
        $response = $this->get('/api/search?term=a&country=1');

        $response->assertJsonStructure([
            'data' => [
                'businesses' => [
                    '*' => [
                        'id',
                        'name',
                        'description',
                        'address' => [
                            '*' => [
                                'id',
                                'street',
                                'house_number',
                                'unit',
                                'country' => [
                                    'id',
                                    'name',
                                ]
                            ]
                        ],
                        'owners' => [
                            '*' => [
                                'id',
                                'first_name',
                                'last_name'
                            ]
                        ],
                    ]
                ],
                'businessesCount'
            ],
        ]);
    }
}
