<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use function Symfony\Component\Translation\t;

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
        $title = $this->faker->slug(2);
        $slug = strtolower(str_replace(' ', '-', $title));

        return [
            'owner_id' => 1,
            'slug' => $slug,
            'title' => $title,
            'description' => $this->faker->sentence,
            'body' => $this->faker->paragraph(20)
        ];
    }
}
