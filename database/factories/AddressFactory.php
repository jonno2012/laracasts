<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_line' => $this->faker->secondaryAddress(),
            'street_name' => $this->faker->secondaryAddress(),
            'street_number' => $this->faker->numberBetween(1, 1000),
            'name' => $this->faker->streetSuffix(),
            'post_code' => $this->faker->postcode()
        ];
    }
}
