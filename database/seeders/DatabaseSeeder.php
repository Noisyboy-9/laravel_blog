<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
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
//        clear the tables
        User::truncate();
        Category::truncate();
        Post::truncate();

//        seed them with data
        User::factory(1)->create();
        Category::factory()
            ->count(3)
            ->hasPosts(1)
            ->create();
    }
}
