<?php

namespace Database\Factories;

use App\Models\Nick;
use Illuminate\Database\Eloquent\Factories\Factory;

class NickFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Nick::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'address_id' => \App\Models\Address::inRandomOrder()->first()->id,
            'name' => $this->faker->unique()->userName()
        ];
    }
}
