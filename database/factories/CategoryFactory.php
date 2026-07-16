<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Category>
 */

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->randomElement(['Coffee', 'Non-Coffee', 'Pastry', 'Heavy Meal']);

        return [
            'name' => $name,
            'kode_makanan' => Str::slug($name),
        ];
    }
}