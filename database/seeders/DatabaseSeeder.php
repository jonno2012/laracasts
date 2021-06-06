<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // a way of seeding using set rather than random entries
//        Category::create([
//            'slug' => 'personal',
//            'name' => 'Personal'
//        ]);
        User::truncate();
        Category::truncate();
        Post::truncate();
        Comment::truncate();

        User::factory(2)->create();

//        User::factory(2)->create([
//            'name' => 'Gay Lord'
//        ]);

        Category::factory(4)->create();
        Post::factory(10)->create();
        Comment::factory(30)->create();
    }
}
