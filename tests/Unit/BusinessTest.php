<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;


class BusinessTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_get_all_business()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->get('/api/business');
        $response->assertOk();
    }

    public function test_get_business_by_id()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->get('/api/business/1');
        $response->assertOk();
    }

    public function test_get_business_by_id_that_does_not_exist()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->get('/api/business/21');
        $response->assertNotFound();
    }

    public function test_get_business_by_id_string_that_does_not_exist()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->get('/api/business/invalid_business_id');
        $response->assertNotFound();
    }

    /**
     * This is example of authenticated route test
     * @return void
     */

    public function test_get_all_business_for_admin_without_authentication()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->get('/api/admin/business');

        $response->assertUnauthorized();
    }
    public function test_get_all_business_for_admin()
    {
        $user = User::find(1);
        $response = $this->actingAs($user, 'sanctum')->get('/api/admin/business');

        $response->assertOk();
    }


}


