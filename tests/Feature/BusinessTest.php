<?php

namespace Tests\Feature;

use Tests\TestCase;

class BusinessTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_get_all_business_response_structure()
    {
        $response = $this->get('/api/business');

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

    public function test_get_all_business_with_limit_response_structure()
    {
        $response = $this->get('/api/business?limit=2');
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

    public function test_get_all_business_with_limit_and_offset_response_structure()
    {
        $response = $this->get('/api/business?limit=2&offset=2');
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

    public function test_get_business_by_id_response_structure()
    {
        $response = $this->get('/api/business/1');
        $response->assertJsonStructure([
            'data' => [
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
        ]);
    }
}
