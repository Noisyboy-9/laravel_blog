<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    #[ArrayShape(['name' => "string", 'slug' => "array|string|string[]"])] public function definition(): array
    {
        $name = $this->faker->sentence;
        $slug = strtolower(str_replace(' ', '-', $name));
        return ['name' => $name, 'slug' => $slug];
    }
}
