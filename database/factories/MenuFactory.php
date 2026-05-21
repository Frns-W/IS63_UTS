<?php

namespace Database\Factories;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

/**
 * @extends Factory<Menu>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

public function definition(): array
{
    return [
        // Mengambil id kategori secara acak dari yang sudah ada
        'category_id' => Category::inRandomOrder()->first()->id ?? Category::factory(),
        'menu_name' => $this->faker->words(2, true),
        'price' => $this->faker->randomElement([15000, 18000, 22000, 25000, 30000]),
        'status' => $this->faker->randomElement(['Ready', 'Sold Out']),
    ];
}
}