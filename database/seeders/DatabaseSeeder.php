<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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
        $user = User::factory()->create([
            'name' => 'john doe'
        ]);

        $category = Category::factory()
            ->create();

        Post::factory()
            ->count(10)
            ->create(['owner_id' => $user->id, 'category_id' => $category->id]);
    }
}
