<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

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
    #[ArrayShape(['owner_id' => "\Illuminate\Database\Eloquent\Factories\Factory", 'category_id' => "\Illuminate\Database\Eloquent\Factories\Factory", 'slug' => "string", 'title' => "string", 'description' => "string", 'published_at' => "\Illuminate\Support\Carbon", 'body' => "string"])]
    public function definition(): array
    {
        return [
            'owner_id' => User::factory(),
            'category_id' => Category::factory(),
            'slug' => $this->faker->slug(),
            'title' => $this->faker->sentence(5),
            'description' => $this->faker->sentence(20),
            'published_at' => now(),
            'body' => $this->faker->paragraph(20)
        ];
    }
}
