<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => \App\Models\Category::inRandomOrder()->first()->id,
//            'category_id' => Category::factory(), // another way of doing it. it will create cat ll at once
            'user_id' => \App\Models\User::inRandomOrder()->first()->id,
            'slug' => $this->faker->unique()->slug(3),
            'title' => $this->faker->text(25),
            'excerpt' => $this->faker->sentence(),
            'body' => $this->faker->paragraph(),
            'published_at' => now()
        ];
    }
}
