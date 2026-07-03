<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Coffee', 'kode_makanan' => 'coffee'],
            ['name' => 'Non-Coffee', 'kode_makanan' => 'non-coffee'],
            ['name' => 'Pastry', 'kode_makanan' => 'pastry'],
            ['name' => 'Heavy Meal', 'kode_makanan' => 'heavy-meal'],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(['kode_makanan' => $category['kode_makanan']], $category);
        }
    }
}
