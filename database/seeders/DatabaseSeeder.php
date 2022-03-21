<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Business;
use App\Models\Owner;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Business::factory(20)->create();
        Owner::factory(20)->create();
        Address::factory(25)->create();
        User::factory(1)->create();

        for($i = 0; $i < 30; $i++) {
            DB::table('business_owner')->insert([
                'business_id' => rand(1, 20),
                'owner_id' => rand(1,20)
            ]);
        }

        # Make sure that no business is without address
        $business_without_address = Business::doesntHave('addresses')->get();

        foreach ($business_without_address as $business) {
            $new_address = Address::factory(1)->create();
            $address = Address::latest('created_at')->first();
            $address->update([
                'business_id' => $business->id
            ]);
        }

        # Make sure that no business is without owner
        $business_without_owner = Business::doesntHave('owners')->get();
        foreach ($business_without_owner as $business) {
            DB::table('business_owner')->insert([
                'business_id' => $business->id,
                'owner_id' => rand(1,20)
            ]);
        }
    }
}
