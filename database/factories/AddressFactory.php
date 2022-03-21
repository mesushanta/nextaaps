<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'street' => $this->faker->streetAddress(),
            'house_number' => $this->faker->numberBetween(1,400),
            'unit' => $this->faker->bothify('## ?'),
            'city' => $this->faker->city(),
            'postcode' => $this->faker->postcode(),
            'business_id' => $this->faker->numberBetween(1,20),
            'country_id' => $this->faker->numberBetween(1,200),
        ];
    }
}
