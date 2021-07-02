<?php

namespace Database\Factories;

use App\Models\Dibble;
use Illuminate\Database\Eloquent\Factories\Factory;

class DibbleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Dibble::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'number' => $this->faker->numberBetween(1, 99999),
            'call_sign' => $this->faker->unique()->userName(),
            'nick_id' => \App\Models\Nick::inRandomOrder()->first()->id,
        ];
    }
}
