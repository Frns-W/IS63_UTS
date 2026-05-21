<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Coffee', 'slug' => 'coffee'],
            ['name' => 'Non-Coffee', 'slug' => 'non-coffee'],
            ['name' => 'Pastry', 'slug' => 'pastry'],
            ['name' => 'Heavy Meal', 'slug' => 'heavy-meal'],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(['slug' => $category['slug']], $category);
        }
    }
}
